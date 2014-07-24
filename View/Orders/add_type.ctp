<?php echo $this->Form->create('Order'); ?>
<fieldset>
    <?php
        echo $this->Form->input('order_type_id', array('class'=>'select2', 'empty'=>__('Select an Item...')));
         if(isset($order_id))
            echo $this->Form->input('buyer_id', array('class'=>'select2', 'empty'=>__('Select an Item...')));
    ?>
</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>