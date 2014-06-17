<div class="orders index large">
	<legend><?php echo __('Orders'); ?> <div class="pull-right"><?=$this->element('form.search', array('model'=>'Order'));?></div></legend>
	<table cellpadding="0" cellspacing="0" class="table-hover">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('datetime'); ?></th>
                <th><?php echo $this->Paginator->sort('order_type_id'); ?></th>
                <th style="text-align: center"><?php echo $this->Paginator->sort('num'); ?></th>
                <th><?php echo $this->Paginator->sort('seller_id'); ?></th>
                <th><?php echo $this->Paginator->sort('buyer_id'); ?></th>
                <th><?php echo $this->Paginator->sort('done'); ?></th>
                <th class="action-add">
                    <?php echo $this->Html->link('<i class="fa fa-plus"></i> '.__('New Order'),
                        array('action' => 'add_type'),
                        array('data-toggle'=>'modal', 'data-target'=>'#modal', 'escape'=>false)); ?>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($orders as $i=>$order): ?>
        <tr style="font-size: 0.8em;">
            <td style="color:gray;"><?php echo h($order['Order']['id']); ?>&nbsp;</td>
            <td><?php echo date('d/m/Y', strtotime($order['Order']['date_time'])); ?>&nbsp;</td>
            <td><?php echo h($order['OrderType']['name']); ?></td>
            <td style="text-align:center;"><?php echo h(($order['Order']['num'] ? $order['Order']['num'].'/' : '').$order['Order']['reference_year']); ?>&nbsp;</td>
            <td><?php echo h($order['Seller']['name']); ?></td>
            <td><?php echo h($order['Buyer']['name']); ?></td>
            <td>
                <?php
                    if($order['Order']['canceled']){
                        echo '<i class="fa fa-ban fa-lg" style="color:darkred;"></i>';
                    } else {
                        echo $order['Order']['done'] ? '<i class="fa fa-check fa-lg" style="color: darkgreen;"></i>' : '';
                    }
                ?>&nbsp;
            </td>
            <td class="actions" style="font-size: 1.25em;">
                <?php echo $this->Html->link('<i class="fa fa-file-text-o fa-lg"></i>',
                    array('action' => 'view', $order['Order']['id']),
                    array('title'=>__('View'), 'escape'=>false)); ?>
                <?php echo $this->Html->link('<i class="fa fa-copy fa-lg"></i>',
                    array('action' => 'add_type', $order['Order']['id']),
                    array('title'=>__('Reuse'), 'data-toggle'=>'modal', 'data-target'=>'#modal', 'escape'=>false)); ?>
                <?php
                    if($order['Order']['id'] >= $lasts[1]['Order']['id'] && !$order['Order']['canceled'])
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