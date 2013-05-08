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
<li class="active"><?php echo __('Quản lý đơn hàng') ?></li>
<?php echo $this->end() ?>

<ul class="nav nav-tabs">
	<li class="active"><?php echo $this->Html->link(__('Quản lý đơn hàng'), array('controller'=> 'orders', 'action' => 'index'))?></li>
	<li><?php echo $this->Html->link(__('Đơn hàng chờ duyệt'), array('controller'=> 'orders', 'action' => 'index', '?'=> array('filter'=> STATUS_ORDER_ORDERING)))?></li>
	<li><?php echo $this->Html->link(__('Nhân viên khu vực'), array('controller'=> 'orders', 'action' => 'filter', 'user'))?></li>
</ul>

<h4><?php echo __('Quản lý chung') ?></h4>
<br>
<div>
	<div class="accordion" id="accordion2">
		<!-- 
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
		 -->
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#col2">Trạng thái chi tiết</a>
			</div>
			<div id="col2" class="accordion-body collapse in">
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

<div id="modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true"></div>