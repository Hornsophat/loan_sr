@extends('back-end/master')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('back-end/css/bootstrap-fileinput-4.4.7.css')}}">
@stop
@section('content')
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">{{ __('item.project_zone') }}</li>
                <li class="breadcrumb-item active"><a href="#">{{ __('item.edit_project_zone') }}</a></li>
            </ul>
        </div>
        <div class="tile">
            <div class="tile-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <h3>{{ __('item.edit_zone') }}</h3><hr/>
                            <div class="panel-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                                @endif
                                {!! Html::ul($errors->all()) !!}

                                {!! Form::open(array('url' => 'projectzone/'.$item->id.'/edit')) !!}

                                <div class="form-group">
                                    {!! Form::label('zone_name', trans('item.zone_name'))."<span class='star'> *</span>" !!}
                                    {!! Form::text('zone_name', $item->name, array('class' => 'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('zone_code', trans('item.zone_code'))."<span class='star'> *</span>" !!}
                                    {!! Form::text('zone_code', $item->code, array('class' => 'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('project', trans('item.project'))."<span class='star'> *</span>" !!}
                                    <select name="project" id="project" class="form-control">
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}"
                                                @if ($project->id == $item->project_id)
                                                selected="selected"
                                                @endif
                                            >{{ $project->property_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Maps --}}
                                <div class="col-lg-12 form-group align-items-center">
                                    <div class="map" style="height: 300px !important;" id="map_out"></div>
                                    <hr/>
                                    <div class="map" style="height: 300px !important;" id="map_in"></div>
                                    <div style="text-align:center; margin-top: 15px;">
                                        <input class="btn btn-danger" id="clear_shapes" value="{{ __('item.clear_map') }}" type="button"  />
                                        <input class="btn btn-danger" id="cancel_map" value="{{ __('item.cancel_map') }}" type="button"  />
                                        <input class="btn btn-primary" id="change_map" value="{{ __('item.change_map') }}" type="button"  />
                                        <input type="hidden" class="btn btn-primary" id="save_raw" type="button" />
                                        <input type="hidden" name="map_data" class="default-data" id="data" value='{{ $item->map_data }}' style="width:100%" readonly/>
                                        <input type="hidden" id="restore" value="restore(IO.OUT(array,map))" type="button" />
                                    </div>
                                </div>

                                {!! Form::submit(trans('item.submit'), array('class' => 'btn btn-primary pull-right', 'id' => 'land_submit')) !!}

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
        $(document).ready(function() {
            $("#land_submit").click(function(event){
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
        });
    </script>
@stop