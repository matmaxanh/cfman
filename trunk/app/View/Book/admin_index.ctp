<div class="bookings index">
	<h2><?php echo __('Bookings'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('table_book'); ?></th>
			<th><?php echo $this->Paginator->sort('booker_name'); ?></th>
			<th><?php echo $this->Paginator->sort('booker_contact'); ?></th>
			<th><?php echo $this->Paginator->sort('time_from'); ?></th>
			<th><?php echo $this->Paginator->sort('time_to'); ?></th>
			<th><?php echo $this->Paginator->sort('received_by'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flag'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bookings as $booking): ?>
	<tr>
		<td><?php echo h($booking['Booking']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($booking['Table']['id'], array('controller' => 'tables', 'action' => 'view', $booking['Table']['id'])); ?>
		</td>
		<td><?php echo h($booking['Booking']['booker_name']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['booker_contact']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['time_from']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['time_to']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['received_by']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['delete_flag']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['created']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $booking['Booking']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $booking['Booking']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $booking['Booking']['id']), null, __('Are you sure you want to delete # %s?', $booking['Booking']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Booking'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tables'), array('controller' => 'tables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Table'), array('controller' => 'tables', 'action' => 'add')); ?> </li>
	</ul>
</div>
