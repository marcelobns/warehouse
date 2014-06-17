<div class="paymentTypes view">
<h2><?php echo __('Payment Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($paymentType['PaymentType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($paymentType['PaymentType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account'); ?></dt>
		<dd>
			<?php echo $this->Html->link($paymentType['Account']['name'], array('controller' => 'accounts', 'action' => 'view', $paymentType['Account']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sort'); ?></dt>
		<dd>
			<?php echo h($paymentType['PaymentType']['sort']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Payment Type'), array('action' => 'edit', $paymentType['PaymentType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Payment Type'), array('action' => 'delete', $paymentType['PaymentType']['id']), null, __('Are you sure you want to delete # %s?', $paymentType['PaymentType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Payment Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($paymentType['Order'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Datetime'); ?></th>
		<th><?php echo __('Order Type Id'); ?></th>
		<th><?php echo __('Capitalist Id'); ?></th>
		<th><?php echo __('Payment Type Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('Broker Id'); ?></th>
		<th><?php echo __('Done'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('Canceled'); ?></th>
		<th><?php echo __('Canceled Note'); ?></th>
		<th><?php echo __('Canceled Auth Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($paymentType['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id']; ?></td>
			<td><?php echo $order['datetime']; ?></td>
			<td><?php echo $order['order_type_id']; ?></td>
			<td><?php echo $order['capitalist_id']; ?></td>
			<td><?php echo $order['payment_type_id']; ?></td>
			<td><?php echo $order['organization_id']; ?></td>
			<td><?php echo $order['broker_id']; ?></td>
			<td><?php echo $order['done']; ?></td>
			<td><?php echo $order['note']; ?></td>
			<td><?php echo $order['canceled']; ?></td>
			<td><?php echo $order['canceled_note']; ?></td>
			<td><?php echo $order['canceled_auth_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']), null, __('Are you sure you want to delete # %s?', $order['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
