<?php echo $this->Html->scriptStart();?>
$(document).ready(function() {
        $('#chart').highcharts({
            chart: {
                type: 'column',
                margin: [ 50, 50, 100, 80]
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: [<?php echo implode(",", $dates) ?>],
                labels: {
                    rotation: -45,
                    align: 'right',
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Doanh thu (VND)'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        'Doanh thu la '+ Highcharts.numberFormat(this.y, 0) + ' đồng';
                }
            },
            series: [{
                name: 'Population',
                data: [<?php echo implode(",", array_values($data)) ?>],
                dataLabels: {
                    enabled: true,
                    rotation: 0,
                    color: '#000',
                    align: 'center',
                    x: 0,
                    y: 0,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                },
            }]
        });
        
        
        $('#time-picker').datepicker( {
	        changeMonth: true,
	        changeYear: true,
	        showButtonPanel: true,
	        dateFormat: 'mm/yy',
	        onClose: function(dateText, inst) { 
	            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
	            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
	            $(this).datepicker('setDate', new Date(year, month, 1));
	        }
	    });
});
<?php echo $this->Html->scriptEnd();?>
<style>
.ui-datepicker-calendar {
	display: none;
}
</style>

<ul class="nav nav-tabs">
	<li class="active"><?php echo $this->Html->link('Thống kê chung', array('action' => 'sale'))?></li>
	<li><?php echo $this->Html->link('Theo khu vực', array('action' => 'zone'))?></li>
	<li><?php echo $this->Html->link('Theo nhân viên', array('action' => 'staff'))?></li>
</ul>

<h4><?php echo __('Thống kê chung') ?></h4>
<br>
<?php echo $this->Form->create('Sale', array(
	'inputDefaults' => array('div'=> false, 'label'=> false),
	'url' => array('controller' => 'sale', 'action' => 'index'),
));
echo $this->Form->input('month', array('class' => 'input-small', 'id' => 'time-picker', 'value' => $month, 'style' => 'float:left'));
echo $this->Form->button('<i class="icon-white icon-search"></i>Tìm kiếm', array('escape' => false, 'class'=> 'btn btn-success', 'style' => 'margin-left:5px'));
echo $this->Form->end();
?>

<!-- Chart hien thi -->
<div id="chart" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

<!--  Bang du lieu -->
<table class="table table-bordered table-striped menu-table">
	<thead>
		<tr>
			<th><?php echo __('Thời gian') ?></th>
			<th><?php echo __('Doanh thu') ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data as $day => $value): ?>
			<tr>
				<td><?php echo date('d/m/Y', strtotime($day.' 00:00:00')); ?></td>
				<td><?php echo $value; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>



