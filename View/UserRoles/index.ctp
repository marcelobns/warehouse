<div class="userRoles index">
    <legend><?php echo __('User Roles'); ?> <div class="pull-right"><?=$this->element('form.search', array('model'=>'UserRole'));?></div></legend>
	<table class="table-hover" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
            <th><?php echo $this->Paginator->sort('module_id'); ?></th>
            <th><?php echo $this->Paginator->sort('role_id'); ?></th>
            <th><?php echo $this->Paginator->sort('last_signin'); ?></th>
            <th class="action-add">
                <?php echo $this->Html->link('<i class="fa fa-plus fa-lg"></i> '.__('New User Role'), array('action' => 'add'), array('escape'=>false)); ?>
            </th>
        </tr>
    </thead>
    <tbody>
	<?php foreach ($userRoles as $userRole): ?>
        <tr>
            <td><?php echo h($userRole['UserRole']['id']); ?>&nbsp;</td>
            <td>
                <?php echo $this->Html->link($userRole['User']['name'], array('controller' => 'users', 'action' => 'view', $userRole['User']['id'])); ?>
            </td>
            <td>
                <?php echo $this->Html->link($userRole['Module']['name'], array('controller' => 'modules', 'action' => 'view', $userRole['Module']['id'])); ?>
            </td>
            <td>
                <?php echo $this->Html->link($userRole['Role']['name'], array('controller' => 'roles', 'action' => 'view', $userRole['Role']['id'])); ?>
            </td>
            <td><?php echo h($userRole['UserRole']['last_signin']); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $userRole['UserRole']['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userRole['UserRole']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userRole['UserRole']['id']), null, __('Are you sure you want to delete # %s?', $userRole['UserRole']['id'])); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
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
		<li><?php echo $this->Html->link(__('New User Role'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modules'), array('controller' => 'modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Module'), array('controller' => 'modules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
	</ul>
</div>
