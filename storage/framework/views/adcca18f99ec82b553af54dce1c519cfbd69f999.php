<?php $__env->startSection('title', __('item.payment')); ?>
<?php $__env->startSection('style'); ?>
    <style type="text/css">
        table thead tr th{
            text-align: center;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('property')); ?>"><?php echo e(__('item.property')); ?></a></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.payment')); ?></a></li>
            </ul>
        </div>

        <div class="tile">
            <div class="tile-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <h3><?php echo e(__('item.payment')); ?></h3><hr/>
                            <div class="error display_message"></div><br/>
                            <div class="panel-body">
                                <?php if(Session::has('message')): ?>
                                    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                                <?php endif; ?>
                                <?php if(Session::has('error-message')): ?>
                                    <div class="alert alert-danger"><?php echo e(Session::get('error-message')); ?></div>
                                <?php endif; ?>
                                

                                <?php echo Form::open(array('url' => route('sale_property.loan_payment',['payment_schedule' => $payment_schedule]) , 'method' => 'POST', 'files' => true)); ?>

                                
                                <div class="row">
                                    <div class="col-md-4"> 
                                       <div class="form-group">
                                            <?php echo Form::label('code', trans('item.code')); ?>

                                            <?php echo Form::text('code', $code, array('class' => 'form-control', 'readonly')); ?>

                                        </div>
                                   </div>
                                   <div class="col-md-4"> 
                                       <div class="input-group">
                                            <?php echo Form::label('date', trans('item.date'), array('style'=>'width:100%;')); ?>

                                            <?php echo Form::text('date', date('d-m-Y'), array('class' => 'form-control date-picker', 'style'=>'cursor:pointer;','autocomplete' => 'off', 'placeholder' => 'dd-mm-yyyy', 'required'=>'true')); ?>

                                            <div class="input-group-append">
                                                <span class="input-group-text" ><i class="fa fa-calendar"></i></span>
                                            </div>
                                            <?php if($errors->has('date')): ?>
                                                <span class="help-block text-danger" style="width: 100%;">
                                                    <strong><?php echo e($errors->first('date')); ?></strong>
                                                </span> 
                                            <?php endif; ?>
                                        </div>
                                   </div>
                                   <div class="col-md-4"> 
                                       <div class="form-group">
                                            <?php echo Form::label('customer', trans('item.customer')); ?>

                                            <?php echo Form::text(null, $customer->last_name.' '.$customer->first_name, array('class' => 'form-control', 'readonly')); ?>

                                        </div>
                                   </div>
                                   <div class="col-md-12">
                                       <h5><?php echo e(__('item.payment_date')); ?></h5>
                                       <div class="table-responsive">
                                           <table class="table table-nowrap">
                                               <thead>
                                                   <tr class="badge-primary">
                                                        <th><?php echo e(__('item.no')); ?></th>
                                                        <th><?php echo e(__('item.date')); ?></th>
                                                        <th><?php echo e(__('item.currency')); ?></th>
                                                        <th><?php echo e(__("item.total_amount_to_be_paid")); ?></th>
                                                        <th><?php echo e(__('item.amount')); ?></th>
                                                        <th><?php echo e(__("item.interest_amount")); ?></th>
                                                        <th><?php echo e(__('item.principle_balance')); ?></th>
                                                        <th class="text-center"><?php echo e(__("item.amount_paid")); ?></th>
                                                   </tr>
                                               </thead>
                                               <tbody id="scheduleContent">
                                                    <tr>
                                                        <td><?php echo e($payment_schedule->order); ?></td>
                                                        <td class="text-center"><?php echo e(date('d-m-Y', strtotime($payment_schedule->payment_date))); ?></td>
                                                        <td class="text-center"><?php echo e(__('item.usd')); ?></td>
                                                        <td class="text-right"><?php echo e(number_format($payment_schedule->amount_to_spend-$payment_schedule->paid,2)); ?></td>
                                                        <td class="text-right"><?php echo e(number_format($payment_schedule->principle,2)); ?></td>
                                                        <td class="text-right"><?php echo e(number_format($payment_schedule->total_interest,2)); ?></td>
                                                        <td class="text-right"><?php echo e(number_format($payment_schedule->principle_balance,2)); ?></td>
                                                        <td class="text-right"><?php echo e(number_format($payment_schedule->paid,2)); ?></td>
                                                    </tr>
                                               </tbody>
                                           </table>
                                       </div>
                                   </div>
                                   <div class="col-md-6"></div>
                                   <div class="col-md-6">
                                       <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo e(__('item.status')); ?></label>
                                                    <select class="form-control" name = "selectStatus" id="selectStatust">
                                                        <option value="paid"><?php echo e(__('item.paid')); ?></option>
                                                        <option value="partial"><?php echo e(__('item.partial')); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                           <div class="col-md-12 mb-3"> 
                                               <div class="input-group">
                                                    <?php echo Form::label('amount', trans('item.amount'), array('style'=>'width:100%;')); ?>

                                                    <?php echo Form::text('amount', ($payment_schedule->amount_to_spend-$payment_schedule->paid)*1, array('class' => 'form-control','id'=>'amount','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

                                                    <div class="input-group-append">
                                                        <span class="input-group-text" >$</span>
                                                    </div>
                                                    <?php if($errors->has('amount')): ?>
                                                        <span class="help-block text-danger" style="width: 100%;">
                                                            <strong><?php echo e($errors->first('amount')); ?></strong>
                                                        </span> 
                                                    <?php endif; ?>
                                                </div>
                                           </div>
                                           <!-- <div class="col-md-12 mb-3"> 
                                               <div class="input-group">
                                                    <?php echo Form::label('penalty', trans('item.penalty'), array('style'=>'width:100%;')); ?>

                                                    <?php echo Form::text('penalty', ($payment_schedule->principle*($payment_schedule->penalty_amount/100))*1, array('class' => 'form-control change-total','id'=>'penalty','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

                                                    <div class="input-group-append">
                                                        <span class="input-group-text" >$</span>
                                                    </div>
                                                    <?php if($errors->has('penalty')): ?>
                                                        <span class="help-block text-danger" style="width: 100%;">
                                                            <strong><?php echo e($errors->first('penalty')); ?></strong>
                                                        </span> 
                                                    <?php endif; ?>
                                                </div>
                                           </div> -->
                                           <?php
                                           date_default_timezone_set("Asia/Phnom_penh");
                                           $per_day_penalty = 0;
                                            //total penalty
                                            if($payment_schedule->paid>0)
                                            {
                                                $plus_payment_date = date('Y-m-d', strtotime($payment_schedule->actual_payment_date . " +".$sale_item->penalty_of_late_payment."day"));
                                            
                                               
                                            }else{
                                                $plus_payment_date = date('Y-m-d', strtotime($payment_schedule->payment_date . " +".$sale_item->penalty_of_late_payment."day"));
                                            }

                                         
                                          if(strtotime($plus_payment_date) < strtotime(date("Y-m-d")) )
                                          {
                                              $per_day_penalty = date("d") - date('d', strtotime($plus_payment_date));
                                            ?>
                                                 <div class="col-md-12 mb-3"> 
                                               <div class="input-group">
                                                    <?php echo Form::label('penalty', trans('item.penalty'), array('style'=>'width:100%;')); ?>

                                                    <?php echo Form::text('penalty',  $sale_item->penalty* $per_day_penalty, array('class' => 'form-control change-total','id'=>'penalty', '','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

                                                    <div class="input-group-append">
                                                        <span class="input-group-text" >$</span>
                                                    </div>
                                                    <?php if($errors->has('penalty')): ?>
                                                        <span class="help-block text-danger" style="width: 100%;">
                                                            <strong><?php echo e($errors->first('penalty')); ?></strong>
                                                        </span> 
                                                    <?php endif; ?>
                                                </div>
                                           </div>
                                            <?php

                                           }else{
                                            ?>
                                            <div class="col-md-12 mb-3"> 
                                              <div class="input-group">
                                                   <?php echo Form::label('penalty', trans('item.penalty'), array('style'=>'width:100%;')); ?>

                                                   <?php echo Form::text('penalty',  0, array('class' => 'form-control change-total','id'=>'penalty','readonly','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

                                                   <div class="input-group-append">
                                                       <span class="input-group-text" >$</span>
                                                   </div>
                                                   <?php if($errors->has('penalty')): ?>
                                                       <span class="help-block text-danger" style="width: 100%;">
                                                           <strong><?php echo e($errors->first('penalty')); ?></strong>
                                                       </span> 
                                                   <?php endif; ?>
                                               </div>
                                          </div>
                                           <?php
                                           }
                                           ?>
                                          
                                          <input type = "hidden" name = "day_penalty" value = "<?php echo $per_day_penalty;?>" />
                                           <!-- <div class="col-md-12 mb-3"> 
                                               <div class="input-group">
                                                    <?php echo Form::label('discount', trans('item.discount'), array('style'=>'width:100%;')); ?>

                                                    <?php echo Form::text('discount', null, array('class' => 'form-control change-total','id'=>'discount','readonly','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

                                                    <div class="input-group-append">
                                                        <span class="input-group-text" >$</span>
                                                    </div>
                                                    <?php if($errors->has('discount')): ?>
                                                        <span class="help-block text-danger" style="width: 100%;">
                                                            <strong><?php echo e($errors->first('discount')); ?></strong>
                                                        </span> 
                                                    <?php endif; ?>
                                                </div>
                                           </div> -->
                                           <div class="col-md-12 mb-3"> 
                                               <div class="input-group">
                                                    <?php echo Form::label('total', trans('item.total'), array('style'=>'width:100%;')); ?>

                                                    <?php echo Form::text('total', (($payment_schedule->amount_to_spend-$payment_schedule->paid)*1)+($sale_item->penalty* $per_day_penalty), array('class' => 'form-control','id'=>'total','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');", 'readonly'    )); ?>

                                                    <?php echo Form::text('total1', (($payment_schedule->amount_to_spend-$payment_schedule->paid)*1)+($sale_item->penalty* $per_day_penalty), array('class' => 'form-control','id'=>'total1','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');", 'readonly','hidden')); ?>

                                                    <div class="input-group-append">
                                                        <span class="input-group-text" >$</span>
                                                    </div>
                                                    <?php if($errors->has('total')): ?>
                                                        <span class="help-block text-danger" style="width: 100%;">
                                                            <strong><?php echo e($errors->first('total')); ?></strong>
                                                        </span> 
                                                    <?php endif; ?>
                                                </div>
                                           </div>
                                           <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <?php echo Form::label('remark', trans('item.description')); ?>

                                                    <?php echo Form::textarea('remark', null, array('class' => 'form-control', 'rows'=>3)); ?>

                                                </div>
                                            </div>
                                        </div>
                                       </div>
                                   </div>
                                <?php echo Form::button(trans('item.back'), array('class' => 'btn btn-danger pull-left','onclick' => 'window.history.back();')); ?>

                                <?php echo Form::submit(trans('item.submit'), array('class' => 'btn btn-primary pull-right', 'id' => 'property_submit')); ?>


                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('back-end/js/lib/jquery-ui.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('back-end/js/lib/moment.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('back-end/js/lib/bootstrap-datepicker.min.js')); ?>"></script>
    <script type="text/javascript">
        if($('#selectStatust option:selected').val()=='paid'){
            $('#amount').attr('readonly',true);
        }
        $('#selectStatust').change(function(){
            if($('#selectStatust option:selected').val()=='paid'){
                $('#amount').attr('readonly',true);
                loadTotal();
            }else{
                $('#amount').attr('readonly',false);
            }
        })
        $('#customer, #payment_stage').select2();
        $('.date-picker').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
            todayHighlight: true
        });
        $(document).on('keyup', '.change-total', function(){
            loadTotal();
        });
        function loadTotal(){
            var penalty = $('#penalty').val();
            var discount = $('#discount').val();
            if(!penalty){
                penalty=0;
            }
            if(!discount){
                discount=0;
            }
            getOldTotal();
            var total = $('#total').val();
            total = parseFloat(total);
            discount = parseFloat(discount);
            if(discount>total){
                discount =0;
                $('#discount').val(discount);
                getOldTotal();
                loadTotal();
                return false;
            }
            penalty = parseFloat(penalty);
            amount = parseFloat(amount);
            //close for a period
            // $('#amount').val(total+penalty-discount);
            $('#total').val(total+penalty-discount);
            $('#total').val(total+penalty+amount-discount);
        }
        $(document).on('keyup','#amount',function(){
            var penalty = $('#penalty').val();
            var discount = $('#discount').val();
            var total = $('#total').val();
            var t_amount = 1*total+1*penalty-1*discount;
            var amount = $(this).val();
            amount*=1;
            if(amount>t_amount){
                $(this).val(t_amount);
            }
        });
        // function getOldTotal(){
        //     $('#total').val(<?php echo e(($payment_schedule->amount_to_spend-$payment_schedule->paid)*1); ?>);
        // }
        function getOldTotal(){
            $('#total').val(<?php echo e((0)*1); ?>);
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>