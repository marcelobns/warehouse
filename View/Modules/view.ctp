<div class="modules view">
<h2><?php echo __('Module'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($module['Module']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($module['Module']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Module'), array('action' => 'edit', $module['Module']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Module'), array('action' => 'delete', $module['Module']['id']), null, __('Are you sure you want to delete # %s?', $module['Module']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Modules'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Module'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Roles'), array('controller' => 'user_roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Role'), array('controller' => 'user_roles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related User Roles'); ?></h3>
	<?php if (!empty($module['UserRole'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Module Id'); ?></th>
		<th><?php echo __('Role Id'); ?></th>
		<th><?php echo __('Last Signin'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($module['UserRole'] as $userRole): ?>
		<tr>
			<td><?php echo $userRole['id']; ?></td>
			<td><?php echo $userRole['user_id']; ?></td>
			<td><?php echo $userRole['module_id']; ?></td>
			<td><?php echo $userRole['role_id']; ?></td>
			<td><?php echo $userRole['last_signin']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_roles', 'action' => 'view', $userRole['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_roles', 'action' => 'edit', $userRole['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_roles', 'action' => 'delete', $userRole['id']), null, __('Are you sure you want to delete # %s?', $userRole['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Role'), array('controller' => 'user_roles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
