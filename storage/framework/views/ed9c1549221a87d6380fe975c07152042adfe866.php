<?php $__env->startSection('title',"List Expense Groups"); ?>
<?php $__env->startSection('content'); ?>
	<main class="app-content">
		<div class="app-title">
	        <ul class="app-breadcrumb breadcrumb side">
	          	<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	          	<li class="breadcrumb-item"><?php echo e(__('item.expense_type')); ?></li>
	          	
	          	<li class="breadcrumb-item active"><a href="<?php if(Auth::user()->can('list-exspense-group') || $isAdministrator): ?> <?php echo e(route('expense_groups')); ?> <?php else: ?> # <?php endif; ?>"><?php echo e(__('item.list_expense_type')); ?></a></li>
	        </ul>
      	</div>
		
      	<div class="row">
        	<div class="col-md-12">
				<?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          		<div class="tile">
            		<div class="tile-body">
            			<?php if(Auth::user()->can('add-exspense-group') || $isAdministrator): ?>
							
							<a href="<?php echo e(route('expense_group.create')); ?>" class="btn btn-success mb-4"><?php echo e(__('item.new_expense_type')); ?></a>
						<?php endif; ?>
              			<div class="table-responsive">
              				<table class="table table-hover table-bordered table-nowrap">
				                <thead>
				                  	<tr>
					                    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('id',__('item.expense_type_no')));?></th>
										<th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name',__('item.name')));?></th>
					                    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('description',__('item.description')));?></th>
					                    <th><?php echo e(__('item.function')); ?></th>
				                  	</tr>
				                </thead>
		                		<tbody>
		                			<?php $__currentLoopData = $expense_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					                	<tr>
						                    <td><?php echo e(++$key); ?></td>
						                    <td><?php echo e($item->name); ?></td>
											<td><?php echo e($item->description); ?></td>
											<td>
											<?php if(Auth::user()->can('edit-exspense-group') || $isAdministrator): ?>
												<a class="btn btn-sm btn-info" title="Edit" href="<?php echo e(route('expense_group.edit',['id' => $item->id])); ?>"><?php echo e(__('item.edit')); ?></a>
											<?php endif; ?>
											<?php if(Auth::user()->can('delete-exspense-group') || $isAdministrator): ?>
												<a class="btn btn-sm btn-warning" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"
												   href="<?php echo e(route('expense_group.destroy', ['id' => $item->id])); ?>"><?php echo e(__('item.delete')); ?></a>
											<?php endif; ?>
											</td>
						                </tr>
					                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				                </tbody>
		              		</table>
		              		<div class="pull-right">
								<?php echo $expense_groups->links(); ?>

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