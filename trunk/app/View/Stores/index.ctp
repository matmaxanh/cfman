<?php echo $this->start('breadcrumbs')?>
<li>
	<?php echo $this->Html->link(__('Trang chủ'), array('controller'=> 'users', 'action'=> 'dashboard'), array('escape'=> false))?>
	<span class="divider">&nbsp;&gt;</span>
</li>
<li class="active"><?php echo __('Quản lý nhân viên') ?></li>
<?php echo $this->end() ?>

<?php echo $this->element('setup_pager') ?>

<ul class="nav nav-tabs">
	<li class="active"><?php echo $this->Html->link(__('Danh sách'), array('controller'=> 'stores', 'action' => 'index'))?></li>
	<li><?php echo $this->Html->link(__('Thêm mới'), array('controller'=> 'stores', 'action' => 'add'))?></li>
</ul>
<div>
	<h4><?php echo __('Quản lý kho') ?></h4>
	<?php echo $this->Form->create('Store', array('type'=> 'get', 'class'=> 'form-inline', 'inputDefaults'=> array('div'=> false, 'label'=> false), 'id'=> 'formStore'))?>
		<div style="margin: 10px 0px 10px 0; ">
			<?php echo $this->Form->input('item', array('value'=> (isset($_GET['username'])?$_GET['username']:''), 'placeholder'=> __('Tên nhà cung cấp')))?>
			<button class="btn btn-warning"><i class="icon-search"></i><?php echo __('Tìm kiếm') ?></button>
		</div>
		
	<?php echo $this->Form->end() ?>
</div>
<hr>
<div>
	<table class="table table-bordered table-striped menu-table">
		<thead>
			<tr>
				<th><?php echo __('STT') ?></th>
				<th><?php echo __('Tên sản phẩm') ?></th>
				<th><?php echo __('Số lượng') ?></th>
				<th><?php echo __('Giá') ?></th>
				<th><?php echo __('Tên nhà cung cấp') ?></th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$params = $this->Paginator->params();
			$i = ($params['page'] - 1) * $params['limit'] + 1;
			?>
			<?php foreach ($stores as $k => $store): ?>
			<tr>
				<td><?php echo $i + $k ?></td>
				<td><?php echo h($store['Item']['name1']) ?></td>
				<td><?php echo $store['Store']['amount'] ?></td>
				<td><?php echo $store['Store']['cost'] ?></td>
				<td><?php echo $store['Store']['supplier_name'] ?></td>
				<td>
					<?php echo $this->Html->link('<i class="icon-edit"></i>&nbsp;'.__('Sửa'), array('controller'=> 'stores', 'action'=> 'edit', $store['Store']['id']), array('escape'=> false, 'class'=> 'pull-left'))?>
					<?php echo $this->Form->postLink('<i class="icon-edit"></i>&nbsp;'.__('Xóa'), array('controller'=> 'stores', 'action'=> 'delete', $store['Store']['id']), array('escape'=> false, 'class'=> 'pull-right'))?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
 
<?php echo $this->element('pager') ?>
