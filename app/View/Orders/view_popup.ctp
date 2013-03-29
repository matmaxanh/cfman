<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="modalOrder"><?php echo sprintf(__('Đơn hàng %d / Bàn %s'), $order['Order']['id'], $order['Table']['name']) ?></h3>
</div>
<div class="modal-body">
	<table class="table table-hover">
		<thead>
			<tr>
				<th><?php echo __('Tên món') ?></th>
				<th><?php echo __('Số lượng') ?></th>
				<th><?php echo __('Trạng thái') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach($order['OrderItem'] as $orderItem){
				switch($orderItem['status']){
					case STATUS_ORDER_ITEM_REGISTER:
						$class = 'info';
						$status = __('Chưa phục vụ');
						break;
					case STATUS_ORDER_ITEM_BRINGING:
						$class = 'warning';
						$status = __('Đang chuyển ra');
						break;
					case STATUS_ORDER_ITEM_RECEIVED:
						$class = 'success';
						$status = __('Đã phục vụ');
						break;
					case STATUS_ORDER_ITEM_CANCELED:
						$class = 'error';
						$status = __('Hủy');
						break;
				}
				echo '<tr class="'.$class.'">';
				echo '<td>'.$orderItem['Item']['name1'].'</td>';
				echo '<td>'.$orderItem['amount'].'</td>';
				echo '<td>'.$status.'</td>';
				echo '</tr>';
			}
			?>
			<tr>
				<td rowspan="3" colspan="3">
					<strong><?php echo __('Ghi chú') ?> :&nbsp;</strong><textarea rows="2" cols="2" style="width: 80%; height: 80px;"></textarea>
				</td>
			</tr>
		</tbody>	
	</table>
</div>
<div class="modal-footer">
	<button class="btn btn-primary" data-dismiss="modal"><i class="icon-white icon-ok"></i>Duyệt</button>
	<button class="btn btn-danger" data-dismiss="modal"><i class="icon-white icon-remove"></i>Hủy</button>
</div>