<?php $__env->startSection('title',"Edit Expense"); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('back-end/css/bootstrap-fileinput-4.4.7.css')); ?>">
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><?php echo e(__('item.expense')); ?></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.edit_expense')); ?></a></li>
            </ul>
        </div>
        <div class="col-lg-12">
            <?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="panel-body bg-white rounded overflow_hidden p-4">
                <h3 class="text-dark mb-4"><?php echo e(__('item.edit_expense')); ?></h3><hr/>

                <form action="<?php echo e(route('general_expense.edit',['id'=>$general_expense->id])); ?>" method="POST" class="row form-horizontal" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="col-lg-3 col-md-2"></div>
                    <div class=" col-lg-6 col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col-md-12 form-group d-lg-flex align-items-center<?php echo e($errors->has('date') ? ' has-error' : ''); ?>">
                                <label for="date" class="control-label col-lg-3 p-0"><?php echo e(__('item.date')); ?><span class="required">*</span> </label>
                                <div class="col-lg-9 p-0">
                                    <input type="text" name="date" class="form-control demoDate" value="<?php echo e($general_expense->date); ?>" id="date" required >
                                    <?php if($errors->has('date')): ?>
                                        <span class="help-block text-danger">
                                            <strong><?php echo e($errors->first('date')); ?></strong>
                                        </span> 
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- First name -->
                            <div class="col-md-12 form-group d-lg-flex align-items-center<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <label for="title" class="control-label col-lg-3 p-0"><?php echo e(__('item.title')); ?><span class="required">*</span> </label>
                                <div class="col-lg-9 p-0">
                                    <input type="text" name="title" class="form-control" value="<?php echo e($general_expense->title); ?>" required autofocus>
                                    <?php if($errors->has('title')): ?>
                                        <span class="help-block text-danger">
                                            <strong><?php echo e($errors->first('title')); ?></strong>
                                        </span> 
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-12 form-group d-lg-flex align-items-center<?php echo e($errors->has('group') ? ' has-error' : ''); ?>">
                                <label for="group" class="control-label col-lg-3 p-0"><?php echo e(__('item.type')); ?><span class="required">*</span> </label>
                                <div class="col-lg-9 p-0">
                                    <select name="group" id="group" class="form-control" required>
                                        <option value>-- <?php echo e(__('item.select')); ?> <?php echo e(__('item.type')); ?> --</option>
                                        <?php $__currentLoopData = $expense_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($group->id); ?>"
                                                <?php if($general_expense->group_id == $group->id): ?>
                                                selected="selected"
                                                <?php endif; ?>
                                            ><?php echo e($group->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('group')): ?>
                                        <span class="help-block text-danger">
                                            <strong><?php echo e($errors->first('group')); ?></strong>
                                        </span> 
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-12 form-group d-lg-flex align-items-center<?php echo e($errors->has('project') ? ' has-error' : ''); ?>">
                                <label for="project" class="control-label col-lg-3 p-0"><?php echo e(__('item.project')); ?><span class="required">*</span> </label>
                                <div class="col-lg-9 p-0">
                                    <select name="project" id="project" class="form-control">
                                        <option value>-- <?php echo e(__('item.select')); ?> <?php echo e(__('item.project')); ?> --</option>
                                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($project->id); ?>"
                                                <?php if($general_expense->project_id == $project->id): ?>
                                                selected="selected"
                                                <?php endif; ?>
                                            ><?php echo e($project->property_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('project')): ?>
                                        <span class="help-block text-danger">
                                            <strong><?php echo e($errors->first('project')); ?></strong>
                                        </span> 
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12 form-group d-lg-flex align-items-center<?php echo e($errors->has('employee') ? ' has-error' : ''); ?>">
                                <label for="employee" class="control-label col-lg-3 p-0"><?php echo e(__('item.employee')); ?></label>
                                <div class="col-lg-9 p-0">
                                    <select name="employee" id="employee" class="form-control">
                                        <option value>-- <?php echo e(__('item.select')); ?> <?php echo e(__('item.employee')); ?> --</option>
                                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($employee->id); ?>"
                                                <?php if($general_expense->employee_id == $employee->id): ?>
                                                selected="selected"
                                                <?php endif; ?>
                                            ><?php echo e($employee->first_name.' '.$employee->last_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('employee')): ?>
                                        <span class="help-block text-danger">
                                            <strong><?php echo e($errors->first('employee')); ?></strong>
                                        </span> 
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-12 form-group d-lg-flex align-items-center<?php echo e($errors->has('amount') ? ' has-error' : ''); ?>">
                                <label for="amount" class="control-label col-lg-3 p-0"><?php echo e(__('item.amount')); ?> ($)<span class="required">*</span> </label>
                                <div class="col-lg-9 p-0">
                                    <input type="text" id="amount" name="amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" min="0" value="<?php echo e($general_expense->amount*1); ?>" required>
                                    <?php if($errors->has('amount')): ?>
                                        <span class="help-block text-danger">
                                            <strong><?php echo e($errors->first('amount')); ?></strong>
                                        </span> 
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-12 form-group d-lg-flex align-items-center<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                <label for="description" class="control-label col-lg-3 p-0"><?php echo e(__('item.description')); ?></label>
                                <div class="col-lg-9 p-0">
                                    <textarea rows="3" name="description" class="form-control" ><?php echo e($general_expense->description); ?></textarea>
                                    <?php if($errors->has('description')): ?>
                                        <span class="help-block text-danger">
                                            <strong><?php echo e($errors->first('description')); ?></strong>
                                        </span> 
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit Form -->
                    <div class="col-lg-12">
                        <input type="submit" value="<?php echo e(__('item.save')); ?>" name="btnSave" class="btn btn-primary float-right">
                    </div>
                </form>
            </div>
        </div>

    </main>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('back-end/js/plugins/bootstrap-fileinput-4.4.7.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('back-end/js/plugins/bootstrap-fileinput-4.4.7-fa-theme.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('back-end/js/initFileInput.js')); ?>"></script>
    <script type="text/javascript" src="https://pratikborsadiya.in/vali-admin/js/plugins/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://pratikborsadiya.in/vali-admin/js/plugins/bootstrap-datepicker.min.js">
    <script type="text/javascript">
        $('#project, #group, #employee').select2();
        $(document).ready(function() {
            $('input').attr( "autocomplete", "off" );
            $('.demoDate').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true,
                todayHighlight: true
            });
        }); 

        $(document).on('change', '#employee', function(){
            var employee = $('#employee option:selected').val();
            if(!employee || employee==0){
                return 0;
            }
            $.ajax({
                type:'get',
                url: '<?php echo e(route("general_expense.get_employee_salary")); ?>',
                data:{employee:employee},
                success:function(data){
                    $('#amount').val(data.salary);
                }
            })
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>