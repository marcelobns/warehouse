<div class="container">
    <div class="orders form col-md-9">
<?php echo $this->Form->create('Order'); ?>
    <fieldset>
        <legend>
            <?php echo $order_type['OrderType']['name']; ?> <?php echo (isset($this->request->data['Order']['num']) ? $this->request->data['Order']['num'].'/' : '').$this->request->data['Order']['reference_year'];?>
        </legend>
    <?php
        echo $this->Form->input('id');
        echo $this->Form->input('date_time', array('type'=>'text', 'class'=>'date_picker', 'label'=>'Data'));
        echo $this->Form->input('seller_id', array('class'=>'selectize', 'empty'=>__('Select an Item...')));
        echo $this->Form->input('buyer_id', array('class'=>'selectize', 'empty'=>__('Select an Item...')));
        foreach ($this->request->data['OrderDetail'] as $key=>$value):
            $value['OrderDetail']['id'] = $value['OrderDetailV']['id'];
            $value['OrderDetail']['value'] = $value['OrderDetailV']['value'];
            $value['OrderDetail']['order_id'] = $this->request->data['Order']['id'];
            $value = $value['OrderDetail'];
            echo $this->Form->input('OrderDetail.'.$key.'.id', array('value'=>$value['id']));
            echo $this->Form->hidden('OrderDetail.'.$key.'.name', array('value'=>$value['name']));
            echo $this->Form->input('OrderDetail.'.$key.'.value', array('type'=>$value['input_type'], 'label'=>$value['name'], 'class'=>$value['css_class'], 'required'=>$value['required'], 'value'=>$value['value']));
            echo $this->Form->hidden('OrderDetail.'.$key.'.order_type_id', array('value'=>$value['order_type_id']));
            echo $this->Form->hidden('OrderDetail.'.$key.'.input_type', array('value'=>$value['input_type']));
            echo $this->Form->hidden('OrderDetail.'.$key.'.input_mask', array('value'=>$value['input_mask']));
            echo $this->Form->hidden('OrderDetail.'.$key.'.required', array('value'=>$value['required']));
            echo $this->Form->hidden('OrderDetail.'.$key.'.css_class', array('value'=>$value['css_class']));
            echo $this->Form->hidden('OrderDetail.'.$key.'.sort', array('value'=>$value['sort']));
        endforeach;
        echo $this->Form->input('note');
    ?>
    <?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
    <?php echo $this->Html->link(__('Cancel'), array('action'=>'index'), array('class'=>'btn btn-default')); ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<div class="actions col-md-3">
    <?=$this->element('actions.orders');?>
</div>
<div class="related col-md-12" style="margin-bottom: 100px;">
    <table class="table">
        <thead>
            <tr>
                <th>Grupo/Tipo</th>
                <th>Número</th>
                <th>Descrição</th>
                <th>Volumes</th>
                <th>Valor</th>
                <th></th>
                <th class="actions">
                    <?php echo $this->Html->link('<i class="fa fa-plus-square"></i> '.__('New Trade'),
                        array('controller' => 'trades', 'action' => 'add', $this->request->data['Order']['id']),
                        array('escape'=>false)); ?>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php $total = 0;?>
        <?php foreach ($this->request->data['Trade'] as $trade): ?>
        <?php $total += ($trade['Trade']['buy_amount']+$trade['Trade']['sell_amount'])/$trade['Stock']['units'] * ($trade['Trade']['buy_price']+$trade['Trade']['sell_price'])?>
            <tr>
                <td style="width: 15%"><?php echo isset($trade['StockGroup']['name']) ? $trade['StockGroup']['name'] : $trade['StockType']['name']; ?></td>
                <td><strong><?php echo isset($trade['Stock']['num']) ? $trade['Stock']['num'] : $trade['Stock']['id']; ?></strong></td>
                <td style="width: 45%"><?php echo $trade['Stock']['description']; ?></td>
                <td><?php echo ($trade['Trade']['buy_amount']+$trade['Trade']['sell_amount']); ?></td>
                <td><strong><?php echo number_format(($trade['Trade']['buy_price']+$trade['Trade']['sell_price']), 3, ',', '.'); ?></strong></td>
                <td><?php echo isset($trade['StockSituation']['name']) ? $trade['StockSituation']['name'] : number_format((($trade['Trade']['buy_amount']+$trade['Trade']['sell_amount'])/$trade['Stock']['units']) * ($trade['Trade']['buy_price']+$trade['Trade']['sell_price']), 3, ',', '.'); ?></td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Edit'), array('controller' => 'trades', 'action' => 'edit', $trade['Trade']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'trades', 'action' => 'delete', $trade['Trade']['id']), null, __('Are you sure you want to delete # %s?', $trade['Trade']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <h2 class="pull-right">
            Total <strong><?=number_format($total, 3, ',', ' ');?></strong>
        </h2>
    </table>
</div>
</div>
