<div class="suppliers form">
<?php echo $this->Form->create('Supplier'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Supplier'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('product');
		echo $this->Form->input('phone');
		echo $this->Form->input('memo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Supplier.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Supplier.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Suppliers'), array('action' => 'index')); ?></li>
	</ul>
</div>
