<?php
	use App\Helpers\AppHelper;
?>
<style type="text/css" id="stylePrint">
	@font-face{
      font-family: 'Khmer OS Muol Light';
      src: url('<?php echo e(asset('public/back-end/fonts/print-font/KhmerOSmuollight.ttf')); ?>') format("truetype");
   }
   @font-face{
      font-family: 'Khmer OS System';
      src: url('<?php echo e(asset('public/back-end/fonts/print-font/KhmerOSsys.ttf')); ?>') format("truetype");
   }
	div{
		font-family: 'Khmer OS System';
		font-size: 12pt;
	}
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
        	.col-md-6{width: 50%;float: left;}
        	.col-md-12{width: 100%;float:left;}
        	.text-center{text-align: center;}
        	.table-bordered {border: 1px solid #dee2e6;}
			.table{width: 100%;max-width: 100%;margin-bottom: 1rem;background-color: transparent;}
			tr{display: table-row;vertical-align: inherit;border-color: inherit;}
			.table-bordered th, .table-bordered td {border: 1px solid #dee2e6;}
			table{border-collapse: collapse;border-spacing: 0;font-family: 'Khmer OS System';font-size: 12pt;}
			.text-right{text-align: right;}
			.row{padding: 0px;margin: 0px;}
			p{padding: 0px;margin: 0px;}
			div{font-family: 'Khmer OS System';font-size: 12pt;}
    	}
    }
</style>
		<div class="row">
        	<div class="col-md-12">
				<?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
       		<div class="tile">
         		<div class="tile-body bg-white rounded overflow_hidden p-0">						
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<button class="btn btn-small btn-success pull-right" id="btn_print" type=""><i class="fa fa-print" aria-hidden="true"></i><?php echo e(__('item.print')); ?></button>
								</div>								
							</div>
						</div>
						<hr>
						<div id="table_print">
							<div class="text-success display_message text-center"></div><br>
							<div class="row">
								<div class="col-md-12 text-center">
									<span style="font-family: Khmer OS Muol Light; font-size: 20px;">???????????????????????????????????????????????????</span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<img src="<?php echo e(Setting::get('LOGO')); ?>" style="height: 50px;margin-bottom: 20px;">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 col-md-6">									
									<p>????????????????????? : <?php echo e($customer->last_name.' '.$customer->first_name); ?></p>
									<p>???????????????????????? : <?php echo e($customer->phone1.' '.$customer->phone2); ?></p>
									<p>??????????????????????????? : <?php echo e(isset($customer->eVillage->village_namekh)?$customer->eVillage->village_namekh:"".', '.isset($customer->eCommune->commune_namekh)?$customer->eCommune->commune_namekh:"".', '.isset($customer->eDistrict->district_namekh)?$customer->eDistrict->district_namekh:"".', '.isset($customer->eProvince->province_kh_name)?$customer->eProvince->province_kh_name:""); ?></p>
								</div>
								<div class="col-sm-6 col-md-6">
									<div style="position:relative;left: 50%;">
										<p>?????????????????????????????? : <?php echo e($sale_item->property_name); ?></p>
										<p>????????????????????????????????? : $<?php echo e(number_format($loan->loan_amount,2)); ?></p>
										
										
										<br>
									</div>									
								</div>								
							</div>
							<br>
							<table class="table table-hover table-bordered">
			               <thead>
		                  	<tr>
			                    	<th width="100" class="text-center"><?php echo e(__('item.no')); ?></th>
			                    	<th class="text-center"><?php echo e(__('????????????-??????-?????????????????? ???????????????????????????')); ?></th>
										<th class="text-center"><?php echo e(__('??????????????????????????????????????????')); ?></th>
			                    	<th class="text-center"><?php echo e(__('????????????-??????-?????????????????? ??????????????????????????????????????????????????????')); ?></th>
			                    	<th class="text-center"><?php echo e(__('??????????????????????????????')); ?></th>
			                    	<th class="text-center"><?php echo e(__('??????????????????')); ?></th>
		                  	</tr>
			               </thead>
	                		<tbody>
	                			<?php $__currentLoopData = $payment_schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                	<tr>
					                 <td class="text-center"><?php echo e($loop->iteration); ?></td>
					                 <td class="text-center"><?php echo e(AppHelper::khMultipleNumber(date('d', strtotime($pay->payment_date))).'-'.AppHelper::khMonth(date('m', strtotime($pay->payment_date))).'-'.AppHelper::khMultipleNumber(date('Y', strtotime($pay->payment_date)))); ?></td>
									<td class="text-center">$<?php echo e(number_format($pay->amount_to_spend,2)); ?></td>
									<?php if(!empty($pay->actual_payment_date)): ?>
									<td class="text-center">
										<?php echo e(AppHelper::khMultipleNumber(date('d', strtotime($pay->actual_payment_date))).'-'.AppHelper::khMonth(date('m', strtotime($pay->actual_payment_date))).'-'.AppHelper::khMultipleNumber(date('Y', strtotime($pay->actual_payment_date)))); ?>

									</td>
									<td class="text-center">$<?php echo e(number_format($pay->paid,2)); ?></td>
									<?php else: ?>
									<td></td><td></td>
									<?php endif; ?>
					                 <td class="text-center"></td>
				                </tr>
				                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			               </tbody>
		              	</table>
	              	</div>
            	</div>
       		</div>
        	</div>
      </div> 


<script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script type="text/javascript" src="https://pratikborsadiya.in/vali-admin/js/plugins/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="https://pratikborsadiya.in/vali-admin/js/plugins/bootstrap-datepicker.min.js">
<script type="text/javascript" src="<?php echo e(asset('js/printThis.js')); ?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#btn_cancel').click(function(){
			window.history.back();
		});
		var styleP = $('#stylePrint').text();
     	$('#btn_print').click(function(){
         var t = window.open();
         t.document.write("<style>"+styleP+" table tr td{font-size:11px !important}</style>");
         t.document.write($('#table_print').html());
         t.print();
         t.close();
     	});
    });
</script>