<?php
    use Illuminate\Support\Facades\Config;
?>


<?php $__env->startSection('title', __('item.add_loan')); ?>
<?php $__env->startSection('style'); ?>
    <style type="text/css">
        .table thead tr th{
            text-align: center;
        }
        .table tbody tr td{
            padding-top: 5px!important;
            padding-bottom: 5px!important;
            /*border: 1px solid gray;*/
        }
        .table tbody tr:nth-child(even) {background: #e6e6e6;}
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('property')); ?>"><?php echo e(__('item.property')); ?></a></li>
                <li class="breadcrumb-item"><?php echo e(__('item.loan')); ?></li>
                <li class="breadcrumb-item"><?php echo e($customer->customer_no.' | '.$customer->last_name.' '.$customer->first_name); ?></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.add_loan')); ?></a></li>
            </ul>
        </div>

        <div class="tile">
            <div class="tile-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <h3><?php echo e(__('item.add_loan')); ?></h3><hr/>
                            <div class="error display_message"></div><br/>
                            <div class="panel-body">
                                <?php if(Session::has('message')): ?>
                                    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                                <?php endif; ?>
                                <?php if(Session::has('error-message')): ?>
                                    <div class="alert alert-danger"><?php echo e(Session::get('error-message')); ?></div>
                                <?php endif; ?>
                                

                                <?php echo Form::open(array('url' => route('sale_property.create_loan',['sale_item'=>$sale_item]) , 'method' => 'POST', 'files' => true)); ?>

                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><?php echo e(__('item.customer').__('item.loan')); ?></h5>
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12"> 
                                               <div class="form-group" style="font-family: 'Times New Roman', Times, serif">
                                                    <?php echo HTML::decode(Form::label('code', trans('item.code').'<span class="required">*</span>')); ?>

                                                    <?php echo Form::text('code', $code, array('class' => 'form-control', 'readonly')); ?>

                                                </div>
                                           </div>
                                           <div class="col-md-12 mb-3"> 
                                               <div class="input-group" style="font-family: 'Times New Roman', Times, serif">
                                                    <?php echo HTML::decode(Form::label('date', trans('item.date').'<span class="required">*</span>', array('style'=>'width:100%;'))); ?>

                                                    <?php echo Form::text('date', date('d-m-Y'), array('class' => 'form-control date-picker', 'id'=>'date','style'=>'cursor:pointer;','autocomplete' => 'off', 'placeholder' => 'dd-mm-yyyy', 'required'=>'true')); ?>

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
                                           <div class="col-md-12"> 
                                               <div class="form-group" style="font-family: Khmer OS System">
                                                    <?php echo HTML::decode(Form::label('customer', trans('item.customer').'<span class="required">*</span>')); ?>

                                                    <?php echo Form::text('customer',$customer->customer_no.' | '.$customer->last_name.' '.$customer->first_name ,array('class' => 'form-control', 'id' => 'customer','required', 'disabled')); ?>

                                                    <?php if($errors->has('customer')): ?>
                                                        <span class="help-block text-danger">
                                                            <strong><?php echo e($errors->first('customer')); ?></strong>
                                                        </span> 
                                                    <?php endif; ?>
                                                </div>
                                           </div>
                                        </div>
                                    </div>
                                   <div class="col-md-12">
                                       <h5><?php echo e(__('item.amount')." ".__('item.and').__('item.loan_type')); ?></h5>
                                   </div>
                                   <div class="col-md-3"></div>
                                   <div class="col-md-6">
                                       <div class="row">
                                           <div class="col-md-12 mb-3"> 
                                               <div class="input-group" style="font-family: 'Times New Roman', Times, serif">
                                                    <?php echo HTML::decode(Form::label('amount', trans('item.amount').'<span class="required">*</span>', array('style'=>'width:100%;'))); ?>

                                                    <?php echo Form::text('amount', $sale_item->grand_total*1, array('class' => 'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

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
                                           <div class="col-md-12"> 
                                               <div class="form-group" style="font-family: 'Times New Roman', Times, serif">
                                                    <?php echo HTML::decode(Form::label('payment_stage', trans('item.payment_stage').'<span class="required">*</span>')); ?>

                                                    <?php echo Form::select('payment_stage', $payment_stages,null, array('class' => 'form-control', 'id' => 'payment_stage','required')); ?>

                                                    <?php if($errors->has('payment_stage')): ?>
                                                        <span class="help-block text-danger">
                                                            <strong><?php echo e($errors->first('payment_stage')); ?></strong>
                                                        </span> 
                                                    <?php endif; ?>
                                                </div>
                                           </div>
                                           <div class="col-md-12"> 
                                               <div class="form-group" style="font-family: 'Times New Roman', Times, serif">
                                                    <?php echo HTML::decode(Form::label('loan_type', trans('item.loan_type').'<span class="required">*</span>')); ?>

                                                    <?php echo Form::select('loan_type', $loan_types,null, array('class' => 'form-control', 'id' => 'loan_type')); ?>

                                                    <?php if($errors->has('loan_type')): ?>
                                                        <span class="help-block text-danger">
                                                            <strong><?php echo e($errors->first('loan_type')); ?></strong>
                                                        </span> 
                                                    <?php endif; ?>
                                                </div>
                                           </div>
                                           <div class="col-md-12 mb-3"> 
                                               <div class="input-group" style="font-family: 'Times New Roman', Times, serif">
                                                    <?php echo HTML::decode(Form::label('loan_term', trans('item.loan_term').'<span class="required">*</span>', array('style'=>'width:100%;'))); ?>

                                                    <?php echo Form::text('loan_term', 24, array('style' => 'width:65%;','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

                                                    <div class="input-group-append">
                                                        <span class="input-group-text" ><?php echo e(__('item.is')); ?></span>
                                                    </div>
                                                    <?php echo Form::select('loan_term_type', $loan_term_types,null, array('style' => 'width:20%;padding:8px 5px;', 'id' => 'loan_term_type')); ?>

                                                    <?php if($errors->has('loan_term')): ?>
                                                        <span class="help-block text-danger" style="width: 100%;">
                                                            <strong><?php echo e($errors->first('loan_term')); ?></strong>
                                                        </span> 
                                                    <?php endif; ?>
                                                </div>
                                                <div class="input-group">
                                                    
                                                </div>
                                           </div>
                                           <div class="col-md-12 mb-3" id="divPeriodicPayment"> 
                                               <div class="input-group" style="font-family: 'Times New Roman', Times, serif">
                                                    <?php echo HTML::decode(Form::label('periodic_payment', trans('item.periodic_payment'), array('style'=>'width:100%;'))); ?>

                                                    <?php echo Form::text('periodic_payment', NULL, array('class' => 'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

                                                    <div class="input-group-append">
                                                        <span class="input-group-text" >$</span>
                                                    </div>
                                                    <?php if($errors->has('periodic_payment')): ?>
                                                        <span class="help-block text-danger" style="width: 100%;">
                                                            <strong><?php echo e($errors->first('periodic_payment')); ?></strong>
                                                        </span> 
                                                    <?php endif; ?>
                                                </div>
                                           </div>
                                           <div class="col-md-12 mb-3"> 
                                               <div class="input-group" style="font-family: 'Times New Roman', Times, serif">
                                                    <?php echo Form::label('interest_rate', trans('item.interest_rate'), array('style'=>'width:100%;')); ?>

                                                    <?php echo Form::text('interest_rate', null, array('class' => 'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

                                                    <div class="input-group-append">
                                                        <span class="input-group-text" >%</span>
                                                    </div>
                                                    <?php if($errors->has('interest_rate')): ?>
                                                        <span class="help-block text-danger" style="width: 100%;">
                                                            <strong><?php echo e($errors->first('interest_rate')); ?></strong>
                                                        </span> 
                                                    <?php endif; ?>
                                                </div>
                                           </div>
                                           <div class="col-md-12 mb-3">
                                               <div class="input-group" style="font-family: 'Times New Roman', Times, serif">
                                                    <?php echo HTML::decode(Form::label('payment_start_date', trans('item.payment_start_date').'<span class="required">*</span>', array('style'=>'width:100%;'))); ?>

                                                    <?php echo Form::text('payment_start_date', date('d-m-Y'), array('class' => 'form-control date-picker', 'style'=>'cursor:pointer;','autocomplete' => 'off', 'placeholder' => 'dd-mm-yyyy', 'required'=>'true')); ?>

                                                    <div class="input-group-append">
                                                        <span class="input-group-text" ><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <?php if($errors->has('payment_start_date')): ?>
                                                        <span class="help-block text-danger" style="width: 100%;">
                                                            <strong><?php echo e($errors->first('payment_start_date')); ?></strong>
                                                        </span> 
                                                    <?php endif; ?>
                                                </div>
                                           </div>
                                           <div class="col-md-12 mb-3"> 
                                               <div class="input-group">
                                                    <?php echo Form::label('penalty_of_late_payment', trans('item.penalty_of_late_payment').' (%)', array('style'=>'width:100%;')); ?>

                                                    <?php echo Form::text('penalty_of_late_payment', null, array('class' => 'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

                                                    <div class="input-group-append">
                                                        <span class="input-group-text" >%</span>
                                                    </div>
                                                    <?php if($errors->has('penalty_of_late_payment')): ?>
                                                        <span class="help-block text-danger" style="width: 100%;">
                                                            <strong><?php echo e($errors->first('penalty_of_late_payment')); ?></strong>
                                                        </span> 
                                                    <?php endif; ?>
                                                </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-12 mt-3">
                                       <button class="btn btn-success pull-right" type="button" onclick="check_payment_schedule()"><?php echo e(__('item.check_payment_schedule')); ?></button>
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
                                                        <th><?php echo e(__("item.interest_amount")); ?></th>
                                                        <th><?php echo e(__('item.amount')); ?></th>
                                                        <th><?php echo e(__('item.principle_balance')); ?></th>
                                                   </tr>
                                               </thead>
                                               <tbody id="scheduleContent" style="height: 200px!important;">
                                               </tbody>
                                           </table>
                                       </div>
                                   </div>
                                   <div class="col-md-12 mt-3 mb-3">
                                        <div class="form-group">
                                            <?php echo Form::label('remark', trans('item.description')); ?>

                                            <?php echo Form::textarea('remark', null, array('class' => 'form-control', 'rows'=>3)); ?>

                                        </div>
                                    </div>
                                </div>
                                
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
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(GOOGLE_MAP_API_KEY); ?>&libraries=drawing"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script type="text/javascript" src="https://pratikborsadiya.in/vali-admin/js/plugins/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://pratikborsadiya.in/vali-admin/js/plugins/bootstrap-datepicker.min.js">
    <script type="text/javascript">
        $('#loan_type').select2();
        var oldAmount = <?php echo e($sale_item->grand_total*1); ?>;
        oldAmount =parseFloat(oldAmount);
        $(document).ready(function(){
            divPeriodicPayment();
            get_blank_row();
        });
        $('.date-picker').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
            todayHighlight: true
        });
        $(document).on('change', '#payment_stage', function(){
            var stage = $('#payment_stage option:selected').val();
            var date = $('#date').val();
            var deposit = $('#deposit').val();
            if(!stage || stage==0){
                $('#amount').val(oldAmount);
                return false;
            }
            $.ajax({
                type:'get',
                url:"<?php echo e(route('sale_property.get_payment_stage_amount')); ?>", 
                data:{payment_stage:stage,amount:oldAmount},
                dataType:false,
                success:function(data){
                    $('#amount').val(data.amount);
                },
                error:function(errors){
                    console.log(errors)
                }
            });
        });

        $(document).on('change', '#loan_type', function(){
            get_blank_row();
            divPeriodicPayment();
        });
        $(document).on('keyup', '#interest_rate', function(){
            var interest_rate = $(this).val();
            interest_rate = parseFloat(interest_rate);
            if(interest_rate>100){
                swal({
                    title:'<?php echo e(__('item.interest_rate')); ?> <?php echo e(__('item.can_not_more_than')); ?> 100%',
                    type:'warning',
                });
                $(this).val(0);
                return false;
            }
        });
        $(document).on('keyup', '#penalty_of_late_payment', function(){
            var penalty_of_late_payment = $(this).val();
            penalty_of_late_payment = parseFloat(penalty_of_late_payment);
            if(penalty_of_late_payment>100){
                swal({
                    title:'<?php echo e(__('item.penalty_of_late_payment')); ?> <?php echo e(__('item.can_not_more_than')); ?> 100%',
                    type:'warning',
                });
                $(this).val(0);
                return false;
            }
        });

        function check_payment_schedule(){
            var loan_type = $('#loan_type option:selected').val();
            var amount = $('#amount').val();
            var loan_term = $('#loan_term').val();
            var loan_term_type = $('#loan_term_type option:selected').val();
            var loan_date = $('#date').val();
            var payment_start_date = $('#payment_start_date').val();
            var interest_rate = $('#interest_rate').val();
            get_blank_row();
            amount = parseFloat(amount);
            loan_term = parseInt(loan_term);
            interest_rate = parseFloat(interest_rate);
            if(!amount){
                swal({
                    title:'<?php echo e(__('item.amount')); ?> <?php echo e(__('item.required')); ?>',
                    type:'warning',
                });
                return false;
            }
            if(amount>oldAmount){
                swal({
                    title:'<?php echo e(__('item.amount')); ?> <?php echo e(__('item.can_not_more_than')); ?> '+oldAmount,
                    type:'warning',
                });
                return false;
            }
            if(!loan_type){
                swal({
                    title:'<?php echo e(__('item.please_select')); ?> <?php echo e(__('item.loan_type')); ?>',
                    type:'warning',
                });
                return false;
            }
            if(!loan_term || loan_term<1){
                swal({
                    title:'<?php echo e(__('item.please_check')); ?> <?php echo e(__('item.loan_term')); ?>',
                    type:'warning',
                });
                return false;
            }
            if(!interest_rate && interest_rate!=0){
                swal({
                    title:'<?php echo e(__('item.interest_rate')); ?> <?php echo e(__('item.required')); ?>',
                    type:'warning',
                });
                return false;
            }
            if(loan_type=="<?php echo e(Config::get('app.type_eoc')); ?>" || loan_type=="<?php echo e(Config::get('app.type_installment')); ?>"){
                if(interest_rate<=0){
                    swal({
                        title:'<?php echo e(__('item.interest_rate')); ?> <?php echo e(__('item.required')); ?>',
                        type:'warning',
                    });
                    return false;
                }
              
            }else if(loan_type=="<?php echo e(Config::get('app.type_emi')); ?>" )
            {
                if(interest_rate<=0){
                    swal({
                        title:'<?php echo e(__('item.interest_rate')); ?> <?php echo e(__('item.required')); ?>',
                        type:'warning',
                    });
                    return false;
                }
            }else if(loan_type=="<?php echo e(Config::get('app.type_free_interest')); ?>")
            {
                if(interest_rate!=0){
                    swal({
                        title:'<?php echo e(__('item.interest_rate')); ?><?php echo e(__('item.required')); ?>',
                        type:'warning',
                    });
                    return false;
                }
            }
                
            $.ajax({
                url:"<?php echo e(route('sale_property.get_payment_schedule')); ?>",
                type:'GET',
                data:{
                    loan_type:loan_type,
                    amount:amount,
                    loan_term:loan_term,
                    loan_term_type:loan_term_type,
                    loan_date:loan_date,
                    payment_start_date:payment_start_date,
                    interest_rate:interest_rate,
                },
                success:function(data){
                    $('#scheduleContent').hide();
                    $('#scheduleContent').html(data.html);
                    $("#scheduleContent").fadeIn();
                    $("#scheduleContent").fadeIn("slow");
                    $("#scheduleContent").fadeIn(180000);
                }
            })
        }

        function divPeriodicPayment(){
            var loan_type = $('#loan_type option:selected').val();
            if(loan_type){
                if(loan_type =="free_interest"){
                    // $('#divPeriodicPayment').show();
                    $("#divPeriodicPayment").fadeIn();
                    $("#divPeriodicPayment").fadeIn("slow");
                    $("#divPeriodicPayment").fadeIn(3000);
                }else{
                    $('#periodic_payment').val(0);
                    $('#divPeriodicPayment').hide();
                }
            }else{
                $('#periodic_payment').val(0);
                $('#divPeriodicPayment').hide();
                return false;
            }
        }
        function get_blank_row(){
            var tr = '';
            for(var i=1; i<=16; i++){
                tr +='<tr><td colspan="9">&nbsp;</td></tr>';
            }
            $("#divPeriodicPayment").fadeIn();
            $("#scheduleContent").fadeIn(180000);
            $('#scheduleContent').html(tr);
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>