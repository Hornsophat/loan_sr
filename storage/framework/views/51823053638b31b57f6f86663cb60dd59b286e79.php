<?php $__env->startSection('style'); ?>
    <style type="text/css">
        .table th, .table td{
            padding: 0.30rem!important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><?php echo e(__('item.property')); ?></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.view_property')); ?></a></li>
            </ul>
        </div>
        <div class="tile">
            <div class="tile-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <h3><?php echo e(__('item.property_detail')); ?></h3><hr/>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('item.property_name')); ?></td>
                                                <td><?php echo e($item->property_name); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 200px;"><?php echo e(trans('item.property_no')); ?></td>
                                                <td><?php echo e($item->property_no); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.project_name')); ?></td>
                                                <td><?php echo e($item->project->property_name); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.project_zone')); ?></td>
                                                <td><?php echo e($item->projectZone->name); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.property_type')); ?></td>
                                                <td><?php echo e($item->propertyType->name); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.status')); ?></td>
                                                <td>
                                                    <?php if($item->status==1): ?>
                                                    <?php echo e(__('item.available')); ?>

                                                    <?php elseif($item->status==2): ?>
                                                    <?php echo e(__('item.sold')); ?>

                                                    <?php elseif($item->status==3): ?>
                                                    <?php echo e(__('item.booked')); ?>

                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.price')); ?></td>
                                                <td><?php echo e($item->property_price*1); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.discount')); ?></td>
                                                <td><?php echo e($item->property_discount_amount*1); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.address_street')); ?></td>
                                                <td><?php echo e($item->address_street); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.address_number')); ?></td>
                                                <td><?php echo e($item->address_number); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.zipcode')); ?></td>
                                                <td><?php echo e($item->address_zip_code); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.bedroom')); ?></td>
                                                <td><?php echo e($item->bed_rooms); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.bathroom')); ?></td>
                                                <td><?php echo e($item->bathrooms); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.other_room')); ?></td>
                                                <td><?php echo e($item->other_room); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.elevator')); ?></td>
                                                <td><?php echo e($item->has_elevator == 1 ? 'Yes' : 'No'); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.basement')); ?></td>
                                                <td><?php echo e($item->has_basement == 1 ? 'Yes' : 'No'); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.swimming_pool')); ?></td>
                                                <td><?php echo e($item->has_swimming_pool == 1 ? 'Yes' : 'No'); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.living_room_surface')); ?></td>
                                                <td><?php echo e($item->living_room_surface); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.built_up_surface')); ?></td>
                                                <td><?php echo e($item->built_up_surface); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.habitable_surface')); ?></td>
                                                <td><?php echo e($item->habitable_surface); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.ground_surface')); ?></td>
                                                <td><?php echo e($item->ground_surface); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.year_of_construction')); ?></td>
                                                <td><?php echo e($item->year_of_construction); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.year_of_renovation')); ?></td>
                                                <td><?php echo e($item->year_of_renovation); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.floor_number')); ?></td>
                                                <td><?php echo e($item->floor_number); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(trans('item.total_number_of_floors_building')); ?></td>
                                                <td><?php echo e($item->total_number_of_floors_building); ?></td>
                                            </tr>
                                            <tr>
                                                <th><?php echo e(trans('item.boundaries')); ?></th>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>&emsp;<?php echo e(trans('item.boundary_east')); ?></td>
                                                <td><?php echo e($item->boundary_east); ?></td>
                                            </tr>
                                            <tr>
                                                <td>&emsp;<?php echo e(trans('item.boundary_west')); ?></td>
                                                <td><?php echo e($item->boundary_west); ?></td>
                                            </tr>
                                            <tr>
                                                <td>&emsp;<?php echo e(trans('item.boundary_north')); ?></td>
                                                <td><?php echo e($item->boundary_north); ?></td>
                                            </tr>
                                            <tr>
                                                <td>&emsp;<?php echo e(trans('Product')); ?></td>
                                                <td><?php echo e($item->product_first); ?></td>
                                            </tr>
                                            <tr>
                                                <td>&emsp;<?php echo e(trans('Product')); ?></td>
                                                <td><?php echo e($item->product_second); ?></td>
                                            </tr>
                                            <tr>
                                                <td>&emsp;<?php echo e(trans('Product')); ?></td>
                                                <td><?php echo e($item->product_third); ?></td>
                                            </tr>
                                            <tr>
                                                <td>&emsp;<?php echo e(trans('Product')); ?></td>
                                                <td><?php echo e($item->product_four); ?></td>
                                            </tr>
                                            <tr>
                                                <td>&emsp;<?php echo e(trans('Product')); ?></td>
                                                <td><?php echo e($item->product_five); ?></td>
                                            </tr>
                                            <tr>
                                                <td>&emsp;<?php echo e(trans('item.boundary_south')); ?></td>
                                                <td><?php echo e($item->boundary_south); ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>&emsp;<?php echo e(trans('item.village')); ?></td>
                                                <td><?php echo e($item->village); ?></td>
                                            </tr>
                                            <tr>
                                                <td>&emsp;<?php echo e(trans('item.commune')); ?></td>
                                                <td><?php echo e($item->commune); ?></td>
                                            </tr>
                                            <tr>
                                                <td>&emsp;<?php echo e(trans('item.district')); ?></td>
                                                <td><?php echo e($item->district); ?></td>
                                            </tr>
                                            <tr>
                                                <td>&emsp;<?php echo e(trans('item.province')); ?></td>
                                                <td><?php echo e($item->province); ?></td>
                                            </tr>
                                            <?php if($abouts): ?>
                                            <tr>
                                                <th><?php echo e(trans('item.abouts')); ?></th>
                                                <td></td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td colspan="2">&emsp;<?php echo e($about); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="map" style="height: 500px !important;" id="map_out"></div>
                                        <div class="map" id="map_in"></div>
                                        <div style="text-align:center; margin-top: 15px;">
                                            <input type="hidden" class="btn btn-danger" id="clear_shapes" value="Clear Map" type="button"  />
                                            <input type="hidden" class="btn btn-primary" id="save_raw" type="button" />
                                            <input type="hidden" name="map_data" class="default-data" id="data" value='<?php echo e($item->map_data); ?>' style="width:100%" readonly/>
                                            <input type="hidden" id="restore" value="restore(IO.OUT(array,map))" type="button" />
                                        </div>



                                    </div>
                                </div>
                                <div class="row" >
                                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-2" id="image_<?php echo e($image->id); ?>" style="margin-bottom: 10px;">
                                            <i class="fa fa-remove remove-image" onclick="removeImage(<?php echo e($image->id); ?>)"></i>
                                            <img class="img-thumbnail imagepop" style="height:120px;" src="<?php echo e(asset('public'.$image->path)); ?>">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="row" >
                                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-2" id="image_<?php echo e($image->id); ?>" style="margin-bottom: 10px;">
                                            <i class="fa fa-remove remove-image" onclick="removeImage(<?php echo e($image->id); ?>)"></i>
                                            <img class="img-thumbnail imagepop" style="height:120px;" src="<?php echo e(asset('public'.$image->path)); ?>">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="row" >
                                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-2" id="image_<?php echo e($image->id); ?>" style="margin-bottom: 10px;">
                                            <i class="fa fa-remove remove-image" onclick="removeImage(<?php echo e($image->id); ?>)"></i>
                                            <img class="img-thumbnail imagepop" style="height:120px;" src="<?php echo e(asset('public'.$image->path)); ?>">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>


                                <hr/>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <a class="btn btn-small btn-info" href="<?php echo e(URL::to('property/' . $item->id . '/edit')); ?>"><?php echo e(trans('item.edit')); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    
    <div class="popup-image" style="display: none">
        <i class="fa fa-remove close-popup"></i>
        <img src=""/>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(GOOGLE_MAP_API_KEY); ?>&libraries=drawing"></script>
    <script src="<?php echo e(URL::asset('back-end/js/map.selector.js')); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var isMapData = <?php echo e(($item->map_data != "" && $item->map_data != "[]") ? 1 : 0); ?>;
            if(isMapData) {
                $("#map_out, #change_map, #cancel_map").show();
            }else {
                $("#map_out, #change_map, #cancel_map").hide();
            }

            setTimeout(function(){
                console.log("asdas");
                $("#restore").trigger("click");
            }, 1000);

            /* Image popup */
            $(document).on('click', '.imagepop', function(){
               var src = $(this).attr('src');
               $('.popup-image').fadeIn(350).find("img").attr("src", src);
            });

            /* close popup */
            $(document).on('click', '.popup-image', function(){
                $('.popup-image').fadeOut(250).find("img").attr("src", "");
            });
            $(document).keyup(function(e) {
                if (e.keyCode == 27) { // escape key maps to keycode `27`
                    $('.popup-image').fadeOut(250).find("img").attr("src", "");
                }
            });
        });

        function removeImage(id) {
            if(confirm('Are you sure you want to remove this image?')) {
                $.ajax({
                    url: '<?php echo e(url('/property/delete/image')); ?>/'+id,
                    type: 'GET',
                    success: function(response) {
                        $("#image_"+id).remove();
                    },
                    error: function() {
                        alert("Cannot remove image!")
                    }
                });
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>