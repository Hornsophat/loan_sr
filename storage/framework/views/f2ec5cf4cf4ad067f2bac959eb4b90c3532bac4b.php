<?php $__env->startSection('title',"Land Report"); ?>
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
	          	<li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.land_report')); ?></a></li>
	        </ul>
      	</div>
		<div class="row">
        	<div class="col-md-12">
				<?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          		<div class="tile">
            		<div class="tile-body bg-white rounded overflow_hidden p-4">
						<div class="rows">
							<form action="<?php echo e(url('land_report')); ?>" method="get" class="form-inline">
								<div class="col-md-4">
									
								</div>
								<div class="col-md-4">
									
								</div>
								<div class="col-md-4">
									
									<?php echo Form::text('search',null,['class'=>'width-100 form-control pull-right','placeholder'=> Lang::get('item.search')]); ?>

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
						<div class="row">
							<div class="col-sm-4 col-md-4"><img src="<?php echo e(Setting::get('LOGO')); ?>" style="height: 50px;margin-bottom: 20px;"></div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<h3><?php echo e(__('item.land_report')); ?></h3>
							</div>
						</div>
						
						<br>
						<table class="table table-hover table-bordered">
			                <thead>
			                  	<tr>
				                    <th width="70" class="text-center"><?php echo e(__('item.no')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.land_name')); ?></th>
									<th class="text-center"><?php echo e(__('item.address_street')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.address_number')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.ground_surface')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.total_price')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.owner')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.status')); ?></th>
			                  	</tr>
			                </thead>
	                		<tbody>
	                			<?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                			<?php
	                				$status = "Comeplete";
	                				if($row->status==1){
	                					$status = "Uncomeplete";
	                				}elseif($row->status==2){
	                					$status = "Comeplete";
	                				}
	                			?>
				                	<tr>
					                    <td class="text-center"><?php echo e(++$key); ?></td>
					                    <td class="text-center"><?php echo e($row->property_name); ?></td>
										<td class="text-center"><?php echo e($row->address_street); ?></td>
										<td class="text-center"><?php echo e($row->address_number); ?></td>
					                    <td class="text-center"><?php echo e($row->landOwner->sum("ground_surface")); ?> m<sup>2</sup></td>
										<td class="text-center"><?php echo e("$ ".number_format($row->landOwner->sum("price"),2)); ?></td>
										<td class="text-center"><?php echo e($row->landOwner()->count()); ?></td>
										<td class="text-center"><?php echo e($status); ?></td>
					                </tr>
				               	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                </tbody>
	              		</table>
	              		</div>
						<div class="pull-right">
							
							
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
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>