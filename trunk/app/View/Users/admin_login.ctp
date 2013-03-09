<div id="login-wraper">
	<?php echo $this->Form->create('User', array('url'=> array('controller'=> 'users', 'action'=> 'login')))?>
		<div>
			<?php echo $this->Html->image('sam-logo.jpg', array('style' => 'width: 200px; height:75px'))?>
		</div>
		<hr>

		<div class="body">
			<div>
				<label for="username"><?php echo __('Tài khoản(admin)')?></label> 
				<?php echo $this->Form->input('username', array('type' => 'text', 'placeholder' => __('Tài khoản'), 'label' => false, 'div' => false))?>
			</div>
			<div>
				<label for="password"><?php echo __('Mật khẩu(123456)') ?></label> 
				<?php echo $this->Form->input('password', array('type' => 'password', 'placeholder' => __('Mật khẩu'), 'label' => false, 'div' => false))?>
			</div>
		</div>

		<div class="footer">
<!-- 			<label class="checkbox inline">  -->
<!-- 				<input type="checkbox" id="inlineCheckbox1" value="option1"> Ghi nhá»› -->
<!-- 			</label> -->
			<button type="submit" class="btn btn-success login-btn">Login</button>
		</div>
	<?php echo $this->Form->end() ?>
</div>
