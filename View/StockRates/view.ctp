<div class="stockRates view">
<h2><?php echo __('Stock Rate'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($stockRate['StockRate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stock'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stockRate['Stock']['name'], array('controller' => 'stocks', 'action' => 'view', $stockRate['Stock']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($stockRate['StockRate']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($stockRate['StockRate']['value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Stock Rate'), array('action' => 'edit', $stockRate['StockRate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Stock Rate'), array('action' => 'delete', $stockRate['StockRate']['id']), null, __('Are you sure you want to delete # %s?', $stockRate['StockRate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Rates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Rate'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
	</ul>
</div>
