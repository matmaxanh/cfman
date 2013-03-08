<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo h($user['User']['group']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delete Flag'); ?></dt>
		<dd>
			<?php echo h($user['User']['delete_flag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($user['User']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Working Schedules'), array('controller' => 'working_schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Working Schedule'), array('controller' => 'working_schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($user['Order'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Table Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Total Cash'); ?></th>
		<th><?php echo __('Delete Flag'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id']; ?></td>
			<td><?php echo $order['table_id']; ?></td>
			<td><?php echo $order['user_id']; ?></td>
			<td><?php echo $order['status']; ?></td>
			<td><?php echo $order['total_cash']; ?></td>
			<td><?php echo $order['delete_flag']; ?></td>
			<td><?php echo $order['created']; ?></td>
			<td><?php echo $order['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']), null, __('Are you sure you want to delete # %s?', $order['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Working Schedules'); ?></h3>
	<?php if (!empty($user['WorkingSchedule'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('From'); ?></th>
		<th><?php echo __('To'); ?></th>
		<th><?php echo __('Actually Start'); ?></th>
		<th><?php echo __('Actually Leave'); ?></th>
		<th><?php echo __('Delete Flag'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['WorkingSchedule'] as $workingSchedule): ?>
		<tr>
			<td><?php echo $workingSchedule['id']; ?></td>
			<td><?php echo $workingSchedule['user_id']; ?></td>
			<td><?php echo $workingSchedule['from']; ?></td>
			<td><?php echo $workingSchedule['to']; ?></td>
			<td><?php echo $workingSchedule['actually_start']; ?></td>
			<td><?php echo $workingSchedule['actually_leave']; ?></td>
			<td><?php echo $workingSchedule['delete_flag']; ?></td>
			<td><?php echo $workingSchedule['created']; ?></td>
			<td><?php echo $workingSchedule['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'working_schedules', 'action' => 'view', $workingSchedule['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'working_schedules', 'action' => 'edit', $workingSchedule['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'working_schedules', 'action' => 'delete', $workingSchedule['id']), null, __('Are you sure you want to delete # %s?', $workingSchedule['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Working Schedule'), array('controller' => 'working_schedules', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
