<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
        <?php
        echo $this->Form->input('name');
        echo $this->Form->input('email');
        echo $this->Form->input('phone');

        echo $this->Form->input('username');

        echo $this->Form->input('password');
        echo $this->Form->input('confirm_password', array('type'=>'password'));

        echo $this->Form->input('organization_id', array('class'=>'select2', 'empty'=>__('Select an Item...')));
        ?>
    <?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
    <?php echo $this->Html->link(__('Cancel'), $this->request->referer(), array('class'=>'btn btn-default')); ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<div class="actions">
    <?=$this->element('actions.users');?>
</div>
<?php $this->start('script'); ?>
<script type="text/javascript">
    $(function(){
        $('#UserPassword').val('');
        $('#UserConfirmPassword').val('');
    });
    $('#UserConfirmPassword').blur(function(){
        if($('#UserConfirmPassword').val() != $('#UserPassword').val()){
            $('#UserPassword').css('border-color', 'red');
            $('#UserConfirmPassword').css('border-color', 'red');
            $('#UserConfirmPassword').val('');
        } else if($('#UserPassword').val() != ''){
            $('#UserPassword').css('border-color', 'green');
            $('#UserConfirmPassword').css('border-color', 'green');
        }
    });
</script>
<?php $this->end(); ?>
