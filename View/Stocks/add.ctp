<div class="stocks form">
<?php echo $this->Form->create('Stock'); ?>
	<fieldset>
		<legend><?php echo __('Add Stock'); ?></legend>
	<?php
		echo $this->Form->input('stock_type_id', array('class'=>'select2', 'empty'=>__('Select an Item...')));
		echo $this->Form->input('description', array('class'=>'uppercase'));
		echo $this->Form->input('stock_unit_id', array('class'=>'select2', 'empty'=>__('Select an Item...')));
        echo $this->Form->input('units', array('value'=> 1, 'min'=>1));
        echo $this->Form->input('price', array('step'=>0.01, 'min'=>0));
        echo $this->Form->input('markup', array('min'=>0, 'step'=>0.01));
	?>
	</fieldset>
    <?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
    <?php echo $this->Html->link(__('Cancel'), array('action'=>'index'), array('class'=>'btn btn-default')); ?>
    <?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Stocks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Stock Types'), array('controller' => 'stock_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Type'), array('controller' => 'stock_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Groups'), array('controller' => 'stock_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Group'), array('controller' => 'stock_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Units'), array('controller' => 'stock_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Unit'), array('controller' => 'stock_units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Situations'), array('controller' => 'stock_situations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Situation'), array('controller' => 'stock_situations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Buy Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Rates'), array('controller' => 'stock_rates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Rate'), array('controller' => 'stock_rates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trades'), array('controller' => 'trades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trade'), array('controller' => 'trades', 'action' => 'add')); ?> </li>
	</ul>
</div>
