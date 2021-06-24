<?php $__env->startSection('title', 'Add Purchase'); ?>
<?php $__env->startSection('style'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('back-end/css/bootstrap-fileinput-4.4.7.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<main class="app-content">
	<div class="app-title">
		<ul class="app-breadcrumb breadcrumb side">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item"><a href="<?php echo e(route('purchases')); ?>"><?php echo e(__('item.list_purchase')); ?></a></li>
			<li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.add_purchase')); ?></a></li>
		</ul>
	</div>

	<div class="tile">
		<div class="tile-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<h3><?php echo e(__('item.add_purchase')); ?></h3><hr/>
						<div class="panel-body">
							<?php if(Session::has('message')): ?>
							<div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
							<?php endif; ?>

							<?php echo Form::open(array(route('purchase.create'), 'files' => true, 'method'=>'post')); ?>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<?php echo Form::label('project', trans('item.project'))."<span class='star'> *</span>"; ?>

									<?php echo Form::select('project',$projects , Input::old('project'), array('class' => 'form-control select2-option-picker cal-total-cost', 'id' => 'numproject')); ?>

										<?php if($errors->has('project')): ?>
											<span class="help-block text-danger">
												<strong><?php echo e($errors->first('project')); ?></strong>
											</span>
										<?php endif; ?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									<?php echo Form::label('reference', __('item.reference')); ?>

									<?php echo Form::text('reference', Input::old('reference'), array('class' => 'form-control', 'id' => 'reference')); ?>

										<?php if($errors->has('reference')): ?>
											<span class="help-block text-danger">
												<strong><?php echo e($errors->first('reference')); ?></strong>
											</span>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<?php echo Form::label('supplyer', trans('item.supplier'))."<span class='star'> *</span>"; ?>

									<?php echo Form::select('supplyer',$supplyers , Input::old('supplyer'), array('class' => 'form-control select2-option-picker cal-total-cost', 'id' => 'numsupplyer')); ?>

										<?php if($errors->has('supplyer')): ?>
											<span class="help-block text-danger">
												<strong><?php echo e($errors->first('supplyer')); ?></strong>
											</span>
										<?php endif; ?>
									</div>
								</div>
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
									<?php echo Form::label('qty', __('item.quantity'))."<span class='star'> *</span>"; ?>

									<?php echo Form::number('qty', Input::old('qty'), array('class' => 'form-control cal-total-cost', 'id' => 'numQty', 'min'=>'0')); ?>

										<?php if($errors->has('qty')): ?>
											<span class="help-block text-danger">
												<strong><?php echo e($errors->first('qty')); ?></strong>
											</span>
										<?php endif; ?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									<?php echo Form::label('unit_cost', __('item.unit_cost'))."<span class='star'> *</span>"; ?>

									<?php echo Form::number('unit_cost', Input::old('unit_cost'), array('class' => 'form-control cal-total-cost', 'id' => 'unitCost', 'min'=>'0')); ?>

										<?php if($errors->has('unit_cost')): ?>
											<span class="help-block text-danger">
												<strong><?php echo e($errors->first('unit_cost')); ?></strong>
											</span>
										<?php endif; ?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									<?php echo Form::label('total_cost', __('item.total_cost'))."<span class='star'> *</span>"; ?>

									<?php echo Form::text('total_cost', Input::old('total_cost'), array('class' => 'form-control', 'id' => 'totalCost', 'readonly' => 'true')); ?>

										<?php if($errors->has('total_cost')): ?>
											<span class="help-block text-danger">
												<strong><?php echo e($errors->first('total_cost')); ?></strong>
											</span>
										<?php endif; ?>
									</div>
								</div>
								<div class="col-md-12">
									<input type="button" class="btn btn-success pull-right mb-2" id="addItem" value="<?php echo e(__('item.add')); ?>"></input>
								</div>
								<div class="col-md-12">
									<div class="table-responsive">
										<table class="table table-nowrap table-hover table-bordered">
											<thead>
												<tr>
													<th class="text-center"><?php echo e(__('item.no')); ?></th>
													<th class="text-center"><?php echo e(__('item.product_name')); ?></th>
													<th class="text-center"><?php echo e(__('item.quantity')); ?></th>
													<th class="text-center"><?php echo e(__('item.cost')); ?></th>
													<th class="text-center"><?php echo e(__('item.total')); ?></th>
													<th class="text-center"><?php echo e(__('item.function')); ?></th>
												</tr>
											</thead>
											<tbody id="bodyItem">
											</tbody>
											<tfoot>
												<tr>
													<th colspan="4" class="text-right"><?php echo e(__('item.sub_total')); ?></th>
													<th class="text-right" id="subTotal"></th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
								<div class="col-md-6 mb-3"> 
                                   <div class="input-group">
                                        <?php echo Form::label('discount', trans('item.discount'), array('style'=>'width:100%;')); ?>

                                        <?php echo Form::text('discount', 0, array('style' => 'width:70%;','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

                                        <div class="input-group-append">
                                            <span class="input-group-text" ><?php echo e(__('item.is')); ?></span>
                                        </div>
                                        <?php echo Form::select('discount_type', $discount_types,null, array('style' => 'width:20%;padding:8px 5px;', 'id' => 'discount_type')); ?>

                                        <?php if($errors->has('discount')): ?>
                                            <span class="help-block text-danger" style="width: 100%;">
                                                <strong><?php echo e($errors->first('discount')); ?></strong>
                                            </span> 
                                        <?php endif; ?>
                                    </div>
                                    <div class="input-group">
                                        
                                    </div>
                               </div>
                               	<div class="col-md-6"> 
                                   <div class="input-group">
                                        <?php echo Form::label('grand_total', trans('item.grand_total'), array('style'=>'width:100%;')); ?>

                                        <?php echo Form::text('grand_total', null, array('class' => 'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');", 'readonly', 'grand_total')); ?>

                                        <div class="input-group-append">
                                            <span class="input-group-text" >$</span>
                                        </div>
                                        <?php if($errors->has('grand_total')): ?>
                                            <span class="help-block text-danger" style="width: 100%;">
                                                <strong><?php echo e($errors->first('grand_total')); ?></strong>
                                            </span> 
                                        <?php endif; ?>
                                    </div>
                               	</div>
                               <div class="col-md-12"></div>
								<div class="col-md-6">
									<div class="form-group">
									<?php echo Form::label('status', trans('item.status'))."<span class='star'> *</span>"; ?>

									<?php echo Form::select('status',$statuses , Input::old('status'), array('class' => 'form-control', 'id' => 'status')); ?>

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
    	<div class="form-group">
    		<label class="label-control">Cost</label>
    		<input type="number" class="form-control modal-cal-total" min="0" id="costModal">
    	</div>
    	<div class="form-group">
    		<label class="label-control">Total</label>
    		<input type="number" class="form-control" id="totalModal" readonly>
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
    <script src="<?php echo e(asset('back-end/asset/js/purchase.js')); ?>"></script>
    <script type="text/javascript">
        if("<?php echo e(Session::get('remove_pitem')); ?>"){
            if(localStorage.getItem('pItem')){
                localStorage.removeItem('pItem');
            }
            <?php (Session::forget('remove_pitem')); ?>
        }
        $(document).ready(function(){
            loadItem();
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>