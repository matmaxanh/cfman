<div class="center-div">
	<div class="index-main">
		<div class="row-fluid row-menu">
			<div class="span4">
				<?php 
					echo $this->Html->link('<i class="icon-tasks icon-white"></i> Doanh Thu', 
						array('action' => 'sale'),
						array('class' => 'btn btn-success btn-large menu-btn', 'escape' => false)
					);
				?>
			</div>
			<div class="span4">
				<?php 
					echo $this->Html->link('<i class="icon-shopping-cart icon-white"></i> Order', 
						array('action' => 'order'),
						array('class' => 'btn btn-success btn-large menu-btn', 'escape' => false)
					);
				?>
			</div>
			<div class="span4">
				<?php 
					echo $this->Html->link('<i class="icon-book icon-white"></i> Đặt chỗ',
						array('action' => 'book'),
						array('class' => 'btn btn-success btn-large menu-btn', 'escape' => false)
					);
				?>
			</div>
		</div>
		<div class="row-fluid row-menu">
			<div class="span4">
				<?php 
					echo $this->Html->link('<i class="icon-hdd icon-white"></i> Kho hàng',
						array('action' => 'store'),
						array('class' => 'btn btn-success btn-large menu-btn', 'escape' => false)
					);
				?>
			</div>
			<div class="span4">
				<?php 
					echo $this->Html->link('<i class="icon-list-alt icon-white"></i> Thực đơn',
						array('action' => 'menu'),
						array('class' => 'btn btn-success btn-large menu-btn', 'escape' => false)
					);
				?>
			</div>
			<div class="span4">
				<?php 
					echo $this->Html->link('<i class="icon-resize-full icon-white"></i> Quản lý khác',
						array('action' => 'others'),
						array('class' => 'btn btn-success btn-large menu-btn', 'escape' => false)
					);
				?>
			</div>
		</div>
		<div class="row-fluid row-menu">
			<div class="span4">
				<?php 
					echo $this->Html->link('<i class="icon-user icon-white"></i> Nhân viên',
						array('action' => 'user'),
						array('class' => 'btn btn-success btn-large menu-btn', 'escape' => false)
					);
				?>
			</div>
		</div>
    </div>
</div>