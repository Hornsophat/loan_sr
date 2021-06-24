<?php $__env->startSection('style'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('back-end/css/bootstrap-fileinput-4.4.7.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<main class="app-content">
	<div class="app-title">
		<ul class="app-breadcrumb breadcrumb side">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item"><?php echo e(__('item.product')); ?></li>
			<li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.create_product')); ?></a></li>
		</ul>
	</div>

	<div class="tile">
		<div class="tile-body">

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<h3><?php echo e(__('item.add_product')); ?></h3><hr/>
						<div class="panel-body">
							<?php if(Session::has('message')): ?>
							<div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
							<?php endif; ?>
							<?php echo Html::ul($errors->all()); ?>


							<?php echo Form::open(array('url' => 'product/create', 'files' => true)); ?>


							<div class="form-group">
							<?php echo Form::label('item_name', trans('item.item_name'))."<span class='star'> *</span>"; ?>

							<?php echo Form::text('item_name', Input::old('item_name'), array('class' => 'form-control')); ?>

								<?php if($errors->has('item_name')): ?>
									<span class="help-block text-danger">
										<strong><?php echo e($errors->first('item_name')); ?></strong>
									</span>
								<?php endif; ?>
							</div>
							<div class="form-group">
							<?php echo Form::label('category', 'Category')."<span class='star'> *</span>"; ?>

							<?php echo Form::select('category', $categories, null, array('class' => 'form-control')); ?>

								<?php if($errors->has('category')): ?>
									<span class="help-block text-danger">
										<strong><?php echo e($errors->first('category')); ?></strong>
									</span>
								<?php endif; ?>
							</div>
							<div class="form-group">
							<?php echo Form::label('unit', 'Unit')."<span class='star'> *</span>"; ?>

							<?php echo Form::select('unit', $units, null, array('class' => 'form-control')); ?>

								<?php if($errors->has('unit')): ?>
									<span class="help-block text-danger">
										<strong><?php echo e($errors->first('unit')); ?></strong>
									</span>
								<?php endif; ?>
							</div>
							<div class="form-group">
							<?php echo Form::label('size', trans('item.size')); ?>

							<?php echo Form::text('size', Input::old('size'), array('class' => 'form-control')); ?>

							<?php if($errors->has('size')): ?>
								<span class="help-block text-danger">
									<strong><?php echo e($errors->first('size')); ?></strong>
								</span>
							<?php endif; ?>
							</div>



							<div class="col-lg-6 form-group 	 align-items-center<?php echo e($errors->has('avatar') ? ' has-error' : ''); ?>">
								<label for="avatar" class="control-label"><?php echo e(__('item.thumbnail')); ?> : </label><br/>
								<div class="">
									<input id="avatar" type="file" name="avatar" class="form-control" value="<?php echo e(old('avatar')); ?>" accept=".jpg,.jpeg,.png">
									<?php if($errors->has('avatar')): ?>
										<span class="help-block text-danger">
											<strong><?php echo e($errors->first('avatar')); ?></strong>
										</span>
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo Form::label('description', trans('item.description')); ?>

								<?php echo Form::textarea('description', Input::old('description'), array('class' => 'form-control')); ?>

							</div>


							<?php echo Form::submit(trans('item.submit'), array('class' => 'btn btn-primary pull-right')); ?>


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
	<script src="<?php echo e(URL::asset('back-end/js/plugins/bootstrap-fileinput-4.4.7.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('back-end/js/plugins/bootstrap-fileinput-4.4.7-fa-theme.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('back-end/js/initFileInput.js')); ?>"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            callFileInput('#avatar', 1, 5120, ["jpg" , "jpeg" , "png"]);
        });
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>