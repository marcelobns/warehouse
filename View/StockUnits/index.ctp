<div class="container">
<div class="stockUnits index col-md-12">
	<legend>
		<?php echo __('Stock Units'); ?>
	</legend>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Sigla</th>
				<th class="actions">
					<?php echo $this->Html->link(__('New Stock Unit'), array('action' => 'add')); ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($stockUnits as $stockUnit): ?>
				<tr>
					<td class="text-muted"><?php echo h($stockUnit['StockUnit']['id']); ?>&nbsp;</td>
					<td><?php echo h($stockUnit['StockUnit']['name']); ?>&nbsp;</td>
					<td><?php echo h($stockUnit['StockUnit']['acronym']); ?>&nbsp;</td>
					<td class="actions">
						<!-- <?php echo $this->Html->link(__('View'), array('action' => 'view', $stockUnit['StockUnit']['id'])); ?> -->
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $stockUnit['StockUnit']['id'])); ?>
						<!-- <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $stockUnit['StockUnit']['id']), null, __('Are you sure you want to delete # %s?', $stockUnit['StockUnit']['id'])); ?> -->
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
</div>
		<?php $this->start('script'); ?>
		<script type="text/javascript">
			$(function(){
				View.index();
			});
		</script>
		<?php $this->end(); ?>