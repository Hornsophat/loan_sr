<?php $__env->startSection('title', 'Add Booking Property'); ?>
<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><?php echo e(__('item.property')); ?></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.edit_booking_detail')); ?></a></li>
            </ul>
        </div>

        <div class="tile">
            <div class="tile-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <h3><?php echo e(__('item.edit_booking_detail')); ?></h3><hr/>
                            <div class="error display_message"></div><br/>
                            <div class="panel-body">
                                <?php if(Session::has('message')): ?>
                                    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                                <?php endif; ?>
                                <?php if(Session::has('error-message')): ?>
                                    <div class="alert alert-danger"><?php echo e(Session::get('error-message')); ?></div>
                                <?php endif; ?>
                                

                                <?php echo Form::model(array('url' => route('sale_property.edit_booking_detail',['id'=>$detail->id]) , 'method' => 'POST', 'files' => true)); ?>

                                
                                <div class="row">
                                    <div class="col-md-6"> 
                                       <div class="form-group">
                                            <?php echo Form::label('code', trans('item.code')); ?>

                                            <?php echo Form::text('code', $payment_transaction->reference, array('class' => 'form-control', 'readonly')); ?>

                                        </div>
                                   </div>
                                   <div class="col-md-6"> 
                                       <div class="input-group">
                                            <?php echo Form::label('date', trans('item.date'), array('style'=>'width:100%;')); ?>

                                            <?php echo Form::text('date', date('d-m-Y', strtotime($detail->date)), array('class' => 'form-control date-picker', 'style'=>'cursor:pointer;','autocomplete' => 'off', 'placeholder' => 'dd-mm-yyyy')); ?>

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

                                            <?php echo Form::select('customer', $customers,$reservation->customer_id, array('class' => 'form-control', 'id' => 'customer','disabled')); ?>

                                            <?php if($errors->has('customer')): ?>
                                                <span class="help-block text-danger">
                                                    <strong><?php echo e($errors->first('customer')); ?></strong>
                                                </span> 
                                            <?php endif; ?>
                                        </div>
                                   </div>
                                   
                                   <div class="col-md-6"> 
                                       <div class="form-group">
                                            <?php echo Form::label('property', trans('item.property')); ?>

                                            <?php echo Form::text('property', $property->property_no.' | '.$property->property_name, array('class' => 'form-control', 'readonly')); ?>

                                        </div>
                                   </div>
                                   <div class="col-md-6"> 
                                       <div class="input-group">
                                            <?php echo Form::label('price', trans('item.price'), array('style'=>'width:100%;')); ?>

                                            <?php echo Form::text('price', ($property->property_price*1)-$reservation->amount, array('class' => 'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

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
                                   
                                   <div class="col-md-6"> 
                                       <div class="input-group">
                                            <?php echo Form::label('deposit', trans('item.deposit'), array('style'=>'width:100%;')); ?>

                                            <?php echo Form::text('deposit', $detail->amount*1, array('class' => 'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

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
                                
                                </div>
                                
                                <?php echo Form::submit(trans('item.submit'), array('class' => 'btn btn-primary pull-right', 'id' => 'booking_submit')); ?>


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
        $('#customer, #customer_partner_id').select2();
        $('.date-picker').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
            todayHighlight: true
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