<?php $__env->startSection('title',"Receivable Report"); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
	.width-100 {
		width: 100% !important;
	}
	.m-r-0 {
		margin-right: 0px !important;
	}
	@media  print{
        .col-sm-6{width: 50%; float: left;}
        .col-sm-3{width: 25%; float: left;}
        .col-sm-9{width: 75%; float: left;}
        .col-md-4{width: 33.333%; float: left;}       
    }
    }
</style>
	<main class="app-content">
		<div class="app-title">
	        <ul class="app-breadcrumb breadcrumb side">
	          	<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	          	<li class="breadcrumb-item"><?php echo e(__('item.sale')); ?></li>
	          	<li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.receivable_report')); ?></a></li>
	        </ul>
      	</div>
		<div class="row">
        	<div class="col-md-12">
				<?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          		<div class="tile">
            		<div class="tile-body bg-white rounded overflow_hidden p-4">
						<div class="rows">
							<form action="<?php echo e(url('receivable_report')); ?>" method="get" class="form-inline">
								<div class="col-md-3" style="margin-bottom: 5px;">
									<?php echo e(Form::text('start', $request->start ?? '', ['class' => 'width-100 form-control demoDate', 'autocomplete' => 'off', 'placeholder' => 'Start Date'])); ?>

								</div>
								<div class="col-md-3" style="margin-bottom: 5px;">
									<?php echo e(Form::text('end', $request->end ?? '', ['class' => 'width-100 form-control demoDate', 'autocomplete' => 'off', 'placeholder' => 'End Date'])); ?>

								</div>
								<div class="col-md-3" style="margin-bottom: 5px;">
									<?php echo e(Form::select('land_id', $land->prepend('Select Land',''), $request->land_id, ['class' => 'form-control width-100','id'=>'land_id'])); ?>

								</div>
								<div class="col-md-3 projects" style="margin-bottom: 5px;">
									<?php echo Form::select('project_id',$project->prepend('Select Project',''),$request->project_id,['style'=>'width:100%;','class'=>'form-control width-100']); ?>

								</div>
								<div class="col-md-3 zones" style="margin-bottom: 5px;">
									<?php echo Form::select('zone_id',$zone->prepend('Select Zone',''),$request->zone_id,['style'=>'width:100%;','class'=>'form-control width-100']); ?>

								</div>
								<div class="col-md-12">
									<button class="btn btn-small btn-primary pull-right" type="submit"><?php echo e(__('item.filter')); ?></button>
								</div>
							</form>
						</div><br>
						<div class="row">
							<div class="col-sm-12">
								<div class="col-sm-12">
								<button class="btn btn-small btn-success pull-right" id="btn_print" type=""><?php echo e(__('item.print')); ?></button>
								</div>
							</div>
						</div>
						<div id="table_print">
						<div class="text-success display_message text-center"></div><br>
						<div class="row">
							<div class="col-sm-4 col-md-4"><img src="<?php echo e(Setting::get('LOGO')); ?>" style="height: 50px;margin-bottom: 20px;"></div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<h3><?php echo e(__('item.receivable_report')); ?></h3>
							</div>
						</div>
						
						<br>
						<div class="table-responsive">
						<table class="table table-hover table-bordered">
			                <thead>
			                  	<tr>
				                    <th width="70" class="text-center"><?php echo e(__('item.no')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.sale_date')); ?></th>
									<th class="text-center"><?php echo e(__('item.customer')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.employee')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.land')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.project')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.zone')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.property')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.price')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.not_paid')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.receicable')); ?></th>
			                  	</tr>
			                </thead>
	                		<tbody>
	                			<?php
	                				$total_price = 0;
	                				$total_not_paid = 0;
	                				$total_receivable = 0;
	                			?>
	                			<?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                				<?php
	                					$total_price += $item->total_price;
		                				$total_not_paid += $item->payment()->where('status',1)->sum('amount_to_spend');
		                				$total_receivable += $item->payment()->where('status',2)->sum('amount_to_spend');
	                				?>
				                	<tr>
					                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
					                    <td class="text-center"><?php echo e(date("d-M-Y", strtotime($item->sale_date))); ?></td>
										<td class="text-center"><?php echo e($item->soleToCustomer->first_name .' '. $item->soleToCustomer->last_name); ?></td>
										<td class="text-center"><?php echo e($item->soldByEmployee->first_name .' '. $item->soldByEmployee->last_name); ?></td>
					                    <td class="text-center"><?php echo e($item->land_name); ?></td>
					                    <td class="text-center"><?php echo e($item->project_name); ?></td>
					                    <td class="text-center"><?php echo e($item->zone_name); ?></td>
					                    <td class="text-center"><?php echo e($item->property_names); ?></td>
					                    <td class="text-center"><?php echo e("$ ". number_format($item->total_price,2)); ?></td>
					                    <td class="text-center"><?php echo e("$ ".number_format($item->payment()->where('status',1)->sum('amount_to_spend'),2)); ?></td>
					                    <td class="text-center"><?php echo e("$ ".number_format($item->payment()->where('status',2)->sum('amount_to_spend'),2)); ?></td>
					                </tr>
				                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				                <tr>
				                	<th colspan="8" style="text-align: right;">Total</th>
				                	<th><?php echo e("$ ".number_format($total_price,2)); ?></th>
				                	<th><?php echo e("$ ".number_format($total_not_paid,2)); ?></th>
				                	<th><?php echo e("$ ".number_format($total_receivable,2)); ?></th>
				                </tr>
			                </tbody>
	              		</table>
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
<script type="text/javascript" src="<?php echo e(asset('js/printThis.js')); ?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#btn_print').click(function(){
			 $('#table_print').printThis({
                importStyle: true,
                importCSS: true      
            });
		});
        $('.demoDate').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
            todayHighlight: true
        });
        $('#land_id').change(function(){
        	var land_id = $('#land_id :selected').val();
            $.ajax({
                url:"<?php echo e(route('get_project_by_land')); ?>",
                type:"get",
                datatype:"json",
                data:{
                    land_id:land_id
                },
                success:function (res) {
                    $('.projects').html(res.project);
                    getzone();
                }
            });
        });
    });
    function getzone(){
    	var project_id = $('#project_id :selected').val();
            $.ajax({
                url:"<?php echo e(route('get_zone_by_pro')); ?>",
                type:"get",
                datatype:"json",
                data:{
                    project_id:project_id
                },
                success:function (res) {
                    $('.zones').html(res.zones);
                }
            });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>