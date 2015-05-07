<div class="organizations index col-md-12">
    <?=$this->element('legend.index', array('legend'=>$organizationType['OrganizationType']['name'], 'url_params'=>@$url_params));?>
	<table class="table table-condensed table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Parente</th>
            <th class="actions">
                <?php echo $this->Html->link(__('New').' '.$organizationType['OrganizationType']['name'] , array('action' => 'add', $organizationType['OrganizationType']['id']), array('escape'=>false)); ?>
            </th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($organizations as $organization): ?>
        <tr>
            <td class="text-muted"><?php echo h($organization['Organization']['id']); ?></td>
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
<?php $this->start('script'); ?>
<script type="text/javascript">
    $(function(){
        View.index();
    });
</script>
<?php $this->end(); ?>
