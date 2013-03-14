<ul class="nav nav-tabs">
	<li><?php echo $this->Html->link('Danh sách', array('action' => 'book'))?></li>
	<li class="active"><?php echo $this->Html->link('Thêm mới', array('action' => 'book_add'))?></li>
</ul>

<h4>Đặt chỗ mới</h4>
<br>
<div class="row-fluid">
	<form class="form-horizontal">
		<div class="span2">&nbsp;</div>
		<div class="span8">
			<div class="control-group">
				<label class="control-label">Bàn đặt</label>
				<div class="controls">
					<select class="input-medium">
						<option>Tên bàn</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="nguoiDat">Tên người đặt</label>
				<div class="controls">
					<input type="text" id="nguoiDat" placeholder="Tên người đặt">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="lienlac">SDT Liên lạc</label>
				<div class="controls">
					<input type="text" id="lienlac" placeholder="SDT Liên lạc">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="thoiGianDat">Thời gian đặt</label>
				<div class="controls">
					<input type="text" id="thoiGianDat" placeholder="Thời gian đặt">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="nguoiNhan">Người nhận đặt</label>
				<div class="controls">
					<input type="text" id="nguoiNhan" placeholder="Người nhận đặt">
				</div>
			</div>
			<hr>
			<div class="control-group"> 
				<div class="controls">
					<button type="submit" class="btn btn-success">Tạo đặt chỗ</button>
					<button type="reset" class="btn">Reset</button>
				</div>
			</div>
		</div>
		<div class="span2">&nbsp;</div>
	</form>
</div>