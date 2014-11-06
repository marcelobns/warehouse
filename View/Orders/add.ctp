<div class="orders form add">
<?php echo $this->Form->create('Order'); ?>
	<fieldset>
		<legend><?php echo $order_type['OrderType']['name']; ?></legend>
	<?php
        echo $this->Form->input('order_type_id', array('type'=>'text', 'value'=>$order_type['OrderType']['id'], 'hidden'=>true, 'label'=>false));
		echo $this->Form->input('date_time', array('type'=>'text', 'class'=>'date', 'value'=>date('Y-m-d')));
        echo $this->Form->input('seller_id', array('class'=>'select2', 'empty'=>__('Select an Item...'), 'value'=>$seller_id));
        echo $this->Form->input('buyer_id', array('class'=>'select2', 'empty'=>__('Select an Item...')));
        foreach ($orderDetails as $i=>$value) :
            $value = $value['OrderDetail'];
            echo $this->Form->input('OrderDetail.'.$i.'.name', array('label'=>false, 'value'=>$value['name'], 'hidden'=>true));
            echo $this->Form->input('OrderDetail.'.$i.'.value', array('type'=>$value['input_type'], 'label'=>$value['name'], 'class'=>'a '.$value['css_class'], 'required'=>$value['required']));
            echo $this->Form->input('OrderDetail.'.$i.'.order_type_id', array('type'=>'text', 'label'=>false, 'value'=>$value['order_type_id'], 'hidden'=>true, 'div'=>false));
            echo $this->Form->input('OrderDetail.'.$i.'.input_type', array('label'=>false, 'value'=>$value['input_type'], 'hidden'=>true, 'div'=>false));
            echo $this->Form->input('OrderDetail.'.$i.'.input_mask', array('label'=>false, 'value'=>$value['input_mask'], 'hidden'=>true, 'div'=>false));
            echo $this->Form->input('OrderDetail.'.$i.'.required', array('label'=>false, 'value'=>$value['required'], 'hidden'=>true, 'div'=>false));
            echo $this->Form->input('OrderDetail.'.$i.'.css_class', array('label'=>false, 'value'=>$value['css_class'], 'hidden'=>true, 'div'=>false));
            echo $this->Form->input('OrderDetail.'.$i.'.sort', array('label'=>false, 'value'=>$value['sort'], 'hidden'=>true, 'div'=>false));
        endforeach;
		echo $this->Form->input('note');
	?>
    <?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
    <?php echo $this->Html->link(__('Cancel'), $this->request->referer(), array('class'=>'btn btn-default reset')); ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<div class="actions">
    <?php echo $this->element('actions.orders');?>
</div>