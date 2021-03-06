<div class="container">
	<div class="stockTypes view col-md-9">
		<h2><?php echo __('Stock Type'); ?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($stockType['StockType']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Name'); ?></dt>
			<dd>
				<?php echo h($stockType['StockType']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Avg Markup'); ?></dt>
			<dd>
				<?php echo h($stockType['StockType']['avg_markup']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Depreciation'); ?></dt>
			<dd>
				<?php echo h($stockType['StockType']['depreciation']); ?>
				&nbsp;
			</dd>			
		</dl>
	</div>
	<div class="actions col-md-3">
		<?=$this->element('actions.stocks');?>
	</div>
	<div class="related col-md-12">
		<h3><?php echo __('Related Stocks'); ?></h3>
		<?php if (!empty($stockType['Stock'])): ?>
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
				<?php foreach ($stockType['Stock'] as $stock): ?>
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
	</div>
</div>