<ul class="nav nav-tabs">
	<li class="active"><?php echo $this->Html->link(__('Danh sách'), array('controller'=> 'items', 'action' => 'index'))?></li>
</ul>
<div>
	<h4>Tìm kiếm</h4>
	
	<form class="form-inline">
		<div style="margin: 10px 0px 10px 0; ">
			<select>
			  <option>Cafe, Sinh tố, Nước ép ...</option>
			  <option>2</option>
			  <option>3</option>
			  <option>4</option>
			  <option>5</option>
			</select>
			&nbsp;
			<input type="text" placeholder="Tên / Tiếng Anh / Tiếng Pháp">
		</div>
		
		<div style="margin: 10px 0px 10px 0; ">
			<input type="text" placeholder="Giá từ"> - <input type="text" placeholder="Tới khoảng">
			&nbsp;
			<button class="btn btn-warning"><i class="icon-search"></i>Tìm kiếm</button>
		</div>
		
		
	</form>
</div>
<hr>
<ul class="pager">
  <li class="previous">
    <a href="#">&larr; Older</a>
  </li>
  <li class="next">
    <a href="#">Newer &rarr;</a>
  </li>
</ul>
<div>
	<table class="table table-bordered table-striped menu-table">
		<thead>
			<tr>
				<th>STT</th>
				<th>Loại</th>
				<th>Tên</th>
				<th>Tên Tiếng Anh</th>
				<th>Tên Tiếng Pháp</th>
				<th>Đơn Giá</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Mark</td>
				<td>Otto</td>
				<td>@mdo</td>
				<td>Môndor</td>
				<td>2,500,000</td>
				<td>
					<a href="javascript:void(0)" class="pull-left"><i class="icon-edit"></i> Sửa</a>
					<a href="javascript:void(0)" class="pull-right"><i class="icon-trash"></i> Xóa</a>
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Jacob</td>
				<td>Thornton</td>
				<td>@fat</td>
				<td>Môndor</td>
				<td>2,500,000</td>
				<td>
					<a href="javascript:void(0)" class="pull-left"><i class="icon-edit"></i> Sửa</a>
					<a href="javascript:void(0)" class="pull-right"><i class="icon-trash"></i> Xóa</a>
				</td>
			</tr>
			<tr>
				<td>3</td>
				<td>Larry the Bird</td>
				<td>@twitter</td>
				<td>@fat</td>
				<td>Môndor</td>
				<td>2,500,000</td>
				<td>
					<a href="javascript:void(0)" class="pull-left"><i class="icon-edit"></i> Sửa</a>
					<a href="javascript:void(0)" class="pull-right"><i class="icon-trash"></i> Xóa</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
 
<ul class="pager">
  <li class="previous">
    <a href="#">&larr; Older</a>
  </li>
  <li class="next">
    <a href="#">Newer &rarr;</a>
  </li>
</ul>

