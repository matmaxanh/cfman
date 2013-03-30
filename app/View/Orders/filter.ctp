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

<?php echo $this->start('breadcrumbs')?>
<li>
	<?php echo $this->Html->link(__('Trang chủ'), array('controller'=> 'users', 'action'=> 'dashboard'), array('escape'=> false))?>
	<span class="divider">&nbsp;&gt;</span>
</li>
<li class="active"><?php echo __('Duyệt đơn hàng') ?></li>
<?php echo $this->end() ?>

<ul class="nav nav-tabs">
	<li><?php echo $this->Html->link(__('Quản lý đơn hàng'), array('controller'=> 'orders', 'action' => 'index'))?></li>
	<li class="active"><?php echo $this->Html->link(__('Đơn hàng chờ duyệt'), array('controller'=> 'orders', 'action' => 'index', '?'=> array('filter'=> STATUS_ORDER_ORDERING)))?></li>
	<li><?php echo $this->Html->link(__('Nhân viên khu vực'), array('controller'=> 'orders', 'action' => 'filter', 'user'))?></li>
</ul>

<h4><?php echo __('Duyệt đơn hàng') ?></h4>
<br>
<div>
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

<div id="modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true"></div>
