<div class="orders index col-md-12">
    <?=$this->element('legend.index', array('legend'=>__('Orders')));?>
	<table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Data</th>
                <th>Tipo de Registro</th>
                <th>Número</th>
                <th>Remetente</th>
                <th>Destinatário</th>
                <th class="no-print"></th>
                <th class="actions no-print">
                    <?php echo $this->Html->link(__('New Order'),
                        array('action' => 'add_type'),
                        array('data-toggle'=>'modal', 'data-target'=>'#modal', 'escape'=>false)); ?>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($orders as $i=>$order): ?>
        <tr>
            <td class="text-muted"><?php echo h($order['Order']['id']); ?>&nbsp;</td>
            <td><strong style="font-size: 1.02em"><?php echo date('d/m/Y', strtotime($order['Order']['date_time'])); ?>&nbsp;</strong></td>
            <td><?php echo h($order['OrderType']['name']); ?></td>
            <td><strong style="font-size: 1.02em"><?php echo h(($order['Order']['num'] ? $order['Order']['num'].'/' : '').$order['Order']['reference_year']); ?>&nbsp;</strong></td>
            <td><?php echo h($order['Seller']['name']); ?></td>
            <td><strong style="font-size: 1.02em"><?php echo (@$order['Buyer']['acronym'] ? '<u>'.$order['Buyer']['acronym'].'</u>'.' - ' : '').substr($order['Buyer']['name'], 0, 45); ?></strong></td>
            <td class="no-print">
                <?php
                    if($order['Order']['canceled']){
                        echo '<i class="fa fa-ban fa-lg" style="color:darkred;"></i>';
                    } else {
                        echo $order['Order']['done'] ? '<i class="fa fa-check fa-lg" style="color: darkgreen;"></i>' : '';
                    }
                ?>&nbsp;
            </td>
            <td class="actions" style="font-size: 1.2em;">
                <?php echo $this->Html->link('<i class="fa fa-print fa-lg"></i>',
                    array('action' => 'print_order', $order['Order']['id']),
                    array('title'=>'Imprimir', 'escape'=>false, 'target'=>'_blank')); ?>
                <?php echo $this->Html->link('<i class="fa fa-file-text-o fa-lg"></i>',
                    array('action' => 'view', $order['Order']['id']),
                    array('title'=>__('View'), 'escape'=>false)); ?>
                <?php echo $this->Html->link('<i class="fa fa-copy fa-lg"></i>',
                    array('action' => 'add_type', $order['Order']['id']),
                    array('title'=>__('Reuse'), 'data-toggle'=>'modal', 'data-target'=>'#modal', 'escape'=>false)); ?>
                <?php
                    if($order['Order']['id'] >= @$lasts[19]['Order']['id'] && !$order['Order']['canceled'])
                        echo $this->Html->link('<i class="fa fa-pencil fa-lg"></i>',
                        array('action' => 'edit', $order['Order']['id']),
                        array('title'=>__('Edit'), 'escape'=>false));
                    if($order['Order']['id'] == $lasts[0]['Order']['id']){
                        echo $this->Form->postLink('<i class="fa fa-trash-o fa-lg"></i>',
                        array('action' => 'delete', $order['Order']['id']),
                        array('title'=>__('Delete'), 'escape'=>false),
                            __('Are you sure you want to delete # %s?', $order['Order']['id']));
                    } else if ($order['Order']['id'] != $lasts[0]['Order']['id'] && !$order['Order']['canceled']){
                        echo $this->Html->link('<i class="fa fa-ban fa-lg"></i>',
                        array('action' => 'cancel', $order['Order']['id']),
                        array('title'=>__('Cancel'), 'data-toggle'=>'modal', 'data-target'=>'#modal', 'escape'=>false));
                    }
                ?>
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
