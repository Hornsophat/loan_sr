<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><?php echo e(__('item.project')); ?></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.add_project')); ?></a></li>
            </ul>
        </div>

        <div class="tile">
            <div class="tile-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <h3><?php echo e(__('item.add_project')); ?></h3><hr/>
                            <div class="panel-body">
                                <?php if(Session::has('message')): ?>
                                    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                                <?php endif; ?>
                                <?php echo Html::ul($errors->all()); ?>


                                <?php echo Form::open(array('url' => 'project/create', 'files' => true)); ?>


                                <div class="form-group">
                                    <?php echo Form::label('project_name', trans('item.project_name'))."<span class='star'> *</span>"; ?>

                                    <?php echo Form::text('project_name', Input::old('project_name'), array('class' => 'form-control')); ?>

                                </div>

                                <div class="form-group">
                                    <?php echo Form::label('land', trans('item.land'))."<span class='star'> *</span>"; ?>

                                    <select name="land" id="land" class="form-control">
                                        <?php $__currentLoopData = $land; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->property_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <?php echo Form::label('address_street', trans('item.address_street')); ?>

                                    <?php echo Form::text('address_street', Input::old('address_street'), array('class' => 'form-control')); ?>

                                </div>

                                <div class="form-group">
                                    <?php echo Form::label('address_number', trans('item.address_number')); ?>

                                    <?php echo Form::text('address_number', Input::old('address_number'), array('class' => 'form-control')); ?>

                                </div>

                                <div class="form-group">
                                    <?php echo Form::label('ground_surface', trans('item.ground_surface')); ?>

                                    <?php echo Form::number('ground_surface', Input::old('ground_surface'), array('class' => 'form-control')); ?>

                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('item.project_image')); ?>(Multiple)</label>
                                    <input class="form-control" id="images" name="images[]" type="file" multiple accept="image/x-png,image/bmp,image/jpeg">
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