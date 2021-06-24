<?php $__env->startSection('content'); ?>
    <main class="app-content">
        <div class="app-title">
             <?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><?php echo e(__('item.project')); ?></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.list_project')); ?></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile" >
                    <div class="tile-body">
                        <?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <?php if(Auth::user()->can('create-project') || $isAdministrator): ?>
                                    <a class="btn btn-small btn-success" href="<?php echo e(URL::to('project/create')); ?>"><?php echo e(trans('item.new_project')); ?></a>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 text-right">
                                <form action="/project" method="get">
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
                                    <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('id',trans('item.project_no')));?></td>
                                    <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('property_name',trans('item.project_name')));?></td>
                                    <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('address_street',trans('item.address_street')));?></td>
                                    <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('address_number',trans('item.address_number')));?></td>
                                    <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('ground_surface',trans('item.ground_surface')));?></td>
                                    <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('land_id', __("item.land")));?></td>
                                    <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('', __("item.zone")));?></td>
                                    <td><?php echo e(__('item.total_expense')); ?></td>
                                    <td><?php echo e(__('item.function')); ?></td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td><?php echo e($value->property_name); ?></td>
                                        <td><?php echo e($value->address_street); ?></td>
                                        <td><?php echo e($value->address_number); ?></td>
                                        <td><span class="badge badge-warning"><?php echo e($value->ground_surface*1); ?> m<sup>2</sup></span></td>
                                        <td><?php echo e(isset($value->land->property_name)?$value->land->property_name:''); ?></td>
                                        <td>
                                            <a href="<?php echo e(route("projectzone", $value->id)); ?>">
                                                <span class="badge badge-primary">
                                                 <?php echo e($value->projectZone()->count()); ?>

                                            </span>
                                            </a>

                                        </td>
                                        <td><b><?php echo e("$ ".number_format((float)$value->expense->sum("amount"), 2, '.', '')); ?></b></td>
                                        <td>
                                        <?php if(Auth::user()->can('view-project') || $isAdministrator): ?>
                                            <a class="btn btn-sm btn-primary" href="<?php echo e(URL::to('project/' . $value->id . '/detail')); ?>"><?php echo e(trans('item.detail')); ?></a>
                                        <?php endif; ?>
                                        <?php if(Auth::user()->can('view-project-commission') || $isAdministrator): ?>
                                            <a class="btn btn-sm btn-info" href="<?php echo e(URL::to('project/commission/'.$value->id)); ?>"><?php echo e(__('item.commission')); ?></a>
                                        <?php endif; ?>
                                        <?php if(Auth::user()->can('edit-project') || $isAdministrator): ?>
                                            <a class="btn btn-sm btn-info" href="<?php echo e(URL::to('project/' . $value->id . '/edit')); ?>"><?php echo e(trans('item.edit')); ?></a>
                                        <?php endif; ?>
                                        <?php if(Auth::user()->can('delete-project') || $isAdministrator && 1==4): ?>
                                            <a class="btn btn-sm btn-warning" onclick="return confirm('Are you sure you want to delete this item?');"
                                               href="<?php echo e(URL::to('project/delete/' . $value->id )); ?>"><?php echo e(trans('item.delete')); ?></a>
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
                        <div class="clearfix">&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>