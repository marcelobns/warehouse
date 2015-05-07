<div class="users index col-md-12">
	<?=$this->element('legend.index', array('legend'=>__('Users')));?>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Usuário</th>
				<th>Órgão</th>
				<th>ativo</th>
				<th class="actions">
					<?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user): ?>
				<tr>
					<td class="text-muted"><?php echo h($user['User']['id']); ?>&nbsp;</td>
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
<?php $this->start('script'); ?>
<script type="text/javascript">
	$(function(){
		View.index();
	});
</script>
<?php $this->end(); ?>
