<div class="stockGroups index">
	<h2><?php echo __('Stock Groups'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('inventory'); ?></th>
			<th><?php echo $this->Paginator->sort('sort'); ?></th>
			<th class="action-add"><?php echo $this->Html->link(__('New Stock Group'), array('action' => 'add')); ?></th>
	</tr>
	<?php foreach ($stockGroups as $stockGroup): ?>
	<tr>
		<td><?php echo h($stockGroup['StockGroup']['id']); ?>&nbsp;</td>
		<td><?php echo h($stockGroup['StockGroup']['name']); ?>&nbsp;</td>
		<td><?php echo h($stockGroup['StockGroup']['inventory']); ?>&nbsp;</td>
		<td><?php echo h($stockGroup['StockGroup']['sort']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $stockGroup['StockGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $stockGroup['StockGroup']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $stockGroup['StockGroup']['id']), null, __('Are you sure you want to delete # %s?', $stockGroup['StockGroup']['id'])); ?>
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
    <?=$this->element('actions.stocks');?>
</div>
