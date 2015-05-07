<div class="container">
	<div class="orderTypes view col-md-9">
		<fieldset>
			<legend><?php echo __('Order Type'); ?></legend>
			<dl>
				<dt><?php echo __('Id'); ?></dt>
				<dd>
					<?php echo h($orderType['OrderType']['id']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Name'); ?></dt>
				<dd>
					<?php echo h($orderType['OrderType']['name']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Module'); ?></dt>
				<dd>
					<?php echo $this->Html->link($orderType['Module']['name'], array('controller' => 'modules', 'action' => 'view', $orderType['Module']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Seller Type'); ?></dt>
				<dd>
					<?php echo $this->Html->link($orderType['SellerType']['name'], array('controller' => 'organization_types', 'action' => 'view', $orderType['SellerType']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Buyer Type'); ?></dt>
				<dd>
					<?php echo $this->Html->link($orderType['BuyerType']['name'], array('controller' => 'organization_types', 'action' => 'view', $orderType['BuyerType']['id'])); ?>
					&nbsp;
				</dd>
			</dl>
		</fieldset>
	</div>
	<div class="actions col-md-3">
		<h4>Relacionado</h4>
		<ul>
			<li><?php echo $this->Html->link(__('Edit Order Type'), array('action' => 'edit', $orderType['OrderType']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Order Type'), array('action' => 'delete', $orderType['OrderType']['id']), null, __('Are you sure you want to delete # %s?', $orderType['OrderType']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Order Types'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Order Type'), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Organization Types'), array('controller' => 'organization_types', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Seller Type'), array('controller' => 'organization_types', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Modules'), array('controller' => 'modules', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Module'), array('controller' => 'modules', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Order Details'), array('controller' => 'order_details', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Order Detail'), array('controller' => 'order_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="related col-md-12">	
		<?php if (!empty($orderType['OrderDetail'])): ?>
			<table cellpadding = "0" cellspacing = "0">
				<tr>
					<th><?php echo __('Id'); ?></th>
					<th><?php echo __('Name'); ?></th>
					<th><?php echo __('Input Type'); ?></th>
					<th><?php echo __('Input Mask'); ?></th>
					<th><?php echo __('Required'); ?></th>
					<th><?php echo __('Css Class'); ?></th>
					<th><?php echo __('Sort'); ?></th>
				</tr>
				<?php foreach ($orderType['OrderDetail'] as $orderDetail): ?>
					<tr>
						<td><?php echo $orderDetail['id']; ?></td>
						<td><?php echo $orderDetail['name']; ?></td>
						<td><?php echo $orderDetail['input_type']; ?></td>
						<td><?php echo $orderDetail['input_mask']; ?></td>
						<td><?php echo $orderDetail['required']; ?></td>
						<td><?php echo $orderDetail['css_class']; ?></td>
						<td><?php echo $orderDetail['sort']; ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		<?php endif; ?>
	</div>
</div>