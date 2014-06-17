<div class="orders form">
<?php echo $this->Form->create('Order'); ?>
	<fieldset>
		<legend>
            <?php echo $order_type['OrderType']['name']; ?>
            <span class="pull-right">
                <?php echo (isset($this->request->data['Order']['num']) ? $this->request->data['Order']['num'].'/' : '').$this->request->data['Order']['reference_year'];?>
            </span>
        </legend>
	<?php
        echo $this->Form->input('id');
        echo $this->Form->input('date_time', array('type'=>'text', 'class'=>'date'));
        echo $this->Form->input('seller_id', array('class'=>'select2', 'empty'=>__('Select an Item...')));
        echo $this->Form->input('buyer_id', array('class'=>'select2', 'empty'=>__('Select an Item...')));
        foreach ($this->request->data['OrderDetail'] as $key=>$value):
            $value['OrderDetail']['id'] = $value['OrderDetailV']['id'];
            $value['OrderDetail']['value'] = $value['OrderDetailV']['value'];
            $value['OrderDetail']['order_id'] = $this->request->data['Order']['id'];
            $value = $value['OrderDetail'];
            echo $this->Form->input('OrderDetail.'.$key.'.id', array('value'=>$value['id']));
            echo $this->Form->input('OrderDetail.'.$key.'.name', array('label'=>false, 'value'=>$value['name'], 'hidden'=>true));
            echo $this->Form->input('OrderDetail.'.$key.'.value', array('type'=>$value['input_type'], 'label'=>$value['name'], 'class'=>$value['css_class'], 'required'=>$value['required'], 'value'=>$value['value']));
            echo $this->Form->input('OrderDetail.'.$key.'.order_type_id', array('type'=>'text', 'label'=>false, 'value'=>$value['order_type_id'], 'hidden'=>true, 'div'=>false));
            echo $this->Form->input('OrderDetail.'.$key.'.input_type', array('label'=>false, 'value'=>$value['input_type'], 'hidden'=>true, 'div'=>false));
            echo $this->Form->input('OrderDetail.'.$key.'.input_mask', array('label'=>false, 'value'=>$value['input_mask'], 'hidden'=>true, 'div'=>false));
            echo $this->Form->input('OrderDetail.'.$key.'.required', array('label'=>false, 'value'=>$value['required'], 'hidden'=>true, 'div'=>false));
            echo $this->Form->input('OrderDetail.'.$key.'.css_class', array('label'=>false, 'value'=>$value['css_class'], 'hidden'=>true, 'div'=>false));
            echo $this->Form->input('OrderDetail.'.$key.'.sort', array('label'=>false, 'value'=>$value['sort'], 'hidden'=>true, 'div'=>false));
        endforeach;
        echo $this->Form->input('note');
	?>
    <?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
    <?php echo $this->Html->link(__('Cancel'), array('action'=>'index'), array('class'=>'btn btn-default')); ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<div class="actions">
    <?=$this->element('actions.orders');?>
</div>
<div class="related">
    <table cellpadding = "0" cellspacing = "0">
        <tr>
            <th><?php echo __('StockGroup'); ?></th>
            <th><?php echo __('Num'); ?></th>
            <th><?php echo __('Stock'); ?></th>
            <th><?php echo __('Amount'); ?></th>
            <th><?php echo __('Price'); ?></th>
            <th></th>
            <th class="action-add" style="font-size: 1.25em;">
                <?php echo $this->Html->link('<i class="fa fa-plus"></i> '.__('New Trade'),
                    array('controller' => 'trades', 'action' => 'add', $this->request->data['Order']['id']),
                    array('escape'=>false)); ?>
            </th>
        </tr>
        <?php $total = 0;?>
        <?php foreach ($this->request->data['Trade'] as $trade): ?>
        <?php $total += ($trade['Trade']['buy_amount']+$trade['Trade']['sell_amount']) * ($trade['Trade']['buy_price']+$trade['Trade']['sell_price'])?>
            <tr>
                <td style="width: 10%"><?php echo isset($trade['StockGroup']['name']) ? $trade['StockGroup']['name'] : $trade['StockType']['name']; ?></td>
                <td><?php echo isset($trade['Stock']['num']) ? $trade['Stock']['num'] : $trade['Stock']['id']; ?></td>
                <td style="width: 50%"><?php echo $trade['Stock']['description']; ?></td>
                <td><?php echo ($trade['Trade']['buy_amount']+$trade['Trade']['sell_amount']); ?></td>
                <td><?php echo number_format(($trade['Trade']['buy_price']+$trade['Trade']['sell_price']), 2, ',', '.'); ?></td>
                <td><?php echo isset($trade['StockSituation']['name']) ? $trade['StockSituation']['name'] : number_format(($trade['Trade']['buy_amount']+$trade['Trade']['sell_amount']) * ($trade['Trade']['buy_price']+$trade['Trade']['sell_price']), 2, ',', '.'); ?></td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Edit'), array('controller' => 'trades', 'action' => 'edit', $trade['Trade']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'trades', 'action' => 'delete', $trade['Trade']['id']), null, __('Are you sure you want to delete # %s?', $trade['Trade']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <h2 class="pull-right" style="margin-top: -40px; margin-right: 60px; margin-bottom: 1em;">Total <b><?=number_format($total, 2, ',', ' ');?></b></h2>
    </table>
</div>