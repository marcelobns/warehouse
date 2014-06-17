<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($user['User']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $user['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Broker'); ?></dt>
		<dd>
			<?php echo h($user['User']['broker']); ?>
			&nbsp;
		</dd>
	</dl>
    <div class="related">
        <h3><?php echo __('Related User Roles'); ?></h3>
        <?php if (!empty($user['UserRole'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php echo __('Id'); ?></th>
                    <th><?php echo __('Module'); ?></th>
                    <th><?php echo __('Role'); ?></th>
                    <th><?php echo __('Last Signin'); ?></th>
                    <th class="action-add">

                    </th>
                </tr>
                <?php foreach ($user['UserRole'] as $userRole): ?>
                    <tr>
                        <td><?php echo $userRole['UserRole']['id']; ?></td>
                        <td><?php echo $userRole['Module']['name']; ?></td>
                        <td><?php echo $userRole['Role']['name']; ?></td>
                        <td><?php echo $userRole['UserRole']['last_signin']; ?></td>
                        <td class="actions">

                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Roles'), array('controller' => 'user_roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Role'), array('controller' => 'user_roles', 'action' => 'add')); ?> </li>
	</ul>
</div>
