<ul class="nav nav-tabs">
	<li><?php echo $this->Html->link('Danh sách', array('action' => 'user'))?></li>
	<li class="active"><?php echo $this->Html->link('Thêm mới', array('action' => 'user_add'))?></li>
</ul>

<div>
	<h4>Thêm mới User</h4>
	<br>
	<form class="form-horizontal">
		<div class="row-fluid">
			<div class="span6 new-item-info">
				<div class="control-group">
					<label class="control-label">Nhóm</label>
					<div class="controls">
						<select>
							<option>Tên Nhóm</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="ten">Username</label>
					<div class="controls">
						<input type="text" id="ten" placeholder="Tên User">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="pass">Password</label>
					<div class="controls">
						<input type="password" id="pass" placeholder="Mật khẩu">
					</div>
				</div>
			</div>
			<div class="span6 new-item-image">
				<h5>Hình đại diện</h5>
				<img data-src="holder.js/150x150" class="img-polaroid center-div" style="width: 150px; height: 150px;">
				<input type="file" style="display: block; margin: 0 auto;">
			</div>
		</div>
		<hr>
		<div class="control-group">
			<div class="controls">
				<div class="controls">
					<button class="btn btn-success" type="submit">Tạo User</button>
					<button class="btn" type="reset">Reset</button>
				</div>
			</div>
		</div>
	</form>


</div>