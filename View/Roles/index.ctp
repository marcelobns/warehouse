<div class="roles index container">
	<?=$this->element('legend.index', array('legend'=> __('Roles')));?>
	<table class="table table-condensed">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id', '#'); ?></th>
				<th><?php echo $this->Paginator->sort('name'); ?></th>
				<th><?php echo $this->Paginator->sort('sort'); ?></th>
				<th class="actions"><?php echo $this->Html->link(__('New Role'), array('action' => 'add')); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($roles as $role): ?>
			<tr>
				<td><?php echo h($role['Role']['id']); ?>&nbsp;</td>
				<td><?php echo h($role['Role']['name']); ?>&nbsp;</td>
				<td><?php echo h($role['Role']['sort']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $role['Role']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $role['Role']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $role['Role']['id']), null, __('Are you sure you want to delete # %s?', $role['Role']['id'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		<tbody>
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
