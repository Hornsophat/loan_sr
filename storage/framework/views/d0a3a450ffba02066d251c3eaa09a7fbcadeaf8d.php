<?php $__env->startSection('title',"Commission Report"); ?>
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
	          	<li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.commission_report')); ?></a></li>
	        </ul>
      	</div>
		<div class="row">
        	<div class="col-md-12">
				<?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          		<div class="tile">
            		<div class="tile-body bg-white rounded overflow_hidden p-4">
						<div class="rows">
							<form action="<?php echo e(url('commission_report')); ?>" method="get" class="form-inline" id="frmSubmit">
								<div class="row" style="width: 100%;">
									<div class="col-md-4" style="margin-bottom: 5px;">
										<?php echo e(Form::text('start_date', $start_date ?? '', ['class' => 'width-100 form-control Date', 'autocomplete' => 'off', 'placeholder' => 'Start Date'])); ?>

									</div>
									<div class="col-md-4" style="margin-bottom: 5px;">
										<?php echo e(Form::text('end_date', $end_date ?? '', ['class' => 'width-100 form-control Date', 'autocomplete' => 'off', 'placeholder' => 'End Date'])); ?>

									</div>
									<div class="col-md-12">
										<?php echo e(Form::hidden('between_date',null,['id'=>'between_date'])); ?>

										<a href="#" id="btnToday" class="btn btn-sm rounded p-1 btn-outline-dark mt-1"><i class="fa fa-calendar-o"></i> Today</a>
										<a href="#" id="btnYesterday" class="btn btn-sm rounded p-1 btn-outline-dark mt-1"><i class="fa fa-calendar-o"></i> Yesterday</a>
										<a href="#" id="btnThisWeek" class="btn btn-sm rounded p-1 btn-outline-dark mt-1"><i class="fa fa-calendar-o"></i> This Week</a>
										<a href="#" id="btnLastWeek" class="btn btn-sm rounded p-1 btn-outline-dark mt-1"><i class="fa fa-calendar-o"></i> Last Week</a>
										<a href="#" id="btnThisMonth" class="btn btn-sm rounded p-1 btn-outline-dark mt-1"><i class="fa fa-calendar-o"></i> This Month</a>
										<a href="#" id="btnLastMonth" class="btn btn-sm rounded p-1 btn-outline-dark mt-1"><i class="fa fa-calendar-o"></i> Last Month</a>
										<a href="#" id="btnThisYear" class="btn btn-sm rounded p-1 btn-outline-dark mt-1"><i class="fa fa-calendar-o"></i> This Year</a>
										<a href="#" id="btnLastYear" class="btn btn-sm rounded p-1 btn-outline-dark mt-1"><i class="fa fa-calendar-o"></i> Last Year</a>
										<a href="#" onclick="$('#frmSubmit').submit()" class="btn btn-sm rounded p-1 btn-primary mt-1 pull-right"><i class="fa fa-search"></i> Filter</a>
									</div>
								</div>							
							</form>
						</div><br>
						<div class="row">
							<div class="col-sm-12">
								<button class="btn btn-small btn-success pull-right" id="btn_print" type=""><?php echo e(__('item.print')); ?></button>
							</div>
							
						</div>
						<div id="table_print">
							<div class="text-success display_message text-center"></div><br>
							<div style="margin-left: 150px;"><img src="<?php echo e(Setting::get('LOGO')); ?>" style="height:150px;margin-bottom: 20px;"></div>
							<center>
								<div style="font-family: Khmer OS Muol light;font-size:20px;margin-top:-150px">ក្រុមហ៊ុន រដ្ឋ ស៊ីង អចលនទ្រព្យ</div>
								<div style="font-family: Khmer OS Muol light;font-size:20px;font-weight:bold">RothSing Real Estate Co,ltd</div>
							</center>	

							<div class="row">
								<div class="col-md-12 text-center mt-4">
									<h3 style="font-size:16px"><?php echo e(__('item.commission_report')); ?></h3>
								</div>
							</div>
							<br>
							<br>
							<br>
							<div class="table-responsive">
								<table class="table table-hover table-bordered">
					                <thead>
					                  	<tr>
						                    <th width="70" class="text-center"><?php echo e(__('item.no')); ?></th>
						                    
											<th class="text-center"><?php echo e(__('item.house_number')); ?></th>
						                    <th class="text-center"><?php echo e(__('item.sale_date')); ?></th>
											<th class="text-center"><?php echo e(__('item.project_name')); ?></th>
											<th class="text-center"><?php echo e(__('item.property_name')); ?></th>
											<th class="text-center"><?php echo e(__('តម្លៃអចលនទ្រព្យ')); ?></th>
						                    <th class="text-center"><?php echo e(__('item.employee')); ?></th>	
						                    <th class="text-center"><?php echo e(__('item.commission')); ?></th>
					                  	</tr>
					                </thead>
			                		<tbody>
			                			<?php
			                				$total = 0;	
			                			?>
			                			<?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				                			<?php
				                				$total += $item->commission_amount;
				                			?>
						                	<tr>
							                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
												<td class="text-center"><?php echo e($item->property_no); ?></td>
							                    
							                    <td class="text-center"><?php echo e(date("d-M-Y", strtotime($item->sale_date))); ?></td>
												<td class="text-center"><?php echo e($item->project_name); ?></td>
												<td class="text-center"><?php echo e($item->property_name); ?></td>
												<td class="text-center">$ <?php echo e($item->property_price); ?></td>
							                    <td class="text-center"><?php echo e($item->employee_name); ?></td>
							                    <td class="text-center"><?php echo e("$ ". number_format($item->commission_amount,2)); ?></td>
							                </tr>
						                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						                <tr>
						                	<td colspan="7" class="text-center"><?php echo e(__('item.total')); ?></td>
						                	<td class="text-center"><?php echo e("$ ". number_format($total,2)); ?></td>
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
        $('.Date').datepicker({
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
        $('#btnYesterday').click(function(){
	        $('#between_date').val('yesterday');
	        $('#frmSubmit').submit();
	    });
	    $('#btnToday').click(function(){
	        $('#between_date').val('today');
	        $('#frmSubmit').submit();
	    });
	    $('#btnThisWeek').click(function(){
	        $('#between_date').val('this_week');
	        $('#frmSubmit').submit();
	    });
	    $('#btnThisMonth').click(function(){
	        $('#between_date').val('this_month');
	        $('#frmSubmit').submit();
	    });
	    $('#btnLastWeek').click(function(){
	        $('#between_date').val('last_week');
	        $('#frmSubmit').submit();
	    });
	    $('#btnLastMonth').click(function(){
	        $('#between_date').val('last_month');
	        $('#frmSubmit').submit();
	    });
	    $('#btnThisYear').click(function(){
	        $('#between_date').val('this_year');
	        $('#frmSubmit').submit();
	    });
	    $('#btnLastYear').click(function(){
	        $('#between_date').val('last_year');
	        $('#frmSubmit').submit();
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