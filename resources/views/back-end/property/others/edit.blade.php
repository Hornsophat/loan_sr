@extends('back-end/master')
@section('style')

@stop
@section('content')
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">{{ __('item.property') }}</li>
                <li class="breadcrumb-item active"><a href="#">{{ __('item.edit_other') }}</a></li>
            </ul>
        </div>
        <div class="tile">
            <div class="tile-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <h3>{{ __('item.edit_other') }}</h3><hr/>
                            <div class="error display_message"></div><br/>
                            <div class="panel-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                                @endif
                                {!! Html::ul($errors->all()) !!}

                                {!! Form::open(array('url' => 'property/others/'.$item->id.'/edit', 'files' => true)) !!}

                                <div class="row">
                                    <div class="col-lg-4 form-group">
                                        {!! Form::label('project', trans('item.vehicle_type'))."<span class='star'> *</span>" !!}
                                        {{ Form::select('project', $projects ?? [], $item->project_id ?? '', ['class' => 'form-control project_id', 'required'])}}
                                        
                                    </div>

                                    <div class="col-lg-4 form-group">
                                        {!! Form::label('vehicle_name', trans('item.vehicle_quality'))."<span class='star'> *</span>" !!}
                                        {{ Form::select('project_zone', $project_zones ?? [], $item->item_zone ?? '', ['id' => 'project_zone', 'class' => 'form-control zone_id'])}}
                                    </div>

                                    <div class="col-lg-4 form-group" style = "display:none;"> 
                                        {!! Form::label('property_type', trans('item.property_type'))."<span class='star'> *</span>" !!}
                                        <select name="property_type" id="property_type" class="form-control" required="true">
                                            @foreach($propertytypes as $propertytype)
                                                <option value="{{ $propertytype->id }}">{{ $propertytype->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group">
                                            {!! Form::label('property_name', trans('item.property_name'))."<span class='star'> *</span>" !!}
                                            {!! Form::text('property_name', $item->property_name, array('class' => 'form-control', 'required')) !!}
                                        </div>
                                   </div> 
                                   <div class="col-md-6"> 
                                       <div class="form-group">
                                            {!! Form::label('property_no', trans('item.property_no'))."<span class='star'> *</span>" !!}
                                            {!! Form::text('property_no', $item->property_no, array('class' => 'form-control', 'required')) !!}
                                        </div>
                                   </div> 
                                </div>
                                <div class="row">
                                    <div class="col-md-6"> 
                                       <div class="input-group">
                                            {!! Form::label('price', trans('item.price'), array('style'=>'width:100%;')) !!}
                                            {!! Form::text('price', $item->property_price, array('class' => 'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")) !!}
                                            <div class="input-group-append">
                                                <span class="input-group-text" >$</span>
                                            </div>
                                            @if ($errors->has('price'))
                                                <span class="help-block text-danger" style="width: 100%;">
                                                    <strong>{{ $errors->first('price') }}</strong>
                                                </span> 
                                            @endif
                                        </div>
                                   </div>
                                   <div class="col-md-6"> 
                                       <div class="input-group">
                                            {!! Form::label('discount_amount', trans('item.discount'), array('style'=>'width:100%;')) !!}
                                            {!! Form::text('discount_amount', $item->property_discount_amount, array('class' => 'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")) !!}
                                            <div class="input-group-append">
                                                <span class="input-group-text" >$</span>
                                            </div>
                                            @if ($errors->has('discount_amount'))
                                                <span class="help-block text-danger" style="width: 100%;">
                                                    <strong>{{ $errors->first('discount_amount') }}</strong>
                                                </span> 
                                            @endif
                                        </div>
                                   </div>
                                  
                                  
                                </div>
                                <br>
                                <div class="row">
                                <div class="col-md-6"> 
                                       <div class="input-group">
                                            {!! Form::label('brand', trans('item.brand'), array('style'=>'width:100%;')) !!}
                                            {!! Form::text('nb_machine', $item->nb_machine, array('class' => 'form-control', 'required')) !!}
                                            <div class="input-group-append">
                                                <span class="input-group-text" >Text</span>
                                            </div>
                                            @if ($errors->has('brand'))
                                                <span class="help-block text-danger" style="width: 100%;">
                                                    <strong>{{ $errors->first('brand') }}</strong>
                                                </span> 
                                            @endif
                                        </div>
                                   </div>
                                   <div class="col-md-6"> 
                                   <div class="input-group">
                                            {!! Form::label('vehicle_quantity', trans('item.vehicle_quantity'), array('style'=>'width:100%;')) !!}
                                            {!! Form::text('vehicle_quantity', $item->vehicle_quantity, array('class' => 'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');")) !!}
                                            <div class="input-group-append">
                                                <span class="input-group-text" >$</span>
                                            </div>
                                            @if ($errors->has('vehicle_quantity'))
                                                <span class="help-block text-danger" style="width: 100%;">
                                                    <strong>{{ $errors->first('vehicle_quantity') }}</strong>
                                                </span> 
                                            @endif
                                        </div>
                                   </div>
                                   <br>
                                   <div class="col-lg-6  align-items-center{{ $errors->has('vehicle_date') ? ' has-error' : '' }}">
                                        <label for="fax" class="control-label col-lg-3 p-0">{{ __('item.vehicle_date') }} : </label>
                                        <div class="col-lg-9 p-0">
                                            <input type="date" name="vehicle_date" class="form-control dateISO" value="<?php echo $item->vehicle_date;?>">
                                            @if ($errors->has('dob'))
                                                <span class="help-block text-danger">
                                                    <strong>{{ $errors->first('vehicle_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                   <div class="col-md-6"> 
                                       <div class="input-group">
                                            {!! Form::label('vehicle_color', trans('item.vehicle_color'), array('style'=>'width:100%;')) !!}
                                            {!! Form::text('vehicle_color', $item->vehicle_color, array('class' => 'form-control', 'required')) !!}
                                            <div class="input-group-append">
                                                <span class="input-group-text" >$</span>
                                            </div>
                                            @if ($errors->has('vehicle_color'))
                                                <span class="help-block text-danger" style="width: 100%;">
                                                    <strong>{{ $errors->first('vehicle_color') }}</strong>
                                                </span> 
                                            @endif
                                        </div>
                                   </div>
                                </div>
                                <br>
                               
                                <div class="row" id="aboutContent" style = "display:none;">
                                    <div class="col-md-12 mt-2">
                                        <h5>{{ __('item.abouts') }} &emsp;<button type="button" class="btn btn-sm btn-primary" id="btnAddAbout"><i class="fa fa-plus"></i></button></h5>
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        {!! Form::label('about[]', trans('item.about')) !!} <span class="btn btn-sm btn-outline-danger btn-remove-about"><i class="fa fa-close"></i></span>
                                        {!! Form::text('about[]', Input::old('about[]'), array('class' => 'form-control')) !!}
                                    </div>
                                </div>




                                {!! Form::submit(trans('item.submit'), array('class' => 'btn btn-primary pull-right', 'id' => 'property_submit')) !!}

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection

@section('script')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ GOOGLE_MAP_API_KEY }}&libraries=drawing"></script>
    <script src="{{URL::asset('back-end/js/map.selector.js')}}"></script>
    <script type="text/javascript">
        $(document).on('click', '#btnAddAbout', function(){
            var text = `<div class="col-md-12">`;
                text +=     `{!! Form::label('about[]', trans('item.about')) !!} <span class="btn btn-sm btn-outline-danger btn-remove-about"><i class="fa fa-close"></i></span>`;
                text +=     `{!! Form::text('about[]', Input::old('about[]'), array('class' => 'form-control')) !!}`;
                text +=`</div>`;
            $('#aboutContent').append(text);
        });
        $(document).on('click', 'body .btn-remove-about', function(){
            $(this).parent('div').remove();
        });
        $(document).ready(function() {
            $("#property_submit").click(function(event){
                if(!$("#data").hasClass("default-data") || $("#data").val() == "[]") {
                    $("#save_raw").trigger("click");
                }
            });

            setTimeout(function(){
                $("#restore").trigger("click");
            }, 1000)

            var isMapData = {{ ($item->map_data != "" && $item->map_data != "[]") ? 1 : 0 }};
            if(!isMapData) {
                $("#map_out, #change_map, #cancel_map").hide();
            } else {
                $("#map_in, #clear_shapes, #cancel_map").hide();
            }

            $(document).on("click", "#change_map", function(){
                $("#data").removeClass("default-data")
                $("#map_out, #change_map").hide();
                $("#map_in, #clear_shapes, #cancel_map").show();
            });

            $(document).on("click", "#cancel_map", function(){
                $("#data").addClass("default-data");
                $("#map_out, #change_map").show();
                $("#map_in, #clear_shapes, #cancel_map").hide();
            });

            $('.project_id').on('change', function() {
                if(this.value == '') {
                    $(".display_message").html("Please select a valid project.");
                    return false;
                }
                $(".display_message").html("");

                var url = "{{url('property/get-zone-ajax/')}}" + '/' + this.value;
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
@stop