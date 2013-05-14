<ul class="nav nav-tabs">
	<li><?php echo $this->Html->link(__('Danh sách'), array('controller'=> 'stores', 'action' => 'index'))?></li>
	<li class="active"><?php echo $this->Html->link(__('Thêm mới'), array('controller'=> 'stores', 'action'=> 'add'))?></li>
</ul>

<div>
	<h4><?php echo __('Thêm mới nhà cung cấp') ?></h4>
	<br>
	<?php echo $this->Form->create('Store', array('class'=> 'form-horizontal', 'inputDefaults'=> array('label'=> false, 'div'=> false)))?>
		<div class="row-fluid">
			<div class="span6 new-item-info">
				<div class="control-group">
					<label class="control-label"><?php echo __('Sản phẩm') ?></label>
					<div class="controls">
						<?php echo $this->Form->select('item_id', $items)?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Số lượng') ?></label>
					<div class="controls">
						<?php echo $this->Form->number('amount')?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Giá') ?></label>
					<div class="controls">
						<?php echo $this->Form->input('cost') ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Tên nhà cung cấp') ?></label>
					<div class="controls">
						<?php echo $this->Form->input('supplier_name', array('placeholder'=> __('Tên nhà cung cấp'))) ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Số điện thoại') ?></label>
					<div class="controls">
						<?php echo $this->Form->input('supplier_contact', array('placeholder'=> __('Số điện thoại'))) ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Thông tin thêm') ?></label>
					<div class="controls">
						<?php echo $this->Form->input('supplier_info') ?>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="control-group">
			<div class="controls">
				<div class="controls">
					<?php echo $this->Form->button(__('Tạo nhà cung cấp'), array('class'=> 'btn btn-success'))?>
					<?php echo $this->Html->link('Reset', array('controller'=> 'stores', 'action'=> 'add'), array('class'=> 'btn'))?>
				</div>
			</div>
		</div>
	<?php echo $this->Form->end() ?>
</div>