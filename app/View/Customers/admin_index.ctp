<?php echo $this->Html->scriptStart();?>
$(document).ready(function() {
	$('#new-vip').click(function(e) {
		$('#modal-new-vip').modal();
	});
});
<?php echo $this->Html->scriptEnd();?>

<ul class="nav nav-tabs">
	<li><?php echo $this->Html->link(__('Nhà cung cấp'), array('controller' => 'suppliers', 'action' => 'index'))?></li>
	<li class="active"><?php echo $this->Html->link(__('Khách hàng'), array('controller' => 'customers', 'action' => 'index'))?></li>
</ul>

<h4><?php echo __('Quản lý khách hàng') ?></h4>
<br>

<div style="margin-bottom: 5px;">
	<button class="btn btn-info" id="new-vip"><i class="icon-white icon-plus-sign"></i><?php echo __('Thêm mới') ?></button>
</div>
<div>
	<table class="table table-bordered table-striped menu-table">
		<thead>
			<tr>
				<th><?php echo __('Tên khách hàng') ?></th>
				<th><?php echo __('Sản phẩm ưa thích') ?></th>
				<th><?php echo __('Số DT') ?></th>
				<th><?php echo __('Ghi chú') ?></th>
				<th><?php echo __('Thao tác') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($customers as $customer) : ?>
			<tr>
				<td><?php echo h($customer['Customer']['name']) ?></td>
				<td><?php echo h($customer['Customer']['product_name']) ?></td>
				<td><?php echo $customer['Customer']['phone'] ?></td>
				<td><?php echo $customer['Customer']['memo'] ?></td>
				<td>
					<?php echo $this->Html->link('<i class="icon-edit"></i>&nbsp;'.__('Sửa'), array('controller'=> 'customers', 'action'=> 'edit', $customer['Customer']['id']), array('class'=> 'pull-left')) ?>
					<?php echo $this->Form->postLink('<i class="icon-edit"></i>&nbsp;'.__('Xóa'), array('controller'=> 'customers', 'action'=> 'delete', $customer['Customer']['id']), array('class'=> 'pull-right')) ?>
				</td>
			</tr>
			<?php endforeach; ?>
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