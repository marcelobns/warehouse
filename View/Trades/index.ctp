<div class="trades index">
	<h2><?php echo __('Trades'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('order_id'); ?></th>
			<th><?php echo $this->Paginator->sort('stock_id'); ?></th>
			<th><?php echo $this->Paginator->sort('buy_amount'); ?></th>
			<th><?php echo $this->Paginator->sort('buy_price'); ?></th>
			<th><?php echo $this->Paginator->sort('sell_amount'); ?></th>
			<th><?php echo $this->Paginator->sort('sell_price'); ?></th>
			<th><?php echo $this->Paginator->sort('stock_situation_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($trades as $trade): ?>
	<tr>
		<td><?php echo h($trade['Trade']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($trade['Order']['id'], array('controller' => 'orders', 'action' => 'view', $trade['Order']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($trade['Stock']['name'], array('controller' => 'stocks', 'action' => 'view', $trade['Stock']['id'])); ?>
		</td>
		<td><?php echo h($trade['Trade']['buy_amount']); ?>&nbsp;</td>
		<td><?php echo h($trade['Trade']['buy_price']); ?>&nbsp;</td>
		<td><?php echo h($trade['Trade']['sell_amount']); ?>&nbsp;</td>
		<td><?php echo h($trade['Trade']['sell_price']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($trade['StockSituation']['name'], array('controller' => 'stock_situations', 'action' => 'view', $trade['StockSituation']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $trade['Trade']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $trade['Trade']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $trade['Trade']['id']), null, __('Are you sure you want to delete # %s?', $trade['Trade']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Trade'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Situations'), array('controller' => 'stock_situations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Situation'), array('controller' => 'stock_situations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Canceled Auth'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
