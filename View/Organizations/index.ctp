<div class="organizations index">
    <legend><?=$organizationType['OrganizationType']['name'];?><div class="pull-right"><?=$this->element('form.search', array('model'=>'Organization', 'url_params'=>$organizationType['OrganizationType']['id']));?></div></legend>
	<table cellpadding="0" cellspacing="0" class="table-hover">
    <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('parent_id'); ?></th>
            <th class="action-add"><?php echo $this->Html->link('<i class="fa fa-plus"></i> '.__('New'), array('action' => 'add', $organizationType['OrganizationType']['id']), array('escape'=>false)); ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($organizations as $organization): ?>
        <tr>
            <td><?php echo h($organization['Organization']['name']); ?>&nbsp;</td>
            <td>
                <?php echo $this->Html->link($organization['ParentOrganization']['name'], array('controller' => 'organizations', 'action' => 'view', $organization['ParentOrganization']['id'])); ?>
            </td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $organization['Organization']['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $organization['Organization']['id'])); ?>
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
