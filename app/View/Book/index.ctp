<ul class="nav nav-tabs">
	<li class="active"><?php echo $this->Html->link(__('Quản lý'), array('controller' => 'book'))?></li>
	<li><?php echo $this->Html->link(__('Đặt chỗ'), array('controller'=> 'book', 'action' => 'add'))?></li>
</ul>
<h4><?php echo __('Quản lý đặt chỗ') ?></h4>
<br>
<div>
	<?php echo $this->Form->create('Booking', array('type'=> 'get', 'class'=> 'form-inline', 'inputDefaults'=> array('div'=> false, 'label'=> false), 'id'=> 'formBook'))?>
			<div style="margin: 10px 0px 10px 0;">
				<?php echo $this->Form->select('table_id', $tables, array('class'=> 'input-medium', 'empty'=> __('Tên bàn')))?>
				&nbsp;
				<?php echo $this->Form->input('booker_name', array('placeholder'=> __('Tên người đặt')))?>
				&nbsp;
				<?php echo $this->Form->input('booker_contact', array('placeholder'=> __('SDT người đặt')))?>
			</div>
			
			<div style="margin: 10px 0px 10px 0; ">
				<?php echo $this->Form->input('book_day', array('type'=> 'text', 'placeholder'=> __('Ngày đặt')))?>
				&nbsp;
				<?php echo $this->Form->input('created', array('type'=> 'text', 'placeholder'=> __('Ngày nhận đặt')))?>
				&nbsp;
				<?php echo $this->Form->input('received_by', array('placeholder'=> __('Người nhận đặt')))?>
				&nbsp;
				<?php echo $this->Form->button('<i class="icon-search"></i>'.__('Tìm kiếm'), array('escape'=> false, 'class'=> 'btn btn-warning'))?>
			</div>
	</form>
</div>
<hr>
<div>
	<table class="table table-bordered table-striped menu-table">
		<thead>
			<tr>
				<th><?php echo __('STT') ?></th>
				<th><?php echo __('Bàn') ?></th>
				<th><?php echo __('Tên khách đặt') ?></th>
				<th><?php echo __('Thông tin liên lạc') ?></th>
				<th><?php echo __('Thời gian khách đặt') ?></th>
				<th><?php echo __('Thời gian nhận đặt') ?></th>
				<th><?php echo __('Người nhận đặt') ?></th>
				<th><?php echo __('Trạng thái') ?></th>
				<th><?php echo __('Thao tác') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$typeOptions = array('1'=> __('Đồ ăn'), 2=> __('Đồ uống'));
			$params = $this->Paginator->params();
			$i = ($params['page'] - 1)*$params['limit'] + 1;
			?>
			<?php foreach ($bookings as $k => $booking): ?>
			<tr>
				<td><?php echo $i + $k ?></td>
				<td><?php echo $booking['Table']['name'] ?></td>
				<td><?php echo $booking['Booking']['booker_name']?></td>
				<td><?php echo $booking['Booking']['booker_contact']?></td>
				<td><?php echo date('d/m/Y H:i', strtotime($booking['Booking']['time_from']))?></td>
				<td><?php echo date('d/m/Y H:i', strtotime($booking['Booking']['time_to']))?></td>
				<td><?php echo $booking['User']['username']?></td>
				<td><?php 
				switch($booking['Booking']['status']){
					case 0:
						echo '<p style="color:gray;">'.__('Hủy đặt').'</p>';
						break;
					case 1:
						echo '<p style="color:red;">'.__('Khách chưa đến').'</p>';
						break;
					case 2:
						echo '<p style="color:green;">'.__('Khách đã đến').'</p>';
						break;
				}
				?></td>
				<td>
					<?php echo $this->Html->link('<i class="icon-edit"></i>&nbsp;'.__('Sửa'), array('controller'=> 'book', 'action'=> 'edit', $booking['Booking']['id']), array('escape'=> false, 'class'=> 'pull-left'))?>
					<?php echo $this->Form->postLink('<i class="icon-edit"></i>&nbsp;'.__('Xóa'), array('controller'=> 'book', 'action'=> 'delete', $booking['Booking']['id']), array('escape'=> false, 'class'=> 'pull-right'), __('Bạn có muốn xóa sự kiện đặt chỗ này không?'))?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<ul class="pager">
  <li class="previous">
    <?php echo $this->Paginator->prev(' << ' . __('Phía trước'), array(), null, array('class' => 'hidden')); ?>
  </li>
  <li class="next">
    <?php echo $this->Paginator->next(__('Tiếp theo').' >> ', array(), null, array('class' => 'hidden')); ?>
  </li>
</ul>
<script type="text/javascript">
$('#formBook').submit(function() {
	$('#formBook input, #formBook select').each(function(){
		if($(this).val() === ''){
			$(this).attr('name','');
		}
	});
});
</script>
