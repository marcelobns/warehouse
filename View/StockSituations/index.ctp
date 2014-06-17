<div class="stockSituations index">
	<h2><?php echo __('Stock Situations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('sort'); ?></th>
			<th><?php echo $this->Paginator->sort('inventory'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($stockSituations as $stockSituation): ?>
	<tr>
		<td><?php echo h($stockSituation['StockSituation']['id']); ?>&nbsp;</td>
		<td><?php echo h($stockSituation['StockSituation']['name']); ?>&nbsp;</td>
		<td><?php echo h($stockSituation['StockSituation']['sort']); ?>&nbsp;</td>
		<td><?php echo h($stockSituation['StockSituation']['inventory']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $stockSituation['StockSituation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $stockSituation['StockSituation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $stockSituation['StockSituation']['id']), null, __('Are you sure you want to delete # %s?', $stockSituation['StockSituation']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Stock Situation'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trades'), array('controller' => 'trades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trade'), array('controller' => 'trades', 'action' => 'add')); ?> </li>
	</ul>
</div>
