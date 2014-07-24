<h3><?php echo __('Actions'); ?></h3>
<ul>
    <li><?php echo $this->Html->link(__('List Organization Types'), array('controller' => 'organization_types', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Organization Type'), array('controller' => 'organization_types', 'action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
</ul>