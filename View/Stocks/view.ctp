<div class="stocks view">
<legend><?php echo __('Stock'); ?><span class="pull-right"><?= isset($stock['Stock']['num']) ? $stock['StockGroup']['name'].' - <b>'.$stock['Stock']['num'].'</b>' : '<b>'.$stock['Stock']['id'].'</b>';?></span></legend>
	<dl style="font-size: 1.1em">
		<dt><?php echo __('Stock Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stock['StockType']['name'], array('controller' => 'stock_types', 'action' => 'view', $stock['StockType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($stock['Stock']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stock Unit'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stock['StockUnit']['name'], array('controller' => 'stock_units', 'action' => 'view', $stock['StockUnit']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Units'); ?></dt>
		<dd>
			<?php echo h($stock['Stock']['units']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($stock['Stock']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stock Situation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stock['StockSituation']['name'], array('controller' => 'stock_situations', 'action' => 'view', $stock['StockSituation']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
    <?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> '.__('Back'), array('action'=>'index'), array('class'=>'btn btn-default', 'escape'=>false)); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Stock'), array('action' => 'edit', $stock['Stock']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Stock'), array('action' => 'delete', $stock['Stock']['id']), null, __('Are you sure you want to delete # %s?', $stock['Stock']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Types'), array('controller' => 'stock_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Type'), array('controller' => 'stock_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Groups'), array('controller' => 'stock_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Group'), array('controller' => 'stock_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Units'), array('controller' => 'stock_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Unit'), array('controller' => 'stock_units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Situations'), array('controller' => 'stock_situations', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Trades'); ?></h3>
	<?php if (!empty($stock['Trade'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Order'); ?></th>
        <th><?php echo __('Buyer'); ?></th>
		<th><?php echo __('Buy Amount'); ?></th>
		<th><?php echo __('Sell Amount'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Stock Situation Id'); ?></th>
		<th><?php echo __('Done'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($stock['Trade'] as $trade): ?>
		<tr>
            <td><?php echo $trade['Order']['date_time']; ?></td>
			<td><?php echo ( isset($trade['Order']['num']) ?  $trade['Order']['num'].'/' : $trade['Order']['num']).$trade['Order']['reference_year']; ?></td>
            <td><?php echo $trade['Buyer']['name']; ?></td>
			<td><?php echo $trade['Trade']['buy_amount']; ?></td>
			<td><?php echo $trade['Trade']['sell_amount']; ?></td>
			<td><?php echo number_format($trade['Trade']['buy_price']+$trade['Trade']['sell_price'], 2, ',', '.'); ?></td>
			<td><?php echo $trade['StockSituation']['name']; ?></td>
			<td>
                <?php
                    if($trade['Trade']['canceled']){
                        echo '<i class="fa fa-ban fa-lg" style="color:darkred;"></i>';
                    } else {
                        echo $trade['Trade']['done'] ? '<i class="fa fa-check fa-lg" style="color: darkgreen;"></i>' : '';
                    }
                ?>&nbsp;
			</td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $trade['Trade']['order_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
