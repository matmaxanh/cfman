<ul class="nav nav-tabs">
	<li><?php echo $this->Html->link('Danh sách', array('action' => 'book'))?></li>
	<li class="active"><?php echo $this->Html->link('Thêm mới', array('action' => 'book_add'))?></li>
</ul>

<h4>Đặt chỗ mới</h4>
<br>
<div>
	<form class="form-horizontal">
		<div class="control-group">
			<label class="control-label">Bàn đặt</label>
			<div class="controls">
				<select>
					<option>Tên bàn</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="ten1">Tên người đặt</label>
			<div class="controls">
				<input type="text" id="ten1" placeholder="Tên sản phẩm">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="ten1">SDT Liên lạc</label>
			<div class="controls">
				<input type="text" id="ten1" placeholder="Tên sản phẩm">
			</div>
		</div>
	</form>
</div>