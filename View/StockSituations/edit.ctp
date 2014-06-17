<div class="stockSituations form">
<?php echo $this->Form->create('StockSituation'); ?>
	<fieldset>
		<legend><?php echo __('Edit Stock Situation'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('sort');
		echo $this->Form->input('inventory');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('StockSituation.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('StockSituation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Stock Situations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trades'), array('controller' => 'trades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trade'), array('controller' => 'trades', 'action' => 'add')); ?> </li>
	</ul>
</div>
