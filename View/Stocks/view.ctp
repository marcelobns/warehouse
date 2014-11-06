<div class="stocks view">
<legend><?php echo __('Stock'); ?><span class="pull-right"><?= isset($stock['Stock']['num']) ? $stock['StockGroup']['name'].' - <b>'.$stock['Stock']['num'].'</b>' : '<b>'.$stock['Stock']['id'].'</b>';?></span></legend>
	<dl style="font-size: 1.1em">
		<dt><?php echo __('Stock Type'); ?></dt>
		<dd>
            <?php echo h($stock['StockType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($stock['Stock']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stock Unit'); ?></dt>
		<dd>
			<?php echo h($stock['StockUnit']['name']); ?>
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
    <?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> '.__('Back'), array('action'=>'index'), array('class'=>'btn btn-default no-print', 'escape'=>false)); ?>
</div>
<div class="actions">
    <?=$this->element('actions.stocks');?>
</div>
<div class="related">
    <?php echo $this->Form->create('Stock'); ?>
        <?php echo $this->Form->input('data_inicio', array('type'=>'text', 'class'=>'date', 'style'=>'width:18%;'));?>
    <?php echo $this->Form->end(); ?>
	<?php if (!empty($stock['Trade'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Date'); ?></th>
        <th><?php echo __('Order Type'); ?></th>
		<th><?php echo __('Order'); ?></th>
        <th><?php echo __('Buyer'); ?></th>
		<th><?php echo __('Buy Amount'); ?></th>
		<th><?php echo __('Sell Amount'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th class="no-print"><?php echo __('User'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($stock['Trade'] as $trade): ?>
		<tr style="font-size: .9em; white-space: nowrap;">
            <td><?php echo $trade['Order']['date_time']; ?></td>
            <td style="font-size: .8em"><?php echo $trade['OrderType']['name']; ?></td>
			<td><?php echo ( isset($trade['Order']['num']) ?  $trade['Order']['num'].'/' : $trade['Order']['num']).$trade['Order']['reference_year']; ?></td>
            <td style="font-size: .8em"><?php echo $trade['Buyer']['name']; ?></td>
			<td><?php echo $trade['Trade']['buy_amount']; ?></td>
			<td><?php echo $trade['Trade']['sell_amount']; ?></td>
			<td><?php echo number_format($trade['Trade']['buy_price']+$trade['Trade']['sell_price'], 2, ',', '.'); ?></td>
            <td class="no-print"><?php echo $trade['User']['username']; ?></td>
			<td class="actions">
                <?php if($trade['OrderType']['sort'] <= 3 ) {
                    echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $trade['Trade']['order_id']));
                }?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>