<?php $__env->startSection('title',"Property Report"); ?>
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
	          	<li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.property_report')); ?></a></li>
	        </ul>
      	</div>
		<div class="row">
        	<div class="col-md-12">
				<?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          		<div class="tile">
            		<div class="tile-body bg-white rounded overflow_hidden p-4">
						<div class="rows">
							<form action="<?php echo e(url('property_report')); ?>" method="get" class="form-inline">
								<div class="col-md-4" style="margin-bottom: 5px;">
									<?php echo e(Form::select('land_id', $land->prepend('Select Land',''), $request->land_id, ['class' => 'form-control width-100','id'=>'land_id'])); ?>

								</div>
								<div class="col-md-4 projects" style="margin-bottom: 5px;">
									<?php echo Form::select('project_id',$project->prepend('Select Project',''),$request->project_id,['style'=>'width:100%;','class'=>'form-control width-100']); ?>

								</div>
								<div class="col-md-4 zones" style="margin-bottom: 5px;">
									<?php echo Form::select('zone_id',$zone->prepend('Select Zone',''),$request->zone_id,['style'=>'width:100%;','class'=>'form-control width-100']); ?>

								</div>
								<div class="col-md-12">
									<button class="btn btn-small btn-primary pull-right" type="submit"><?php echo e(__('item.filter')); ?></button>
								</div>
							</form>
							<br>
							<div class="col-sm-12">
								<button class="btn btn-small btn-success pull-right" id="btn_print" type=""><?php echo e(__('item.print')); ?></button>
							</div>
						</div><br>
						<div id="table_print">
							<div class="text-success display_message text-center"></div><br>
							<div style="margin-left: 150px;"><img src="<?php echo e(Setting::get('LOGO')); ?>" style="height:150px;margin-bottom: 20px;"></div>
							<center>
								<div style="font-family: Khmer OS Muol light;font-size:20px;margin-top:-150px">ក្រុមហ៊ុន រដ្ឋ ស៊ីង អចលនទ្រព្យ</div>
								<div style="font-family: Khmer OS Muol light;font-size:20px;font-weight:bold">RothSing Real Estate Co,ltd</div>
							</center>	
						<div class="row mt-4">
							<div class="col-md-12 text-center">
								<h3><?php echo e(__('item.property_report')); ?></h3>
							</div>
						</div>
						
						<br>
						<table class="table table-hover table-bordered">
			                <thead>
			                  	<tr>
				                    <th width="70" class="text-center"><?php echo e(__('item.no')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.property_name')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.property_no')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.address_street')); ?></th>
									<th class="text-center"><?php echo e(__('item.year_of_construction')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.type')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.project')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.zone')); ?></th>
				                    <th class="text-center"><?php echo e(__('item.status')); ?></th>
			                  	</tr>
			                </thead>
	                		<tbody>
	                			<?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				                	<tr>
					                    <td class="text-center"><?php echo e(++$key); ?></td>
					                    <td class="text-center"><?php echo e($value->property_name); ?></td>
					                    <td class="text-center"><?php echo e($value->property_no); ?></td>
										<td class="text-center"><?php echo e($value->address_street); ?></td>
										<td class="text-center"><?php echo e($value->year_of_construction); ?></td>
										<td class="text-center"><?php echo e(isset($value->propertyType->name) ? $value->propertyType->name : ""); ?></td>
										<td class="text-center"><?php echo e(!is_null($value->project)?$value->project->property_name:""); ?></td>
										<td class="text-center"><?php echo e(!is_null($value->projectZone)?$value->projectZone->name:""); ?></td>
										<td class="text-center"><?php echo $value->status == 1 ? "Available" : "Sold"; ?></td>
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