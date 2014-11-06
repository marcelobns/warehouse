<h3><?php echo __('Actions'); ?></h3>
<ul>
    <li><?php echo $this->Html->link('<i class="fa fa-list-alt fa-lg pull-right"></i>'.__('List Orders'), array('controller'=>'orders', 'action' => 'index'), array('escape'=>false)); ?> </li>
    <?php if(isset($order)):?>
    <li><?php echo $this->Html->link('<i class="fa fa-print fa-lg pull-right"></i></span>'.__('Print Order'),
                array('action' => 'print_order', $order['Order']['id']),
                array('title'=>__('Edit'), 'escape'=>false, 'target'=>'_blank'));?> </li>
    <li><?php echo $this->Html->link('<i class="fa fa-copy fa-lg pull-right"></i>'.__('Reuse Order'),
            array('action' => 'add_type', $order['Order']['id']),
            array('title'=>__('Reuse'), 'data-toggle'=>'modal', 'data-target'=>'#modal', 'escape'=>false)); ?></li>
    <?php
        if($order['Order']['id'] >= $lasts[2]['Order']['id'] && !$order['Order']['canceled']){
            echo '<li>'.$this->Html->link('<i class="fa fa-pencil fa-lg pull-right"></i>'.__('Edit Order'),
                array('action' => 'edit', $order['Order']['id']),
                array('title'=>__('Edit'), 'escape'=>false)).'</li>';
        }
        if ($order['Order']['id'] != $lasts[0]['Order']['id'] && !$order['Order']['canceled']){
            echo '<li>'.$this->Html->link('<i class="fa fa-ban fa-lg pull-right"></i>'.__('Cancel Order'),
                array('action' => 'cancel', $order['Order']['id']),
                array('title'=>__('Cancel'), 'data-toggle'=>'modal', 'data-target'=>'#modal', 'escape'=>false)).'</li>';
        }
        if($order['Order']['id'] >= $lasts[1]['Order']['id'] || $role_sort <= 2){
            echo '<li>'.$this->Form->postLink('<i class="fa fa-trash-o fa-lg pull-right"></i>'.__('Delete Order'),
                    array('action' => 'delete', $order['Order']['id']),
                    array('title'=>__('Delete'), 'escape'=>false),
                    __('Are you sure you want to delete # %s?', $order['Order']['id'])).'</li>';
        }
    ?>
    <?php endif; ?>
    <li><?php echo $this->Html->link('<i class="fa fa-plus fa-lg pull-right"></i>'.__('New Order'), array('controller'=>'orders','action' => 'add_type'), array('data-toggle'=>'modal', 'data-target'=>'#modal', 'escape'=>false)); ?>
    <li><?php echo $this->Html->link('<i class="fa fa-list-alt fa-lg pull-right"></i>'.__('List Stocks'), array('controller' => 'stocks', 'action' => 'index'), array('escape'=>false)); ?> </li>
    <li><?php echo $this->Html->link('<i class="fa fa-plus fa-lg pull-right"></i>'.__('New Stock'), array('controller' => 'stocks', 'action' => 'add'), array('escape'=>false)); ?> </li>
    <?php foreach($this->Session->Read('Config.OrganizationTypes') as $i=>$value):?>
        <li><?php echo $this->Html->link('<i class="fa fa-list-alt fa-lg pull-right"></i>'.$value,
                array('controller'=>'organizations', 'action' => 'index', $i),
                array('escape'=>false)); ?></li>
    <?php endforeach;?>
</ul>
