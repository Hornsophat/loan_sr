<?php $__env->startSection('title', __('item.add_payment_stage')); ?>
<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item" ><a href=<?php echo e(route('payment_stages')); ?>><?php echo e(__('item.payment_stage')); ?></a></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.add_payment_stage')); ?></a></li>
            </ul>
        </div>

        <div class="tile">
            <div class="tile-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <h3><?php echo e(__('item.add_payment_stage')); ?></h3><hr/>
                            <div class="error display_message"></div><br/>
                            <div class="panel-body">
                                <?php if(Session::has('message')): ?>
                                    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                                <?php endif; ?>
                                <?php if(Session::has('error-message')): ?>
                                    <div class="alert alert-danger"><?php echo e(Session::get('error-message')); ?></div>
                                <?php endif; ?>
                                

                                <?php echo Form::open(array('url' => route('payment_stage.create') , 'method' => 'POST', 'files' => true)); ?>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="row">
                                           <div class="col-md-12"> 
                                               <div class="input-group">
                                                    <?php echo Form::label('amount', trans('item.amount'), array('style'=>'width:100%;')); ?>

                                                    <?php echo Form::text('amount', null, array('class' => 'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

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
                                           <div class="col-md-12 mt-3 mb-3">
                                                <div class="form-group">
                                                    <?php echo Form::label('remark', trans('item.description')); ?>

                                                    <?php echo Form::textarea('remark', null, array('class' => 'form-control', 'rows'=>3)); ?>

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <?php echo Form::submit(trans('item.submit'), array('class' => 'btn btn-primary pull-right', 'id' => 'property_submit')); ?>

                                    </div>
                                </div>

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
        $('#customer').select2();
        $('.date-picker').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
            todayHighlight: true
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>