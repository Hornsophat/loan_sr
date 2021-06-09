<?php $__env->startSection('title',"Dashboard"); ?>
<?php $__env->startSection('content'); ?>

  <main class="app-content">
    <!-- Title & Breadcrumb -->
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#"><?php echo $__env->yieldContent('title'); ?></a></li>
        </ul>
    </div>
    <!-- End Title & Breadcrumb -->

    <!-- Report -->
    <div class="row">
      <div>
        <a href="<?php echo e(URL::to('projectzone/index')); ?>" class="btn btn-small ">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-globe fa-2x"></i>
          <div class="info">
            <h4><?php echo e(__('item.project_zone')); ?></h4>
            <p><b><?php echo e($projectzones->count()); ?></b></p>
          </div>
        </div>
        </a>
      </div>
        <div>
          <a href="<?php echo e(URL::to('project')); ?>" class="btn btn-small ">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-industry fa-3x"></i>
                <div class="info">
                    <h4><?php echo e(__('item.project')); ?></h4>
                    <p><b><?php echo e($project->count()); ?></b></p>
                </div>
            </div>
          </a>
        </div>

      <div>
        <a href="<?php echo e(URL::to('propertytype')); ?>" class="btn btn-small ">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-home fa-3x"></i>
          <div class="info">
            <h4><?php echo e(__('item.property')); ?></h4>
            <p><b><?php echo e($propertytype->count()); ?></b></p>
          </div>
        </div>
        </a>
      </div>

      <div>   
        <a href="<?php echo e(URL::to('property')); ?>" class="btn btn-small" >
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-university fa-3x"></i>
          <div class="info">
            <h4><?php echo e(__('item.sale')); ?></h4>
            <p><b><?php echo e($property->count()); ?></b></p>
          </div>
        </div>
        </a>
      </div>
    </div>
    <!-- End Report -->
    <?php if($isAdministrator): ?>
    <div class="row">
        <div class="col-md-12">
        <div class="tile">
              <div class="tile-body">

                    
                    <br>
                
                <div class="row">
                     <div class="col-md-12" style="overflow: auto;">
                        <div class="pull-right">
                            
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    <?php endif; ?>
    <div class="row" style = "margin-bottom:20px;">
    <center>
    
      
    <a href="<?php echo e(URL::to('loan_view/eoc')); ?>" class="btn btn-small " style = "margin-left:20px;">
      <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-money fa-3x"></i>
            <div class="info">
              <h4><?php echo e(__('item.loan_type_eoc')); ?></h4>
              <p><b><?php echo e($loan_eoc); ?></b></p>
            </div>
          </div>
        </div>
    </a>

    <a href="<?php echo e(URL::to('loan_view/emi')); ?>" class="btn btn-small " style = "margin-left:20px;">
      <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-money fa-3x"></i>
            <div class="info">
              <h4><?php echo e(__('item.loan_type_emi')); ?></h4>
              <p><b><?php echo e($loan_emi); ?></b></p>
            </div>
          </div>
        </div>
    </a>

    <a href="<?php echo e(URL::to('loan_view/free_interest')); ?>" class="btn btn-small " style = "margin-left:20px;">
      <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-money fa-3x"></i>
            <div class="info">
              <h4><?php echo e(__('item.free_interest')); ?></h4>
              <p><b><?php echo e($loan_free); ?></b></p>
            </div>
          </div>
        </div>
    </a>
    </center>
    </div>
    
  <div class="row">
    <div class="col-md-12">
    <div class="tile">
          <div class="tile-body">

                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><?php echo e(__('item.customer_list_to_pay')); ?></li>
                </ul>
                <br>
            <div class="table-responsive​​​ ">
            <table class="table table-hover table-bordered table-nowrap">
                      <thead>
                          <tr>
                            <th width="70" class="text-center"><?php echo e(__('item.no')); ?></th>
                            <th class="text-center"><?php echo e(__('អតិថិជន')); ?></th>
                            <th class="text-center"><?php echo e(__('item.property')); ?></th>
                            <th class="text-center"><?php echo e(__('item.loan_date')); ?></th>
                            <th class="text-center"><?php echo e(__('item.payment_date')); ?></th>
                            <td class="text-center"><?php echo e(__('item.amount_to_spend')); ?></td>
                            <th class="text-center"><?php echo e(__('item.function')); ?></th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td class="text-center"><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($item->customer_name); ?></td>
                            <td><?php echo e($item->property_name); ?></td>
                            <td class="text-center"><?php echo e($item->loan_date); ?></td>
                            <td class="text-center"><?php echo e($item->payment_date); ?></td>
                            <td>$<?php echo e($item->amount); ?></td>
                            <td class="text-center">
                                <?php if(Auth::user()->can('view-sale') || $isAdministrator): ?>
                                    <a href="<?php echo e(route('sale_property.loan_payment', ['payment_schedule'=>$item->id])); ?>" class="action btn btn-danger btn-sm" title="pay"><i class="fa fa-money"></i> <?php echo e(__('item.payment')); ?></a>
                                <?php endif; ?>
                                
                            </td>
                    </tr>
                     
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
               </table>
            </div>
            <div class="row">
                 <div class="col-md-12" style="overflow: auto;">
                    <div class="pull-right">
                        
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
  </div>
    <!-- Chart -->
    <div class="row">
      <div class="col-md-6">
        <div class="tile">
          <h3 class="tile-title"><?php echo e(__('item.monthly_sale')); ?></h3>
          <div class="embed-responsive embed-responsive-16by9">
            <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="tile">
          <h3 class="tile-title"><?php echo e(__('item.total')); ?> <?php echo e(__('item.sale')); ?>/<?php echo e(__('item.deposit')); ?></h3>
          <div class="embed-responsive embed-responsive-16by9">
            <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
          </div>
        </div>
      </div>
    </div>


    <div class="map" style="height: 500px !important;" id="map_out"></div>
    <div class="map" id="map_in"></div>
    <div style="text-align:center; margin-top: 15px;">
      <input type="hidden" class="btn btn-danger" id="clear_shapes" value="Clear Map" type="button"  />
      <input type="hidden" class="btn btn-primary" id="save_raw" type="button" />
      <input type="hidden" name="map_data" class="default-data" id="data" value='<?php echo e($lat_lon); ?>' style="width:100%" readonly/>
      <input type="hidden" id="restore" value="restore(IO.OUT(array,map))" type="button" />
    </div>
  </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(GOOGLE_MAP_API_KEY); ?>&libraries=drawing"></script>
  <script src="<?php echo e(URL::asset('back-end/js/map.selector.js')); ?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $("#map_out").show();

        setTimeout(function(){
            $("#restore").trigger("click");
        }, 1000);

    });
    var $chars_data =[];
    <?php $__currentLoopData = $output; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         $chars_data.push(<?php echo e($value); ?>);

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      var data = {
        labels: ["<?php echo e(__('month.anuary')); ?>", "<?php echo e(__('month.february')); ?>", "<?php echo e(__('month.march')); ?>", "<?php echo e(__('month.april')); ?>", "<?php echo e(__('month.may')); ?>", "<?php echo e(__('month.june')); ?>", "<?php echo e(__('month.july')); ?>", "<?php echo e(__('month.august')); ?>", "<?php echo e(__('month.september')); ?>", "<?php echo e(__('month.october')); ?>", "<?php echo e(__('month.november')); ?>", "<?php echo e(__('month.december')); ?>"],
        datasets: [
          {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: $chars_data
          }
        ]
      };
      var pdata = [
        {
          value: <?php echo e($total_sale); ?>,
          color: "#46BFBD",
          highlight: "#5AD3D1",
          label: "Sold"
        },
        {
          value: <?php echo e($total_deposit); ?>,
          color:"#F7464A",
          highlight: "#FF5A5E",
          label: "Deposit"
        }
      ] 
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);

      if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
      }

      function approve_cancel_payment(payment_transaction,approve){
            swal({
                title: "Cancel Payment",
                text: "Are you sure you want to approve?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "<?php echo e(__('item.option_yes')); ?>",
                cancelButtonText: "<?php echo e(__('item.option_no')); ?>",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(confirm) {
                if (confirm) {
                    $.ajax({
                        type:'get',
                        url:"<?php echo e(route('sale_property.cancel_loan_payment')); ?>",
                        data:{payment_transaction:payment_transaction, approve:approve},
                        success:function(data){
                            if(data.message==1){
                                swal({
                                    title: 'Successfully Cancel Payment',
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonText: "<?php echo e(__('item.ok')); ?>",
                                    closeOnConfirm: false,
                                    closeOnCancel: true
                                });
                                setTimeout(function(){
                                    location.reload();
                                },2500)
                            }
                            else{
                                swal({
                                    title: 'Failed Cancel Payment',
                                    type: "warning",
                                    showCancelButton: false,
                                    confirmButtonText: "<?php echo e(__('item.ok')); ?>",
                                    closeOnConfirm: false,
                                    closeOnCancel: true
                                });
                            }
                        },
                        error:function(errors){
                            swal({
                                title: 'Failed Cancel Payment',
                                type: "error",
                                showCancelButton: false,
                                confirmButtonText: "<?php echo e(__('item.ok')); ?>",
                                closeOnConfirm: false,
                                closeOnCancel: true
                            });
                        }
                    })
                }else{
                    swal({
                        title: '<?php echo e(__('item.stop')); ?>',
                        type: "error",
                        showCancelButton: false,
                        confirmButtonText: "<?php echo e(__('item.ok')); ?>",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    });
                }
            });
        }

        function cancel_approve_cancel_payment(approve){
            swal({
                title: "Delete! Cancel Payment",
                text: "Are you sure you want to delete this request?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "<?php echo e(__('item.option_yes')); ?>",
                cancelButtonText: "<?php echo e(__('item.option_no')); ?>",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(confirm) {
                if (confirm) {
                    $.ajax({
                        type:'get',
                        url:"<?php echo e(route('sale_property.cancel_approve_cancel_payment')); ?>",
                        data:{approve:approve},
                        success:function(data){
                            if(data.message==1){
                                swal({
                                    title: 'Successfully',
                                    text:'Delete cancel payment',
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonText: "<?php echo e(__('item.ok')); ?>",
                                    closeOnConfirm: false,
                                    closeOnCancel: true
                                });
                                setTimeout(function(){
                                    location.reload();
                                },2500)
                            }
                            else{
                                swal({
                                    title: 'Failed',
                                    text:'Delete Cancel Payment',
                                    type: "warning",
                                    showCancelButton: false,
                                    confirmButtonText: "<?php echo e(__('item.ok')); ?>",
                                    closeOnConfirm: false,
                                    closeOnCancel: true
                                });
                            }
                        },
                        error:function(errors){
                            swal({
                                title: 'Failed',
                                text:'Delete Cancel Payment',
                                type: "error",
                                showCancelButton: false,
                                confirmButtonText: "<?php echo e(__('item.ok')); ?>",
                                closeOnConfirm: false,
                                closeOnCancel: true
                            });
                        }
                    })
                }else{
                    swal({
                        title: '<?php echo e(__('item.stop')); ?>',
                        type: "error",
                        showCancelButton: false,
                        confirmButtonText: "<?php echo e(__('item.ok')); ?>",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    });
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>