<h3><?php echo __('Actions'); ?></h3>
<ul>
    <li><?php echo $this->Html->link(__('List Stocks'), array('controller'=>'stocks', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link(__('Stock Reports'), array('controller'=>'stocks', 'action' => 'reports')); ?></li>
    <li><?php echo $this->Html->link(__('List Stock Types'), array('controller' => 'stock_types', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('List Stock Units'), array('controller' => 'stock_units', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
</ul>