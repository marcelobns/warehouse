<div class="container" style="width: 450px;">
    <div style="margin-top:30px; padding: 10px; border-radius: 4px;  box-shadow: 0 0 1px rgba(0, 0, 0, 0.3),
                                                                0 3px 7px rgba(0, 0, 0, 0.3),
                                                                inset 0 1px rgba(255, 255, 255, 1),
                                                                inset 0 0 2px rgba(0, 0, 0, 0.25);">
        <h3 style="text-align: center;"><?=__('Warehouse');?></h3>
        <?php echo $this->Form->create('User', array('url'=>array('action'=>'sign_in'))); ?>
        <fieldset style="margin: 30px;">
            <?php echo $this->Form->input('username', array('placeholder'=>__('Username'), 'autofocus'=>true, 'label'=>false)); ?>
            <?php echo $this->Form->input('password', array('type'=>'password', 'placeholder'=>__('Password'), 'label'=>false)); ?>
            <?php echo $this->Form->button(__('Enter'), array('type'=>'submit', 'class'=>'btn btn-default btn-block')); ?>
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
</div>