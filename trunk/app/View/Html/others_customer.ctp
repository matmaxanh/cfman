<?php echo $this->Html->scriptStart();?>
$(document).ready(function() {
	$('#new-vip').click(function(e) {
		$('#modal-new-vip').modal();
	});
});
<?php echo $this->Html->scriptEnd();?>

<ul class="nav nav-tabs">
	<li><?php echo $this->Html->link('Nhà cung cấp', array('action' => 'others'))?></li>
	<li class="active"><?php echo $this->Html->link('Khách hàng', array('action' => 'others_customer'))?></li>
</ul>

<h4>Quản lý Khách hàng</h4>
<br>

<div style="margin-bottom: 5px;">
	<button class="btn btn-info" id="new-vip"><i class="icon-white icon-plus-sign"></i>Thêm mới</button>
</div>
<div>
	<table class="table table-bordered table-striped menu-table">
		<thead>
			<tr>
				<th>Tên khách hàng</th>
				<th>Sản phẩm ưa thích</th>
				<th>Số DT</th>
				<th>Ghi chú</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Anh Béo</td>
				<td>Hoa quả</td>
				<td>01229695294</td>
				<td></td>
				<td>
					<a href="javascript:void(0)" class="pull-left"><i class="icon-edit"></i> Sửa</a>
					<a href="javascript:void(0)" class="pull-right"><i class="icon-trash"></i> Xóa</a>
				</td>
			</tr>
			<tr>
				<td>Anh Còi</td>
				<td>Thuốc Lá</td>
				<td>0905563299</td>
				<td></td>
				<td>
					<a href="javascript:void(0)" class="pull-left"><i class="icon-edit"></i> Sửa</a>
					<a href="javascript:void(0)" class="pull-right"><i class="icon-trash"></i> Xóa</a>
				</td>
			</tr>
			<tr>
				<td>Chị Tươi</td>
				<td>Thực phẩm</td>
				<td>043563244</td>
				<td></td>
				<td>
					<a href="javascript:void(0)" class="pull-left"><i class="icon-edit"></i> Sửa</a>
					<a href="javascript:void(0)" class="pull-right"><i class="icon-trash"></i> Xóa</a>
				</td>
		</tbody>
	</table>
</div>


<div id="modal-new-vip" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalNewCus" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="modalNewCus">Thêm VIP</h3>
	</div>
	<form class="form-horizontal">
		<div class="modal-body">
				<div class="control-group">
					<label class="control-label" for="ten">Tên khách hàng</label>
					<div class="controls">
						<input type="text" id="ten" placeholder="Tên khách hàng">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="fav-item">Sản phẩm ưa thích</label>
					<div class="controls">
						<input type="text" id="fav-item" placeholder="Sản phẩm ưa thích">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="lienlac">SDT Liên lạc</label>
					<div class="controls">
						<input type="text" id="lienlac" placeholder="SDT Liên lạc">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="note">Ghi chú</label>
					<div class="controls">
						<textarea rows="2" cols="2" placeholder="Ghi chú thêm" id="note"></textarea>
					</div>
				</div>
		</div>
		<div class="modal-footer">
			<button class="btn btn-success" data-dismiss="modal">Thực hiện</button>
			<button class="btn" type="reset">Làm lại</button>
		</div>
	</form>
</div>