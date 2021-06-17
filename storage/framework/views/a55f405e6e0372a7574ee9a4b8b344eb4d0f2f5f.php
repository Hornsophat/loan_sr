<a class="btn btn-sm btn-success pull-right mb-1" href="<?php echo e(route('sale_property.print_receipt_booking', ['id'=>$reservation->id])); ?>" target="_blank"><?php echo e(__('item.receipt')); ?></a>
<a class="btn btn-sm btn-info pull-right mb-1 mr-1" href="<?php echo e(route('sale_property.add_booking', ['id'=>$reservation->id])); ?>"><?php echo e(__('item.add_new')); ?></a>
<a class="btn btn-sm btn-info pull-right mb-1 mr-1" href="<?php echo e(route('sale_property.edit_booking', ['id'=>$reservation->id])); ?>"><?php echo e(__('item.edit_booking')); ?></a>
<?php if($reservation->status=='booked' && $property['status']==3): ?>
	<?php if(date('Y-m-d', strtotime($reservation->date_expire)) < date('Y-m-d')): ?>
	<a class="btn btn-sm btn-warning pull-right mb-1 mr-1" onclick="return confirm(`<?php echo e(__('item.confirm_expire_booking')); ?>`)" href="<?php echo e(route('sale_property.expire_booking', ['id'=>$reservation->id])); ?>"><?php echo e(__('item.expired')); ?></a>
	<?php endif; ?>
	<a class="btn btn-sm btn-danger pull-right mr-1" onclick="return confirm(`<?php echo e(__('item.confirm_delete_booking')); ?>`) " href="<?php echo e(route('sale_property.delete_booking', ['id'=>$reservation->id])); ?>"><?php echo e(__('item.delete')); ?></a>
<?php endif; ?>
<table class="table">

	<tbody>
		<tr>
			<td><?php echo e(__('item.code')); ?></td>
			<th>#<?php echo e($payment_transaction->reference); ?></th>
		</tr>
		<tr>
			<td><?php echo e(__('item.date')." ".__('item.booked')); ?></td>
			<td><?php echo e(date('d-F-Y', strtotime($reservation->date_booked))); ?></td>
		</tr>
		<tr>
			<td><?php echo e(__('item.expire_date')); ?></td>
			<td><?php echo e(date('d-F-Y', strtotime($reservation->date_expire))); ?></td>
		</tr>
		<tr>
			<td><?php echo e(__('item.customer')); ?></td>
			<td><?php echo e($reservation->customer_name); ?></td>
		</tr>
		<tr>
			<td><?php echo e(__('item.property_type')); ?></td>
			<td><?php echo e($property['project']['property_name']); ?></td>
		</tr>
		<tr>
			<td><?php echo e(__('item.property')); ?></td>
			<td><?php echo e($property['property_no']); ?> | <?php echo e($property['property_name']); ?></td>
		</tr>
		<tr>
			<td><?php echo e(__('item.price')); ?></td>
			<td>$<?php echo e(number_format($property['property_price']*1,2)); ?></td>
		</tr>
		<tr>
			<td><?php echo e(__('item.deposit')); ?></td>
			<td>$<?php echo e(number_format($reservation->amount*1,2)); ?></td>
		</tr>
	</tbody>
	
	<tfoot>
	<tr><center><td colspan="2"><br>Payment Detail</br></td></center></tr>
	<tr>
	<td><?=date('d-F-Y', strtotime($reservation->created_at))?></td>
	<td><?="$".$first_deposit?></td>
	<td><a class="btn btn-sm btn-success pull-right mb-1" href="<?php echo e(route('sale_property.print_receipt_booking', ['id'=>$reservation->id])); ?>" target="_blank"><?php echo e(__('item.receipt')); ?></a></td>
	</tr>
	<?php
	
	foreach($book_details as $detail)
	{
		?>
		<tr>
		<td><?=date('d-F-Y', strtotime($detail->date))?></td>
		<td><?="$".$detail->amount?></td>
		<td><a class="btn btn-sm btn-success pull-right mb-1" href="<?php echo e(route('sale_property.print_receipt_booking', ['id'=>$reservation->id])); ?>" target="_blank"><?php echo e(__('item.receipt')); ?></a></td>
		</tr>
		<?php
	}
	?>
	
	</tfoot>
</table>
