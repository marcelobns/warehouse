<div class="stocks index">
    <legend><?php echo __('Stocks'); ?> <div class="pull-right"><?=$this->element('form.search', array('model'=>'Stock'));?></div></legend>
	<table cellpadding="0" cellspacing="0" class="table-hover">
        <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('stock_group_id'); ?></th>
            <th><?php echo $this->Paginator->sort('num'); ?></th>
            <th><?php echo $this->Paginator->sort('description'); ?></th>
            <th><?php echo $this->Paginator->sort('price'); ?></th>
            <th><?php echo $this->Paginator->sort('Unit'); ?></th>
            <th>&nbsp;</th>
            <th class="action-add col-lg-2">
                <?php
                    if($stock_add)
                        echo $this->Html->link('<i class="fa fa-plus fa-lg"></i> '.__('New Stock'), array('action' => 'add'), array('escape'=>false));?>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($stocks as $stock): ?>
        <tr style="font-size: 0.9em;">
            <td><?php echo h(isset($stock['Stock']['stock_group_id']) ? $stock['StockGroup']['name'] : $stock['StockType']['name']); ?>&nbsp;</td>
            <td><?php echo h(isset($stock['Stock']['stock_group_id']) ? $stock['Stock']['num'] : $stock['Stock']['id']); ?>&nbsp;</td>
            <td><?php echo h($stock['Stock']['description']); ?>&nbsp;</td>
            <td style="font-size: 1.1em; color: darkgreen;"><?php echo h($stock['Stock']['price']); ?>&nbsp;</td>
            <td><?php echo h(isset($stock['StockUnit']['acronym']) ? $stock['StockUnit']['acronym'].'/'.$stock['Stock']['units'] : $stock['Stock']['units']); ?>&nbsp;</td>
            <td style="font-size: 1.25em; color: #003441;"><?php echo $stock['StockType']['gen_code'] == false ? $stock['Stock']['balance'] : ''; ?>&nbsp;</td>
            <td class="actions" style="font-size: 1.3em;">
                <?php echo $this->Html->link('<i class="fa fa-list fa-lg"></i>', array('action' => 'view', $stock['Stock']['id']), array('escape'=>false, 'title'=>__('View'))); ?>
                <?php echo $this->Html->link('<i class="fa fa-pencil fa-lg"></i>', array('action' => 'edit', $stock['Stock']['id']), array('escape'=>false, 'title'=>__('Edit'))); ?>
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
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Stock Types'), array('controller' => 'stock_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Type'), array('controller' => 'stock_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Groups'), array('controller' => 'stock_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Group'), array('controller' => 'stock_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Units'), array('controller' => 'stock_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Unit'), array('controller' => 'stock_units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Situations'), array('controller' => 'stock_situations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Situation'), array('controller' => 'stock_situations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Buy Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Rates'), array('controller' => 'stock_rates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Rate'), array('controller' => 'stock_rates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trades'), array('controller' => 'trades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trade'), array('controller' => 'trades', 'action' => 'add')); ?> </li>
	</ul>
</div>
