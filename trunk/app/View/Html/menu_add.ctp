<ul class="nav nav-tabs">
	<li><?php echo $this->Html->link('Danh sách', array('action' => 'menu'))?></li>
	<li class="active"><?php echo $this->Html->link('Thêm mới', array('action' => 'menu_add'))?></li>
</ul>
<div>
	<h4>Thêm mới thực đơn</h4>
	<br>
	<form class="form-horizontal">
		<div class="row-fluid">
			<div class="span6 new-item-info">
				<div class="control-group">
					<label class="control-label">Loại đồ dùng</label>
					<div class="controls">
						<label class="radio inline" style="width: 50px"> 
							<input type="radio" id="inlineCheckbox1" value="option1" name="type"> Đồ ăn
						</label> 
						<label class="radio inline" style="width: 100px"> 
							<input type="radio" id="inlineCheckbox2" value="option2" name="type"> Đồ uống
						</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Loại sản phẩm</label>
					<div class="controls">
						<select>
							<option>Cafe, Sinh tố, Nước ép ...</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="ten1">Tên sản phẩm</label>
					<div class="controls">
						<input type="text" id="ten1" placeholder="Tên sản phẩm">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="ten2">Tên Tiếng Anh</label>
					<div class="controls">
						<input type="text" id="ten2" placeholder="Tên Tiếng Anh">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="ten3">Tên Tiếng Pháp</label>
					<div class="controls">
						<input type="text" id="ten3" placeholder="Tên Tiếng Pháp">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="gia">Giá Thành</label>
					<div class="controls">
						<input type="text" id="gia" placeholder="Giá sản phẩm">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="mota">Mô tả</label>
					<div class="controls">
						<textarea rows="9" cols="3"></textarea>
					</div>
				</div>
			</div>
			<div class="span6 new-item-image">
				<h5>Hình đại diện sản phẩm</h5>
				<img data-src="holder.js/140x140" class="img-polaroid center-div" style="width: 140px; height: 140px;">
				<input type="file" style="display: block; margin: 0 auto;">
			</div>
		</div>
		<hr>
		<div class="control-group">
			<div class="controls">
				<div class="controls">
					<button class="btn btn-primary" type="submit">Tạo sản phẩm</button>
					<button class="btn" type="reset">Reset</button>
				</div>
			</div>
		</div>
	</form>
</div>