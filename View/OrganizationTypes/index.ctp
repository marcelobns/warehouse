<div class="container">
<div class="organizationTypes index col-md-12">
	<legend><?php echo __('Organization Types'); ?></legend>
	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th class="actions">
					<?php echo $this->Html->link(__('New Organization Type'), array('action' => 'add'), array('escape'=>false)); ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($organizationTypes as $organizationType): ?>
				<tr>
					<td><?php echo h($organizationType['OrganizationType']['id']); ?>&nbsp;</td>
					<td><?php echo h($organizationType['OrganizationType']['name']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $organizationType['OrganizationType']['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $organizationType['OrganizationType']['id'])); ?>						
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
</div>		