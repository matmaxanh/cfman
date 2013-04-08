<?php echo $this->Html->scriptStart();?>
$(document).ready(function() {
	$('#new-supplier').click(function(e) {
		$('#modal-new-supplier').modal();
	});
});
<?php echo $this->Html->scriptEnd();?>

<ul class="nav nav-tabs">
	<li class="active"><?php echo $this->Html->link(__('Nhà cung cấp'), array('controller' => 'suppliers', 'action' => 'index'))?></li>
	<li><?php echo $this->Html->link(__('Khách hàng'), array('controller' => 'customers', 'action' => 'index'))?></li>
</ul>

<h4><?php echo __('Quản lý nhà cung cấp') ?></h4>
<br>

<div style="margin-bottom: 5px;">
	<button class="btn btn-info" id="new-supplier"><i class="icon-white icon-plus-sign"></i><?php echo __('Thêm mới') ?></button>
</div>
<div>
	<table class="table table-bordered table-striped menu-table">
		<thead>
			<tr>
				<th><?php echo __('Tên NCC') ?></th>
				<th><?php echo __('Loại sản phẩm') ?></th>
				<th><?php echo __('Số DT') ?></th>
				<th><?php echo __('Ghi chú') ?></th>
				<th><?php echo __('Thao tác') ?></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($suppliers as $supplier) : ?>
			<tr>
				<td><?php echo h($supplier['Supplier']['name']) ?></td>
				<td><?php echo h($supplier['Supplier']['product_name']) ?></td>
				<td><?php echo $supplier['Supplier']['phone'] ?></td>
				<td><?php echo $supplier['Supplier']['memo'] ?></td>
				<td>
					<?php echo $this->Html->link('<i class="icon-edit"></i>&nbsp;'.__('Sửa'), array('controller'=> 'suppliers', 'action'=> 'edit', $supplier['Supplier']['id']), array('class'=> 'pull-left')) ?>
					<?php echo $this->Form->postLink('<i class="icon-edit"></i>&nbsp;'.__('Xóa'), array('controller'=> 'suppliers', 'action'=> 'delete', $supplier['Supplier']['id']), array('class'=> 'pull-right')) ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>


<div id="modal-new-supplier" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalNewSupplier" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="modalNewSupplier">Thêm nhà cung cấp mới</h3>
	</div>
	<form class="form-horizontal">
		<div class="modal-body">
				<div class="control-group">
					<label class="control-label">Loại sản phẩm</label>
					<div class="controls">
						<select>
							<option>Hoa quả, Rượu, Thuốc ...</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="ten">Tên nhà cung cấp</label>
					<div class="controls">
						<input type="text" id="ten" placeholder="Tên nhà cung cấp">
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