<div class="container">
	<div class="roles view col-md-9">
	<h2><?php echo __('Role'); ?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($role['Role']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Name'); ?></dt>
			<dd>
				<?php echo h($role['Role']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Sort'); ?></dt>
			<dd>
				<?php echo h($role['Role']['sort']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="actions col-md-3">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Edit Role'), array('action' => 'edit', $role['Role']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Role'), array('action' => 'delete', $role['Role']['id']), null, __('Are you sure you want to delete # %s?', $role['Role']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Roles'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Role'), array('action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
