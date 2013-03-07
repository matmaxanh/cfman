<div id="login-wraper">
	<form class="form login-form">
	<?php echo $this->Form->create(null, array(''))?>
		<div>
			<?php echo $this->Html->image('sam-logo.jpg', array('style' => 'width: 200px; height:75px'))?>
		</div>
		<hr>

		<div class="body">
			<div>
				<label for="username">Tên tài khoản</label> 
				<?php echo $this->Form->input('username', array('type' => 'text', 'placeholder' => 'Tên tài khoản', 'label' => false, 'div' => false))?>
			</div>
			<div>
				<label for="password">Mật khẩu</label> 
				<?php echo $this->Form->input('password', array('type' => 'password', 'placeholder' => 'Mật khẩu', 'label' => false, 'div' => false))?>
			</div>
		</div>

		<div class="footer">
<!-- 			<label class="checkbox inline">  -->
<!-- 				<input type="checkbox" id="inlineCheckbox1" value="option1"> Ghi nhớ -->
<!-- 			</label> -->
			<button type="submit" class="btn btn-success login-btn">Login</button>
		</div>

	</form>
</div>
