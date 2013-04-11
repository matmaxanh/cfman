<ul class="nav nav-tabs">
	<li><?php echo $this->Html->link(__('Danh sách'), array('controller'=> 'users', 'action' => 'index'))?></li>
	<li class="active"><?php echo $this->Html->link(__('Thêm mới'), array('controller'=> 'users', 'action'=> 'add'))?></li>
</ul>

<div>
	<h4><?php echo __('Thêm mới tài khoản') ?></h4>
	<br>
	<?php echo $this->Form->create('User', array('class'=> 'form-horizontal', 'inputDefaults'=> array('label'=> false, 'div'=> false)))?>
		<div class="row-fluid">
			<div class="span6 new-item-info">
				<div class="control-group">
					<label class="control-label"><?php echo __('Nhóm') ?></label>
					<div class="controls">
						<?php echo $this->Form->select('group', Configure::read('user_group'))?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="ten"><?php echo __('Tên đăng nhập') ?></label>
					<div class="controls">
						<?php echo $this->Form->input('username', array('placeholder'=> __('Tên đăng nhập')))?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="pass"><?php echo __('Mật khẩu') ?></label>
					<div class="controls">
						<?php echo $this->Form->input('passwd', array('type' => 'password', 'placeholder'=> __('Mật khẩu'))) ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="pass"><?php echo __('Nhập lại mật khẩu') ?></label>
					<div class="controls">
						<?php echo $this->Form->input('passwd_confirm', array('type' => 'password', 'placeholder'=> __('Nhập lại mật khẩu'))) ?>
					</div>
				</div>
			</div>
			<div class="span6 new-item-image">
				<h5><?php echo __('Hình đại diện') ?></h5>
				<img data-src="holder.js/150x150" class="img-polaroid center-div" style="width: 150px; height: 150px;">
				<?php echo $this->Form->file('avatar') ?>
			</div>
		</div>
		<hr>
		<div class="control-group">
			<div class="controls">
				<div class="controls">
					<?php echo $this->Form->button(__('Tạo tài khoản'), array('class'=> 'btn btn-success'))?>
					<?php echo $this->Html->link('Reset', array('controller'=> 'users', 'action'=> 'add'), array('class'=> 'btn'))?>
				</div>
			</div>
		</div>
	<?php echo $this->Form->end() ?>
</div>