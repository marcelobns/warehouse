<h3><?php echo __('Actions'); ?></h3>
<ul>
<!--    <li>--><?php //echo $this->Html->link('<i class="fa fa-arrow-left pull-right"></i>'.__('Back'), $this->request->referer(), array('escape'=>false)); ?><!--</li>-->
    <?php if(isset($trade)):?>
    <li><?php echo $this->Form->postLink('<i class="fa fa-trash-o fa-lg pull-right"></i>'.__('Delete'), array('action' => 'delete', $this->Form->value('Trade.id')), array('escape'=>false), __('Are you sure you want to delete # %s?', $trade['Trade']['id'])); ?></li>
    <?php endif;?>
    <li><?php echo $this->Html->link('<i class="fa fa-list-alt fa-lg pull-right"></i>'.__('List Orders'), array('controller'=>'orders', 'action' => 'index'), array('escape'=>false)); ?> </li>
    <li><?php echo $this->Html->link('<i class="fa fa-plus fa-lg pull-right"></i>'.__('New Order'), array('controller'=>'orders', 'action' => 'add_type'), array('data-toggle'=>'modal', 'data-target'=>'#modal', 'escape'=>false)); ?>
    <li><?php echo $this->Html->link('<i class="fa fa-list-alt fa-lg pull-right"></i>'.__('List Stocks'), array('controller' => 'stocks', 'action' => 'index'), array('escape'=>false)); ?> </li>
    <li><?php echo $this->Html->link('<i class="fa fa-plus fa-lg pull-right"></i>'.__('New Stock'), array('controller' => 'stocks', 'action' => 'add'), array('escape'=>false)); ?> </li>

    <li><?php echo $this->Html->link('<i class="fa fa-list-alt fa-lg pull-right"></i>'.__('List Stock Situations'), array('controller' => 'stock_situations', 'action' => 'index'), array('escape'=>false)); ?> </li>
    <li><?php echo $this->Html->link('<i class="fa fa-plus fa-lg pull-right"></i>'.__('New Stock Situation'), array('controller' => 'stock_situations', 'action' => 'add'), array('escape'=>false)); ?> </li>

    <li><?php echo $this->Html->link('<i class="fa fa-list-alt fa-lg pull-right"></i>'.__('List Stock Groups'), array('controller' => 'stock_groups', 'action' => 'index'), array('escape'=>false)); ?> </li>
    <li><?php echo $this->Html->link('<i class="fa fa-plus fa-lg pull-right"></i>'.__('New Stock Group'), array('controller' => 'stock_groups', 'action' => 'add'), array('escape'=>false)); ?> </li>
</ul>