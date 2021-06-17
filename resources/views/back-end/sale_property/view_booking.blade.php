<a class="btn btn-sm btn-success pull-right mb-1" href="{{ route('sale_property.print_receipt_booking', ['id'=>$reservation->id]) }}" target="_blank">{{ __('item.receipt') }}</a>
<a class="btn btn-sm btn-info pull-right mb-1 mr-1" href="{{ route('sale_property.add_booking', ['id'=>$reservation->id]) }}">{{ __('item.add_new') }}</a>
<a class="btn btn-sm btn-info pull-right mb-1 mr-1" href="{{ route('sale_property.edit_booking', ['id'=>$reservation->id]) }}">{{ __('item.edit_booking') }}</a>
@if($reservation->status=='booked' && $property['status']==3)
	@if(date('Y-m-d', strtotime($reservation->date_expire)) < date('Y-m-d'))
	<a class="btn btn-sm btn-warning pull-right mb-1 mr-1" onclick="return confirm(`{{ __('item.confirm_expire_booking') }}`)" href="{{ route('sale_property.expire_booking', ['id'=>$reservation->id]) }}">{{ __('item.expired') }}</a>
	@endif
	<a class="btn btn-sm btn-danger pull-right mr-1" onclick="return confirm(`{{ __('item.confirm_delete_booking') }}`) " href="{{ route('sale_property.delete_booking', ['id'=>$reservation->id]) }}">{{ __('item.delete') }}</a>
@endif
<table class="table">

	<tbody>
		<tr>
			<td>{{ __('item.code') }}</td>
			<th>#{{ $payment_transaction->reference }}</th>
		</tr>
		<tr>
			<td>{{ __('item.date')." ".__('item.booked') }}</td>
			<td>{{ date('d-F-Y', strtotime($reservation->date_booked)) }}</td>
		</tr>
		<tr>
			<td>{{ __('item.expire_date') }}</td>
			<td>{{ date('d-F-Y', strtotime($reservation->date_expire)) }}</td>
		</tr>
		<tr>
			<td>{{ __('item.customer') }}</td>
			<td>{{ $reservation->customer_name }}</td>
		</tr>
		<tr>
			<td>{{ __('item.property_type') }}</td>
			<td>{{ $property['project']['property_name'] }}</td>
		</tr>
		<tr>
			<td>{{ __('item.property') }}</td>
			<td>{{ $property['property_no'] }} | {{ $property['property_name'] }}</td>
		</tr>
		<tr>
			<td>{{ __('item.price') }}</td>
			<td>${{ number_format($property['property_price']*1,2) }}</td>
		</tr>
		<tr>
			<td>{{ __('item.deposit') }}</td>
			<td>${{ number_format($reservation->amount*1,2) }}</td>
		</tr>
	</tbody>
	
	<tfoot>
	<tr><center><td colspan="2"><br>Payment Detail</br></td></center></tr>
	<tr>
	<td><?=date('d-F-Y', strtotime($reservation->created_at))?></td>
	<td><?="$".$first_deposit?></td>
	<td><a class="btn btn-sm btn-success pull-right mb-1" href="{{ route('sale_property.print_receipt_booking', ['id'=>$reservation->id]) }}" target="_blank">{{ __('item.receipt') }}</a></td>
	</tr>
	<?php
	
	foreach($book_details as $detail)
	{
		?>
		<tr>
		<td><?=date('d-F-Y', strtotime($detail->date))?></td>
		<td><?="$".$detail->amount?></td>
		<td><a class="btn btn-sm btn-success pull-right mb-1" href="{{ route('sale_property.print_receipt_booking', ['id'=>$reservation->id,'book_detail_id'=>$detail->id]) }}" target="_blank">{{ __('item.receipt') }}</a></td>
		<td><a class="btn btn-sm btn-info pull-right mb-1 mr-1" href="{{ route('sale_property.edit_booking_detail', ['id'=>$detail->id]) }}">{{ __('item.edit_booking') }}</a></td>
		<td><a class="btn btn-sm btn-danger pull-right mb-1 mr-1" href="{{ route('sale_property.delete_booking_detail', ['id'=>$detail->id]) }}">{{ __('item.delete') }}</a></td>
		</tr>
		<?php
	}
	?>
	
	</tfoot>
</table>
