<h4>Relacionado</h4>
<ul class="nav nav-pills nav-stacked" role="tablist">
	<!--TODO voltar para pesquisa feita  -->
    <li><?php echo $this->Html->link(__('List Stocks'), array('controller'=>'stocks', 'action' => 'index')); ?></li>    
    <li><?php echo $this->Html->link(__('List Stock Types'), array('controller' => 'stock_types', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('List Stock Units'), array('controller' => 'stock_units', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
</ul>