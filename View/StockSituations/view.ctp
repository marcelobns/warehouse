<div class="stockSituations view">
<h2><?php echo __('Stock Situation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($stockSituation['StockSituation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($stockSituation['StockSituation']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sort'); ?></dt>
		<dd>
			<?php echo h($stockSituation['StockSituation']['sort']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inventory'); ?></dt>
		<dd>
			<?php echo h($stockSituation['StockSituation']['inventory']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Stock Situation'), array('action' => 'edit', $stockSituation['StockSituation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Stock Situation'), array('action' => 'delete', $stockSituation['StockSituation']['id']), null, __('Are you sure you want to delete # %s?', $stockSituation['StockSituation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Situations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Situation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trades'), array('controller' => 'trades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trade'), array('controller' => 'trades', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Stocks'); ?></h3>
	<?php if (!empty($stockSituation['Stock'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Stock Type Id'); ?></th>
		<th><?php echo __('Stock Group Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Stock Unit Id'); ?></th>
		<th><?php echo __('Units'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Markup'); ?></th>
		<th><?php echo __('Stock Situation Id'); ?></th>
		<th><?php echo __('Buy Order Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($stockSituation['Stock'] as $stock): ?>
		<tr>
			<td><?php echo $stock['id']; ?></td>
			<td><?php echo $stock['stock_type_id']; ?></td>
			<td><?php echo $stock['stock_group_id']; ?></td>
			<td><?php echo $stock['code']; ?></td>
			<td><?php echo $stock['name']; ?></td>
			<td><?php echo $stock['description']; ?></td>
			<td><?php echo $stock['stock_unit_id']; ?></td>
			<td><?php echo $stock['units']; ?></td>
			<td><?php echo $stock['price']; ?></td>
			<td><?php echo $stock['markup']; ?></td>
			<td><?php echo $stock['stock_situation_id']; ?></td>
			<td><?php echo $stock['buy_order_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'stocks', 'action' => 'view', $stock['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'stocks', 'action' => 'edit', $stock['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'stocks', 'action' => 'delete', $stock['id']), null, __('Are you sure you want to delete # %s?', $stock['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Trades'); ?></h3>
	<?php if (!empty($stockSituation['Trade'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Stock Id'); ?></th>
		<th><?php echo __('Buy Amount'); ?></th>
		<th><?php echo __('Buy Price'); ?></th>
		<th><?php echo __('Sell Amount'); ?></th>
		<th><?php echo __('Sell Price'); ?></th>
		<th><?php echo __('Stock Situation Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('Done'); ?></th>
		<th><?php echo __('Canceled'); ?></th>
		<th><?php echo __('Canceled Note'); ?></th>
		<th><?php echo __('Canceled Auth Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($stockSituation['Trade'] as $trade): ?>
		<tr>
			<td><?php echo $trade['id']; ?></td>
			<td><?php echo $trade['order_id']; ?></td>
			<td><?php echo $trade['stock_id']; ?></td>
			<td><?php echo $trade['buy_amount']; ?></td>
			<td><?php echo $trade['buy_price']; ?></td>
			<td><?php echo $trade['sell_amount']; ?></td>
			<td><?php echo $trade['sell_price']; ?></td>
			<td><?php echo $trade['stock_situation_id']; ?></td>
			<td><?php echo $trade['organization_id']; ?></td>
			<td><?php echo $trade['done']; ?></td>
			<td><?php echo $trade['canceled']; ?></td>
			<td><?php echo $trade['canceled_note']; ?></td>
			<td><?php echo $trade['canceled_auth_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'trades', 'action' => 'view', $trade['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'trades', 'action' => 'edit', $trade['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'trades', 'action' => 'delete', $trade['id']), null, __('Are you sure you want to delete # %s?', $trade['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Trade'), array('controller' => 'trades', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
