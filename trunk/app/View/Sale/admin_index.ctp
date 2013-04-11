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
                categories: [
                    '12/03/2013',
                    '12/03/2013',
                    '12/03/2013',
                    '12/03/2013',
                    '12/03/2013',
                    '12/03/2013',
                ],
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
                        'Doanh thu la '+ Highcharts.numberFormat(this.y, 1) + 'millions';
                }
            },
            series: [{
                name: 'Population',
                data: [34.4, 21.8, 20.1, 20, 34.6, 19.5],
                dataLabels: {
                    enabled: true,
                    rotation: 0,
                    color: '#000',
                    align: 'right',
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
	<li><?php echo $this->Html->link('Theo khu vực', array('action' => 'sale_zone'))?></li>
	<li><?php echo $this->Html->link('Theo nhân viên', array('action' => 'sale_staff'))?></li>
</ul>

<h4><?php echo __('Thống kê chung') ?></h4>
<br>
<form class="form-inline">
	<input class="input-small" id="time-picker" value="<?php echo date('m/Y');?>">
	<button class="btn btn-success"><i class="icon-white icon-search"></i>Tìm kiếm</button>
</form>

<!--  Bang du lieu -->
<table class="table table-bordered table-striped menu-table">
	<thead>
		<tr>
			<th>Thời gian</th>
			<th>Doanh Thu</th>
		</tr>
	</thead>
	<tbody>
		<?php for($i=1; $i<=6; ++$i):?>
			<tr>
				<td>12/12/2013</td>
				<td>32342</td>
			</tr>
		<?php endfor?>
	</tbody>
</table>


<!-- Chart hien thi -->
<div id="chart" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
