<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset('UTF-8'); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap.min','bootstrap-responsive.min', 'login'));

		echo $this->Html->script(array('jquery-1.9.1.min', 'bootstrap.min'));
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
	?>
</head>
<body>
	<div id="container">
		<div id="content">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
</body>
</html>
