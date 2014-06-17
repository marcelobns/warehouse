<div class="orderTypes form">
<?php echo $this->Form->create('OrderType'); ?>
	<fieldset>
		<legend><?php echo __('Add Order Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('module_id', array('type'=>'text', 'value'=>$module_id, 'hidden'=>true, 'div'=>false, 'label'=>false));
		echo $this->Form->input('seller_type_id', array('empty'=>__('Select an Item...')));
		echo $this->Form->input('buyer_type_id', array('empty'=>__('Select an Item...')));
	?>
	</fieldset>
    <?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
    <?php echo $this->Html->link(__('Cancel'), array('action'=>'index'), array('class'=>'btn btn-default')); ?>
    <?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Order Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Organization Types'), array('controller' => 'organization_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seller Type'), array('controller' => 'organization_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modules'), array('controller' => 'modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Module'), array('controller' => 'modules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Details'), array('controller' => 'order_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Detail'), array('controller' => 'order_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
