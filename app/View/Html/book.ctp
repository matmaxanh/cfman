<h4>Quản lý đặt chỗ</h4>
<br>
<div>
	<form class="form-inline">
			<div style="margin: 10px 0px 10px 0; ">
				<select class="input-medium">
				  <option>Tên bàn</option>
				  <option>Bàn 2</option>
				  <option>Bàn 3</option>
				  <option>Bàn 4</option>
				  <option>Bàn 5</option>
				</select>
				&nbsp;
				<input type="text" placeholder="Tên người đặt">
				&nbsp;
				<input type="text" placeholder="SDT người đặt">
			</div>
			
			<div style="margin: 10px 0px 10px 0; ">
				<input class="input-medium" type="text" placeholder="Ngày đặt"> 
				&nbsp;
				<input class="input-medium" type="text" placeholder="Ngày nhận đặt">
				&nbsp;
				<input type="text" placeholder="Người nhận đặt">
				&nbsp;
				<button class="btn btn-warning"><i class="icon-search"></i>Tìm kiếm</button>
			</div>
	</form>
</div>
<hr>
<?php echo $this->Element('html_next_prev');?>
<div>
	<table class="table table-bordered table-striped menu-table">
		<thead>
			<tr>
				<th>STT</th>
				<th>Bàn</th>
				<th>Tên khách đặt</th>
				<th>Thông tin liên lạc</th>
				<th>Thời gian khách đặt</th>
				<th>Thời gian nhận đặt</th>
				<th>Người nhận đặt</th>
				<th>Trạng thái</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Bàn 9</td>
				<td>Otto</td>
				<td>09424543</td>
				<td>18:30 - 14/04/2013</td>
				<td>10:15 - 14/04/2013</td>
				<td>Nhân viên A</td>
				<td><p style="color:red;">Khách chưa đến</p></td>
				<td>
					<a href="javascript:void(0)" class="pull-left"><i class="icon-edit"></i> Sửa</a>
					<a href="javascript:void(0)" class="pull-right"><i class="icon-trash"></i> Xóa</a>
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Bàn 11</td>
				<td>Jack</td>
				<td>09542543</td>
				<td>19:40 - 13/04/2013</td>
				<td>18:15 - 13/04/2013</td>
				<td>Nhân viên X</td>
				<td><p style="color:green;">Khách đã đến</p></td>
				<td>
					<a href="javascript:void(0)" class="pull-left"><i class="icon-edit"></i> Sửa</a>
					<a href="javascript:void(0)" class="pull-right"><i class="icon-trash"></i> Xóa</a>
				</td>
			</tr>
			<tr>
				<td>1</td>
				<td>Bàn 9</td>
				<td>Otto</td>
				<td>09424543</td>
				<td>18:30 - 14/04/2013</td>
				<td>10:15 - 14/04/2013</td>
				<td>Nhân viên A</td>
				<td><p style="color:orange;">Hủy đặt</p></td>
				<td>
					<a href="javascript:void(0)" class="pull-left"><i class="icon-edit"></i> Sửa</a>
					<a href="javascript:void(0)" class="pull-right"><i class="icon-trash"></i> Xóa</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?php echo $this->Element('html_next_prev');?>