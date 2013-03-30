<ul class="pager">
  <li class="previous">
    <?php echo $this->Paginator->prev(' << ' . __('Phía trước'), array(), null, array('class' => 'hidden')); ?>
  </li>
  <li class="next">
    <?php echo $this->Paginator->next(__('Tiếp theo').' >> ', array(), null, array('class' => 'hidden')); ?>
  </li>
</ul>