<div class="orderDetails index">
	<h2><?php echo __('Order Details'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('order_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th><?php echo $this->Paginator->sort('order_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('input_type'); ?></th>
			<th><?php echo $this->Paginator->sort('input_mask'); ?></th>
			<th><?php echo $this->Paginator->sort('required'); ?></th>
			<th><?php echo $this->Paginator->sort('css_class'); ?></th>
			<th><?php echo $this->Paginator->sort('sort'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($orderDetails as $orderDetail): ?>
	<tr>
		<td><?php echo h($orderDetail['OrderDetail']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($orderDetail['Order']['id'], array('controller' => 'orders', 'action' => 'view', $orderDetail['Order']['id'])); ?>
		</td>
		<td><?php echo h($orderDetail['OrderDetail']['name']); ?>&nbsp;</td>
		<td><?php echo h($orderDetail['OrderDetail']['value']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($orderDetail['OrderType']['name'], array('controller' => 'order_types', 'action' => 'view', $orderDetail['OrderType']['id'])); ?>
		</td>
		<td><?php echo h($orderDetail['OrderDetail']['input_type']); ?>&nbsp;</td>
		<td><?php echo h($orderDetail['OrderDetail']['input_mask']); ?>&nbsp;</td>
		<td><?php echo h($orderDetail['OrderDetail']['required']); ?>&nbsp;</td>
		<td><?php echo h($orderDetail['OrderDetail']['css_class']); ?>&nbsp;</td>
		<td><?php echo h($orderDetail['OrderDetail']['sort']); ?>&nbsp;</td>
		<td class="actions">
<!--			--><?php //echo $this->Html->link(__('View'), array('action' => 'view', $orderDetail['OrderDetail']['id'])); ?>
<!--			--><?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $orderDetail['OrderDetail']['id'])); ?>
<!--			--><?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $orderDetail['OrderDetail']['id']), null, __('Are you sure you want to delete # %s?', $orderDetail['OrderDetail']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Order Detail'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Types'), array('controller' => 'order_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Type'), array('controller' => 'order_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
