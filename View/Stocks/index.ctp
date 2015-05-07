<div class="stocks index col-md-12">
    <?=$this->element('legend.index', array('legend'=>__('Stocks')));?>
	<table>
        <thead>
        <tr>
            <th>Grupo/Tipo</th>
            <th>Número</th>
            <th>Descrição</th>
            <?php if($this->Session->read('Config.module') == 2) : ?>
            <th>Unidade</th>
            <?php endif; ?>
            <th>Valor</th>
            <?php if($this->Session->read('Config.module') == 2) : ?>
            <th>Estoque</th>
            <?php endif; ?>
            <?php if($this->Session->read('Config.module') == 1) : ?>
            <th>Local</th>
            <?php endif; ?>
            <th class="actions no-print">
                <?php
                    if($this->Session->read('Config.module') == 1) {
                        echo $this->Html->link(__('New Stock'), array('controller'=>'trades', 'action' => 'add', $last_inventory[0]['Order']['id']), array('escape'=>false));
                    } else {
                        echo $this->Html->link(__('New Stock'), array('action' => 'add'), array('escape'=>false));
                    }
                ?>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($stocks as $stock): ?>
        <tr>
            <td><?php echo h(isset($stock['Stock']['stock_group_id']) ? $stock['StockGroup']['name'] : $stock['StockType']['name']); ?></td>
            <td><strong><?php echo h(isset($stock['Stock']['stock_group_id']) ? $stock['Stock']['num'] : $stock['Stock']['id']); ?></strong></td>
            <td><?php echo h($stock['Stock']['description']); ?></td>
            <?php if($this->Session->read('Config.module') == 2) : ?>
            <td><?php echo h(isset($stock['StockUnit']['acronym']) ? $stock['StockUnit']['acronym'].'/'.$stock['Stock']['units'] : $stock['Stock']['units']); ?></td>
            <?php endif; ?>
            <td><?php echo h(number_format($stock['Stock']['price'], 2, ',', '.')); ?></td>
            <?php if($this->Session->read('Config.module') == 2) : ?>
            <td style="font-size: 1.25em; text-align: center;"><strong><?php echo h($stock['Stock']['balance']); ?></strong></td>
            <?php endif; ?>
            <?php if($this->Session->read('Config.module') == 1) : ?>
            <td><strong><?php echo h($stock['Organization']['name']); ?></strong></td>
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
                <?php if($this->Session->read('Auth.User.Role.sort') <= 2) echo $this->Html->link('<i class="fa fa-pencil fa-lg"></i>', array('action' => 'edit', $stock['Stock']['id']), array('escape'=>false, 'title'=>__('Edit'))); ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format'=>__('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
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
