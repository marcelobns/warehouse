<h4>Relacionado</h4>
<ul class="nav nav-pills nav-stacked" role="tablist">
    <li><?php echo $this->Html->link('<i class="fa fa-list-alt fa-lg pull-right"></i>'.__('List Users'), array('controller' => 'users', 'action' => 'index'), array('escape'=>false)); ?> </li>
    <li><?php echo $this->Html->link('<i class="fa fa-list-alt fa-lg pull-right"></i>'.__('List User Roles'), array('controller' => 'user_roles', 'action' => 'index'), array('escape'=>false)); ?> </li>
    <li><?php echo $this->Html->link('<i class="fa fa-list-alt fa-lg pull-right"></i>'.__('List Orders'), array('controller'=>'orders', 'action' => 'index'), array('escape'=>false)); ?> </li>
    <?php foreach($this->Session->Read('Auth.User.OrganizationTypes') as $i=>$value):?>
        <li><?php echo $this->Html->link('<i class="fa fa-list-alt fa-lg pull-right"></i>'.$value,
                array('controller'=>'organizations', 'action' => 'index', $i),
                array('escape'=>false)); ?></li>
    <?php endforeach;?>
</ul>
