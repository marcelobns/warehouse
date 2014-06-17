<?php echo $this->Form->create('Order'); ?>
<fieldset>
    <?php //TODO requisitar senha de autorização
        echo $this->Form->input('id');
        echo $this->Form->input('canceled_auth_id', array('type'=>'text', 'value'=>$this->Session->read('Auth.User.id'), 'label'=>false, 'div'=>false, 'hidden'=>true));
        echo $this->Form->input('canceled_note', array('type'=>'textarea', 'required'=>true));
        echo $this->Form->input('canceled', array('checked'=>true, 'label'=>false, 'div'=>false, 'hidden'=>true));
    ?>
</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>