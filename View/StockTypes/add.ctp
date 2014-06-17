<div class="stockTypes form">
<?php echo $this->Form->create('StockType'); ?>
	<fieldset>
		<legend><?php echo __('Add Stock Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('avg_markup');
		echo $this->Form->input('depreciation');
		echo $this->Form->input('consumer_goods');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Stock Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
	</ul>
</div>
