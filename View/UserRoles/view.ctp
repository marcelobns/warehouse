<div class="userRoles view">
<h2><?php echo __('User Role'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userRole['User']['name'], array('controller' => 'users', 'action' => 'view', $userRole['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Module'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userRole['Module']['name'], array('controller' => 'modules', 'action' => 'view', $userRole['Module']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userRole['Role']['name'], array('controller' => 'roles', 'action' => 'view', $userRole['Role']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Signin'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['last_signin']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Role'), array('action' => 'edit', $userRole['UserRole']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Role'), array('action' => 'delete', $userRole['UserRole']['id']), null, __('Are you sure you want to delete # %s?', $userRole['UserRole']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Roles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Role'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modules'), array('controller' => 'modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Module'), array('controller' => 'modules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
	</ul>
</div>
