<?php $__env->startSection('title',"Purschase"); ?>
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
                <li class="breadcrumb-item"><a href="#"><?php echo e(__('item.purchase')); ?></a></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.list_purchase')); ?></a></li>
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
                                    <?php if(Auth::user()->can('create-purchase') || $isAdministrator): ?>
                                        <a class="btn btn-small btn-success" href="<?php echo e(route('purchase.create')); ?>"><?php echo e(__('item.add_purchase')); ?></a>
                                    <?php endif; ?>
                                 </div>

                                <div class="col-md-6 text-right">
                                    <form action="<?php echo e(route('purchases')); ?>" method="get">
                                        <div class="input-group">
                                            <div class="col-md-6"></div>
                                            <input type="text" name="search" class="form-control col-md-6 pull-right" value="<?php echo e(isset($_GET['search'])? $_GET['search']:""); ?>" placeholder="<?php echo e(__('item.search')); ?>" onkeydown="if (event.keyCode == 13) this.form.submit()" autocomplete="off"/>&nbsp;&nbsp;
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
                                            <td><?php echo e(__('item.project')); ?></td>
                                            <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('supplyer_id', __('item.supplier')));?></td>
                                            <td><?php echo e(__('item.total_cost')); ?></td>
                                            <td><?php echo e(__('item.discount')); ?></td>
                                            <td><?php echo e(__('item.grand_total')); ?></td>
                                            <td><?php echo e(__('item.description')); ?></td>
                                            <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('status',__('item.status')));?></td>
                                            <td><?php echo e(__('item.function')); ?></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-right"><?php echo e(++$key); ?></td>
                                            <td><?php echo e(date('d-m-Y', strtotime($value->created_at))); ?></td>
                                            <td><?php echo e($value->reference); ?></td>
                                            <td><?php echo e($value->project_name); ?></td>
                                            <td><?php echo e($value->supplyer_name); ?></td>
                                            <td class="text-right">$ <?php echo e(number_format($value->cost_total,2)); ?></td>
                                            <td class="text-right">$ <?php echo e(number_format($value->discount_amount,2)); ?></td>
                                            <td class="text-right">$ <?php echo e(number_format($value->grand_total,2)); ?></td>
                                            <td><?php echo e($value->description); ?></td>
                                            <td class="text-center">
                                                <?php if($value->status=='received'): ?>
                                                    <span class="badge badge-success"><?php echo e($value->status); ?></span>
                                                <?php else: ?>
                                                    <span class="badge badge-warning"><?php echo e($value->status); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if(Auth::user()->can('receive-purchase') || $isAdministrator && $value->status!='received'): ?>
                                                    <a class="btn btn-sm btn-success" onclick="return confirm('Are you sure you want to receive this item?');" href="<?php echo e(route('purchase.receive', ['id'=>$value->id])); ?>">Receive</a>
                                                <?php endif; ?>
                                                <?php if(Auth::user()->can('view-purchase') || $isAdministrator): ?>
                                                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('purchase.view', ['id'=>$value->id])); ?>"><?php echo e(__('item.detail')); ?></a>
                                                <?php endif; ?>
                                                <?php if(Auth::user()->can('edit-purchase') || $isAdministrator && $value->status!='received'): ?>
                                                    <a class="btn btn-sm btn-info" href="<?php echo e(route('purchase.edit', ['id'=>$value->id])); ?>"><?php echo e(trans('item.edit')); ?></a>
                                                <?php endif; ?>
                                                <?php if(Auth::user()->can('delete-purchase') || $isAdministrator && $value->status!='received'): ?>
                                                    <a class="btn btn-sm btn-warning" onclick="return confirm('Are you sure you want to delete this item?');"
                                                       href="<?php echo e(route('purchase.destroy', ['id'=>$value->id])); ?>"><?php echo e(trans('item.delete')); ?></a>
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
                                        <?php echo $purchases->appends(\Request::except('page'))->render(); ?>

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