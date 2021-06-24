<?php $__env->startSection('title',__('item.inventory')); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
    table tr th, table tr td{
        white-space: nowrap;
    }
</style>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#"><?php echo e(__('item.inventory')); ?></a></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.list_inventory')); ?></a></li>
            </ul>
        </div>
    <div class="tile">
        <div class="tile-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                             <div class="row">
                                 <div class="col-md-6">
                                    
                                 </div>
                                <div class="col-md-6 text-right">
                                    <form action="<?php echo e(route('inventories')); ?>" method="get">
                                        <div class="row">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                               <div class="form-group" style="margin-bottom: 5px!important;">
                                                    <select class="form-control select2-option-picker" onchange="this.form.submit()" name="product">
                                                        <option  value="">-- Select Product --</option>
                                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($product->id); ?>" <?php if($request->product==$product->id): ?> selected <?php endif; ?>><?php echo e($product->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                               </div>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                             </div>
                            <hr />

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <td><?php echo e(__('item.no')); ?></td>
                                            <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('created_at',__('item.date')));?></td>
                                            <td><?php echo e(__('item.reference')); ?></td>
                                            <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('material_id', __('item.product')));?></td>
                                            <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('created_by',__('item.add_by')));?></td>
                                            <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('qty',__('item.qty')));?></td>
                                            <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('unit_cost',__('item.unit_cost')));?></td>
                                            <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('total_cost',__('item.total_cost')));?></td>
                                            <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('status',__('item.status')));?></td>
                                            <td><?php echo e(__('item.type')); ?></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-right"><?php echo e(++$key); ?></td>
                                            <td><?php echo e(date('d-m-Y', strtotime($value->created_at))); ?></td>
                                            <td><?php echo e($value->reference); ?></td>
                                            <td><?php echo e($value->product); ?></td>
                                            <td><?php echo e(ucfirst($value->user_name)); ?></td>
                                            <td class="text-right"><?php echo e($value->in_out_qty); ?></td>
                                            <td class="text-right">$ <?php echo e(number_format($value->unit_cost,2)); ?></td>
                                            <td class="text-right">$ <?php echo e(number_format($value->total_cost,2)); ?></td>
                                            <td class="text-center">
                                                <?php if($value->status=='received'): ?>
                                                    <span class="badge badge-success"><?php echo e($value->status); ?></span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger"><?php echo e($value->status); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if($value->type=='purchase'): ?>
                                                    <span class="badge badge-success"><?php echo e($value->type); ?></span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger"><?php echo e($value->type); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right">
                                        <?php echo $inventories->appends(\Request::except('page'))->render(); ?>

                                    </div>
                                </div>
                            </div>                 
                    </div>
                </div>
        </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>