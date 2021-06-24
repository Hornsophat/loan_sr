<?php
	use App\Helpers\AppHelper;
?>

<?php $__env->startSection('title',"List Expenses"); ?>
<?php $__env->startSection('content'); ?>

<style>
	@media  print{
        .col-sm-6{width: 50%; float: left;}
        .col-sm-3{width: 25%; float: left;}
        .col-sm-9{width: 75%; float: left;}
        .col-md-4{width: 33.333%; float: left;}       
    }
</style>
	<main class="app-content">
		<div class="app-title">
	        <ul class="app-breadcrumb breadcrumb side">
	          	<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	          	<li class="breadcrumb-item"><?php echo e(__('item.expense')); ?></li>
	          	
	          	<li class="breadcrumb-item active"><a href="<?php if(Auth::user()->can('list-general-expense') || $isAdministrator): ?> <?php echo e(route('general_expenses')); ?> <?php else: ?> # <?php endif; ?>"><?php echo e(__('item.list_expense')); ?></a></li>
	        </ul>
      	</div>
		
      	<div class="row">
        	<div class="col-md-12">
				<?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          		<div class="tile">
            		<div class="tile-body">
            			<div class="row">
            				<div class="col-md-3">
            					<?php if(Auth::user()->can('add-exspense-group') || $isAdministrator): ?>
									<a href="<?php echo e(route('general_expense.create')); ?>" class="btn  btn-success mb-4"><?php echo e(__('item.new_expense')); ?></a>
								<?php endif; ?>
            				</div>
            				<div class="col-md-9">
        					<form action="<?php echo e(route('general_expenses')); ?>" method="GET">
    							<div class="row">
    								<div class="col-md-4">
	    								<div class="form-group">
		    								<label><?php echo e(__('item.expense_type')); ?></label>
		    								<select name="group" id="group" class="form-control" onchange="this.form.submit()">
		                                        <option value>-- <?php echo e(__('item.select')); ?> <?php echo e(__('item.type')); ?> --</option>
		                                        <?php $__currentLoopData = $expense_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                                            <option value="<?php echo e($group->id); ?>"
		                                                <?php if($request->group == $group->id): ?>
		                                                selected="selected"
		                                                <?php endif; ?>
		                                            ><?php echo e($group->name); ?></option>
		                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                                    </select>
		    							</div>
	    							</div>
	    							<div class="col-md-4">
	    								<div class="form-group">
											<label><?php echo e(__('item.project')); ?></label>
											<select name="project" id="project" class="form-control" onchange="this.form.submit()">
		                                        <option value>-- <?php echo e(__('item.select')); ?> <?php echo e(__('item.project')); ?> --</option>
		                                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                                            <option value="<?php echo e($project->id); ?>"
		                                                <?php if($request->project == $project->id): ?>
		                                                selected="selected"
		                                                <?php endif; ?>
		                                            ><?php echo e($project->property_name); ?></option>
		                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                                    </select>
										</div>
	    							</div>
	    							<div class="col-md-4">
	    								<div class="form-group">
											<label><?php echo e(__('item.employee')); ?></label>
											<select name="employee" id="employee" class="form-control" onchange="this.form.submit()">
		                                        <option value>-- <?php echo e(__('item.select')); ?> <?php echo e(__('item.employee')); ?> --</option>
		                                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                                            <option value="<?php echo e($employee->id); ?>"
		                                                <?php if($request->employee == $employee->id): ?>
		                                                selected="selected"
		                                                <?php endif; ?>
		                                            ><?php echo e($employee->first_name.' '.$employee->last_name); ?></option>
		                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                                    </select>
										</div>
	    							</div>
    							</div>
        					</form>
        					</div>
            			</div>
					<div id="table_print">	
              			<div class="table-responsive">
              				<table class="table table-hover table-bordered table-nowrap">
				                <thead>
				                  	<tr>
					                    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('id',__('item.expense_no')));?></th>
					                    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('date', __('item.date')));?></th>
										<th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('title',__('item.title')));?></th>
										<th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('group_id',__('item.type')));?></th>
										<th><?php echo e(__('item.project')); ?></th>
										<th><?php echo e(__('item.employee')); ?></th>
										<th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('amount', __('item.expense_amount')));?></th>
										<th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('created_by', __('item.created_by')));?></th>
					                    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('description',__('item.description')));?></th>
					                    <th><?php echo e(__('item.function')); ?></th>
				                  	</tr>
				                </thead>
		                		<tbody>
		                			<?php
		                				$total_amount =0;
		                			?>
		                			<?php $__currentLoopData = $general_expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                			<?php
		                				$total_amount += $item->amount;
		                			?>
					                	<tr>
						                    <td><?php echo e(++$key); ?></td>
						                    <td><?php echo e(date('d-m-Y', strtotime($item->date))); ?></td>
						                    <td><?php echo e($item->title); ?></td>
						                    <td><?php echo e(isset($item->expenseGroup->name)?$item->expenseGroup->name:'N\A'); ?></td>
						                    <td>
						                    	<?php echo e(isset($item->project->property_name)?$item->project->property_name:''); ?>

						                    </td>
						                    <td>
						                    	<?php echo e(isset($item->employee->first_name)?$item->employee->first_name:''); ?><?php echo e(isset($item->employee->last_name)?$item->employee->last_name:''); ?>

						                    </td>
						                    <td class="text-right text-danger">$ <?php echo e($item->amount); ?></td>
						                    <td><?php echo e(ucfirst(isset($item->createdBy->name)?$item->createdBy->name:'N\A')); ?></td>
											<td><?php echo e($item->description); ?></td>
											<td>
											<?php if(Auth::user()->can('edit-general-expense') || $isAdministrator): ?>
												<?php if(Auth::id() != $item->created_by): ?>
													<a class="btn btn-sm btn-info" style="opacity: 0.8; cursor: not-allowed;" title="Edit" href="#"><?php echo e(__('item.edit')); ?></a>
												<?php else: ?>
													<a class="btn btn-sm btn-info" title="Edit" href="<?php echo e(route('general_expense.edit',['id' => $item->id])); ?>"><?php echo e(__('item.edit')); ?></a>
												<?php endif; ?>
											<?php endif; ?>
											<?php if(Auth::user()->can('receipt-expense') || $isAdministrator): ?>
												<?php if(Auth::id() != $item->created_by): ?>
													<a class="btn btn-sm btn-success" style="opacity: 0.8; cursor: not-allowed;" title="Edit" href="#"><?php echo e(__('item.receipt')); ?></a>
												<?php else: ?>
													<a class="btn btn-sm btn-success" title="Edit" href="<?php echo e(route('general_expense.receipt_expense',['id' => $item->id])); ?>"><?php echo e(__('item.receipt')); ?></a>
												<?php endif; ?>
											<?php endif; ?>
											<?php if(Auth::user()->can('delete-general-expense') || $isAdministrator): ?>
												<a class="btn btn-sm btn-warning" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"
												   href="<?php echo e(route('general_expense.destroy', ['id' => $item->id])); ?>"><?php echo e(__('item.delete')); ?></a>
											<?php endif; ?>
											</td>
						                </tr>
					                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				                </tbody>
				                <tfoot>
				                	<tr>
				                		<th colspan="6" class="text-right"><?php echo e(__('item.total')); ?> : </th>
				                		<th class="text-right">$ <?php echo e($total_amount); ?></th>
				                		<th colspan="3"></th>
				                	</tr>
				                </tfoot>
		              		</table>
              			</div>
              			<div class="row">
              				<div class="col-md-12">
              					<div class="pull-right">
									<?php echo $general_expenses->render(); ?>

								</div>
              				</div>
              			</div>
            		</div>
					</div>
          		</div>
        	</div>
      	</div>
      	
	</main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
$('#project, #group, #employee').select2();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>