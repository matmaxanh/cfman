<ul class="nav nav-tabs">
	<li><?php echo $this->Html->link(__('Nhà cung cấp'), array('controller' => 'suppliers', 'action' => 'index'))?></li>
	<li class="active"><?php echo $this->Html->link(__('Khách hàng'), array('controller' => 'customers', 'action' => 'index'))?></li>
</ul>

<h4><?php echo __('Quản lý khách hàng') ?></h4>
<br>

<div style="margin-bottom: 5px;">
	<?php echo $this->Html->link('<i class="icon-white icon-plus-sign"></i>'.__('Thêm mới'), array('controller'=> 'customers', 'action'=> 'add'), array('class'=> 'btn btn-info', 'escape'=> false))?>
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
				<td><?php echo h($customer['Customer']['favourite_item']) ?></td>
				<td><?php echo $customer['Customer']['phone'] ?></td>
				<td><?php echo $customer['Customer']['memo'] ?></td>
				<td>
					<?php echo $this->Html->link('<i class="icon-edit"></i>&nbsp;'.__('Sửa'), array('controller'=> 'customers', 'action'=> 'edit', $customer['Customer']['id']), array('class'=> 'pull-left', 'escape'=> false)) ?>
					<?php echo $this->Form->postLink('<i class="icon-edit"></i>&nbsp;'.__('Xóa'), array('controller'=> 'customers', 'action'=> 'delete', $customer['Customer']['id']), array('class'=> 'pull-right', 'escape'=> false)) ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>