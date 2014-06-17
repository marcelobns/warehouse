<div class="orders view">
    <legend>
        <?php echo __('Order'); ?>
        <span class="pull-right">
                <?php echo (isset($order['Order']['num']) ? $order['Order']['num'].'/' : '').$order['Order']['reference_year'];?>
            </span>
    </legend>
	<dl>
		<dt><?php echo __('Datetime'); ?></dt>
		<dd>
			<?php  echo date('d/m/Y', strtotime($order['Order']['date_time'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['OrderType']['name'], array('controller' => 'order_types', 'action' => 'view', $order['OrderType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seller'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['Seller']['name'], array('controller' => 'capitalists', 'action' => 'view', $order['Seller']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Buyer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['Buyer']['name'], array('controller' => 'organizations', 'action' => 'view', $order['Buyer']['id'])); ?>
			&nbsp;
		</dd>
        <?php
            foreach ($order['OrderDetail'] as $key=>$value):
                $value['OrderDetail']['value'] = $value['OrderDetailV']['value'];
                $value = $value['OrderDetail'];?>
                <dt><?=$value['name'] ?></dt>
                <dd>
                    <?php echo ($value['input_type'] == 'date' || $value['css_class'] == 'date') ? date('d/m/Y', strtotime($value['value'])) : $value['value']; ?>
                    &nbsp;
                </dd>
        <?php endforeach;?>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($order['Order']['note']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Canceled Note'); ?></dt>
        <dd style="color:darkred;">
            <?php echo h($order['Order']['canceled_note']); ?>
            &nbsp;
        </dd>
	</dl>
</div>
<div class="actions">
    <?=$this->element('actions.orders');?>
</div>
<div class="related">
	<?php if (!empty($order['Trade'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
        <th><?php echo __('StockGroup'); ?></th>
        <th><?php echo __('Num'); ?></th>
        <th><?php echo __('Stock'); ?></th>
        <th><?php echo __('Amount'); ?></th>
        <th><?php echo __('Price'); ?></th>
        <th></th>
	</tr>
    <?php $total = 0;?>
    <?php foreach ($order['Trade'] as $trade): ?>
    <?php $total += ($trade['Trade']['buy_amount']+$trade['Trade']['sell_amount']) * ($trade['Trade']['buy_price']+$trade['Trade']['sell_price'])?>
        <tr>
            <td style="width: 10%"><?php echo isset($trade['StockGroup']['name']) ? $trade['StockGroup']['name'] : $trade['StockType']['name']; ?></td>
            <td><?php echo isset($trade['Stock']['num']) ? $trade['Stock']['num'] : $trade['Stock']['id']; ?></td>
            <td style="width: 50%"><?php echo $trade['Stock']['description']; ?></td>
            <td><?php echo ($trade['Trade']['buy_amount']+$trade['Trade']['sell_amount']); ?></td>
            <td><?php echo number_format(($trade['Trade']['buy_price']+$trade['Trade']['sell_price']), 2, ',', '.'); ?></td>
            <td><?php echo isset($trade['StockSituation']['name']) ? $trade['StockSituation']['name'] : number_format(($trade['Trade']['buy_amount']+$trade['Trade']['sell_amount']) * ($trade['Trade']['buy_price']+$trade['Trade']['sell_price']), 2, ',', '.'); ?></td>
        </tr>
    <?php endforeach; ?>
        <h2 class="pull-right" style="margin-top: -40px; margin-right: 60px; margin-bottom: 1em;">Total <b><?=number_format($total, 2, ',', ' ');?></b></h2>
	</table>
<?php endif; ?>
</div>
