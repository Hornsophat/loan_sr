<?php $__env->startSection('title',"Product List"); ?>
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
                <li class="breadcrumb-item"><?php echo e(__('item.product')); ?></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.list_product')); ?></a></li>
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
                                    <?php if(Auth::user()->can('create-product') || $isAdministrator): ?>
                                        <a class="btn btn-small btn-success" href="<?php echo e(URL::to('product/create')); ?>"><?php echo e(__('item.new_product')); ?></a>
                                    <?php endif; ?>
                                    <?php if(Auth::user()->can('list-product-unit') || $isAdministrator): ?>
                                        <a class="btn btn-small btn-secondary" href="<?php echo e(route('product.units')); ?>"><?php echo e(__('item.list_unit')); ?></a>
                                    <?php endif; ?>
                                    <?php if(Auth::user()->can('list-product-category') || $isAdministrator): ?>
                                        <a class="btn btn-small btn-secondary" href="<?php echo e(route('product.categories')); ?>"><?php echo e(__('item.list_categories')); ?></a>
                                    <?php endif; ?>
                                 </div>

                                <div class="col-md-6 text-right">
                                    <form action="/product" method="get">
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
                                            <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('id',trans('item.item_id')));?></td>
                                            <td><?php echo e(trans('item.thumbnail')); ?></td>
                                            <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name',__('item.name')));?></td>
                                            <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('category', __('item.category')));?></td>
                                            <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('unit', __('item.unit')));?></td>
                                            <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('size',__('item.size')));?></td>
                                            
                                            <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('qty',__('item.quantity')));?></td>
                                            <td><?php echo e(__('item.function')); ?></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key+1); ?></td>
                                            <?php
                                                $url = asset('/images/default/no_image.png');
                                                if($value->avatar != null && file_exists(public_path($value->avatar)))
                                                    $url = asset('public'.$value->avatar);
                                            ?>
                                            <td style="text-align: center">
                                                <img src="<?php echo e($url); ?>"  alt="Missing Image" width="50px"/>

                                            </td>
                                            <td><?php echo e($value->name); ?></td>
                                            <td><?php echo e(ucfirst($value->category_name)); ?></td>
                                            <td><?php echo e(ucfirst($value->unit_name)); ?></td>
                                            <td><?php echo e($value->size); ?></td>
                                            <td><?php echo e($value->qty); ?></td>
                                            <td>
                                            <?php if(Auth::user()->can('inventory-product') || $isAdministrator): ?>
                                                <a class="btn btn-sm btn-success" href="<?php echo e(route('inventories')); ?>"><?php echo e(trans('item.inventory')); ?></a>
                                            <?php endif; ?>
                                            <?php if(Auth::user()->can('edit-product') || $isAdministrator): ?>
                                                <a class="btn btn-sm btn-info" href="<?php echo e(URL::to('product/' . $value->id . '/edit')); ?>"><?php echo e(trans('item.edit')); ?></a>
                                            <?php endif; ?>
                                            <?php if(Auth::user()->can('delete-product') || $isAdministrator): ?>
                                                <a class="btn btn-sm btn-warning" onclick="return confirm('Are you sure you want to delete this item?');"
                                                   href="<?php echo e(URL::to('product/' . $value->id.'/delete' )); ?>"><?php echo e(trans('item.delete')); ?></a>
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
                                        <?php echo $item->appends(\Request::except('page'))->render(); ?>

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