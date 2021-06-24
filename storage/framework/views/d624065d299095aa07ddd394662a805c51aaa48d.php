<?php $__env->startSection('title',"Edit Expense Group"); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('back-end/css/bootstrap-fileinput-4.4.7.css')); ?>">
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><?php echo e(__('item.expense_type')); ?></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.edit_expense_type')); ?></a></li>
            </ul>
        </div>
        <div class="col-lg-12">
            <?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="panel-body bg-white rounded overflow_hidden p-4">
                <h3 class="text-dark mb-4"><?php echo e(__('item.edit_expense_type')); ?></h3><hr/>

                <form action="<?php echo e(route('expense_group.edit',['id'=>$group->id])); ?>" method="POST" class="row form-horizontal" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <!-- First name -->
                    <div class="col-lg-6 offset-lg-3 form-group d-lg-flex align-items-center<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                        <label for="name" class="control-label col-lg-3 p-0"><?php echo e(__('item.name')); ?><span class="required">*</span> </label>
                        <div class="col-lg-9 p-0">
                            <input type="text" name="name" class="form-control" value="<?php echo e($group->name); ?>" required autofocus>
                            <?php if($errors->has('name')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span> 
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-6 form-group offset-lg-3 d-lg-flex align-items-center<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                        <label for="description" class="control-label col-lg-3 p-0"><?php echo e(__('item.description')); ?></label>
                        <div class="col-lg-9 p-0">
                            <textarea rows="3" name="description" class="form-control" ><?php echo e($group->description); ?></textarea>
                            <?php if($errors->has('description')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                </span> 
                            <?php endif; ?>
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
    <script type="text/javascript">
        $(document).ready(function() {
            callFileInput('#profile', 1, 5120, ["jpg" , "jpeg" , "png"]);

            $("#check_sale").click(function() {
                // this function will get executed every time the #home element is clicked (or tab-spacebar changed)
                if($("#check_sale").is(":checked")) // "this" refers to the element that fired the event
                {
                    $("#sale_type").removeAttr('disabled');
                }else{
                    $("#sale_type").val("").trigger("change");
                    $("#sale_type").attr('disabled', 'disabled');
                }
            });

        }); 
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>