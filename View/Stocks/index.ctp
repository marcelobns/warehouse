<div class="stocks index large">
    <legend class="row">
        <span class="col-lg-8">
            <?php echo __('Stocks'); ?>
            <?php echo $this->Html->link(' <i class="fa fa-refresh refresh"></i>', array('action' => 'index'), array('escape'=>false)); ?>
            <?php echo $this->Html->link(' <i class="fa fa-print"></i>', array('action' => 'index'), array('escape'=>false)); ?>
        </span>
        <?=$this->element('form.search', array('model'=>'Stock'));?>
    </legend>
	<table cellpadding="0" cellspacing="0" class="table-hover">
        <thead>
        <?php echo $this->Form->create('Stock', array('action'=>'filter', 'type'=>'GET', 'class'=>'formFilter')); ?>
        <tr>
            <th><?php echo $this->element('filter.select', array(
                    'label' => __('Stock Group'),
                    'field' => 'stock_group',
                    'options' => @$stockGroups
                )); ?>
            </th>
            <th><?php echo $this->element('filter.interval', array(
                    'id' => 'num',
                    'label' => __('Num'),
                    'fields' => array('num_begin', 'num_end'),
                )); ?>
            </th>
            <th><?php echo $this->Paginator->sort('description'); ?></th>
            <?php if($this->Session->read('Config.module') == 2) : ?>
            <th><?php echo $this->Paginator->sort('Unit'); ?></th>
            <?php endif; ?>
            <th><?php echo $this->Paginator->sort('price'); ?></th>
            <?php if($this->Session->read('Config.module') == 2) : ?>
            <th><?php echo $this->element('filter.interval', array(
                    'id' => 'balance',
                    'label' => __('Balance'),
                    'fields' => array('balance_begin', 'balance_end'),
                )); ?>
            </th>
            <?php endif; ?>
            <?php if($this->Session->read('Config.module') == 1) : ?>
            <th><?php echo $this->element('filter.select', array(
                    'label' => __('Local'),
                    'field' => 'organization_id',
                    'options' => @$organizations
                )); ?>
            </th>
            <?php endif; ?>
            <th class="action-add col-lg-2 no-print">
                <?php
                    if($this->Session->read('Config.module') == 1) {
                        echo $this->Html->link('<i class="fa fa-plus-square-o fa-lg"></i> '.__('New Stock'), array('controller'=>'trades', 'action' => 'add', $last_inventory[0]['Order']['id']), array('escape'=>false));
                    } else {
                        echo $this->Html->link('<i class="fa fa-plus-square-o fa-lg"></i> '.__('New Stock'), array('action' => 'add'), array('escape'=>false));
                    }
                ?>
            </th>
        </tr>
        <?php echo $this->Form->end(); ?>
        </thead>
        <tbody>
        <?php foreach ($stocks as $stock): ?>
        <tr style="font-size: 0.9em;">
            <td><?php echo h(isset($stock['Stock']['stock_group_id']) ? $stock['StockGroup']['name'] : $stock['StockType']['name']); ?>&nbsp;</td>
            <td><?php echo h(isset($stock['Stock']['stock_group_id']) ? $stock['Stock']['num'] : $stock['Stock']['id']); ?>&nbsp;</td>
            <td><?php echo h($stock['Stock']['description']); ?>&nbsp;</td>
            <?php if($this->Session->read('Config.module') == 2) : ?>
            <td><?php echo h(isset($stock['StockUnit']['acronym']) ? $stock['StockUnit']['acronym'].'/'.$stock['Stock']['units'] : $stock['Stock']['units']); ?>&nbsp;</td>
            <?php endif; ?>
            <td style="font-size: 1.1em; color: #003441;"><?php echo h(number_format($stock['Stock']['price'], 2, ',', '.')); ?>&nbsp;</td>
            <?php if($this->Session->read('Config.module') == 2) : ?>
            <td style="font-size: 1.25em; color: #003441; text-align: center;"><?php echo h($stock['Stock']['balance']); ?>&nbsp;</td>
            <?php endif; ?>
            <?php if($this->Session->read('Config.module') == 1) : ?>
            <td><?php echo h($stock['Organization']['name']); ?>&nbsp;</td>
            <?php endif; ?>
            <td class="actions" style="font-size: 1.3em;">
                <?php
                   if($this->Session->read('Config.module') == 1) {
                       if($last_inventory[0]['Order']['year'] == $stock['Stock']['last_inventory']){
                           echo $this->Html->link('<i class="fa fa-check-square-o fa-lg" style="color: green;"></i>', array('controller'=>'trades', 'action' => 'inventory', $stock['Stock']['id'],$last_inventory[0]['Order']['id']), array('escape'=>false, 'title'=>$stock['Stock']['last_inventory']));
                       } else {
                           echo $this->Html->link('<i class="fa fa-square-o fa-lg" style="color: darkred;"></i>', array('controller'=>'trades', 'action' => 'inventory', $stock['Stock']['id'],$last_inventory[0]['Order']['id']), array('escape'=>false, 'title'=>$stock['Stock']['last_inventory']));
                       }
                   }
                ?>
                <?php echo $this->Html->link('<i class="fa fa-list fa-lg"></i>', array('action' => 'view', $stock['Stock']['id']), array('escape'=>false, 'title'=>__('View'))); ?>
                <?php if($role_sort <= 2) echo $this->Html->link('<i class="fa fa-pencil fa-lg"></i>', array('action' => 'edit', $stock['Stock']['id']), array('escape'=>false, 'title'=>__('Edit'))); ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format'=>__('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}').' '.__('(6 meses)')
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