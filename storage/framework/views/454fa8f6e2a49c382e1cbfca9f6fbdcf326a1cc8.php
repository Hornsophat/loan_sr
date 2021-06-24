<?php
	use App\Helpers\AppHelper;
?>

<?php $__env->startSection('title',"Expense Report"); ?>
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
	          	<li class="breadcrumb-item"><?php echo e(__('item.report')); ?></li>
	          	<li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.expense_report')); ?></a></li>
	        </ul>
      	</div>
		<div class="row">
        	<div class="col-md-12">
				<?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          		<div class="tile">
            		<div class="tile-body bg-white rounded overflow_hidden p-4">
						<div class="rows">
							<form action="<?php echo e(url('expense_report')); ?>" method="get" id="frmSubmit">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-12" style="margin-bottom: 5px;">
												<span style="font-size: 14px; text-align: left!important;">ចាប់ពីថ្ងៃ</span>
												<?php echo e(Form::text('start_date', $start_date ?? '', ['class' => ' form-control demoDate', 'autocomplete' => 'off', 'placeholder' => 'Start Date'])); ?>

											</div>
											<div class="col-md-12" style="margin-bottom: 5px;">
												<span style="font-size: 14px; text-align: left!important;">ដល់ថ្ងៃ</span>
												<?php echo e(Form::text('end_date', $end_date ?? '', ['class' => ' form-control demoDate', 'autocomplete' => 'off', 'id' => 'dateTO', 'placeholder' => 'End Date'])); ?>

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
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-12" style="margin-bottom: 5px;">
												<span style="font-size: 14px; text-align: left!important;"><?php echo e(__('item.expense_type')); ?></span>
												<?php echo e(Form::select('expense_type', $expense_groups, $request->expense_type, ['class' => 'form-control ','id'=>'group'])); ?>

											</div>
											<div class="col-md-12" style="margin-bottom: 5px;">
												<span style="font-size: 14px; text-align: left!important;"><?php echo e(__('item.project')); ?></span>
												<?php echo e(Form::select('project', $projects, $request->project, ['class' => 'form-control ','id'=>'group'])); ?>

											</div>
											<div class="col-md-12" style="margin-bottom: 5px;">
												<span style="font-size: 14px; text-align: left!important;"><?php echo e(__('item.employee')); ?></span>
												<?php echo e(Form::select('employee', $employees, $request->employee, ['class' => 'form-control ','id'=>'group'])); ?>

											</div>
										</div>
									</div>
									<div class="col-md-12">
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
						<div class="row mt-4">
							<div class="col-md-12 text-center">
								<h3 style="font-size: 19px"><?php echo e(__('item.expense_report')); ?></h3>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<span>ចាប់ពីថ្ងៃ : <?php echo e(date('d-F-Y', strtotime($start_date))); ?> ទៅដល់ថ្ងៃ <?php echo e(date('d-F-Y', strtotime($end_date))); ?></span>
							</div>
						</div>
						<br>
						<div class="table-responsive">
						<table class="table table-hover table-bordered">
			                <thead>
			                  	<tr>
				                    <th width="70" class="text-center"><?php echo e(__('item.no')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.date')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.expense')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.expense_type')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.project')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.employee')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.amount')); ?></th>
			                  	</tr>
			                </thead>
	                		<tbody>
	                			<?php
	                				$total_amount = 0;
	                			?>
	                			<?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                				<?php
	                					$total_amount += $item->amount;
	                				?>
				                	<tr>
					                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
					                    <td class="text-center"><?php echo e(date("d-M-Y", strtotime($item->date))); ?></td>
					                    <td class="text-center"><?php echo e($item->expense_name); ?></td>
					                    <td class="text-center"><?php echo e($item->group_name); ?></td>
					                    <td class="text-center"><?php echo e($item->project_name); ?></td>
					                    <td class="text-center"><?php echo e($item->employee_name); ?></td>
					                    <td class="text-center">$<?php echo e(number_format($item->amount,2)); ?></td>
					                </tr>
				                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				                <tr>
				                	<th colspan="6" style="text-align: right;"><?php echo e(__('item.total')); ?></th>
				                	<th><?php echo e("$ ".number_format($total_amount,2)); ?></th>
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
	$('#project, #group, #employee').select2();
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