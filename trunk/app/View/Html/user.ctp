<ul class="nav nav-tabs">
	<li class="active"><?php echo $this->Html->link('Danh sách', array('action' => 'user'))?></li>
	<li><?php echo $this->Html->link('Thêm mới', array('action' => 'user_add'))?></li>
</ul>

<div>
	<h4>Quản lý User</h4>
	<br>
	<form class="form-inline">
		<div style="margin: 10px 0px 10px 0; ">
			<input type="text" placeholder="Tên User">
			&nbsp;
			<select>
			  <option>Nhóm</option>
			  <option>2</option>
			  <option>3</option>
			  <option>4</option>
			  <option>5</option>
			</select>
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
				<th class="span1">STT</th>
				<th>Tên User</th>
				<th>Nhóm</th>
				<th class="span2">Thao tác</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Mark</td>
				<td>Otto</td>
				<td>
					<a href="javascript:void(0)" class="pull-left"><i class="icon-edit"></i> Sửa</a>
					<a href="javascript:void(0)" class="pull-right"><i class="icon-trash"></i> Xóa</a>
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Jacob</td>
				<td>Thornton</td>
				<td>
					<a href="javascript:void(0)" class="pull-left"><i class="icon-edit"></i> Sửa</a>
					<a href="javascript:void(0)" class="pull-right"><i class="icon-trash"></i> Xóa</a>
				</td>
			</tr>
			<tr>
				<td>3</td>
				<td>Larry the Bird</td>
				<td>@twitter</td>
				<td>
					<a href="javascript:void(0)" class="pull-left"><i class="icon-edit"></i> Sửa</a>
					<a href="javascript:void(0)" class="pull-right"><i class="icon-trash"></i> Xóa</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
 
<?php echo $this->Element('html_next_prev');?>

