<?php $__env->startSection('title', __("item.payment_stage")); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
    .property_booked{
        cursor: pointer;
    }
</style>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><?php echo e(__('item.payment_stage')); ?></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.list_payment_stage')); ?></a></li>
            </ul>
        </div>
        <div class="tile">
            <div class="tile-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php if(Session::has('error-message')): ?>
                                <div class="alert alert-danger"><?php echo e(Session::get('error-message')); ?></div>
                            <?php endif; ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php if(Auth::user()->can('add-payment-stage') || $isAdministrator): ?>
                                                <a class="btn btn-small btn-success" href="<?php echo e(route('payment_stage.create')); ?>"><?php echo e(trans('item.add_payment_stage')); ?></a><hr>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <form action="<?php echo e(route('payment_stages')); ?>" method="get">
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
                                                <td><?php echo e(__('item.no')); ?></td>
                                                <td><?php echo e(__('item.date')); ?></td>
                                                <td><?php echo e(__('item.amount')); ?></td>
                                                <td><?php echo e(__('item.description')); ?></td>
                                                <td><?php echo e(__('item.function')); ?></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key+1); ?></td>
                                                    <td><?php echo e(date('d-m-Y', strtotime($value->created_at))); ?></td>
                                                    <td class="text-right">$<?php echo e(number_format($value->amount,2)); ?></td>
                                                    <td><?php echo e($value->remark); ?></td>
                                                    <td>
                                                    <?php if(Auth::user()->can('edit-payment-stage') || $isAdministrator): ?>
                                                        <a class="btn btn-sm btn-info" href="<?php echo e(route('payment_stage.edit',['payment_stage'=>$value])); ?>"><?php echo e(trans('item.edit')); ?></a>
                                                    <?php endif; ?>
                                                    <?php if(Auth::user()->can('delete-payment-stage') || $isAdministrator): ?>
                                                        <a class="btn btn-sm btn-warning" onclick="return confirm('Are you sure you want to delete this item?');"
                                                           href="<?php echo e(route('payment_stage.destroy',['payment_stage'=>$value])); ?>"><?php echo e(trans('item.delete')); ?></a>
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

    <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel"><?php echo e(__('item.property')); ?><?php echo e(__('item.booked')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="contentBookingModal">
                    <table style="width: 100%;">
                        
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><?php echo e(__('item.close')); ?></button>
                    
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function view_booking(property){
            $('#contentBookingModal').html('...');
            $.ajax({
                type:'get',
                url:"<?php echo e(route('sale_property.view_booking')); ?>",
                data:{property:property},
                success:function(data){
                    $('#contentBookingModal').html(data.html);
                },
                error:function(errors){
                    $('#contentBookingModal').html('No Data!!!');
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>