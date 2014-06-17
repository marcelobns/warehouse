<div class="organizations view">
<h2><?php echo __('Organization'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organization Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organization['OrganizationType']['name'], array('controller' => 'organization_types', 'action' => 'view', $organization['OrganizationType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unique Code'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['unique_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nickname'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['nickname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acronym'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['acronym']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Responsible'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['responsible']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organization['ParentOrganization']['name'], array('controller' => 'organizations', 'action' => 'view', $organization['ParentOrganization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Array'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['parent_array']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id Old'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['id_old']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Organization'), array('action' => 'edit', $organization['Organization']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Organization'), array('action' => 'delete', $organization['Organization']['id']), null, __('Are you sure you want to delete # %s?', $organization['Organization']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organization Types'), array('controller' => 'organization_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization Type'), array('controller' => 'organization_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trades'), array('controller' => 'trades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trade'), array('controller' => 'trades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Organizations'); ?></h3>
	<?php if (!empty($organization['ChildOrganization'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Organization Type Id'); ?></th>
		<th><?php echo __('Unique Code'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Nickname'); ?></th>
		<th><?php echo __('Acronym'); ?></th>
		<th><?php echo __('Responsible'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Parent Array'); ?></th>
		<th><?php echo __('Id Old'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organization['ChildOrganization'] as $childOrganization): ?>
		<tr>
			<td><?php echo $childOrganization['id']; ?></td>
			<td><?php echo $childOrganization['organization_type_id']; ?></td>
			<td><?php echo $childOrganization['unique_code']; ?></td>
			<td><?php echo $childOrganization['name']; ?></td>
			<td><?php echo $childOrganization['nickname']; ?></td>
			<td><?php echo $childOrganization['acronym']; ?></td>
			<td><?php echo $childOrganization['responsible']; ?></td>
			<td><?php echo $childOrganization['email']; ?></td>
			<td><?php echo $childOrganization['image']; ?></td>
			<td><?php echo $childOrganization['phone']; ?></td>
			<td><?php echo $childOrganization['address']; ?></td>
			<td><?php echo $childOrganization['parent_id']; ?></td>
			<td><?php echo $childOrganization['parent_array']; ?></td>
			<td><?php echo $childOrganization['id_old']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'organizations', 'action' => 'view', $childOrganization['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'organizations', 'action' => 'edit', $childOrganization['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'organizations', 'action' => 'delete', $childOrganization['id']), null, __('Are you sure you want to delete # %s?', $childOrganization['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Stocks'); ?></h3>
	<?php if (!empty($organization['Stock'])): ?>
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
		<th><?php echo __('Depreciation Date'); ?></th>
		<th><?php echo __('Buy Order Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('Reference Year'); ?></th>
		<th><?php echo __('Last Inventory'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Creator Id'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Updater Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organization['Stock'] as $stock): ?>
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
			<td><?php echo $stock['depreciation_date']; ?></td>
			<td><?php echo $stock['buy_order_id']; ?></td>
			<td><?php echo $stock['organization_id']; ?></td>
			<td><?php echo $stock['reference_year']; ?></td>
			<td><?php echo $stock['last_inventory']; ?></td>
			<td><?php echo $stock['note']; ?></td>
			<td><?php echo $stock['created']; ?></td>
			<td><?php echo $stock['creator_id']; ?></td>
			<td><?php echo $stock['updated']; ?></td>
			<td><?php echo $stock['updater_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'stocks', 'action' => 'view', $stock['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'stocks', 'action' => 'edit', $stock['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'stocks', 'action' => 'delete', $stock['id']), null, __('Are you sure you want to delete # %s?', $stock['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Trades'); ?></h3>
	<?php if (!empty($organization['Trade'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Stock Id'); ?></th>
		<th><?php echo __('Buy Amount'); ?></th>
		<th><?php echo __('Buy Price'); ?></th>
		<th><?php echo __('Sell Amount'); ?></th>
		<th><?php echo __('Sell Price'); ?></th>
		<th><?php echo __('Stock Situation Id'); ?></th>
		<th><?php echo __('Buyer Id'); ?></th>
		<th><?php echo __('Done'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('Canceled'); ?></th>
		<th><?php echo __('Canceled Note'); ?></th>
		<th><?php echo __('Canceled Auth Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Creator Id'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Updater Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organization['Trade'] as $trade): ?>
		<tr>
			<td><?php echo $trade['id']; ?></td>
			<td><?php echo $trade['order_id']; ?></td>
			<td><?php echo $trade['stock_id']; ?></td>
			<td><?php echo $trade['buy_amount']; ?></td>
			<td><?php echo $trade['buy_price']; ?></td>
			<td><?php echo $trade['sell_amount']; ?></td>
			<td><?php echo $trade['sell_price']; ?></td>
			<td><?php echo $trade['stock_situation_id']; ?></td>
			<td><?php echo $trade['buyer_id']; ?></td>
			<td><?php echo $trade['done']; ?></td>
			<td><?php echo $trade['note']; ?></td>
			<td><?php echo $trade['canceled']; ?></td>
			<td><?php echo $trade['canceled_note']; ?></td>
			<td><?php echo $trade['canceled_auth_id']; ?></td>
			<td><?php echo $trade['created']; ?></td>
			<td><?php echo $trade['creator_id']; ?></td>
			<td><?php echo $trade['updated']; ?></td>
			<td><?php echo $trade['updater_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'trades', 'action' => 'view', $trade['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'trades', 'action' => 'edit', $trade['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'trades', 'action' => 'delete', $trade['id']), null, __('Are you sure you want to delete # %s?', $trade['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Trade'), array('controller' => 'trades', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($organization['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('Broker'); ?></th>
		<th><?php echo __('Comission'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Creator Id'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Updater Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organization['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['phone']; ?></td>
			<td><?php echo $user['organization_id']; ?></td>
			<td><?php echo $user['broker']; ?></td>
			<td><?php echo $user['comission']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['creator_id']; ?></td>
			<td><?php echo $user['updated']; ?></td>
			<td><?php echo $user['updater_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
