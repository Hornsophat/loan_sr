<?php $__env->startSection('title', __('item.add_sale')); ?>
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
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.add_sale')); ?></a></li>
            </ul>
        </div>

        <div class="tile">
            <div class="tile-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <h3><?php echo e(__('item.add_sale')); ?></h3><hr/>
                            <div class="error display_message"></div><br/>
                            <div class="panel-body">
                                <?php if(Session::has('message')): ?>
                                    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                                <?php endif; ?>
                                <?php if(Session::has('error-message')): ?>
                                    <div class="alert alert-danger"><?php echo e(Session::get('error-message')); ?></div>
                                <?php endif; ?>
                                

                                <?php echo Form::open(array('url' => route('sale_property.sale',['property'=>$property]) , 'method' => 'POST', 'files' => true)); ?>

                                
                                <div class="row">
                                    <div class="col-md-6"> 
                                       <div class="form-group" style="display:none">
                                            <?php echo Form::label('contract', trans('item.contract')); ?>

                                            <button type="button" class="btn btn-sm btn-warning pull-right" onclick="preview_contarct_sample()" data-toggle="modal" data-target="#contractModal"><i class="fa fa-eye"></i> <?php echo e(__('item.preview')); ?></button>
                                            <?php echo Form::select('contract', $contracts,null, array('class' => 'form-control', 'id' => 'contract','required')); ?>


                                            <?php if($errors->has('contract')): ?>
                                                <span class="help-block text-danger">
                                                    <strong><?php echo e($errors->first('contract')); ?></strong>
                                                </span> 
                                            <?php endif; ?>
                                        </div>
                                   </div>
                                   <div class="col-md-6"></div>
                                    <div class="col-md-6"> 
                                       <div class="form-group">
                                            <?php echo Form::label('code', trans('item.code')); ?>

                                            <?php echo Form::text('code', $code, array('class' => 'form-control', 'readonly')); ?>

                                        </div>
                                   </div>
                                   <div class="col-md-6"> 
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
                                   <div class="col-md-6"> 
                                       <div class="form-group">
                                            <?php echo Form::label('customer', trans('item.customer')); ?>

                                            <?php if($reservation): ?>
                                            <?php echo Form::select('customer', $customers,isset($reservation->customer_id)?$reservation->customer_id:null, array('class' => 'form-control', 'id' => 'customer','required', 'disabled')); ?>

                                            <?php else: ?>
                                            <?php echo Form::select('customer', $customers,isset($reservation->customer_id)?$reservation->customer_id:null, array('class' => 'form-control', 'id' => 'customer','required')); ?>

                                            <?php endif; ?>
                                            <?php if($errors->has('customer')): ?>
                                                <span class="help-block text-danger">
                                                    <strong><?php echo e($errors->first('customer')); ?></strong>
                                                </span> 
                                            <?php endif; ?>
                                        </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group" style="padding-left: 20px">
                                            <p>&emsp;</p>
                                           <?php echo Form::checkbox('free_land_register', 1, false, ['class' => 'form-check-input', 'style'=>'cursor:pointer;']); ?>

                                           <?php echo Form::label('property', 'Free Land Register',['class' => 'rounded badge-success pr-1 pl-1']); ?>

                                           <?php if($errors->has('free_land_register')): ?>
                                                <span class="help-block text-danger">
                                                    <strong><?php echo e($errors->first('free_land_register')); ?></strong>
                                                </span> 
                                            <?php endif; ?>
                                       </div>
                                   </div>
                                   <div class="col-md-6"> 
                                       <div class="form-group">
                                            <?php echo Form::label('customer_partner_id', 'Partner'); ?>

                                            <?php if($reservation): ?>
                                                <?php echo Form::select('customer_partner_id', $customers,isset($reservation->customer_partner_id)?$reservation->customer_partner_id:null, array('class' => 'form-control', 'id' => 'customer_partner_id')); ?>

                                            <?php else: ?>
                                                <select name="customer_partner_id" class="form-control" id="customer_partner_id" disabled>
                                                    <option value=>-- <?php echo e(__('item.select')); ?> --</option>
                                                </select>
                                            <?php endif; ?>
                                            <?php if($errors->has('customer_partner_id')): ?>
                                                <span class="help-block text-danger">
                                                    <strong><?php echo e($errors->first('customer_partner_id')); ?></strong>
                                                </span> 
                                            <?php endif; ?>
                                        </div>
                                   </div>
                                    <div class="col-md-6"></div>
                                   <div class="col-md-6"> 
                                       <div class="form-group">
                                            <?php echo Form::label('property', trans('item.property')); ?>

                                            <?php echo Form::text('property', $property->property_no.' | '.$property->property_name, array('class' => 'form-control', 'readonly')); ?>

                                        </div>
                                   </div>
                                   <div class="col-md-6"> 
                                    <div class="input-group" style="font-family: 'Times New Roman', Times, serif">
                                         <?php echo Form::label('penalty_of_late_payment', trans('item.penalty_of_late_payment'), array('style'=>'width:100%;')); ?>

                                         <?php echo Form::text('penalty_of_late_payment', $property->penalty_of_late_payment*1, array('class' => 'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

                                         <div class="input-group-append">
                                             <span class="input-group-text" >Days</span>
                                         </div>
                                     </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="input-group" style="font-family: 'Times New Roman', Times, serif">
                                         <?php echo Form::label('penalty', trans('item.penalty'), array('style'=>'width:100%;')); ?>

                                         <?php echo Form::text('penalty', $property->penalty*1, array('class' => 'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

                                         <div class="input-group-append">
                                             <span class="input-group-text" >$</span>
                                         </div>
                                     </div>
                                </div>
                                <br>
                                   <div class="col-md-6"> 
                                       <div class="input-group">
                                            <?php echo Form::label('price', trans('item.price'), array('style'=>'width:100%;')); ?>

                                            <?php echo Form::text('price', $property->property_price*1, array('class' => 'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

                                            <div class="input-group-append">
                                                <span class="input-group-text" >$</span>
                                            </div>
                                            <?php if($errors->has('price')): ?>
                                                <span class="help-block text-danger" style="width: 100%;">
                                                    <strong><?php echo e($errors->first('price')); ?></strong>
                                                </span> 
                                            <?php endif; ?>
                                        </div>
                                   </div>
                                   <div class="col-md-6 mb-3"> 
                                       <div class="input-group">
                                            <?php echo Form::label('discount', trans('item.discount'), array('style'=>'width:100%;')); ?>

                                            <?php echo Form::text('discount', $property->property_discount_amount*1, array('style' => 'width:70%;','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

                                            <div class="input-group-append">
                                                <span class="input-group-text" ><?php echo e(__('item.is')); ?></span>
                                            </div>
                                            <?php echo Form::select('discount_type', $discount_types,null, array('style' => 'width:20%;padding:8px 5px;', 'id' => 'discount_type')); ?>

                                            <?php if($errors->has('discount')): ?>
                                                <span class="help-block text-danger" style="width: 100%;">
                                                    <strong><?php echo e($errors->first('discount')); ?></strong>
                                                </span> 
                                            <?php endif; ?>
                                        </div>
                                        <div class="input-group">
                                            
                                        </div>
                                   </div>
                                   <div class="col-md-6 mb-3"> 
                                       <div class="input-group">
                                            <?php echo Form::label('total', trans('item.total'), array('style'=>'width:100%;')); ?>

                                            <?php echo Form::text('total', ($property->property_price*1)-($property->property_discount_amount*1), array('class' => 'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');", 'readonly')); ?>

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
                                   <div class="col-md-6 mb-3"> 
                                       <div class="input-group">
                                            <?php echo Form::label('deposit', trans('item.deposit'), array('style'=>'width:100%;')); ?>

                                            <?php echo Form::text('deposit', (isset($reservation->amount)?$reservation->amount:0)*1, array('class' => 'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');", 'readonly')); ?>

                                            <div class="input-group-append">
                                                <span class="input-group-text" >$</span>
                                            </div>
                                            <?php if($errors->has('deposit')): ?>
                                                <span class="help-block text-danger" style="width: 100%;">
                                                    <strong><?php echo e($errors->first('deposit')); ?></strong>
                                                </span> 
                                            <?php endif; ?>
                                        </div>
                                   </div>
                                   <div class="col-md-12"></div>
                                   <div class="col-md-6">
                                       <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
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
                                               <div class="input-group">
                                                    <?php echo HTML::decode(Form::label('loan_term', trans('item.loan_term').'<span class="required">*</span>', array('style'=>'width:100%;'))); ?>

                                                    <?php echo Form::text('loan_term', 15, array('style' => 'width:65%;','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

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
                                           <div class="col-md-12"> 
                                               <div class="form-group">
                                                    <?php echo Form::label('payment_stage', trans('item.payment_stage')); ?>

                                                    <?php echo Form::select('payment_stage', $payment_stages,null, array('class' => 'form-control', 'id' => 'payment_stage')); ?>

                                                    <?php if($errors->has('payment_stage')): ?>
                                                        <span class="help-block text-danger">
                                                            <strong><?php echo e($errors->first('payment_stage')); ?></strong>
                                                        </span> 
                                                    <?php endif; ?>
                                                </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-12">
                                       <h5><?php echo e(__('item.payment_date')); ?></h5>
                                       <table class="table">
                                           <thead>
                                               <tr>
                                                    <th><?php echo e(__('item.no')); ?></th>
                                                    <th><?php echo e(__('item.date')); ?></th>
                                                    <th><?php echo e(__('item.currency')); ?></th>
                                                    <th><?php echo e(__('item.amount')); ?></th>
                                                    <th><?php echo e(__('item.interest_amount')); ?></th>
                                                    <th><?php echo e(__('item.total_amount_to_be_paid')); ?></th>
                                                    <th><?php echo e(__("item.amount_paid")); ?></th>
                                               </tr>
                                           </thead>
                                           <tbody id="scheduleContent">
                                           </tbody>
                                       </table>
                                   </div>
                                   <div class="col-md-6"> 
                                       <div class="form-group">
                                            <?php echo Form::label('employee', trans('item.employee')); ?>

                                            <?php echo Form::select('employee', $employees,isset($reservation->employee_id)?$reservation->employee_id:null, array('class' => 'form-control', 'id' => 'employee')); ?>

                                            <?php if($errors->has('employee')): ?>
                                                <span class="help-block text-danger">
                                                    <strong><?php echo e($errors->first('employee')); ?></strong>
                                                </span> 
                                            <?php endif; ?>
                                        </div>
                                   </div>
                                   <div class="col-md-6"> 
                                       <div class="input-group">
                                            <?php echo Form::label('commission', trans('item.commission'), array('style'=>'width:100%;')); ?>

                                            <?php echo Form::text('commission', null, array('class' => 'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

                                            <div class="input-group-append">
                                                <span class="input-group-text" >$</span>
                                            </div>
                                            <?php if($errors->has('commission')): ?>
                                                <span class="help-block text-danger" style="width: 100%;">
                                                    <strong><?php echo e($errors->first('commission')); ?></strong>
                                                </span> 
                                            <?php endif; ?>
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

<?php echo $__env->make('back-end.sale_property.sale_form_model', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(GOOGLE_MAP_API_KEY); ?>&libraries=drawing"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script type="text/javascript" src="https://pratikborsadiya.in/vali-admin/js/plugins/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://pratikborsadiya.in/vali-admin/js/plugins/bootstrap-datepicker.min.js">
    <script type="text/javascript">
        $(document).ready(function(){
            getTotal();
            
        });
        $('#customer, #payment_stage, #customer_partner_id').select2();
        $('.date-picker').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
            todayHighlight: true
        });
        $(document).on('keyup', '#price, #discount', function(){
            getTotal();
        });
        $(document).on('change', '#discount_type', function(){
            $('#discount').val(0);
            getTotal();
        });
        $(document).on('change', '#payment_stage', function(){
            var stage = $('#payment_stage option:selected').val();
            var total = $('#total').val();
            var date = $('#date').val();
            var deposit = $('#deposit').val();
            var loan_term = $('#loan_term').val()
            var loan_term_type = $('#loan_term_type option:selected').val()
            var interest_rate = $('#interest_rate').val();
            if(!stage || stage==0){
                $('#scheduleContent').html('');
                return false;
            }
            $.ajax({
                type:'get',
                url:"<?php echo e(route('sale_property.get_preview_schedule_first_pay')); ?>", 
                data:{date:date,stage:stage,total:total,deposit:deposit,loan_term:loan_term, loan_term_type:loan_term_type, interest_rate:interest_rate},
                dataType:false,
                success:function(data){
                    $('#scheduleContent').html(data.html);
                },
                error:function(errors){
                    console.log(errors)
                }
            });
        })
        function getTotal(){
            var price = $('#price').val();
            var discount = $('#discount').val();
            var dis_type = $('#discount_type option:selected').val();
            if(dis_type=='discount_percent'){
                discount = discount/100;
                $('#total').val(price-(price*discount));
            }else{
                $('#total').val(price-discount);
            }
            $('#scheduleContent').html('');
            $("#payment_stage").val(null).change();
        }

        $('#loan_term_type, #loan_term').change(function(){
            getTotal()
        })

        function preview_contarct_sample(){
            var id = $('#contract option:selected').val();
            $.ajax({
                method:'get',
                url:"<?php echo e(route('sale_property.preview_contarct_sample')); ?>",
                data:{id:id},
                success:function(data){
                    $('#contractContentModal').html(data.html);
                }
            })
        }
        $('#contractModal').on('hidden.bs.modal', function (e) {
            $('#contractContentModal').html('');
        });
        $(document).on('change', '#customer', function(){
            var customer = $('#customer option:selected').val();
            if(!customer || customer==0){
                return 0;
            }
            $.ajax({
                url:'<?php echo e(route("get_partner")); ?>',
                type:'get',
                data:{customer_id:customer},
                success:function(data){
                    $('#customer_partner_id').removeAttr('disabled');
                    $('#customer_partner_id').html(data.option);
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>