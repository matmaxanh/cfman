<?php echo $this->start('breadcrumbs')?>
<li>
	<?php echo $this->Html->link(__('Trang chủ'), array('controller'=> 'users', 'action'=> 'dashboard'), array('escape'=> false))?>
	<span class="divider">&nbsp;&gt;</span>
</li>
<li class="active"><?php echo __('Quản lý nhân viên') ?></li>
<?php echo $this->end() ?>

<?php echo $this->element('setup_pager') ?>

<ul class="nav nav-tabs">
	<li class="active"><?php echo $this->Html->link(__('Danh sách'), array('controller'=> 'users'))?></li>
	<li><?php echo $this->Html->link(__('Thêm mới'), array('controller'=> 'users', 'action'=> 'add'))?></li>
</ul>
<div>
	<h4><?php echo __('Quản lý nhân viên') ?></h4>
	<?php $groups = Configure::read('user_group') ?>
	<?php echo $this->Form->create('User', array('type'=> 'get', 'class'=> 'form-inline', 'inputDefaults'=> array('div'=> false, 'label'=> false), 'id'=> 'formUser'))?>
		<div style="margin: 10px 0px 10px 0; ">
			<?php echo $this->Form->select('group', $groups, array('value'=> (isset($_GET['group'])?$_GET['group']:'')))?>
			&nbsp;
			<?php echo $this->Form->input('username', array('value'=> (isset($_GET['username'])?$_GET['username']:''), 'placeholder'=> __('Tên nhân viên')))?>
			<button class="btn btn-warning"><i class="icon-search"></i>Tìm kiếm</button>
		</div>
		
	<?php echo $this->Form->end() ?>
</div>
<hr>
<div>
	<table class="table table-bordered table-striped menu-table">
		<thead>
			<tr>
				<th><?php echo __('STT') ?></th>
				<th><?php echo __('Tên nhân viên') ?></th>
				<th><?php echo __('Nhóm') ?></th>
				<th><?php echo __('Thao tác') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$params = $this->Paginator->params();
			$i = ($params['page'] - 1)*$params['limit'] + 1;
			?>
			<?php foreach ($users as $k=> $user): ?>
			<tr>
				<td><?php echo $i + $k ?></td>
				<td><?php echo $this->Html->link(h($user['User']['username']), array('controller'=> 'users', 'action'=> 'edit', $user['User']['id']), array('escape'=> false))?></td>
				<td><?php echo isset($groups[$user['User']['group']])?h($groups[$user['User']['group']]):'' ?></td>
				<td>
					<?php echo $this->Html->link('<i class="icon-edit"></i>&nbsp;'.__('Sửa'), array('controller'=> 'users', 'action'=> 'edit', $user['User']['id']), array('escape'=> false, 'class'=> 'pull-left'))?>
					<?php echo $this->Form->postLink('<i class="icon-edit"></i>&nbsp;'.__('Xóa'), array('controller'=> 'users', 'action'=> 'delete', $user['User']['id']), array('escape'=> false, 'class'=> 'pull-right'))?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
 
<?php echo $this->element('pager') ?>
<script type="text/javascript">
$('#formUser').submit(function() {
	$('#formUser input, #formUser select').each(function(){
		if($(this).val() === ''){
			$(this).attr('name','');
		}
	});
});
</script>