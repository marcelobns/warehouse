<div class="orderTypes index col-md-12">

    <?=$this->element('legend.index', array('legend'=>__('Order Types')));?>

	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Remetente</th>
				<th>Destinatário</th>
				<th class="actions">
					<?php echo $this->Html->link(__('New Order Type'), array('action' => 'add')); ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($orderTypes as $orderType): ?>
				<tr>
					<td><?php echo h($orderType['OrderType']['id']); ?>&nbsp;</td>
					<td><?php echo h($orderType['OrderType']['name']); ?>&nbsp;</td>
					<td><?php echo h($orderType['SellerType']['name']); ?></td>
					<td><?php echo h($orderType['BuyerType']['name']); ?></td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $orderType['OrderType']['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $orderType['OrderType']['id'])); ?>
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
