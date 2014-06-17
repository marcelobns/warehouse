<div class="orderDetails view">
<h2><?php echo __('Order Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($orderDetail['OrderDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orderDetail['Order']['id'], array('controller' => 'orders', 'action' => 'view', $orderDetail['Order']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($orderDetail['OrderDetail']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($orderDetail['OrderDetail']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orderDetail['OrderType']['name'], array('controller' => 'order_types', 'action' => 'view', $orderDetail['OrderType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Input Type'); ?></dt>
		<dd>
			<?php echo h($orderDetail['OrderDetail']['input_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Input Mask'); ?></dt>
		<dd>
			<?php echo h($orderDetail['OrderDetail']['input_mask']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Required'); ?></dt>
		<dd>
			<?php echo h($orderDetail['OrderDetail']['required']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Css Class'); ?></dt>
		<dd>
			<?php echo h($orderDetail['OrderDetail']['css_class']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sort'); ?></dt>
		<dd>
			<?php echo h($orderDetail['OrderDetail']['sort']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order Detail'), array('action' => 'edit', $orderDetail['OrderDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order Detail'), array('action' => 'delete', $orderDetail['OrderDetail']['id']), null, __('Are you sure you want to delete # %s?', $orderDetail['OrderDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Types'), array('controller' => 'order_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Type'), array('controller' => 'order_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
