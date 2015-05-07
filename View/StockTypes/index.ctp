<div class="stockTypes index col-md-12">
    <?=$this->element('legend.index', array('legend'=>__('Stock Types')));?>
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('name'); ?></th>
				<th><?php echo $this->Paginator->sort('avg_markup'); ?></th>
				<th><?php echo $this->Paginator->sort('depreciation'); ?></th>
				<th class="actions no-print">
                	<?php echo $this->Html->link(__('New StockType'), array('action' => 'add'));?>
            	</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($stockTypes as $stockType) : ?>
				<tr>
					<td><?php echo h($stockType['StockType']['id']); ?>&nbsp;</td>
					<td><?php echo h($stockType['StockType']['name']); ?>&nbsp;</td>
					<td><?php echo h($stockType['StockType']['avg_markup']); ?>&nbsp;</td>
					<td><?php echo h($stockType['StockType']['depreciation']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $stockType['StockType']['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $stockType['StockType']['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $stockType['StockType']['id']), null, __('Are you sure you want to delete # %s?', $stockType['StockType']['id'])); ?>
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
