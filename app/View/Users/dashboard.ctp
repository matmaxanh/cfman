<div class="center-div">
	<div class="index-main">
		<div class="row-fluid row-menu">
			<div class="span4">
				<?php 
					echo $this->Html->link('<i class="icon-shopping-cart icon-white"></i>&nbsp;'.__('Đơn đặt hàng'), 
						array('controller'=> 'orders'),
						array('class' => 'btn btn-success btn-large menu-btn', 'escape' => false)
					);
				?>
			</div>
			<div class="span4">
				<?php 
					echo $this->Html->link('<i class="icon-book icon-white"></i>&nbsp;'.__('Đặt chỗ'),
						array('controller'=> 'book'),
						array('class' => 'btn btn-success btn-large menu-btn', 'escape' => false)
					);
				?>
			</div>
		</div>
		<div class="row-fluid row-menu">
			<div class="span4">
				<?php 
					echo $this->Html->link('<i class="icon-hdd icon-white"></i>&nbsp;'.__('Kho hàng'),
						array('controller'=> 'stores'),
						array('class' => 'btn btn-success btn-large menu-btn', 'escape' => false)
					);
				?>
			</div>
			<div class="span4">
				<?php 
					echo $this->Html->link('<i class="icon-list-alt icon-white"></i>&nbsp;'.__('Thực đơn'),
						array('controller'=> 'menu'),
						array('class' => 'btn btn-success btn-large menu-btn', 'escape' => false)
					);
				?>
			</div>
			<div class="span4">
				<?php 
					echo $this->Html->link('<i class="icon-resize-full icon-white"></i>&nbsp;'.__('Quản lý khác'),
						'other',
						array('class' => 'btn btn-success btn-large menu-btn', 'escape' => false)
					);
				?>
			</div>
		</div>
    </div>
</div>