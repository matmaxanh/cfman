<?php echo $this->Html->scriptStart();?>
$(document).ready(function() {
	$('div.table-object > a.to-name').click(function(e) {
		$('#modal').html('');
		var tableId = $(this).attr('rel');
		$.ajax({
			'url': '<?php echo $this->Html->url(array('controller'=> 'orders', 'action'=> 'view')) ?>' + '/' + tableId,
			success: function(rsp){
				$('#modal').html(rsp);
				$('#modal').modal('show');
			}			
		});
	});
});
<?php echo $this->Html->scriptEnd();?>

<ul class="nav nav-tabs">
	<li class="active"><?php echo $this->Html->link(__('Quản lý đơn hàng'), array('controller'=> 'orders', 'action' => 'index'))?></li>
	<li><?php echo $this->Html->link(__('Đơn hàng chờ duyệt'), array('controller'=> 'orders', 'action' => 'filter', 'status'))?></li>
	<li><?php echo $this->Html->link(__('Nhân viên khu vực'), array('controller'=> 'orders', 'action' => 'filter', 'user'))?></li>
</ul>

<h4><?php echo __('Quản lý chung') ?></h4>
<br>
<div>
	<div class="accordion" id="accordion2">
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#col1"><?php echo __('Trạng thái chung') ?></a>
			</div>
			<div id="col1" class="accordion-body collapse in">
				<div class="accordion-inner">
					<div class="table-object-group">
						<?php foreach($tableStatuses as $status => $tableNumber) : ?>
						<div class="table-object to-<?php echo $status ?>">
							<p class="to-name"><?php echo $tableNumber." ".__('Bàn') ?></p>
						</div>
						<?php endforeach; ?>
					</div>	
				</div>
			</div>
		</div>
		
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#col2">Trạng thái chi tiết</a>
			</div>
			<div id="col2" class="accordion-body collapse">
				<div class="accordion-inner">
					<?php foreach($zoneData as $zone): ?>
					<fieldset>
						<legend><?php echo $zone['name'] ?></legend>
						<div class="table-object-group">
							<?php foreach($zone['tables'] as $table) : ?>
							<div class="table-object to-<?php echo $table['status'] ?>">
								<a class="to-name" rel="<?php echo $table['id'] ?>"><?php echo $table['name'] ?></a>
							</div>
							<?php endforeach; ?>
						</div>		
					</fieldset>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<hr>
<p style="float:left">**<?php echo __('Chú thích') ?> :</p>
<ul class="to-explain">
	<li><div class="table-object to-small to-empty"><p class="to-name-small"><?php echo __('Bàn') ?></p></div>&nbsp;<?php echo __('Bàn trống') ?></li>
	<li><div class="table-object to-small to-ordering"><p class="to-name-small"><?php echo __('Bàn') ?></p></div>&nbsp;<?php echo __('Bàn đang gọi đồ / chờ duyệt đơn hàng') ?></li>
	<li><div class="table-object to-small to-waiting"><p class="to-name-small"><?php echo __('Bàn') ?></p></div>&nbsp;<?php echo __('Bàn đang chờ đồ') ?></li>
	<li><div class="table-object to-small to-served"><p class="to-name-small"><?php echo __('Bàn') ?></p></div>&nbsp;<?php echo __('Bàn đã được phục vụ') ?></li>
</ul>



<div id="modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
</div>


<div id="modal-order-info" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalOrderInfo" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="modalOrderInfo">Order #xxx / Bàn #yyy</h3>
	</div>
	<div class="modal-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Tên món</th>
					<th>Số lượng</th>
					<th>Trạng thái</th>
				</tr>
			</thead>
			<tbody>
				<tr class="success">
					<td>Cafe Nâu - Đá</td>
					<td>1</td>
					<td>Đã phục vụ</td>
				</tr>
				<tr class="success">
					<td>Lipton Bạc Hà</td>
					<td>2</td>
					<td>Đã phục vụ</td>
				</tr>
				<tr class="success">
					<td>Kem tươi</td>
					<td>1</td>
					<td>Đã phục vụ</td>	
				</tr>
			</tbody>	
		</table>
	</div>
	<div class="modal-footer">
		<button class="btn btn-primary" data-dismiss="modal"><i class="icon-white icon-ok"></i>Tắt Popup</button>
	</div>
</div>


<div id="modal-order-info2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalOrderInfo2" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="modalOrderInfo2">Order #xxx / Bàn #yyy</h3>
	</div>
	<div class="modal-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Tên món</th>
					<th>Số lượng</th>
					<th>Trạng thái</th>
				</tr>
			</thead>
			<tbody>
				<tr class="success">
					<td>Cafe Nâu - Đá</td>
					<td>1</td>
					<td>Đã phục vụ</td>
				</tr>
				<tr class="success">
					<td>Lipton Bạc Hà</td>
					<td>2</td>
					<td>Đã phục vụ</td>
				</tr>
				<tr class="warning">
					<td>Kem tươi</td>
					<td>1</td>
					<td>Đang chuyển ra</td>	
				</tr>
			</tbody>	
		</table>
	</div>
	<div class="modal-footer">
		<button class="btn btn-primary" data-dismiss="modal"><i class="icon-white icon-ok"></i>Tắt Popup</button>
	</div>
</div>
