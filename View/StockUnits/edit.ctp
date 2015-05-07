<div class="container">
	<div class="stockUnits form col-md-9">
		<?php echo $this->Form->create('StockUnit'); ?>
		<fieldset>
			<legend><?php echo __('Edit Stock Unit'); ?></legend>
			<?php
			echo $this->Form->input('id');
			echo $this->Form->input('name');
			echo $this->Form->input('acronym');
			?>
			<?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
			<?php echo $this->Html->link(__('Cancel'), array('action'=>'index'), array('class'=>'btn btn-default reset')); ?>
		</fieldset>    
		<?php echo $this->Form->end(); ?>
	</div>
	<div class="actions col-md-3">
		<h4>Relacionado</h4>
		<ul>
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('StockUnit.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('StockUnit.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Stock Units'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
