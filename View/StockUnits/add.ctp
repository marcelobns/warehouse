<div class="stockUnits form">
<?php echo $this->Form->create('StockUnit'); ?>
	<fieldset>
		<legend><?php echo __('Add Stock Unit'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('acronym');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Stock Units'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
	</ul>
</div>
