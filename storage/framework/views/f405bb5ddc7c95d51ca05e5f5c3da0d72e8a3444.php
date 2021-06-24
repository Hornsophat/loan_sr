<?php $__env->startSection('title', 'Add Subtract Inventory'); ?>
<?php $__env->startSection('style'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('back-end/css/bootstrap-fileinput-4.4.7.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<main class="app-content">
	<div class="app-title">
		<ul class="app-breadcrumb breadcrumb side">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item"><a href="<?php echo e(route('subtract_inventories')); ?>"><?php echo e(__('item.list_subtract_inventory')); ?></a></li>
			<li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.add_subtract_inventory')); ?></a></li>
		</ul>
	</div>

	<div class="tile">
		<div class="tile-body">

			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<h3><?php echo e(__('item.add_subtract_inventory')); ?></h3><hr/>
						<div class="panel-body">
							<?php if(Session::has('message')): ?>
							<div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
							<?php endif; ?>

							<?php echo Form::open(array(route('subtract_inventory.create'), 'files' => true, 'method'=>'post')); ?>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<?php echo Form::label('project', trans('item.project'))."<span class='star'> *</span>"; ?>

									<?php echo Form::select('project',$projects , Input::old('project'), array('class' => 'form-control select2-option-picker cal-total-cost', 'id' => 'project')); ?>

										<?php if($errors->has('project')): ?>
											<span class="help-block text-danger">
												<strong><?php echo e($errors->first('project')); ?></strong>
											</span>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<?php echo Form::label('product', trans('item.product'))."<span class='star'> *</span>"; ?>

									<?php echo Form::select('product',$products , Input::old('product'), array('class' => 'form-control select2-option-picker cal-total-cost', 'id' => 'numproduct')); ?>

										<?php if($errors->has('product')): ?>
											<span class="help-block text-danger">
												<strong><?php echo e($errors->first('product')); ?></strong>
											</span>
										<?php endif; ?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									<?php echo Form::label('qty', trans('item.quantity'))."<span class='star'> *</span>"; ?>

									<?php echo Form::number('qty', Input::old('qty'), array('class' => 'form-control', 'id' => 'numQty', 'min'=>'0')); ?>

										<?php if($errors->has('qty')): ?>
											<span class="help-block text-danger">
												<strong><?php echo e($errors->first('qty')); ?></strong>
											</span>
										<?php endif; ?>
									</div>
								</div>
								<div class="col-md-12">
									<input type="button" class="btn btn-success pull-right mb-2" id="addItem" value="<?php echo e(__('item.add')); ?>"></input>
								</div>
								<?php if($errors->any()): ?>
								<div class="col-md-12 mb-1">
									<h6 class="text-danger" style="text-decoration: underline;">Product Validation Require</h6>
									<ul>
										<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<span class="help-block text-danger">
												<li><strong><?php echo e($error); ?></strong></li>
											</span>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>
								</div>
								<?php endif; ?>
								<?php if(Session::has('error_validations')): ?>
								<div class="col-md-12 mb-1">
									<h6 class="text-danger" style="text-decoration: underline;">Product Validation Require</h6>
										<span class="help-block text-danger">
											<strong><?php echo e(Session::get('error_validations')); ?></strong>
										</span>
								</div>
								<?php endif; ?>
								<div class="col-md-12">
									<div class="table-responsive">
										<table class="table table-nowrap table-hover table-bordered">
											<thead>
												<tr>
													<th class="text-center">No</th>
													<th class="text-center"><?php echo e(__('item.product_name')); ?></th>
													<th class="text-center"><?php echo e(__('item.quantity')); ?></th>
													<th class="text-center"><?php echo e(__('item.function')); ?></th>
												</tr>
											</thead>
											<tbody id="bodyItem">
											</tbody>
											<tfoot>
												<tr>
													<th colspan="2" class="text-right"><?php echo e(__('item.total')); ?></th>
													<th class="text-right" id="subTotal"></th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									<?php echo Form::label('status', trans('item.status'))."<span class='star'> *</span>"; ?>

									<?php echo Form::select('status',$statuses , Input::old('status'), array('class' => 'form-control cal-total-cost', 'id' => 'status')); ?>

										<?php if($errors->has('status')): ?>
											<span class="help-block text-danger">
												<strong><?php echo e($errors->first('status')); ?></strong>
											</span>
										<?php endif; ?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<?php echo Form::label('remarks', trans('item.comment')); ?>

										<?php echo Form::textarea('remarks', Input::old('remarks'), array('class' => 'form-control')); ?>

									</div>
								</div>
							</div>
							<?php echo Form::submit(trans('item.submit'), array('class' => 'btn btn-primary pull-right')); ?>

							<input type="button" class="btn btn-danger pull-right mb-2 mr-4" id="cancelItem" value="<?php echo e(__('item.cancel')); ?>"></input>
							<?php echo Form::close(); ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editItemModalTitle">Edit Item (<span></span>)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="hidden" id="pro_noModal">
    	<div class="form-group">
    		<label class="label-control">Quantity</label>
    		<input type="number" class="form-control modal-cal-total" min="0" id="qtyModal">
    	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnEditItem">Submit</button>
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
    <script src="<?php echo e(asset('back-end/asset/js/subtract_inventory.js')); ?>"></script>
    <script type="text/javascript">
        if("<?php echo e(Session::get('remove_spitem')); ?>"){
            if(localStorage.getItem('spItem')){
                localStorage.removeItem('spItem');
            }
            <?php (Session::forget('remove_spitem')); ?>
        }
        $(document).on('change', '#numQty',function(){
        	var url= '<?php echo e(route("subtract_inventory.get_product")); ?>';
        	check_product_quantity(url);
        });
        $(document).ready(function(){
            loadItem();
        });
        $(document).on('change', '#qtyModal', function(){
        	var url= '<?php echo e(route("subtract_inventory.get_product")); ?>';
        	check_product_quantity_edit(url);
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>