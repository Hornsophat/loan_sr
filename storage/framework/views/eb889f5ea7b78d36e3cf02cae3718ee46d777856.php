<?php $__env->startSection('content'); ?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><?php echo e(__('item.user')); ?></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.list_user')); ?></a></li>
            </ul>
        </div>

        <div class="tile">
            <div class="tile-body">
                <div class="row">
                <?php if(Auth::user()->can('create-user') || $isAdministrator): ?>
                    <div class="col-lg-12 margin-tb">
                        <a class="btn btn-success" href="<?php echo e(route('user.create')); ?>"><?php echo e(__('item.new_user')); ?></a>
                    </div>
                </div>
                <br/>
                <?php endif; ?>
                <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success">
                        <p><?php echo e($message); ?></p>
                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-nowrap">
                        <tr>
                            <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('id',__("item.no")));?></th>
                            <th><?php echo e(__("item.profile")); ?></th>
                            <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name',__("item.name")));?></th>
                            <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('email',__("item.email")));?></th>
                            <th><?php echo e(__('item.role')); ?></th>
                            <th width="280px"><?php echo e(__('item.function')); ?></th>
                        </tr>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->id); ?></td>
                                <td>
                                    <?php
                                        $url = asset('/images/default/no_image.png');
                                        if($user->profile != null && file_exists(public_path($user->profile)))
                                            $url = asset('public'.$user->profile);
                                    ?>
                                    <img src="<?php echo e($url); ?>" alt="Missing Image" width="50px"/>

                                </td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td>
                                 <label class="label label-success"><?php echo e(isset($user->roles[0])?$user->roles[0]->name:""); ?></label>
                                </td>
                                <td>
                                <?php if(Auth::user()->can('edit-user') || $isAdministrator): ?>
                                    <a class="btn btn-primary" href="users/<?php echo e($user->id); ?>/edit"><?php echo e(__('item.edit')); ?></a>
                                <?php endif; ?>
                                <?php if(Auth::user()->can('delete-user') || $isAdministrator): ?>
                                    <a onclick="return confirm('Are you sure you want to delete this item?');"
                                       class="btn btn-danger" href="users/<?php echo e($user->id); ?>/delete"><?php echo e(__('item.delete')); ?></a>
                                <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $data->render(); ?>

                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>