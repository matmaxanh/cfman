<?php
$links = array(
	'home' => array('title' => __('Trang chủ'), 'url' => array('controller' => 'users', 'action' => 'dashboard')),
	'sale' => array('title' => __('Doanh thu'), 'url' => array('controller' => 'sales', 'action' => 'index')),
	'order' => array('title' => __('Bán hàng'), 'url' => array('controller' => 'orders', 'action' => 'index')),
	'book' => array('title' => __('Đặt chỗ'), 'url' => array('controller' => 'books', 'action' => 'index')),
	'store' => array('title' => __('Kho hàng'), 'url' => array('controller' => 'stores', 'action' => 'index')),
	'menu' => array('title' => __('Thực đơn'), 'url' => array('controller' => 'items', 'action' => 'index')),
	'member' => array('title' => __('Nhân viên'), 'url' => array('controller' => 'users', 'action' => 'index')),
); 
if(!isset($this->request->params['admin'])){
	$menuLinks = array($links['home'], $links['order'], $links['book'], $links['store'], $links['menu']);
}else{
	$menuLinks = array($links['home'], $links['sale'], $links['order'], $links['book'], $links['store'], $links['menu'], $links['member']);
}?>
<div class="nav-collapse collapse">
	<ul class="nav">
		<?php foreach($menuLinks as $link){
			echo '<li>'.$this->Html->link($link['title'], $link['url'], array('escape' => false)).'</li>';
		}?>
	</ul>
	<div class="pull-right">
   		<div class="sys-info pull-right" style="margin-top: 3px;">
			<?php echo __('Xin chào')?> <strong><?php echo $this->Session->read('Auth.User.username')?></strong>!
				&nbsp;
			<?php echo $this->Html->link(__('Đăng xuất'), array('controller' => 'users', 'action' => 'logout'))?>
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