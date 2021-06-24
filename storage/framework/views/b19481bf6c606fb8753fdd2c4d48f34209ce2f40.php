<?php $__env->startSection('title',"List Customer"); ?>
<?php $__env->startSection('content'); ?>
	<main class="app-content">
		<div class="app-title">
	        <ul class="app-breadcrumb breadcrumb side">
	          	<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	          	<li class="breadcrumb-item"><?php echo e(__('item.customer')); ?></li>
	          	<li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.list_customer')); ?></a></li>
	        </ul>
      	</div>

		
      	<div class="row">
        	<div class="col-md-12">
				<?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          		<div class="tile">
            		<div class="tile-body">
						<div class="row">
							<div class="col-md-6">
								<?php if(Auth::user()->can('create-customer') || $isAdministrator): ?>
									<a href="<?php echo e(route('addCustomer')); ?>" class="btn btn-small btn-success"><?php echo e(__('item.new_customer')); ?></a>
								<?php endif; ?>
							</div>
							<div class="col-md-6 text-right">
								<form action="<?php echo e(route('listCustomer')); ?>" method="get">
									<div class="input-group">
										<div class="col-md-6"></div>
										<input type="text" name="search" class="form-control col-md-6 pull-right" value="<?php echo e(isset($_GET['search'])? $_GET['search']:""); ?>" placeholder="<?php echo e(__('item.search')); ?>" onkeydown="if (event.keyCode == 13) this.form.submit()" autocomplete="off"/>&nbsp;&nbsp;
									</div>
								</form>
							</div>
						</div>
						<hr/>
						<div class="table-responsive">
							<table class="table table-hover table-bordered table-nowrap">
				                <thead>
				                  	<tr>
					                    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('id',trans('item.no')));?></th>
					                    <th><?php echo e(__('item.thumbnail')); ?></th>
					                    <th><?php echo e(__('item.id')); ?></th>
					                    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('first_name',trans('item.name')));?> (Kh)</th>
					                    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('first_name_en',trans('item.name')));?> (En)</th>
					                    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('phone1',trans('item.phone')));?></th>
					                    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('email',trans('item.email')));?></th>
					                    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('sex',trans('item.gender')));?></th>
					                    
					                    <th><?php echo e(__('item.function')); ?></th>
				                  	</tr>
				                </thead>
		                		<tbody>
									<?php if($customers): ?>
										<?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($value->id); ?></td>
												<td>
													<?php
		                                                $url = asset('/images/default/no_image.png');
		                                                if($value->profile != null && file_exists(public_path($value->profile)))
		                                                    $url = asset('public'.$value->profile);
		                                            ?>
													<img src="<?php echo e($url); ?>" onerror="this.src='/images/default/no_image.png';" alt="Missing Image" width="50px"/>

												</td>
												<td><?php echo e($value->customer_no); ?></td>
												<td><?php echo e($value->last_name." ".$value->first_name); ?></td>
												<td><?php echo e($value->last_name_en." ".$value->first_name_en); ?></td>
												<td><?php echo e($value->phone1); ?></td>
												<td><?php echo e($value->email); ?></td>
												<td><?php echo e(gender($value->sex)); ?></td>
												
												<td>
												<?php if(Auth::user()->can('view-customer') || $isAdministrator): ?>
													<a class="btn btn-sm btn-primary" href="<?php echo e(URL::to('customer/' . $value->id . '/view')); ?>"><?php echo e(__('item.view')); ?></a>
												<?php endif; ?>
												<?php if(Auth::user()->can('visit-customer') || $isAdministrator): ?>
													<a class="btn btn-sm btn-success" href="<?php echo e(URL::to('customer/' . $value->id . '/visit')); ?>"><?php echo e(__('item.visit')); ?>&nbsp;&nbsp;<span class="badge badge-light"><?php echo e(!is_null($value->customer_visit)?($value->customer_visit->count()):0); ?></span></a>
												<?php endif; ?>
												<?php if(Auth::user()->can('edit-customer') || $isAdministrator): ?>
													<a class="btn btn-sm btn-info" href="<?php echo e(URL::to('customer/' . $value->id . '/edit')); ?>"><?php echo e(trans('item.edit')); ?></a>
												<?php endif; ?>
												<?php if(Auth::user()->can('delete-customer') || $isAdministrator): ?>
													<a class="btn btn-sm btn-warning" onclick="return confirm('Are you sure you want to delete this item?');"
													   href="<?php echo e(URL::to('customer/'.$value->id.'/delete' )); ?>"><?php echo e(trans('item.delete')); ?></a>
												<?php endif; ?>

												</td>

											</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php else: ?>
										<tr>
											<td colspan="7">No Found!</td>
										</tr>
										<?php endif; ?>
				                </tbody>
		              		</table>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="pull-right">
									<?php echo $customers->appends(\Request::except('page'))->render(); ?>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>