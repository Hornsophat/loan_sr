<?php $__env->startSection('title', 'List Property'); ?>
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
                <li class="breadcrumb-item"><?php echo e(__('item.property')); ?></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.list_property')); ?></a></li>
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
                                        <div class="col-lg-3 col-sm-12">
                                            <?php if(Auth::user()->can('create-property') || $isAdministrator): ?>
                                                <a class="btn btn-small btn-success" href="<?php echo e(URL::to('property/create')); ?>"><?php echo e(trans('item.new_property')); ?></a>
                                            <?php endif; ?>
                                            <?php if(Auth::user()->can('merge-property') || $isAdministrator): ?>
                                                <!-- <a class="btn btn-small btn-outline-success" href="<?php echo e(route('property_merge')); ?>"><?php echo e(trans('item.merge_property')); ?></a> -->
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-9 col-sm-12">
                                        <h1 style = "font-size:50px;"><?php echo strtoupper ($loan_type) ?></h1>
                                            <form action="<?php echo e(URL('property/loan_view/')); ?>" method="get">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <!-- <div class="form-group">
                                                            <label><?php echo e(__('item.project')); ?></label>
                                                            <select name="project" id="project" class="form-control" onchange="this.form.submit()">
                                                                <option value>-- <?php echo e(__('item.select')); ?> <?php echo e(__('item.type')); ?> --</option>
                                                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($project->id); ?>"
                                                                        <?php if($request->project == $project->id): ?>
                                                                        selected="selected"
                                                                        <?php endif; ?>
                                                                    ><?php echo e($project->property_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div> -->
                                                    </div>
                                                    <!-- <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label><?php echo e(__('item.customer')); ?></label>
                                                            <select name="customer" id="customer" class="form-control" onchange="this.form.submit()">
                                                                <option value>-- <?php echo e(__('item.select')); ?> <?php echo e(__('item.type')); ?> --</option>
                                                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($customer->id); ?>"
                                                                        <?php if($request->customer == $customer->id): ?>
                                                                        selected="selected"
                                                                        <?php endif; ?>
                                                                    ><?php echo e($customer->last_name.' '.$customer->first_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-group">
                                                            <label style="width: 100%"><?php echo e(__('item.search')); ?></label>
                                                            <input type="text" name="search" class="form-control" value="<?php echo e(isset($_GET['search'])? $_GET['search']:""); ?>" placeholder="<?php echo e(__('item.search')); ?>" onkeydown="if (event.keyCode == 13) this.form.submit()" autocomplete="off"/>&nbsp;&nbsp;
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered table-nowrap">
                                            <thead>
                                            <tr>
                                                <td><?php echo e(__('item.property_id')); ?></td>
                                                <td><?php echo e(__('item.property_name')); ?></td>
                                                <td><?php echo e(__('item.property_name')); ?></td>
                                                <td><?php echo e(__('item.customer')); ?></td>
                                                <td><?php echo e(__('item.price')); ?></td>
                                                <td><?php echo e(__('item.discount')); ?></td>
                                                <td><?php echo e(__('item.loan_amount')); ?></td>
                                                <td><?php echo e(__('item.loan_date')); ?></td>
                                                <td><?php echo e(__('item.loan_term')); ?></td>
                                                <td><?php echo e(__('item.interest_rate')); ?></td>
                                             
                                                <td><?php echo e(__('item.function')); ?></td>
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key+1); ?></td>
                                                    <td><?php echo e($value->property_name); ?></td>
                                                    <td><?php echo e($value->property_no); ?></td>
                                                    <td><?php echo e($value->customer_name); ?></td>
                                                    <td class="text-right">$<?php echo e(number_format($value->property_price*1,2)); ?></td>
                                                    <td class="text-right">$<?php echo e(number_format($value->property_discount_amount*1,2)); ?></td>
                                                    <td>$<?php echo e($value->loan_amount); ?></td>
                                                    <td><?php echo e($value->loan_date); ?></td>
                                                    <td><?php echo e($value->installament_term.$value->duration_type); ?></td>
                                                    <td><?php echo e($value->interest_rate."%"); ?></td>
                                                   
                                                    <td>
                                                    
                                                        <a class="btn btn-sm btn-info" href="<?php echo e(URL::to('property/view_sale/' . $value->id)); ?>">View Detail</a>
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
        $('#project, #customer').select2();
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