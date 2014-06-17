<div class="orderTypes index">
	<h2><?php echo __('Order Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('seller_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('buyer_type_id'); ?></th>
			<th class="action-add">
                <?php echo $this->Html->link(__('New Order Type'), array('action' => 'add')); ?>
            </th>
	</tr>
	<?php foreach ($orderTypes as $orderType): ?>
	<tr>
		<td><?php echo h($orderType['OrderType']['id']); ?>&nbsp;</td>
		<td><?php echo h($orderType['OrderType']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($orderType['SellerType']['name'], array('controller' => 'organization_types', 'action' => 'view', $orderType['SellerType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($orderType['BuyerType']['name'], array('controller' => 'organization_types', 'action' => 'view', $orderType['BuyerType']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $orderType['OrderType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $orderType['OrderType']['id'])); ?>
<!--			--><?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $orderType['OrderType']['id']), null, __('Are you sure you want to delete # %s?', $orderType['OrderType']['id'])); ?>
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
		<li></li>
		<li><?php echo $this->Html->link(__('List Organization Types'), array('controller' => 'organization_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seller Type'), array('controller' => 'organization_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modules'), array('controller' => 'modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Module'), array('controller' => 'modules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Details'), array('controller' => 'order_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Detail'), array('controller' => 'order_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
