<?php $__env->startSection('title',"List Employee"); ?>
<?php $__env->startSection('content'); ?>
	<main class="app-content">
		<div class="app-title">
	        <ul class="app-breadcrumb breadcrumb side">
	          	<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	          	<li class="breadcrumb-item"><?php echo e(__('item.employee')); ?></li>
	          	<li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.list_employee')); ?></a></li>
	        </ul>
      	</div>
		
      	<div class="row">
        	<div class="col-md-12">
				<?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          		<div class="tile">
            		<div class="tile-body">
            			<div class="row">
            				<div class="col-md-6">
	            				<?php if(Auth::user()->can('create-employee') || $isAdministrator): ?>
									<a href="<?php echo e(route('addEmployee')); ?>" class="btn btn-success mb-4"><?php echo e(__('item.new_employee')); ?></a>
								<?php endif; ?>
	            			</div>
							<div class="col-md-6 text-right">
								<form action="<?php echo e(route('listEmployee')); ?>" method="get">
									<div class="input-group">
										<div class="col-md-6"></div>
										<input type="text" name="search" class="form-control col-md-6 pull-right" value="<?php echo e(isset($_GET['search'])? $_GET['search']:""); ?>" placeholder="<?php echo e(__('item.search')); ?>" onkeydown="if (event.keyCode == 13) this.form.submit()" autocomplete="off"/>&nbsp;&nbsp;
									</div>
								</form>
							</div>
            			</div>
              			<div class="table-responsive">
              				<table class="table table-hover table-bordered table-nowrap">
				                <thead>
				                  	<tr>
					                    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('id',trans('item.employee_no')));?></th>
										<th><?php echo e(__('item.thumbnail')); ?></th>
										<th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('id_card',trans('item.id_card')));?></th>
					                    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('first_name',trans('item.name')));?></th>
										<th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('phone1',trans('item.phone')));?></th>
										<th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('email',trans('item.email')));?></th>
										<th><?php echo e(__('item.country')); ?></th>
					                    <th><?php echo e(__('item.position')); ?></th>
										<th><?php echo e(__('item.department')); ?></th>
										
					                    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('salary',trans('item.salary')));?></th>
					                    <th><?php echo e(__('item.function')); ?></th>
				                  	</tr>
				                </thead>
		                		<tbody>
		                			<?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					                	<tr>
						                    <td><?php echo e($item->id); ?></td>
											<td>
												<?php
	                                                $url = asset('/images/default/no_image.png');
	                                                if($item->profile != null && file_exists(public_path($item->profile)))
	                                                    $url = asset('public'.$item->profile);
	                                            ?>
												<img src="<?php echo e($url); ?>" alt="Missing Image" width="50px"/>

											</td>
											<td><?php echo e($item->id_card); ?></td>
						                    <td><?php echo e($item->last_name." ".$item->first_name); ?></td>
											<td><?php echo e($item->phone1); ?></td>
											<td><?php echo e($item->email); ?></td>
						                    <td><?php echo e(!is_null($item->countries)?$item->countries->name:""); ?></td>
						                    <td><?php echo e(!is_null($item->position)? $item->position->title:""); ?></td>
						                    <td><?php echo e(!is_null($item->department)? $item->department->title:""); ?></td>
						                    
						                    <td><?php echo e("$ ".$item->salary); ?></td>
											<td>
											<?php if(Auth::user()->can('view-employee') || $isAdministrator): ?>
												<a class="btn btn-sm btn-primary" href="<?php echo e(URL::to('employee/' . $item->id . '/view')); ?>"><?php echo e(__('item.view')); ?></a>
											<?php endif; ?>
											<?php if(Auth::user()->can('edit-employee') || $isAdministrator): ?>
												<a class="btn btn-sm btn-info" title="Edit" href="<?php echo e(URL::to('employee/' . $item->id . '/edit')); ?>"><?php echo e(__('item.edit')); ?></a>
											<?php endif; ?>
											<?php if(Auth::user()->can('delete-employee') || $isAdministrator): ?>
												<a class="btn btn-sm btn-warning" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"
												   href="<?php echo e(URL::to('employee/'.$item->id.'/delete' )); ?>"><?php echo e(__('item.delete')); ?></a>
											<?php endif; ?>
											</td>
						                </tr>
					                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				                </tbody>
		              		</table>
		              		<div class="pull-right">
								<?php echo $employee->appends(\Request::except('page'))->render(); ?>

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