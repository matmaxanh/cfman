<?php
$links = array(
	'home' => array('title' => __('Trang chủ'), 'url' => array('controller' => 'users', 'action' => 'dashboard')),
	'sale' => array('title' => __('Doanh thu'), 'url' => array('controller' => 'sale', 'action' => 'index')),
	'order' => array('title' => __('Bán hàng'), 'url' => array('controller' => 'orders', 'action' => 'index')),
	'book' => array('title' => __('Đặt chỗ'), 'url' => array('controller' => 'book', 'action' => 'index')),
	'store' => array('title' => __('Kho hàng'), 'url' => array('controller' => 'stores', 'action' => 'index')),
	'menu' => array('title' => __('Thực đơn'), 'url' => array('controller' => 'menu', 'action' => 'index')),
	'member' => array('title' => __('Nhân viên'), 'url' => array('controller' => 'users', 'action' => 'index')),
); 
if(!isset($this->request->params['admin'])){
	$menuLinks = array($links['home'], $links['order'], $links['book'], $links['store'], $links['menu']);
}else{
	$menuLinks = array($links['sale'], $links['order'], $links['book'], $links['store'], $links['menu'], $links['member']);
}
?>
<div class="nav-collapse collapse">
	<ul class="nav">
		<?php foreach($menuLinks as $link){
			echo '<li>'.$this->Html->link($link['title'], $link['url'], array('escape' => false)).'</li>';
		}?>
	</ul>
	<div class="pull-right">
   		<div class="sys-info pull-right">
			<ul class="nav full pull-right">
				<li class="dropdown user-avatar">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#"> 
						<span><?php echo __('Hi, ')?> <strong><?php echo $this->Session->read('Auth.User.username')?></strong> <i class="icon-caret-down" style="background-color: #aaa;"></i></span> 
					</a>

					<ul class="dropdown-menu">
						<li><a href="#"><i class="icon-user"></i> <span><?php echo __('Cá nhân')?></span> </a>	</li>
						<li class="divider" style="margin: 5px 1px"></li>
						<li><?php echo $this->Html->link("<i class='icon-off'></i> ".__('Đăng xuất'), array('controller' => 'users', 'action' => 'logout'), array('escape' => false))?></li>
					</ul>
				</li>
			</ul>
		</div>
		
		<div class="to-info pull-right">
			<div class="table-object to-small to-empty">
				<p class="to-name-small center">55</p>
			</div>
			<div class="table-object to-small to-ordering">
				<p class="to-name-small center">3</p>
			</div>
			<div class="table-object to-small to-waiting">
				<p class="to-name-small center">4</p>
			</div>
			<div class="table-object to-small to-served">
				<p class="to-name-small center">1</p>
			</div>
		</div>
	</div>
</div>