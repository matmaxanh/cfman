<?php echo $this->Html->scriptStart();?>
$(document).ready(function() {
        $('#chart-all').highcharts({
            chart: {
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
            	text: 'Doanh thu toàn bộ Nhân viên',
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Doanh Thu (VND)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: 'VND'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [{
                name: 'Anh A',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            }, {
                name: 'Chi B',
                data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
            }, {
                name: 'Co C',
                data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
            }, {
                name: 'Anh D',
                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
            }]
        });
        
        
         $('#chart-1').highcharts({
            chart: {
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
            	text: 'Doanh thu của Anh A',
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Doanh Thu (VND)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: 'VND'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [{
                name: 'Anh A',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
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
	<li><?php echo $this->Html->link('Thống kê chung', array('action' => 'sale'))?></li>
	<li><?php echo $this->Html->link('Theo khu vực', array('action' => 'sale_zone'))?></li>
	<li class="active"><?php echo $this->Html->link('Theo nhân viên', array('action' => 'sale_staff'))?></li>
</ul>

<h4>Thống kê theo nhân viên</h4>
<br>
<form class="form-inline">
		<label for="staff-picker">Nhân viên</label>
		<select id="staff-picker">
			<option>Tất cả</option>
			<option>Trần Quang Long</option>
			<option>NV 1sad</option>
			<option>NV 1eq</option>
		</select>
		&nbsp;
		<label for="time-picker">Thời gian</label>
		<input class="input-small" id="time-picker" value="<?php echo date('m/Y');?>">
		<button class="btn btn-success"><i class="icon-white icon-search"></i>Tìm kiếm</button>
</form>

<!--  Bang du lieu -->
<table class="table table-bordered table-striped menu-table">
	<thead>
		<tr>
			<th>Thời gian</th>
			<th>Nhân viên</th>
			<th>Options 1</th>
			<th>Options 2</th>
			<th>Doanh Thu</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td rowspan="3">12/12/2013</td>
			<td><?php echo 'A+'?></td>
			<td>1</td>
			<td>2</td>
			<td>32342</td>
		</tr>
		<tr>
			<td><?php echo 'A+'?></td>
			<td>1</td>
			<td>2</td>
			<td>32342</td>
		</tr>
		<tr>
			<td><?php echo 'A+'?></td>
			<td>1</td>
			<td>2</td>
			<td>32342</td>
		</tr>
		
		<tr>
			<td rowspan="3">13/12/2013</td>
			<td><?php echo 'A+'?></td>
			<td>1</td>
			<td>2</td>
			<td>32342</td>
		</tr>
		<tr>
			<td><?php echo 'A+'?></td>
			<td>1</td>
			<td>2</td>
			<td>32342</td>
		</tr>
		<tr>
			<td><?php echo 'A+'?></td>
			<td>1</td>
			<td>2</td>
			<td>32342</td>
		</tr>
	</tbody>
</table>

<!-- Bang du lieu cua 1 nhan vien -->
<table class="table table-bordered table-striped menu-table">
	<thead>
		<tr>
			<th>Thời gian</th>
			<th>Nhân viên</th>
			<th>Options 1</th>
			<th>Options 2</th>
			<th>Doanh Thu</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>12/12/2013</td>
			<td><?php echo 'A+'?></td>
			<td>1</td>
			<td>2</td>
			<td>32342</td>
		</tr>
		
		<tr>
			<td>13/12/2013</td>
			<td><?php echo 'A+'?></td>
			<td>1</td>
			<td>2</td>
			<td>32342</td>
		</tr>
	</tbody>
</table>


<!-- Chart hien thi -->
<div id="chart-all" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
<br>
<div id="chart-1" style="min-width: 400px; height: 400px; margin: 0 auto"></div>



