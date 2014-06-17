<div class="organizationTypes index">
	<h2><?php echo __('Organization Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
        <th><?php echo $this->Paginator->sort('id'); ?></th>
        <th><?php echo $this->Paginator->sort('name'); ?></th>
        <th class="action-add">
            <?php echo $this->Html->link('<i class="fa fa-plus fa-lg"></i> '.__('New Organization Type'), array('action' => 'add'), array('escape'=>false)); ?>
        </th>
	</tr>
	<?php foreach ($organizationTypes as $organizationType): ?>
	<tr>
		<td><?php echo h($organizationType['OrganizationType']['id']); ?>&nbsp;</td>
		<td><?php echo h($organizationType['OrganizationType']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $organizationType['OrganizationType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $organizationType['OrganizationType']['id'])); ?>
<!--			--><?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $organizationType['OrganizationType']['id']), null, __('Are you sure you want to delete # %s?', $organizationType['OrganizationType']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
