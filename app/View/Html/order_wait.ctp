<?php echo $this->Html->scriptStart();?>
$(document).ready(function() {
	$('div.to-ordering > a.to-name').click(function(e) {
		$('#modal-order').modal();
	});
});
<?php echo $this->Html->scriptEnd();?>

<ul class="nav nav-tabs">
	<li><?php echo $this->Html->link('Quản lý chung', array('action' => 'order'))?></li>
	<li class="active"><?php echo $this->Html->link('Order chờ duyệt', array('action' => 'order_wait'))?></li>
	<li><?php echo $this->Html->link('Nhân viên khu vực', array('action' => 'order_waiter'))?></li>
</ul>

<h4>Duyệt Order</h4>
<br>

<div>
	<fieldset>
		<legend>Zone I</legend>
		<div class="table-object-group">
			<div class="table-object to-ordering">
				<a class="to-name">Bàn 1</a>
			</div>
			<div class="table-object to-ordering">
				<a class="to-name">Bàn 1</a>
			</div>
			<div class="table-object to-ordering">
				<a class="to-name">Bàn 1</a>
			</div>
		</div>		
	</fieldset>
	
	<fieldset>
		<legend>Zone II</legend>
		<div class="table-object-group">
			<div class="table-object to-ordering">
				<a class="to-name">Bàn 1</a>
			</div>
			<div class="table-object to-ordering">
				<a class="to-name">Bàn 1</a>
			</div>
			<div class="table-object to-ordering">
				<a class="to-name">Bàn 1</a>
			</div>
			<div class="table-object to-ordering">
				<a class="to-name">Bàn 1</a>
			</div>
			<div class="table-object to-ordering">
				<a class="to-name">Bàn 1</a>
			</div>
		</div>
	</fieldset>
</div>


<div id="modal-order" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalOrder" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="modalOrder">Order #xxx / Bàn #yyy</h3>
	</div>
	<div class="modal-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Tên món</th>
					<th>Số lượng</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Cafe Nâu - Đá</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Lipton Bạc Hà</td>
					<td>2</td>
				</tr>
				<tr>
					<td>Kem tươi</td>
					<td>1</td>	
				</tr>
				<tr>
					<td rowspan="2" colspan="2">
						<strong>Ghi chú :&nbsp;</strong><textarea rows="2" cols="2" style="width: 80%; height: 80px;"></textarea>
					</td>
				</tr>
			</tbody>	
		</table>
	</div>
	<div class="modal-footer">
		<button class="btn btn-primary" data-dismiss="modal"><i class="icon-white icon-ok"></i>Duyệt</button>
		<button class="btn btn-danger" data-dismiss="modal"><i class="icon-white icon-remove"></i>Hủy</button>
	</div>
</div>
