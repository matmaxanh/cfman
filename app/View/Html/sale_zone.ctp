<?php echo $this->Html->scriptStart();?>
$(document).ready(function() {
        $('#chart').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Doanh thu theo khu vực 03-2013'
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            	percentageDecimals: 1
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Browser share',
                data: [
                    ['Khu vực I', 45.0],
                    ['Khu vực II', 25],
                    ['Khu vực III', 30]
                ]
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
	<li class="active"><?php echo $this->Html->link('Theo khu vực', array('action' => 'sale_zone'))?></li>
	<li><?php echo $this->Html->link('Theo nhân viên', array('action' => 'sale_staff'))?></li>
</ul>

<h4>Thống kê theo khu vực</h4>
<br>
<form class="form-inline">
		<label for="staff-picker">Khu vực</label>
		<select id="staff-picker" class="input-medium">
			<option>Tất cả</option>
			<option>Khu vực I</option>
			<option>Khu vực II</option>
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
			<th>Khu vực</th>
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
			<th>Khu vực</th>
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


<h1>Ghi chú : Nếu được thì khi click vào khu vực thì sẽ hiện ra các nhân viên phụ trách khu vực đó (POPUP/Tooltips...). Như vậy sẽ cung cấp nhiều thông tin hơn ?</h1>

<!-- Chart hien thi -->
<div id="chart" style="min-width: 400px; height: 400px; margin: 0 auto"></div>



