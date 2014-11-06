<div class="organizations index">
    <legend class="row">
        <span class="col-lg-8">
            <?=$organizationType['OrganizationType']['name'];?>
            <?php echo $this->Html->link(' <i class="fa fa-refresh refresh"></i>', array('action' => 'index', $organizationType['OrganizationType']['id']), array('escape'=>false)); ?>
            <?php echo $this->Html->link(' <i style="color: #d3d3d3" class="fa fa-print"></i>', array('action' => 'index'), array('escape'=>false)); ?>
        </span>
        <?=$this->element('form.search', array('model'=>'Organization', 'url_params'=>$organizationType['OrganizationType']['id']));?>
    </legend>
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
            <td><?php echo h($organization['Organization']['name']); ?></td>
            <td><?php echo h($organization['ParentOrganization']['name']); ?></td>
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
    <?=$this->element('actions.organizations');?>
</div>
