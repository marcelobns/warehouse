<?php echo $this->Form->create('Order'); ?>
<div class="modal-body">
    <?php
        echo $this->Form->input('order_type_id', array('class'=>'selectize', 'empty'=>__('Select an Item...'), 'style'=>'width:100%'));
         if(isset($order_id))
            echo $this->Form->input('buyer_id', array('class'=>'selectize', 'empty'=>__('Select an Item...'), 'style'=>'width:100%'));
    ?>
</div>
<div class="modal-footer">
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
