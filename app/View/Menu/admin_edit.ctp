<?php echo $this->start('breadcrumbs')?>
<li>
	<?php echo $this->Html->link(__('Trang chủ'), array('controller'=> 'users', 'action'=> 'dashboard'), array('escape'=> false))?>
	<span class="divider">&nbsp;&gt;</span>
</li>
<li class="active"><?php echo __('Thực đơn') ?></li>
<?php echo $this->end() ?>

<div>
	<h4><?php echo __('Sửa thực đơn') ?></h4>
	<br>
	<?php echo $this->Form->create('Item', array('class'=> 'form-horizontal', 'inputDefaults'=> array('label'=> false, 'div'=> false), 'type'=> 'file'))?>
	<?php echo $this->Form->hidden('id') ?>
		<div class="row-fluid">
			<div class="span6 new-item-info">
				<div class="control-group">
					<label class="control-label"><?php echo __('Loại đồ dùng') ?></label>
					<div class="controls"><?php echo $this->Form->input('type', array(
						'type'=> 'radio',
						'legend'=> false,
						'options'=> array('1'=> __('Đồ ăn'), 2=> __('Đồ uống')),
						'div'=> 'input radio',
						'label'=> 'radio inline'
					))?></div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Loại sản phẩm') ?></label>
					<div class="controls">
						<?php echo $this->Form->select('category_id', $categories, array('empty'=> __('-- Chọn loại sản phẩm --')))?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Tên sản phẩm') ?></label>
					<div class="controls">
						<?php echo $this->Form->input('name1', array('placeholder'=> __('Tên sản phẩm'))) ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Tên Tiếng Anh') ?></label>
					<div class="controls">
						<?php echo $this->Form->input('name2', array('placeholder'=> __('Tên Tiếng Anh'))) ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Tên Tiếng Pháp') ?></label>
					<div class="controls">
						<?php echo $this->Form->input('name3', array('placeholder'=> __('Tên Tiếng Pháp'))) ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Giá Thành') ?></label>
					<div class="controls">
						<?php echo $this->Form->input('cost', array('placeholder'=> __('Giá sản phẩm')))?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Mô tả') ?></label>
					<div class="controls">
						<?php echo $this->Form->textarea('description', array('rows'=> 9, 'cols'=> 3))?>
					</div>
				</div>
			</div>
			<div class="span6 new-item-image">
				<h5>Hình đại diện sản phẩm</h5>
				<?php if(isset($this->data['Item']['image']) && !empty($this->data['Item']['image'])){
					echo $this->Html->image('menu/'.$this->data['Item']['image'], array('class'=> 'img-polaroid center-div', 'style'=> 'width: 300px; height: 300px;'));
				}else{
					echo $this->Html->image('300x300.gif', array('class'=> 'img-polaroid center-div', 'style'=> 'width: 300px; height: 300px;'));
				}?>
				<?php echo $this->Form->file('thumbnail') ?>
			</div>
		</div>
		<hr>
		<div class="control-group">
			<div class="controls">
				<div class="controls">
					<?php echo $this->Form->button(__('Lưu thông tin'), array('class'=> 'btn btn-primary'))?>
				</div>
			</div>
		</div>
	<?php echo $this->Form->end() ?>
</div>