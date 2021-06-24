<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><?php echo e(__('item.property')); ?></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.merge_property')); ?></a></li>
            </ul>
        </div>

        <div class="tile">
            <div class="tile-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <h3><?php echo e(__('item.merge_property')); ?></h3><hr/>
                            <div class="error display_message"></div><br/>
                            <div class="panel-body">
                                <?php if(Session::has('message')): ?>
                                    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                                <?php endif; ?>
                                <?php if(Session::has('error-message')): ?>
                                    <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
                                <?php endif; ?>
                                <?php echo Html::ul($errors->all()); ?>


                                <?php echo Form::open(array('route' => array('property_merge') , 'files' => true, 'method' => 'POST')); ?>


                                <div class="row">
                                    <div class="col-lg-4 form-group">
                                        <?php echo Form::label('property', trans('item.property'))."<span class='star'> *</span>"; ?>

                                        <?php echo e(Form::select(null, $properties ?? [], $item->project_id ?? '', ['class' => 'form-control', 'id'=>'boxProperty'])); ?>

                                        <?php echo Form::hidden('merge_properties',null,['id'=>'merge_properties']); ?>

                                    </div>
                                    <div class="col-lg-8 form-group">
                                        <?php echo Form::label('property', trans('item.property'))."<span class='star'> *</span>"; ?>

                                        <?php echo e(Form::text(null, null, ['class' => 'form-control merge-text', 'readonly'])); ?>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 form-group">
                                        <?php echo Form::label('project', trans('item.project_name'))."<span class='star'> *</span>"; ?>

                                        <?php echo e(Form::select('project', $projects ?? [], $item->project_id ?? '', ['class' => 'form-control project_id', 'id'=>'project', 'required'])); ?>

                                    </div>

                                    <div class="col-lg-4 form-group">
                                        <?php echo Form::label('project_zone', trans('item.project_zone'))."<span class='star'> *</span>"; ?>

                                        <?php echo e(Form::select('project_zone', [], '', ['id' => 'project_zone', 'class' => 'form-control zone_id','id'=>'zone', 'required'])); ?>

                                    </div>

                                    <div class="col-lg-4 form-group">
                                        <?php echo Form::label('property_type', trans('item.property_type'))."<span class='star'> *</span>"; ?>

                                        <select name="property_type" id="property_type" class="form-control" required="true">
                                            <?php $__currentLoopData = $propertytypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $propertytype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($propertytype->id); ?>"><?php echo e($propertytype->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group">
                                            <?php echo Form::label('property_name', trans('item.property_name'))."<span class='star'> *</span>"; ?>

                                            <?php echo Form::text('property_name', Input::old('property_name'), array('class' => 'form-control', 'required')); ?>

                                        </div>
                                   </div> 
                                   <div class="col-md-6"> 
                                       <div class="form-group">
                                            <?php echo Form::label('property_no', trans('item.house_number'))."<span class='star'> *</span>"; ?>

                                            <?php echo Form::text('property_no', Input::old('property_no'), array('class' => 'form-control', 'id'=>'property_no', 'required')); ?>

                                        </div>
                                   </div> 
                                </div>
                                <div class="row">
                                    <div class="col-md-6"> 
                                       <div class="input-group">
                                            <?php echo Form::label('price', trans('item.price'), array('style'=>'width:100%;')); ?>

                                            <?php echo Form::text('price', null, array('class' => 'form-control','id'=>'price','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

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
                                   <div class="col-md-6"> 
                                       <div class="input-group">
                                            <?php echo Form::label('discount_amount', trans('item.discount'), array('style'=>'width:100%;')); ?>

                                            <?php echo Form::text('discount_amount', null, array('class' => 'form-control','id'=>'discount_amount','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")); ?>

                                            <div class="input-group-append">
                                                <span class="input-group-text" >$</span>
                                            </div>
                                            <?php if($errors->has('discount_amount')): ?>
                                                <span class="help-block text-danger" style="width: 100%;">
                                                    <strong><?php echo e($errors->first('discount_amount')); ?></strong>
                                                </span> 
                                            <?php endif; ?>
                                        </div>
                                   </div>
                                </div>
                                <div class="row">   
                                    <div class="col-md-12 mt-2"  style="font-family: 'Times New Roman', Times, serif">
                                        <h5><?php echo e(__('ផលិតផលបន្ថែម')); ?></h5>
                                        <hr>
                                    </div>
                                    <div class="col-md-6"  style="font-family: 'Times New Roman', Times, serif">
                                        <?php echo Form::label('product_first', trans('Product')); ?>

                                        <?php echo Form::text('product_first', Input::old('product_first'), array('class' => 'form-control')); ?>

                                    </div>
                                     <div class="col-md-6"  style="font-family: 'Times New Roman', Times, serif">
                                        <?php echo Form::label('product_second', trans('Product')); ?>

                                        <?php echo Form::text('product_second', Input::old('product_second'), array('class' => 'form-control')); ?>

                                    </div>
                                     <div class="col-md-6"  style="font-family: 'Times New Roman', Times, serif">
                                        <?php echo Form::label('product_third', trans('Product')); ?>

                                        <?php echo Form::text('product_third', Input::old('product_third'), array('class' => 'form-control')); ?>

                                    </div>
                                     <div class="col-md-6"  style="font-family: 'Times New Roman', Times, serif">
                                        <?php echo Form::label('product_four', trans('Product ')); ?>

                                        <?php echo Form::text('product_four', Input::old('product_four'), array('class' => 'form-control')); ?>

                                    </div>
                                    <div class="col-md-6"  style="font-family: 'Times New Roman', Times, serif">
                                        <?php echo Form::label('product_five', trans('Product')); ?>

                                        <?php echo Form::text('product_five', Input::old('product_five'), array('class' => 'form-control')); ?>

                                    </div>
                            </div>


                                <div class="row">
                                    <div class="col-md-12 mt-2">
                                        <h5><?php echo e(__('item.boundaries')); ?></h5>
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo Form::label('boundary_north', trans('item.boundary_north')); ?>

                                        <?php echo Form::text('boundary_north', Input::old('boundary_north'), array('class' => 'form-control')); ?>

                                    </div>
                                     <div class="col-md-6">
                                        <?php echo Form::label('boundary_south', trans('item.boundary_south')); ?>

                                        <?php echo Form::text('boundary_south', Input::old('boundary_south'), array('class' => 'form-control')); ?>

                                    </div>
                                     <div class="col-md-6">
                                        <?php echo Form::label('boundary_east', trans('item.boundary_east')); ?>

                                        <?php echo Form::text('boundary_east', Input::old('boundary_east'), array('class' => 'form-control')); ?>

                                    </div>
                                     <div class="col-md-6">
                                        <?php echo Form::label('boundary_west', trans('item.boundary_west')); ?>

                                        <?php echo Form::text('boundary_west', Input::old('boundary_west'), array('class' => 'form-control')); ?>

                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <h5><?php echo e(__('ទីតាំង')); ?></h5>
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo Form::label('village', trans('item.village')); ?>

                                        <?php echo Form::text('village', Input::old('village'), array('class' => 'form-control')); ?>

                                    </div>
                                     <div class="col-md-6">
                                        <?php echo Form::label('commune', trans('item.commune')); ?>

                                        <?php echo Form::text('commune', Input::old('commune'), array('class' => 'form-control')); ?>

                                    </div>
                                     <div class="col-md-6">
                                        <?php echo Form::label('district', trans('item.district')); ?>

                                        <?php echo Form::text('district', Input::old('district'), array('class' => 'form-control')); ?>

                                    </div>
                                     <div class="col-md-6">
                                        <?php echo Form::label('province', trans('item.province')); ?>

                                        <?php echo Form::text('province', Input::old('province'), array('class' => 'form-control')); ?>

                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                </div>

                                <div class="row" id="aboutContent">
                                    <div class="col-md-12 mt-2" style="display: none">
                                        <h5><?php echo e(__('item.abouts')); ?> &emsp;<button type="button" class="btn btn-sm btn-primary" id="btnAddAbout"><i class="fa fa-plus"></i></button></h5>
                                        <hr>
                                    </div>
                                    <div class="col-md-12" id="contentAbout" style="display: none">
                                        <?php echo Form::label('about[]', trans('item.about')); ?> <span class="btn btn-sm btn-outline-danger btn-remove-about"><i class="fa fa-close"></i></span>
                                        <?php echo Form::text('about[]', Input::old('about[]'), array('class' => 'form-control')); ?>

                                    </div>
                                </div>

                                

                                <div class="form-group">
                                    <label><?php echo e(__('item.property_image')); ?>(Multiple)</label>
                                    <input class="form-control" id="images" name="images[]" type="file" multiple accept="image/x-png,image/bmp,image/jpeg">
                                </div>

                                
                                
                                <?php echo Form::submit(trans('item.submit'), array('class' => 'btn btn-primary pull-left', 'id' => 'property_submit')); ?>


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
        $('#boxProperty').select2();
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

        $('#boxProperty').change(function(){
            var property = $('#boxProperty option:selected').val()
            var merge_properties = $('#merge_properties').val();
            var merge_text = $('.merge-text').val();
            var property_no = $('#property_no').val();
            if(!property){
                return false;
            }
            $.ajax({
                method:'get',
                url:"<?php echo e(route('merge_get_property')); ?>",
                data:{property:property, merge_properties:merge_properties, merge_text:merge_text, property_no:property_no},
                success:function(data){
                    $('#boxProperty').html(data.html_property)
                    $('#property_no').val(data.property_no)
                    $('#project').html(data.html_project)
                    $('#zone').html(data.html_zone)
                    $('#property_type').html(data.html_property_type)
                    $('#merge_properties').val(data.merge_properties)
                    $('.merge-text').val(data.merge_text)
                    $('#price').val(data.price)
                    $('#discount_amount').val(data.discount_amount)
                    $('#boundary_east').val(data.boundary_east)
                    $('#boundary_north').val(data.boundary_north)
                    $('#boundary_south').val(data.boundary_south)
                    $('#boundary_west').val(data.boundary_west)
                    $('#village').val(data.village)
                    $('#commune').val(data.commune)
                    $('#district').val(data.district)
                    $('#province').val(data.province)
                    $('#contentAbout').html(data.content_about)
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>