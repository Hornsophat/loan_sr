<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><?php echo e(__('item.property')); ?></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.add_property')); ?></a></li>
            </ul>
        </div>

        <div class="tile">
            <div class="tile-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <h3><?php echo e(__('item.add_property')); ?></h3><hr/>
                            <div class="error display_message"></div><br/>
                            <div class="panel-body">
                                <?php if(Session::has('message')): ?>
                                    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                                <?php endif; ?>
                                <?php echo Html::ul($errors->all()); ?>


                                <?php echo Form::open(array('url' => 'property/create' , 'files' => true)); ?>


                                <div class="row">
                                    <div class="col-lg-6 form-group"  style="font-family: 'Times New Roman', Times, serif">
                                        <?php echo Form::label('project', trans('item.project_name'))."<span class='star'> *</span>"; ?>

                                        <?php echo e(Form::select('project', $projects ?? [], $item->project_id ?? '', ['class' => 'form-control project_id', 'required'])); ?>

                                        
                                    </div>

                                    <div class="col-lg-6 form-group"  style="font-family: 'Times New Roman', Times, serif">
                                        <?php echo Form::label('project_zone', trans('item.project_zone'))."<span class='star'> *</span>"; ?>

                                        <?php echo e(Form::select('project_zone', [], '', ['id' => 'project_zone', 'class' => 'form-control zone_id', 'disabled', 'required'])); ?>

                                    </div>

                                    <div class="col-lg-6 form-group"  style="font-family: 'Times New Roman', Times, serif">
                                        <?php echo Form::label('property_type', trans('item.property_type'))."<span class='star'> *</span>"; ?>

                                        <select name="property_type" id="property_type" class="form-control" required="true">
                                            <?php $__currentLoopData = $propertytypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $propertytype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($propertytype->id); ?>"><?php echo e($propertytype->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6"> 
                                        <div class="form-group"  style="font-family: 'Times New Roman', Times, serif">
                                             <?php echo Form::label('land_num', trans('item.land_num'))."<span class='star'> </span>"; ?>

                                             <?php echo Form::text('land_num', Input::old('land_num'), array('class' => 'form-control')); ?>

                                            <div class="input-group-append">
                                            <span class="input-group-text" >ម៉ែត្រ</span>
                                        </div>
                                    </div>
                                    </div> 
                                </div>

                                <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group"  style="font-family: Khmer OS System">
                                            <?php echo Form::label('property_name', trans('item.property_name'))."<span class='star'> *</span>"; ?>

                                            <?php echo Form::text('property_name', Input::old('property_name'), array('class' => 'form-control', 'required')); ?>

                                        </div>
                                   </div> 
                                   <div class="col-md-6"> 
                                       <div class="form-group"  style="font-family: 'Times New Roman', Times, serif">
                                            <?php echo Form::label('property_no', trans('item.house_number'))."<span class='star'> *</span>"; ?>

                                            <?php echo Form::text('property_no', Input::old('property_no'), array('class' => 'form-control', 'required')); ?>

                                        </div>
                                   </div> 
                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mt-2"> 
                                       <div class="input-group"  style="font-family: 'Times New Roman', Times, serif">
                                            <?php echo Form::label('price', trans('item.price'), array('style'=>'width:100%;')); ?>

                                            <?php echo Form::text('price', null, array('class' => 'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

                                            <div class="input-group-append">
                                                <span class="input-group-text" >$</span>
                                            </div>
                                            <?php if($errors->has('price')): ?>
                                                <span class="help-block text-danger" style="width: 100%;">
                                                    <strong><?php echo e($errors->first('price')); ?></strong>
                                                </span> 
                                            <?php endif; ?>
                                        </div>
                                   </div>
                                   
                                </div>

                                
                                <div class="row">
                                    <div class="col-md-12 mt-2">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <?php echo Form::label('address_zip_code', trans('បណ្តោយដី (m)')); ?>

                                        <?php echo Form::text('address_zip_code', Input::old('address_zip_code'), array('class' => 'form-control')); ?>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group mt-2"  style="font-family: 'Times New Roman', Times, serif">
                                        <?php echo Form::label('width', trans('បណ្តោយផ្ទះ').' (m)'); ?>

                                        <?php echo Form::number('width', Input::old('width'), array('class' => 'form-control', 'step'=>'any')); ?>

                                    </div>
                                    <div class="col-lg-6 form-group mt-2">
                                        <?php echo Form::label('length', trans('ទទឹងផ្ទះ').' (m)'); ?>

                                        <?php echo Form::number('length', Input::old('length'), array('class' => 'form-control', 'step'=>'any')); ?>

                                    </div>
                                </div>  
                                    
                                    <br>
                                    <div class="row">   
                                        <div class="col-md-12 mt-2"  style="font-family: 'Times New Roman', Times, serif">
                                            <h5><?php echo e(__('ផលិតផលបន្ថែម')); ?></h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-6"  style="font-family: 'Times New Roman', Times, serif">
                                            <?php echo Form::label('product_first', trans('Product 1')); ?>

                                            <?php echo Form::text('product_first', Input::old('product_first'), array('class' => 'form-control')); ?>

                                        </div>
                                         <div class="col-md-6"  style="font-family: 'Times New Roman', Times, serif">
                                            <?php echo Form::label('product_second', trans('Product 2')); ?>

                                            <?php echo Form::text('product_second', Input::old('product_second'), array('class' => 'form-control')); ?>

                                        </div>
                                         <div class="col-md-6"  style="font-family: 'Times New Roman', Times, serif">
                                            <?php echo Form::label('product_third', trans('Product 3')); ?>

                                            <?php echo Form::text('product_third', Input::old('product_third'), array('class' => 'form-control')); ?>

                                        </div>
                                         <div class="col-md-6"  style="font-family: 'Times New Roman', Times, serif">
                                            <?php echo Form::label('product_four', trans('Product 4')); ?>

                                            <?php echo Form::text('product_four', Input::old('product_four'), array('class' => 'form-control')); ?>

                                        </div>
                                        <div class="col-md-6"  style="font-family: 'Times New Roman', Times, serif">
                                            <?php echo Form::label('product_five', trans('Product 5')); ?>

                                            <?php echo Form::text('product_five', Input::old('product_five'), array('class' => 'form-control')); ?>

                                        </div>
                                </div>        
    
                            <br>            
                            <div class="row">   
                                    <div class="col-md-12 mt-2"  style="font-family: 'Times New Roman', Times, serif">
                                        <h5><?php echo e(__('ព្រំប្រទល់')); ?></h5>
                                        <hr>
                                    </div>
                                    <div class="col-md-6"  style="font-family: 'Times New Roman', Times, serif">
                                        <?php echo Form::label('boundary_north', trans('item.boundary_north')); ?>

                                        <?php echo Form::text('boundary_north', Input::old('boundary_north'), array('class' => 'form-control')); ?>

                                    </div>
                                     <div class="col-md-6"  style="font-family: 'Times New Roman', Times, serif">
                                        <?php echo Form::label('boundary_south', trans('item.boundary_south')); ?>

                                        <?php echo Form::text('boundary_south', Input::old('boundary_south'), array('class' => 'form-control')); ?>

                                    </div>
                                     <div class="col-md-6"  style="font-family: 'Times New Roman', Times, serif">
                                        <?php echo Form::label('boundary_east', trans('item.boundary_east')); ?>

                                        <?php echo Form::text('boundary_east', Input::old('boundary_east'), array('class' => 'form-control')); ?>

                                    </div>
                                     <div class="col-md-6"  style="font-family: 'Times New Roman', Times, serif">
                                        <?php echo Form::label('boundary_west', trans('item.boundary_west')); ?>

                                        <?php echo Form::text('boundary_west', Input::old('boundary_west'), array('class' => 'form-control')); ?>

                                    </div>
                            </div>        


                                    <div class="row">   
                                        <div class="col-md-12 mt-4 "  style="font-family: 'Times New Roman', Times, serif">
                                            <h5><?php echo e(__('ទីតាំង')); ?></h5>
                                            <hr>
                                        </div>
                                        <div class="col-lg-6 form-group"  style="font-family: 'Times New Roman', Times, serif">
                                            <?php echo Form::label('address_street', trans('item.address_street')); ?>

                                            <?php echo Form::text('address_street', Input::old('address_street'), array('class' => 'form-control')); ?>

                                        </div>
                                        <div class="col-lg-6 form-group"  style="font-family: 'Times New Roman', Times, serif">
                                            <?php echo Form::label('address_number', trans('item.address_number')); ?>

                                            <?php echo Form::text('address_number', Input::old('address_number'), array('class' => 'form-control')); ?>

                                        </div>
    
                                        <div class="col-md-6"  style="font-family:Khmer OS System;"​​​ >
                                            <?php echo Form::label('village', trans('item.village')); ?>

                                            <?php echo Form::text('village', Input::old('village'), array('class' => 'form-control')); ?>

                                        </div>
                                         <div class="col-md-6"  style="font-family:Khmer OS System;"​​​ >
                                            <?php echo Form::label('commune', trans('item.commune')); ?>

                                            <?php echo Form::text('commune', Input::old('commune'), array('class' => 'form-control')); ?>

                                        </div>
                                         <div class="col-md-6"  style="font-family:Khmer OS System;"​​​ >
                                            <?php echo Form::label('district', trans('item.district')); ?>

                                            <?php echo Form::text('district', Input::old('district'), array('class' => 'form-control')); ?>

                                        </div>
                                         <div class="col-md-6"  style="font-family:Khmer OS System;"​​​ >
                                            <?php echo Form::label('province', trans('item.province')); ?>

                                            <?php echo Form::text('province', Input::old('province'), array('class' => 'form-control')); ?>

                                        </div> 
                                </div>

                                <div class="row" id="aboutContent">
                                    <div class="col-md-10 mt-4">
                                        <h5><?php echo e(__('item.abouts')); ?> &emsp;<button type="button" class="btn btn-sm btn-primary" id="btnAddAbout"><i class="fa fa-plus"></i></button></h5>
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <?php echo Form::label('about[]', trans('item.about')); ?> <span class="btn btn-sm btn-outline-danger btn-remove-about"><i class="fa fa-close"></i></span>
                                        <?php echo Form::text('about[]', Input::old('about[]'), array('class' => 'form-control')); ?>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 form-group">
                                        <?php echo Form::label('bed_room', trans('item.bedroom')); ?>

                                        <?php echo Form::number('bed_room', Input::old('bed_room'), array('class' => 'form-control')); ?>

                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <?php echo Form::label('bath_room', trans('item.bathroom')); ?>

                                        <?php echo Form::number('bath_room', Input::old('bath_room'), array('class' => 'form-control')); ?>

                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <?php echo Form::label('other_room', trans('item.other_room')); ?>

                                        <?php echo Form::number('other_room', Input::old('other_room'), array('class' => 'form-control')); ?>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 form-group">
                                        <div class="checkbox">
                                            <label><input name="has_elevator" id="has_elevator" value="1" type="checkbox"> <?php echo e(trans('item.elevator')); ?></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <div class="checkbox">
                                            <label><input name="has_basement" id="has_basement" type="checkbox" value="1"> <?php echo e(trans('item.basement')); ?></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <div class="checkbox">
                                            <label><input name="has_swimming_pool" id="has_elevator" type="checkbox" value="1"> <?php echo e(trans('item.swimming_pool')); ?></label>
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                    <div class="col-lg-3 form-group">
                                        <?php echo Form::label('habitable_surface', trans('item.habitable_surface')); ?>

                                        <?php echo Form::number('habitable_surface', Input::old('habitable_surface'), array('class' => 'form-control', 'step'=>'any')); ?>

                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <?php echo Form::label('living_room_surface', trans('item.living_room_surface')); ?>

                                        <?php echo Form::number('living_room_surface', Input::old('living_room_surface'), array('class' => 'form-control', 'step'=>'any')); ?>

                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <?php echo Form::label('built_up_surface', trans('item.built_up_surface')); ?>

                                        <?php echo Form::number('built_up_surface', Input::old('built_up_surface'), array('class' => 'form-control', 'step'=>'any')); ?>

                                    </div>

                                    <div class="col-lg-3 form-group">
                                        <?php echo Form::label('year_of_construction', trans('item.year_of_construction')); ?>

                                        <?php echo Form::number('year_of_construction', Input::old('year_of_construction'), array('class' => 'form-control')); ?>

                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <?php echo Form::label('year_of_renovation', trans('item.year_of_renovation')); ?>

                                        <?php echo Form::number('year_of_renovation', Input::old('year_of_renovation'), array('class' => 'form-control')); ?>

                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <?php echo Form::label('floor_number', trans('item.floor_number')); ?>

                                        <?php echo Form::number('floor_number', Input::old('floor_number'), array('class' => 'form-control')); ?>

                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <?php echo Form::label('total_number_of_floors_building', trans('item.total_number_of_floors_building')); ?>

                                        <?php echo Form::number('total_number_of_floors_building', Input::old('total_number_of_floors_building'), array('class' => 'form-control')); ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('item.property_image')); ?>(Multiple)</label>
                                    <input class="form-control" id="images" name="images[]" type="file" multiple accept="image/x-png,image/bmp,image/jpeg">
                                </div>

                                
                                <div class="col-lg-12 form-group align-items-center">
                                    <div class="map" style="height: 400px !important;" id="map_in"></div>
                                    <div style="text-align:center; margin-top: 15px;">
                                        <input class="btn btn-danger" id="clear_shapes" value="<?php echo e(__('item.clear_map')); ?>" type="button"  />
                                        <input type="hidden" class="btn btn-primary" id="save_raw" type="button" />
                                        <input type="hidden" id="restore" value="restore(IO.OUT(array,map))"         type="button" />
                                        <input type="hidden" name="map_data" id="data" value="" style="width:100%" readonly/>
                                    </div>
                                </div>
                                <?php echo Form::submit(trans('item.submit'), array('class' => 'btn btn-primary pull-right', 'id' => 'property_submit')); ?>


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
    <script src="<?php echo e(URL::asset('back-end/js/map.selector.js')); ?>"></script>
    <script type="text/javascript">
        $(document).on('click', '#btnAddAbout', function(){
            var text = `<div class="col-md-12">`;
                text +=     `<?php echo Form::label('about[]', trans('item.about')); ?> <span class="btn btn-sm btn-outline-danger btn-remove-about"><i class="fa fa-close"></i></span>`;
                text +=     `<?php echo Form::text('about[]', Input::old('about[]'), array('class' => 'form-control')); ?>`;
                text +=`</div>`;
            $('#aboutContent').append(text);
        });
        $(document).on('click', 'body .btn-remove-about', function(){
            $(this).parent('div').remove();
        });
        $(document).ready(function() {
            $("#property_submit").click(function(event){
                $("#save_raw").trigger("click");
            });

            $('.project_id').on('change', function() {
                if(this.value == '') {
                    $(".display_message").html("Please select a valid project!");
                   return false;
                }
                $(".display_message").html("");

                var url = "<?php echo e(url('property/get-zone-ajax/')); ?>" + '/' + this.value;
                $.ajax({
                    url: url, 
                    success: function(result){
                        if(result.status && result.data != null) {
                            $('.zone_id').removeAttr("disabled");
                            var html_zone = "<option value=''>-- Select --</option>";
                            $.each(result.data.zones, function (key, val) {
                                html_zone += "<option value='"+ key +"'>" + val + "</option>";
                            });
                            $('.zone_id').html(html_zone);
                        }
                    }
                });
            });
        });
        $('#width, #length').on('input',function(){
            $('#ground_surface').val($('#width').val()*$('#length').val())
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>