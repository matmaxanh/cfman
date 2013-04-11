<ul class="nav nav-tabs">
	<li class="active"><?php echo $this->Html->link(__('Nhà cung cấp'), array('controller' => 'suppliers', 'action' => 'index'))?></li>
	<li><?php echo $this->Html->link(__('Khách hàng'), array('controller' => 'customers', 'action' => 'index'))?></li>
</ul>

<h4><?php echo __('Quản lý nhà cung cấp') ?></h4>
<br>

<div style="margin-bottom: 5px;">
	<?php echo $this->Html->link('<i class="icon-white icon-plus-sign"></i>'.__('Thêm mới'), array('controller'=> 'suppliers', 'action'=> 'add'), array('class'=> 'btn btn-info', 'escape'=> false))?>
</div>
<div>
	<table class="table table-bordered table-striped menu-table">
		<thead>
			<tr>
				<th><?php echo __('Tên nhà cung cấp') ?></th>
				<th><?php echo __('Loại sản phẩm') ?></th>
				<th><?php echo __('Số điện thoại') ?></th>
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
					<?php echo $this->Html->link('<i class="icon-edit"></i>&nbsp;'.__('Sửa'), array('controller'=> 'suppliers', 'action'=> 'edit', $supplier['Supplier']['id']), array('class'=> 'pull-left', 'escape'=> false)) ?>
					<?php echo $this->Form->postLink('<i class="icon-edit"></i>&nbsp;'.__('Xóa'), array('controller'=> 'suppliers', 'action'=> 'delete', $supplier['Supplier']['id']), array('class'=> 'pull-right', 'escape'=> false)) ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>

