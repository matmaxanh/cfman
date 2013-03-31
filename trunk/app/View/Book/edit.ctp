<?php 
echo $this->Html->script(array('jquery-ui', 'jquery-ui-timepicker-addon', 'jquery-ui-sliderAccess'), array('inline'=> false));
echo $this->Html->css(array('jquery-ui', 'jquery-ui-timepicker-addon'), 'stylesheet', array('inline'=> false));
?>

<?php echo $this->start('breadcrumbs')?>
<li>
	<?php echo $this->Html->link(__('Trang chủ'), array('controller'=> 'users', 'action'=> 'dashboard'), array('escape'=> false))?>
	<span class="divider">&nbsp;&gt;</span>
</li>
<li class="active"><?php echo __('Sửa thông tin đặt chỗ') ?></li>
<?php echo $this->end() ?>

<ul class="nav nav-tabs">
	<li><?php echo $this->Html->link(__('Quản lý'), array('controller' => 'book', 'action'=> 'index'))?></li>
	<li><?php echo $this->Html->link(__('Đặt chỗ'), array('controller'=> 'book', 'action' => 'add'))?></li>
</ul>

<h4><?php echo __('Sửa thông tin đặt chỗ')?></h4>
<br>
<div class="row-fluid">
	<?php echo $this->Form->create('Booking', array('class'=> 'form-horizontal', 'inputDefaults'=> array('div'=> false, 'label'=> false)))?>
		<div class="span2">&nbsp;</div>
		<div class="span8">
			<div class="control-group">
				<label class="control-label">Bàn đặt</label>
				<div class="controls">
					<?php echo $this->Form->select('table_id', $tables, array('class'=> 'input-medium', 'empty'=> __('Tên bàn')))?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"><?php echo __('Tên người đặt') ?></label>
				<div class="controls">
					<?php echo $this->Form->input('booker_name', array('placeholder'=> __('Tên người đặt')))?>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label"><?php echo __('SDT người đặt') ?></label>
				<div class="controls">
					<?php echo $this->Form->input('booker_contact', array('placeholder'=> __('SDT người đặt')))?>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="thoiGianDat">Thời gian đặt</label>
				<div class="controls">
					<?php echo $this->Form->input('book_from', array('type'=> 'text', 'id'=> 'book_time_from'))?>
					-
					<?php echo $this->Form->input('book_to', array('type'=> 'text', 'id'=> 'book_time_to'))?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"><?php echo __('Tình trạng')?></label>
				<div class="controls">
					<?php
					$statusOptions = array(
						STATUS_ACTIVE=> __('Khách chưa đến'),
						2 => __('Khách đã đến'),
						0 => __('Hủy đặt'),
					);
					echo $this->Form->select('status', $statusOptions, array('empty'=> false));
					?>
				</div>
			</div>
			<?php echo $this->Form->hidden('id') ?>
			<?php echo $this->Form->hidden('received_by', array('value'=> $this->Session->read('Auth.User.id')))?>
			<hr>
			<div class="control-group"> 
				<div class="controls">
					<?php echo $this->Form->button(__('Lưu thông tin'), array('class'=> 'btn btn-primary'))?>
					<?php echo $this->Html->link('Reset', array('controller'=> 'book', 'action'=> 'edit', $this->request->data['Booking']['id']), array('class'=> 'btn'))?>
				</div>
			</div>
		</div>
		<div class="span2">&nbsp;</div>
	<?php echo $this->Form->end() ?>
</div>
<script type="text/javascript">
$(document).ready(function(){
var startDateTextBox = $('#book_time_from');
var endDateTextBox = $('#book_time_to');
startDateTextBox.datetimepicker({ 
	dateFormat: "dd/mm/yy",
	pickerTimeFormat: "hh:mm",
	onClose: function(dateText, inst) {
		if (endDateTextBox.val() != '') {
			var testStartDate = startDateTextBox.datetimepicker('getDate');
			var testEndDate = endDateTextBox.datetimepicker('getDate');
			if (testStartDate > testEndDate)
				endDateTextBox.datetimepicker('setDate', testStartDate);
		}
		else {
			endDateTextBox.val(dateText);
		}
	},
	onSelect: function (selectedDateTime){
		endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
	}
});
endDateTextBox.datetimepicker({
	dateFormat: "dd/mm/yy",
	pickerTimeFormat: "hh:mm",
	onClose: function(dateText, inst) {
		if (startDateTextBox.val() != '') {
			var testStartDate = startDateTextBox.datetimepicker('getDate');
			var testEndDate = endDateTextBox.datetimepicker('getDate');
			if (testStartDate > testEndDate)
				startDateTextBox.datetimepicker('setDate', testEndDate);
		}
		else {
			startDateTextBox.val(dateText);
		}
	},
	onSelect: function (selectedDateTime){
		startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
	}
});
});
</script>