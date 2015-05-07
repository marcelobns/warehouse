<div class="container">
<div class="stocks view col-md-9">
<fieldset>
<legend><?= isset($stock['Stock']['num']) ? $stock['StockGroup']['name'].' - <b>'.$stock['Stock']['num'].'</b>' : '<b>'.$stock['Stock']['id'].'</b>';?></legend>
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
			<?php echo h($stock['StockSituation']['name']); ?>
			&nbsp;
		</dd>
	</dl>    
    </fieldset>
</div>
<div class="actions col-md-3">
    <?=$this->element('actions.stocks');?>
</div>
<div class="related col-md-12">    
	<?php if (!empty($stock['Trade'])): ?>
	<table class="table table-condensed table-hover">
	<thead>
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
	</thead>
	<tbody>
	<?php foreach ($stock['Trade'] as $trade): ?>
		<tr style="font-size: .9em; white-space: nowrap;">
            <td>
            	<?php if($trade['OrderType']['sort'] <= 3 ) {
                    echo $trade['Order']['date_time'];
                } else {
                	echo date('Y-m-d', strtotime($trade['Trade']['created']));
            	}?>
            	
        	</td>
            <td><strong style="font-size: .8em"><?php echo $trade['OrderType']['name']; ?></strong></td>
			<td><?php echo ( isset($trade['Order']['num']) ?  $trade['Order']['num'].'/' : $trade['Order']['num']).$trade['Order']['reference_year']; ?></td>
            <td><strong style="font-size: .8em"><?php echo $trade['Buyer']['name']; ?></strong></td>
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
	</tbody>
	</table>
<?php endif; ?>
</div>
</div>