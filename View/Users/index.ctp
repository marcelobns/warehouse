<div class="users index">
	<legend><?php echo __('Users'); ?> <div class="pull-right"><?=$this->element('form.search', array('model'=>'User'));?></div></legend>
	<table class="table-hover" cellpadding="0" cellspacing="0">
	<thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('organization_id'); ?></th>
			<th><?php echo $this->Paginator->sort('enabled'); ?></th>
			<th class="action-add">
                <?php echo $this->Html->link('<i class="fa fa-plus-square-o"></i> '.__('New User'), array('action' => 'add'), array('escape'=>false)); ?>
            </th>
	    </tr>
    </thead>
    <tbody>
	<?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
            <td><?php echo h($user['User']['name']); ?>&nbsp;</td>
            <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
            <td><?php echo h($user['Organization']['name']); ?></td>
            <td><?php echo h($user['User']['enabled']); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
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
    <?=$this->element('actions.users');?>
</div>
