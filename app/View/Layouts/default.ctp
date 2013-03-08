<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

// $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset('UTF-8'); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
// 		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap.min','bootstrap-responsive.min', 'custom'));

		echo $this->Html->script(array('jquery-1.9.1.min', 'bootstrap.min'));
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<div>
				<?php echo $this->Html->image('sam-logo-inside.png', array('id' => 'brand-logo'))?>
			</div>
			<div class="header-info row-fluid">
				<div class="span6">
					<ul class="breadcrumb">
					  <li><a href="javascript:void(0)">Trang chủ</a> <span class="divider">></span></li>
					  <li class="active">Thực đơn</li>
					</ul>
				</div>
				<div class="span6">
					<div class="sys-info pull-right">
						Xin chào <strong>Username</strong>!
						&nbsp;
						<?php echo $this->Html->link('Đăng xuất', array('controller' => 'users', 'action' => 'logout'))?>
					</div>
				</div>
			</div>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<p>© Van Viet Cafe - 2013</p>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
