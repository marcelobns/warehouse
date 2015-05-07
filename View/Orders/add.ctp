<div class="container">
    <div class="orders form add col-md-9">
        <?php echo $this->Form->create('Order'); ?>
        <fieldset>
            <legend><?php echo $order_type['OrderType']['name']; ?></legend>
        <?php
            echo $this->Form->hidden('order_type_id', array('value'=>$order_type['OrderType']['id']));
            echo $this->Form->input('date_time', array('type'=>'text', 'class'=>'date_picker', 'value'=>date('Y-m-d')));
            echo $this->Form->input('seller_id', array('class'=>'selectize', 'empty'=>__('Select an Item...'), 'value'=>$seller_id));
            echo $this->Form->input('buyer_id', array('class'=>'selectize', 'empty'=>__('Select an Item...')));
            foreach ($orderDetails as $i=>$value) :
                $value = $value['OrderDetail'];
                echo $this->Form->hidden('OrderDetail.'.$i.'.name', array('value'=>$value['name']));
                echo $this->Form->input('OrderDetail.'.$i.'.value', array('type'=>$value['input_type'], 'value'=> $value['value'],'label'=>$value['name'], 'class'=>' '.$value['css_class'], 'required'=>$value['required']));
                echo $this->Form->hidden('OrderDetail.'.$i.'.order_type_id', array('value'=>$value['order_type_id']));
                echo $this->Form->hidden('OrderDetail.'.$i.'.input_type', array('value'=>$value['input_type']));
                echo $this->Form->hidden('OrderDetail.'.$i.'.input_mask', array('value'=>$value['input_mask']));
                echo $this->Form->hidden('OrderDetail.'.$i.'.required', array('value'=>$value['required']));
                echo $this->Form->hidden('OrderDetail.'.$i.'.css_class', array('value'=>$value['css_class']));
                echo $this->Form->hidden('OrderDetail.'.$i.'.sort', array('value'=>$value['sort']));
            endforeach;
            echo $this->Form->input('note');
        ?>
        <?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
        <?php echo $this->Html->link(__('Cancel'), $this->request->referer(), array('class'=>'btn btn-default reset')); ?>
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
    <div class="actions col-md-3">
        <?php echo $this->element('actions.orders');?>
    </div>
</div>
