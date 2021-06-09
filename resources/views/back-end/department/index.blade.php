@extends('back-end.master')
@section('title',"Department")
@section('content')
	<main class="app-content">
		<div class="app-title">
	        <ul class="app-breadcrumb breadcrumb side">
	          	<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	          	<li class="breadcrumb-item">{{ __('item.department') }}</li>
	          	<li class="breadcrumb-item active"><a href="javascript:;">{{ __('item.department_list') }}</a></li>
	        </ul>
      	</div>
		<div class="row">
        	<div class="col-md-12">
				@include('flash/message')
          		<div class="tile">
            		<div class="tile-body">
						<div class="rows">
							@if(Auth::user()->can('create-department') || $isAdministrator)
								<a href="{{ route('department.create')}}" class="btn btn-success mb-4">{{ __('item.new_department') }}</a>
							@endif
						</div>

						<div class="text-success display_message text-center"></div><br>
						<div class="table-responsive">
							<table class="table table-hover table-bordered table-nowrap">
				                <thead>
				                  	<tr>
					                    <th width="70" class="text-center">{{ __('item.department_no') }}</th>
										<th class="text-left">@sortablelink('title',trans('item.department_title'))</th>
					                    <th class="text-center">{{ __('item.function') }}</th>
				                  	</tr>
				                </thead>
		                		<tbody>

		                			@foreach ($items as $item)

					                	<tr>
						                    <td class="text-center">{{ $loop->iteration }}</td>
											<td>{{ ucfirst($item->title) }}</td>
						                    <td class="text-center" width="150">
						                    	@if(Auth::user()->can('edit-department') || $isAdministrator)
	                                                <a class="btn btn-sm btn-info" href="{{ route('department.edit',$item->id ) }}">{{trans('item.edit')}}</a>
	                                            @endif
	                                            @if(Auth::user()->can('delete-department') || $isAdministrator)
	                                                <a class="btn btn-sm btn-warning" onclick="return confirm('Are you sure you want to delete this item?');"
	                                                   href="{{ route('department.delete', $item->id ) }}">{{ trans('item.delete')}}
	                                                </a>
	                                            @endif
						                    </td>
						                </tr>
					                @endforeach
				                </tbody>
		              		</table>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="pull-right">
									{!! $items->render() !!}
								</div>
							</div>
						</div>
						<div class="clearfix">&nbsp;</div>
            		</div>
          		</div>
        	</div>
      	</div>
      	
	</main>
@stop
@section('script')
	<script type="text/javascript" src="{{URL::asset('back-end/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('back-end/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('back-end/js/plugins/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
    	$('#dataTable').DataTable();
    </script>
@stop