<div class="stockRates form">
<?php echo $this->Form->create('StockRate'); ?>
	<fieldset>
		<legend><?php echo __('Edit Stock Rate'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('stock_id');
		echo $this->Form->input('name');
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('StockRate.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('StockRate.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Stock Rates'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
	</ul>
</div>
