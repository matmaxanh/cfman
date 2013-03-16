<div class="bookings view">
<h2><?php  echo __('Booking'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Table'); ?></dt>
		<dd>
			<?php echo $this->Html->link($booking['Table']['id'], array('controller' => 'tables', 'action' => 'view', $booking['Table']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Booker Name'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['booker_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Booker Contact'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['booker_contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time From'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['time_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time To'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['time_to']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Received By'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['received_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delete Flag'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['delete_flag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Booking'), array('action' => 'edit', $booking['Booking']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Booking'), array('action' => 'delete', $booking['Booking']['id']), null, __('Are you sure you want to delete # %s?', $booking['Booking']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Booking'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tables'), array('controller' => 'tables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Table'), array('controller' => 'tables', 'action' => 'add')); ?> </li>
	</ul>
</div>
