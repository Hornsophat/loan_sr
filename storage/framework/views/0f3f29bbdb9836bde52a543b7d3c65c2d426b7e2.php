<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><?php echo e(__('item.property_types')); ?></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.add_property_type')); ?></a></li>
            </ul>
        </div>
        <div class="tile">
            <div class="tile-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <h3><?php echo e(__('item.add_property_type')); ?></h3><hr/>
                            <div class="panel-body">
                                <?php if(Session::has('message')): ?>
                                    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                                <?php endif; ?>
                                <?php echo Html::ul($errors->all()); ?>


                                <?php echo Form::open(array('url' => 'propertytype/create')); ?>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo Form::label('propertytype_name', trans('item.propertytype_name'))."<span class='star'> *</span>"; ?>

                                            <?php echo Form::text('propertytype_name', Input::old('propertytype_name'), array('class' => 'form-control')); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo Form::label('propertytype_name_kh', 'Name (khmer)')."<span class='star'> *</span>"; ?>

                                            <?php echo Form::text('propertytype_name_kh', Input::old('propertytype_name_kh'), array('class' => 'form-control')); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo Form::label('group', 'Group')."<span class='star'> *</span>"; ?>

                                            <?php echo Form::text('group', Input::old('group'), array('class' => 'form-control')); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo Form::label('extension', 'Extension')."<span class='star'> *</span>"; ?>

                                            <?php echo Form::text('extension', Input::old('extension'), array('class' => 'form-control')); ?>

                                        </div>
                                    </div>
                                </div>

                                <?php echo Form::submit(trans('item.submit'), array('class' => 'btn btn-primary pull-right', 'id' => 'land_submit')); ?>


                                <?php echo Form::close(); ?>

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
        $(document).ready(function() {

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>