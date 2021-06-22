<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ExpenseGroup;
use App\Model\GeneralExpense;
use Auth;
use Validator;
use App\Helpers\AppHelper;
use App\Model\Project;
use App\Model\Employee;
use Input;
use DB;
use App\Model\Transaction;
class GeneralExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if(!Auth::user()->can('list-general-expense') && !AppHelper::checkAdministrator()){
            return view('back-end.common.no-permission');
        }else{
            $general_expenses = new GeneralExpense();
            if(!empty($request->group)){
                $general_expenses = $general_expenses->where('group_id', '=', $request->group);
            }
            if(!empty($request->project)){
                $general_expenses = $general_expenses->where('project_id', '=', $request->project);
            }
            if(!empty($request->employee)){
                $general_expenses = $general_expenses->where('employee_id', '=', $request->employee);
            }
            $expense_groups = ExpenseGroup::get();
            $projects = Project::where('item_type', '=', 2)->get();
            $employees = Employee::get();
            $general_expenses = $general_expenses->sortable()->orderBy('id', 'DESC')->paginate(20)->withPath('?group='.$request->group.'&project='.$request->project.'&employee='.$request->employee);
            return view('back-end.general_expenses.index', compact('general_expenses', 'request', 'expense_groups', 'projects', 'employees'));
        }
    }
    public function create(Request $request)
    {
        if(!Auth::user()->can('add-exspense') && !AppHelper::checkAdministrator()){
            return view('back-end.common.no-permission');
        }else{
            if($request->method()!='POST'){
                $expense_groups = ExpenseGroup::get();
                $projects = Project::where('item_type', '=', 2)->get();
                $employees = Employee::get();
                return view('back-end.general_expenses.create', compact('expense_groups', 'projects', 'employees'));
            }else{
                $this->validate($request, [
                    'title' => 'required|string|max:100',
                    'amount' => 'required|min:0|numeric',
                    'group_id' => 'numeric|min:1',
                    'project' => 'required|numeric',
                    'employee' => 'nullable|numeric',
                    'date' => 'required',
                    'description' => 'nullable|string|max:255'
                ]);
                $general_expense=[
                    'date' => date('Y-m-d', strtotime($request->date)),
                    'amount' => $request->amount,
                    'title' => $request->title,
                    'group_id' => $request->group,
                    'project_id' => $request->project,
                    'employee_id' => $request->employee,
                    'description' => $request->description,
                    'created_by' => Auth::id()
                ];
                $expense = GeneralExpense::create($general_expense);
                Transaction::create([
                    'date' => date('Y-m-d', strtotime($request->date)),
                    'expense_id' => $expense->id,
                    'expense_group_id' => $request->group,
                    'project_id' => $request->project,
                    'employee_id' => $request->employee,
                    'amount' => $request->amount * (-1),
                    'created_by' => Auth::id()
                ]);
                return redirect()->route('general_expenses')->with('success', 'Successfully create expense.');
            }
        }
    }
    public function edit(Request $request, $id)
    {
        if(!Auth::user()->can('add-exspense') && !AppHelper::checkAdministrator()){
            return view('back-end.common.no-permission');
        }else{
            $general_expense = GeneralExpense::where('id', '=', $id)
                ->where('created_by', '=', Auth::id())->first();
            if(!$general_expense){
                return redirect()->back()->with('error', 'Not Found!');
            }
            if($request->method()!='POST'){
                $expense_groups = ExpenseGroup::get();
                $projects = Project::where('item_type', '=', 2)->get();
                $employees = Employee::get();
                return view('back-end.general_expenses.edit', compact('general_expense','expense_groups', 'projects', 'employees'));
            }else{
                $this->validate($request, [
                    'title' => 'required|string|max:100',
                    'amount' => 'required|min:0|numeric',
                    'group_id' => 'numeric',
                    'project' => 'required|numeric',
                    'employee' => 'nullable|numeric',
                    'date' => 'required',
                    'description' => 'nullable|string|max:255'
                ]);
                $expense=[
                    'date' => date('Y-m-d', strtotime($request->date)),
                    'amount' => $request->amount,
                    'title' => $request->title,
                    'group_id' => $request->group,
                    'project_id' => $request->project,
                    'employee_id' => $request->employee,
                    'description' => $request->description,
                    'updated_by' => Auth::id()
                ];
                Transaction::create([
                    'date' => date('Y-m-d', strtotime($general_expense->date)),
                    'expense_id' => $general_expense->id,
                    'expense_group_id' => $general_expense->group_id,
                    'project_id' => $general_expense->project_id,
                    'employee_id' => $general_expense->employee_id,
                    'amount' => $general_expense->amount,
                    'created_by' => Auth::id()
                ]);
                $general_expense->update($expense);
                Transaction::create([
                    'date' => date('Y-m-d', strtotime($request->date)),
                    'expense_id' => $general_expense->id,
                    'expense_group_id' => $request->group,
                    'project_id' => $request->project,
                    'employee_id' => $request->employee,
                    'amount' => $request->amount * (-1),
                    'created_by' => Auth::id()
                ]);
                return redirect()->route('general_expenses')->with('success', 'Successfully update expense.');
            }
        }
    }

    public function receipt_expense(Request $request, $id)
    {
        if(!Auth::user()->can('add-exspense') && !AppHelper::checkAdministrator()){
            return view('back-end.common.no-permission');
        }else{
            $general_expense =DB::table('general_expenses')
            ->select(DB::raw('
            general_expenses.*,
            eg.name,
            CONCAT(em.first_name," ",em.last_name) as employee_name,
            i.property_name
            
            '))
            ->where('general_expenses.id', '=',$request->id)
            ->join('expense_groups as eg', 'general_expenses.group_id', '=', 'eg.id')
            ->join('employees as em', 'general_expenses.employee_id', '=', 'em.id')
            ->join('items as i', 'general_expenses.project_id', '=', 'i.id')
            ->first();
            return view('back-end.general_expenses.receipt_expense', compact('general_expense'));
            }
        
    }
    function get_employee_salary(Request $request){
        $employee = Employee::find($request->employee);
        if($employee){
            $salary = isset($employee->salary)?$employee->salary:0;
            $data['salary'] = $salary*1;
        }else{
            $data['salary'] = 0;
        }
        return $data;
    }
}
?>