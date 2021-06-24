<?php $__env->startSection('content'); ?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><?php echo e(__('item.project_zone')); ?></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.list_project_zone')); ?></a></li>
            </ul>
        </div>

        <div class="tile">
            <div class="tile-body">
                    <div class="row">
                        <div class="col-md-12 ">
                            <?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php if(Auth::user()->can('create-property-zone') || $isAdministrator): ?>
                                                <a class="btn btn-small btn-success" href="<?php echo e(route("projectzoneCreate")); ?>"><?php echo e(trans('item.new_zone')); ?></a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <form action="/projectzone/index" method="get">
                                                <div class="input-group">
                                                    <div class="col-md-6"></div>
                                                    <input type="text" name="search" class="form-control col-md-6 pull-right" value="<?php echo e(isset($_GET['search'])? $_GET['search']:""); ?>" placeholder="<?php echo e(__('item.search')); ?>" onkeydown="if (event.keyCode == 13) this.form.submit()" autocomplete="off"/>&nbsp;&nbsp;
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                    <hr />

                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered table-nowrap">
                                            <thead>
                                            <tr>
                                                <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('id',trans('item.zone_id')));?></td>
                                                <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name',trans('item.zone_name')));?></td>
                                                <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('code',trans('item.zone_code')));?></td>
                                                <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('code', __("item.project")));?></td>
                                                <td><?php echo e(__('item.function')); ?></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key+1); ?></td>
                                                    <td><?php echo e($value->name); ?></td>
                                                    <td><?php echo e($value->code); ?></td>
                                                    <td><?php echo e(isset($value->project->property_name) ? $value->project->property_name : ""); ?></td>
                                                    <td>
                                                        <?php if(Auth::user()->can('edit-property-zone') || $isAdministrator): ?>
                                                            <a class="btn btn-sm btn-info" href="<?php echo e(URL::to('projectzone/' . $value->id . '/edit')); ?>"><?php echo e(trans('item.edit')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if(Auth::user()->can('delete-property-zone') || $isAdministrator): ?>
                                                        <a class="btn btn-sm btn-warning" onclick="return confirm('Are you sure you want to delete this item?');"
                                                           href="<?php echo e(URL::to('projectzone/delete/' . $value->id )); ?>"><?php echo e(trans('item.delete')); ?></a>
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
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>