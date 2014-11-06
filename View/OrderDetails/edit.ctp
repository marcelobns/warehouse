<div class="orderDetails form">
<?php echo $this->Form->create('OrderDetail'); ?>
	<fieldset>
		<legend><?php echo __('Edit Order Detail'); ?></legend>
	<?php
		echo $this->Form->input('id');
        echo $this->Form->input('order_type_id', array('hidden'=>true, 'label'=>false, 'div'=>false));
		echo $this->Form->input('name');
		echo $this->Form->input('value');
		echo $this->Form->input('input_type');
		echo $this->Form->input('input_mask');
		echo $this->Form->input('required');
		echo $this->Form->input('css_class');
		echo $this->Form->input('sort');
	?>
	</fieldset>
    <?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
    <?php echo $this->Html->link(__('Cancel'), $this->request->referer(), array('class'=>'btn btn-default')); ?>
    <?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OrderDetail.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('OrderDetail.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Order Details'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Types'), array('controller' => 'order_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Type'), array('controller' => 'order_types', 'action' => 'add')); ?> </li>
	</ul>
</div>