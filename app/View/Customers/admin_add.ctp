<ul class="nav nav-tabs">
	<li><?php echo $this->Html->link(__('Danh sách khách hàng'), array('controller'=> 'customers', 'action' => 'index'))?></li>
</ul>

<div>
	<h4><?php echo __('Thêm mới khách hàng') ?></h4>
	<br>
	<?php echo $this->Form->create('Customer', array('class'=> 'form-horizontal', 'inputDefaults'=> array('label'=> false, 'div'=> false)))?>
	<div class="row-fluid">
		<div class="control-group">
			<label class="control-label"><?php echo __('Tên khách hàng') ?></label>
			<div class="controls">
				<?php echo $this->Form->input('name', array('placeholder'=> __('Tên khách hàng')))?>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label"><?php echo __('Sản phẩm ưa thích') ?></label>
			<div class="controls">
				<?php echo $this->Form->input('favourite_item', array('placeholder'=> __('Sản phẩm ưa thích')))?>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="lienlac"><?php echo __('SDT Liên lạc') ?></label>
			<div class="controls">
				<?php echo $this->Form->input('phone', array('placeholder'=> __('SDT Liên lạc')))?>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label"><?php echo __('Ghi chú') ?></label>
			<div class="controls">
				<?php echo $this->Form->textarea('memo', array('placeholder'=> __('Ghi chú thêm'), 'rows' => 2, 'cols'=> 2))?>
			</div>
		</div>
		<hr>
		<div class="control-group">
			<div class="controls">
				<div class="controls">
				<?php echo $this->Form->button(__('Thêm mới'), array('class'=>  'btn btn-success')) ?>
				<?php echo $this->Html->link(__('Làm lại'), array('controller'=> 'customers', 'action'=> 'add'), array('class'=> 'btn')) ?>
				</div>
			</div>
		</div>
	</div>
	<?php echo $this->Form->end() ?>
</div>