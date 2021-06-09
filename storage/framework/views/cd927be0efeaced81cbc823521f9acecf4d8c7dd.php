<?php $__env->startSection('title', __('item.sale_detail')); ?>
<?php $__env->startSection('style'); ?>
    <style type="text/css">
        .table_nowrap tr td, .table_nowrap tr th{
            white-space: nowrap;
        }
        .modal-lg {
            max-width: 1250px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('property')); ?>"><?php echo e(__('item.property')); ?></a></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.sale_detail')); ?></a></li>
            </ul>
        </div>
        <div class="tile">
            <div class="tile-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <h3><?php echo e(__('Loan Detail')); ?></h3><br>
                            <div class="panel-body">
                                <?php if(Session::has('message')): ?>
                                    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                                <?php endif; ?>
                                <?php if(Session::has('error-message')): ?>
                                    <div class="alert alert-danger"><?php echo e(Session::get('error-message')); ?></div>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('item.code')); ?></td>
                                                <td><?php echo e($sale->reference); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('item.date')); ?></td>
                                                <td><?php echo e(date('d-m-Y', strtotime($sale->sale_date))); ?></td>
                                            </tr>
                                            <!-- <tr>
                                                <td style="width: 200px;"><?php echo e(trans('អតិថិជន')); ?></td>
                                                <td><?php echo e($customer->last_name.' '.$customer->first_name); ?></td>
                                            </tr> -->
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('item.property_no')); ?></td>
                                                <td><?php echo e($property->property_no); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('item.property')); ?></td>
                                                <td><?php echo e($property->property_name); ?></td>
                                            </tr>
                                            <?php if($sale->is_free_land_register==1): ?>
                                            <tr>
                                                <td style="width: 200px;">Free Land Register</td>
                                                <td><span class="rounded badge-success pr-1 pl-1">Yes</span></td>
                                            </tr>
                                            <?php else: ?>
                                            <tr>
                                                <td style="width: 200px;">Free Land Register</td>
                                                <td><span class="rounded badge-danger pr-1 pl-1">No</span></td>
                                            </tr>
                                            <?php endif; ?>
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('item.price')); ?></td>
                                                <td>$<?php echo e(number_format($sale->total_price,2)); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('item.discount')); ?></td>
                                                <td>$<?php echo e(number_format($sale->discount_amount,2)); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('item.total')); ?></td>
                                                <td>$<?php echo e(number_format($sale->total_price-$sale->discount_amount,2)); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('item.deposit')); ?></td>
                                                <td>$<?php echo e(number_format($sale->deposit,2)); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('item.description')); ?></td>
                                                <td><?php echo e($sale->remark); ?></td>
                                            </tr>
                                            <?php if($isAdministrator): ?>
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('item.created_by')); ?></td>
                                                <td><?php echo e(isset($sale->createBy->name)?$sale->createBy->name:''); ?></td>
                                            </tr>
                                            <?php endif; ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                    <center><h1>Customer</h1></center>
                                        <table class="table" style ="text-align:center;">
                                            <tbody>
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('item.code')); ?></td>
                                                <td><?php echo e($customer->customer_no); ?></td>
                                            </tr>
                                          
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('អតិថិជន')); ?></td>
                                                <td><?php echo e($customer->last_name.' '.$customer->first_name); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('item.name')); ?></td>
                                                <td><?php echo e($customer->last_name_en.' '.$customer->first_name_en); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('item.gender')); ?></td>
                                                <td><?php if($customer->sex==1){
                                                    echo "Male";
                                                }else{
                                                    echo "Female";
                                                }?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('item.phone')); ?></td>
                                                <td><?php echo e($customer->phone2); ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('item.email')); ?></td>
                                                <td><?php echo e($customer->email); ?></td>
                                            </tr>
                                           
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('item.image')); ?></td>
                                                <?php $image = "http://localhost/anakut/Model_app/pmb_loan/public/".$customer->profile;?>
                                                <td><img src = "<?php echo $image;?>"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-10 ">
                                        
                                        <a style="margin-left:12px" class="btn btn-sm btn-primary pull-right"  href="<?php echo e(route('sale.contractLand',['id'=>$sale->id])); ?>"><?php echo e(__('កិច្ចសន្យា​ លក់ Villa​​ / ​House')); ?></a>
                                        
                                        <button type="button" class="btn btn-sm btn-info" style="cursor: pointer;" data-toggle="modal" data-target="#changeAddressModal">Change Address</button>
                                        <button type="button" class="btn btn-sm btn-info" style="cursor: pointer;" data-toggle="modal" data-target="#changePartnerModal" onclick="getChangePartner()">Change Partner</button>
                                        <a class="btn btn-sm btn-primary pull-right" href="<?php echo e(route('sale_property.create_loan', ['sale_item'=>$sale->id])); ?>"><?php echo e(__('item.create_loan')); ?></a>
                                        <?php if(!empty($paid_off)): ?>
                                            <a class="btn btn-sm btn-warning pull-right mr-2" style="cursor: no-drop;">Paid off</a>
                                            <a class="btn btn-sm btn-success pull-right mr-2" href="<?php echo e(route('sale_property.sale_paid_off_receipt',['id'=>$paid_off->id])); ?>" target="_blank">Paid</a>
                                        <?php else: ?>
                                            <a class="btn btn-sm btn-warning pull-right mr-2" href="<?php echo e(route('sale_property.paid_off', ['sale_item'=>$sale->id])); ?>)">Paid off</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                               
                                <!-- Contract -->
                                <form action="http://127.0.0.1/loanvilla/resources/assets" method="post" enctype="multipart/form-data" >
                                    <?php echo csrf_field(); ?>
  
                                
                                
                                </form>
                                    
                                </div>
                               
                                
                                <div class="row">
                                    <div class="col-lg-10 col-md-12">
                                        <h5><?php echo e(__('item.payment_date')); ?></h5>
                                            <div class="table-responsive">
                                                <table class="table table_nowrap">
                                                   <thead>
                                                       <tr>
                                                            <th><?php echo e(__('item.no')); ?></th>
                                                            <th class="text-center"><?php echo e(__('item.date')); ?></th>
                                                            <th class="text-center"><?php echo e(__('item.currency')); ?></th>
                                                            <th class="text-center"><?php echo e(__('item.amount')); ?></th>
                                                            <th class="text-center"><?php echo e(__("item.amount_paid")); ?></th>
                                                            <th class="text-center"><?php echo e(__('item.function')); ?></th>
                                                       
                                                   </thead>
                                                   <tbody id="scheduleContent">
                                                
                                                          <?php
                                                        $index=1;
                                                    ?>
                                                    <tr <?php if($loan_first->status=='cancel'): ?> style="background: #ca7b7b54" <?php endif; ?>>
                                                        <td><?php echo e($index); ?></td>
                                                        <td class="text-center"><?php echo e(date('d-m-Y', strtotime($loan_first->loan_date))); ?></td>
                                                        <td class="text-right"><?php echo e(__('item.usd')); ?></td>
                                                        <td class="text-right">$<?php echo e(number_format($loan_first->loan_amount,2)); ?></td>
                                                        <td class="text-right">$<?php echo e(number_format($loan_first->loan_amount-$loan_first->outstanding_amount,2)); ?></td>
                                                        <td class="text-right">
                                                            <?php if($loan_first->status=='cancel'): ?>
                                                                <a style="cursor: no-drop;"><span class='rounded p-1 badge-warning'><?php echo e(__('item.payment_schedule')); ?></span></a>
                                                                <a style="cursor: no-drop;"><span class='rounded p-1 badge-danger'><?php echo e(__('item.cancel')); ?></span></a>
                                                            <?php else: ?>
                                                                <a style="cursor: pointer;" onclick="print_schedule(<?php echo e($loan_first->id); ?>)" data-toggle="modal" data-target="#scheduleModal"><span class='rounded p-1 badge-primary'><?php echo e(__('item.schedule')); ?></span></a>
                                                                <a style="cursor: pointer;" onclick="view_loan_schedule(<?php echo e($loan_first); ?>)" data-toggle="modal" data-target="#loanScheduleModal"><span class='rounded p-1 badge-warning'><?php echo e(__('item.payment_schedule')); ?></span></a>
                                                                <a style="cursor: pointer;" onclick="cancel_loan(<?php echo e($loan_first->id); ?>)"><span class='rounded p-1 badge-danger'><?php echo e(__('item.cancel')); ?></span></a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                      <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr  <?php if($loan->status=='cancel'): ?> style="background: #ca7b7b54" <?php endif; ?>>
                                                            <td><?php echo e(++$index); ?></td>
                                                            <td class="text-center"><?php echo e(date('d-m-Y', strtotime($loan->loan_date))); ?></td>
                                                            <td class="text-right"><?php echo e(__('item.usd')); ?></td>
                                                            <td class="text-right">$<?php echo e(number_format($loan->loan_amount,2)); ?></td>
                                                            <td class="text-right">$<?php echo e(number_format($loan->loan_amount-$loan->outstanding_amount,2)); ?></td>
                                                            <td class="text-right">
                                                                <?php if($loan->status=='cancel'): ?>
                                                                    <a style="cursor: no-drop;"><span class='rounded p-1 badge-warning'><?php echo e(__('item.payment_schedule')); ?></span></a>
                                                                    <a style="cursor: no-drop;"><span class='rounded p-1 badge-danger'><?php echo e(__('item.cancel')); ?></span></a>
                                                                <?php else: ?>
                                                                <a style="cursor: pointer;" onclick="view_schedule(<?php echo e($loan); ?>)" data-toggle="modal" data-target="#ScheduleModal"><span class='rounded p-1 badge-primary'><?php echo e(__('item.schedule')); ?></span></a>
                                                                    <a style="cursor: pointer;" onclick="view_loan_schedule(<?php echo e($loan); ?>)" data-toggle="modal" data-target="#loanScheduleModal"><span class='rounded p-1 badge-warning'><?php echo e(__('item.payment_schedule')); ?></span></a>
                                                                    <a style="cursor: pointer;" onclick="cancel_loan(<?php echo e($loan->id); ?>)"><span class='rounded p-1 badge-danger'><?php echo e(__('item.cancel')); ?></span></a>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                       
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   </tbody>
                                                </table>
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-sm btn-danger" style="cursor: pointer;" onclick="cancel_sale(<?php echo e($sale->id); ?>)"><?php echo e(__('item.cancel')); ?></button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    
    <div class="popup-image" style="display: none">
        <i class="fa fa-remove close-popup"></i>
        <img src=""/>
    </div>

<?php echo $__env->make('back-end.sale_property.view_sale_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('back-end.sale_property.view_schedule', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(GOOGLE_MAP_API_KEY); ?>&libraries=drawing"></script>
    <?php echo $__env->make('back-end.sale_property.view_sale_script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>