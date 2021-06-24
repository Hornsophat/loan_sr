<?php $__env->startSection('title',"Sale Detail Report"); ?>
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
		table tbody tr td{
			padding-bottom: 3px!important;
			padding-top: 3px!important;
		}
       
    }
	table tbody tr td{
		padding-bottom: 3px!important;
		padding-top: 3px!important;
	}
    }
</style>
	<main class="app-content">
		<div class="app-title">
	        <ul class="app-breadcrumb breadcrumb side">
	          	<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	          	<li class="breadcrumb-item"><?php echo e(__('item.sale')); ?></li>
	          	<li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.sale_detail_report')); ?></a></li>
	        </ul>
      	</div>
		<div class="row">
        	<div class="col-md-12">
				<?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          		<div class="tile">
            		<div class="tile-body bg-white rounded overflow_hidden p-4">
						<div class="rows">
							<form action="<?php echo e(url('sale_detail_report')); ?>" method="get" class="form-inline" id="frmSubmit">
								<div class="col-md-6 col-lg-3">
									<?php echo e(Form::text('start_date', $start_date ?? '', ['class' => 'width-100 form-control demoDate', 'autocomplete' => 'off', 'placeholder' => Lang::get('item.start_date')])); ?>

								</div>
								<div class="col-md-6 col-lg-3">
									<?php echo e(Form::text('end_date', $end_date ?? '', ['class' => 'width-100 form-control demoDate', 'autocomplete' => 'off', 'placeholder' => Lang::get('item.end_date')])); ?>

								</div>
								<div class="col-md-6 col-lg-3">
									<select class="form-control width-100" name="filter_status" onchange="this.form.submit()">
										<option value="">All</option>
										<option value="sold" <?php echo e(isset($_GET['filter_status']) && $_GET['filter_status'] == 'sold'?"selected":""); ?>>Sold</option>
										<option value="completed" <?php echo e(isset($_GET['filter_status']) && $_GET['filter_status'] == 'completed'?"selected":""); ?>>Completed</option>
										<option value="cancel" <?php echo e(isset($_GET['filter_status']) && $_GET['filter_status'] == 'cancel'?"selected":""); ?>>Cancel</option>
									</select>
								</div>
								<div class="col-md-6 col-lg-3">
									<div class="form-group">
										<?php echo e(Form::text('search', $request->search,['class' => 'width-100 form-control search', 'placeholder'=>__('item.search')])); ?>

									</div>
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
							</form>
						</div><br>
						<div class="row">
							<div class="col-sm-12">
								<button class="btn btn-small btn-success pull-right" id="btn_print" type=""><?php echo e(__('item.print')); ?></button>
							</div>
							
						</div>
						<div id="table_print">
						
							<div style="margin-left: 150px;"><img src="<?php echo e(Setting::get('LOGO')); ?>" style="height:150px;margin-bottom: 20px;"></div>
							<center>
								<div style="font-family: Khmer OS Muol light;font-size:20px;margin-top:-150px">ក្រុមហ៊ុន រដ្ឋ ស៊ីង អចលនទ្រព្យ</div>
								<div style="font-family: Khmer OS Muol light;font-size:20px;font-weight:bold">RothSing Real Estate Co,ltd</div>
							</center>	
						<div class="row mt-4">
							<div class="col-md-12 text-center">
								<h3 style="text-transform: uppercase;font-size:16px"><?php echo e(__('item.sale_detail_report')); ?></h3>
							</div>
						</div>
						
						<br>
						<div class="table-responsive">
							<table class="table table-hover table-bordered">
				                <thead>
								<tr>
								
								</tr>
				                  	<tr>
					                    <th width="70" class="text-center">លេខរៀង</th>
					                    <th class="text-center">ថ្ងៃខែឆ្នាំ​ បញ្ចាំ</th>
										<th class="text-center">ឈ្មោះអតិថិជន</th>
										<th class="text-center">អាយុ</th>
										<th class="text-center">លេខអត្តសញ្ញាណប័ណ្ណ</th>
										<th class="text-center">លេខទូរស័ព្ទ</th>
					                    <th class="text-center">លេខផ្ទះ</th>
										<th class="text-center">ឈ្មោះអចលនទ្រព្យ</th>
										<th class="text-center">តម្លៃលក់សរុប</th>
					                    <th class="text-center">ប្រាក់ដែលបានកក់</th>
					                    
					                    <th class="text-center">ប្រាក់ដែលនៅសល់</th>
					                    <th class="text-center">បង់លើកទី</th>
					                    
					                    <th class="text-center">ផ្សេងៗ</th>
				                  	</tr>
				                </thead>
		                		<tbody>
		                			<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>						
										<?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if(!empty($item['total_paid'])): ?>
											<tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td colspan="10"></td>
												<td>សរុបប្រាក់ដែលបានបង់</td>
												<td class="text-right"><?php echo e($item['total_paid']); ?></td>
												<td></td>
												
											</tr>
											<?php elseif(!empty($item['total_outstanding_amount'])): ?>
											<tr>
												<td colspan="7"></td>
												<td >សរុបប្រាក់ដើមដែលនៅសល់</td>
												<td class="text-right"><?php echo e($item['total_outstanding_amount']); ?></td>
												<td></td>
												
												
											</tr>
											<tr><td colspan="13">&nbsp;</td></tr>
											<?php else: ?>
											<tr>
											
											</tr>
											<tr>
												<td><?php echo e($item['no']); ?></td>
												<td><?php echo e($item['sale_date']); ?></td>
												<td><?php echo e($item['customer_name']); ?></td>
												<td><?php echo e($item['ag']); ?></td>
												<td><?php echo e($item['identity']); ?></td>
												<td><?php echo e($item['phone']); ?></td>
												<td><?php echo e($item['property_number']); ?></td>
												<td><?php echo e($item['property_name']); ?></td>
												
												<td class="text-right"><?php echo e($item['total_sale_amount']); ?></td>
												<td class="text-right"><?php echo e($item['deposit']); ?></td>
												
												<td></td>
												<td class="text-center"><?php echo e($item['payment_order']); ?></td>
												
												<td></td>
											</tr>
											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php if(!empty($data_total)): ?>
									<tr>
										<td colspan="7"></td>
										<td style="font-weight: bold;">សរុបឡូត៌</td>
										<td><?php echo e($data_total['total_qty']); ?></td>
										<td></td>
										<td style="font-weight: bold">សរុបប្រាក់ដែលបានលក់ទាំងអស់</td>
										<td class="text-right">$<?php echo e(number_format($data_total['total_price'],2)); ?></td>
										<td></td>
										
									</tr>
									<tr>
										<td colspan="10"></td>
										<td style="font-weight: bold">សរុបប្រាក់ដែលបានបង់ទាំងអស់</td>
										<td class="text-right">$<?php echo e(number_format($data_total['total_paid'],2)); ?></td>
										<td></td>
										
									</tr>
									<tr>
										<td colspan="10"></td>
										<td style="font-weight: bold">សរុបប្រាក់ដើមដែលនៅសល់ទាំងអស់</td>
										<td class="text-right">$<?php echo e(number_format($data_total['total_outstanding_amount'],2)); ?></td>
										<td></td>
										
									</tr>
									<?php endif; ?>
				                </tbody>
		              		</table>
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
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>