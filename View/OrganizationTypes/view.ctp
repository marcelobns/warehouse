<div class="organizationTypes view">
<h2><?php echo __('Organization Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($organizationType['OrganizationType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($organizationType['OrganizationType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Register Type'); ?></dt>
		<dd>
			<?php echo h($organizationType['OrganizationType']['register_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Register Mask'); ?></dt>
		<dd>
			<?php echo h($organizationType['OrganizationType']['register_mask']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sort'); ?></dt>
		<dd>
			<?php echo h($organizationType['OrganizationType']['sort']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Internal'); ?></dt>
		<dd>
			<?php echo h($organizationType['OrganizationType']['internal']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Organization Type'), array('action' => 'edit', $organizationType['OrganizationType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Organization Type'), array('action' => 'delete', $organizationType['OrganizationType']['id']), null, __('Are you sure you want to delete # %s?', $organizationType['OrganizationType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Organization Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Organizations'); ?></h3>
	<?php if (!empty($organizationType['Organization'])): ?>
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
	<?php foreach ($organizationType['Organization'] as $organization): ?>
		<tr>
			<td><?php echo $organization['id']; ?></td>
			<td><?php echo $organization['organization_type_id']; ?></td>
			<td><?php echo $organization['unique_code']; ?></td>
			<td><?php echo $organization['name']; ?></td>
			<td><?php echo $organization['nickname']; ?></td>
			<td><?php echo $organization['acronym']; ?></td>
			<td><?php echo $organization['responsible']; ?></td>
			<td><?php echo $organization['email']; ?></td>
			<td><?php echo $organization['image']; ?></td>
			<td><?php echo $organization['phone']; ?></td>
			<td><?php echo $organization['address']; ?></td>
			<td><?php echo $organization['parent_id']; ?></td>
			<td><?php echo $organization['parent_array']; ?></td>
			<td><?php echo $organization['id_old']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'organizations', 'action' => 'view', $organization['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'organizations', 'action' => 'edit', $organization['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'organizations', 'action' => 'delete', $organization['id']), null, __('Are you sure you want to delete # %s?', $organization['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
