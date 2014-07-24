<div class="userRoles form">
<?php echo $this->Form->create('UserRole'); ?>
	<fieldset>
		<legend><?php echo __('Add User Role'); ?></legend>
	    <?php
            echo $this->Form->input('user_id', array('type'=>'text', 'value'=>@$user_id, 'hidden', 'label'=>false));
            echo $this->Form->input('module_id', array('class'=>'select2'));
            echo $this->Form->input('role_id', array('class'=>'select2'));
            echo $this->Form->input('organization_scope_id', array('class'=>'select2'));
	    ?>
        <?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
        <?php echo $this->Html->link(__('Cancel'), array('controller'=>'users', 'action'=>'edit', @$user_id), array('class'=>'btn btn-default')); ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<div class="actions">
    <?=$this->element('actions.orders');?>
</div>
