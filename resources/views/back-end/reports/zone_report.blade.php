@extends('back-end/master')
@section('title',"Zone Report")
@section('content')
<style type="text/css">
	.width-100 {
		width: 100% !important;
	}
	.m-r-0 {
		margin-right: 0px !important;
	}
	   @media print{
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
	          	<li class="breadcrumb-item">{{ __('item.sale') }}</li>
	          	<li class="breadcrumb-item active"><a href="#">{{ __('item.zone_report') }}</a></li>
	        </ul>
      	</div>
		<div class="row">
        	<div class="col-md-12">
				@include('flash/message')
          		<div class="tile">
            		<div class="tile-body bg-white rounded overflow_hidden p-4">
						<div class="rows">
							<form action="{{ url('zone_report') }}" method="get" class="form-inline">
								<div class="col-md-4">
									{{-- {{ Form::text('start', $start_date ?? '', ['class' => 'width-100 form-control demoDate', 'autocomplete' => 'off', 'placeholder' => 'Start Date']) }} --}}
								</div>
								<div class="col-md-4">
									{{-- {{ Form::text('end', $end_date ?? '', ['class' => 'width-100 form-control demoDate', 'autocomplete' => 'off', 'placeholder' => 'End Date']) }} --}}
								</div>
								<div class="col-md-4">
									{{-- <select class="form-control width-100" name="filter_status" onchange="this.form.submit()">
										<option value="">All</option>
										<option value="1" {{ isset($_GET['filter_status']) && $_GET['filter_status'] == 1?"selected":"" }}>Deposit</option>
										<option value="2" {{ isset($_GET['filter_status']) && $_GET['filter_status'] == 2?"selected":"" }}>Completed</option>
										<option value="3" {{ isset($_GET['filter_status']) && $_GET['filter_status'] == 3?"selected":"" }}>Cancel</option>
									</select> --}}
									{!! Form::text('search',null,['class'=>'width-100 form-control pull-right','placeholder'=> Lang::get('item.search')]) !!}
								</div>
							</form>
							<br>
							<div class="col-sm-12">
								<button class="btn btn-small btn-success pull-right" id="btn_print" type="">{{ __('item.print') }}</button>
							</div>
						</div><br>
						<div id="table_print">
<<<<<<< HEAD
						<div class="text-success display_message text-center"></div><br>
						<div class="row">
							<div class="col-sm-4 col-md-4"><img src="{{Setting::get('LOGO')}}" style="height: 50px;margin-bottom: 20px;"></div>
						</div>
						<div class="row">
=======
							<div class="text-success display_message text-center"></div><br>
							<div style="margin-left: 150px;"><img src="{{Setting::get('LOGO')}}" style="height:150px;margin-bottom: 20px;"></div>
							<center>
								<div style="font-family: Khmer OS Muol light;font-size:20px;margin-top:-150px">??????????????????????????? ???????????? ???????????? ??????????????????????????????</div>
								<div style="font-family: Khmer OS Muol light;font-size:20px;font-weight:bold">RothSing Real Estate Co,ltd</div>
							</center>	
						<div class="row mt-4">
>>>>>>> 873df8ab12f7c93aa53d5fbcf73b57e4942a78cd
							<div class="col-md-12 text-center">
								<h3>{{ __('item.zone_report') }}</h3>
							</div>
						</div>
						{{-- <div class="row">
								<div class="col-sm-4 col-md-4">
									<p>Customer Name : </p>
								
								</div>
								<div class="col-sm-4 col-md-4"></div>
								<div class="col-sm-4 col-md-4">
									<p>Sale No : 000000</p>
									
								</div>
						</div> --}}
						<br>
						<table class="table table-hover table-bordered">
			                <thead>
			                  	<tr>
				                    <th width="70" class="text-center">{{ __('item.no') }}</th>
				                    <th class="text-center">{{ __('item.zone_name') }}</th>
									<th class="text-center">{{ __('item.zone_code') }}</th>
				                    <th class="text-center">{{ __('item.project') }}</th>
			                  	</tr>
			                </thead>
	                		<tbody>
	                			@foreach ($item as $key =>$row)
				                	<tr>
					                    <td class="text-center">{{ ++$key }}</td>
					                    <td class="text-center">{{ $row->name }}</td>
										<td class="text-center">{{ $row->code }}</td>
										<td class="text-center">{{ isset($row->project->property_name)?$row->project->property_name:'Project has bin!' }}</td>
					                </tr>
				               	@endforeach
			                </tbody>
	              		</table>
	              		</div>
						<div class="pull-right">
							{{-- {!! $items->render() !!} --}}
							{{-- <a href="{{ $url_excel ?? '' }}" class="btn btn-success btn-sm" title="Excel"><i class="fa fa-file-excel-o m-r-0"></i></a>
					        <a href="{{ route('report.pdf') }}" class="btn btn-info btn-sm" title="PDF"><i class="fa fa-file-pdf-o m-r-0"></i></a> --}}
						</div>
            		</div>
          		</div>
        	</div>
      	</div>
      	
	</main>
@stop
@section('script')
<script type="text/javascript" src="{{ asset('back-end/js/lib/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('back-end/js/lib/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('back-end/js/lib/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/printThis.js')}}"></script>
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
@stop