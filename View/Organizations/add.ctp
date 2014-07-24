<div class="organizations form">
<?php echo $this->Form->create('Organization'); ?>
	<fieldset>
		<legend><?php echo __('Add').' '.$type['OrganizationType']['name']; ?></legend>
	<?php
        echo $this->Form->input('organization_type_id', array('type'=>'text', 'value'=>$type['OrganizationType']['id'], 'hidden'=>true, 'label'=>false));
        echo $this->Form->input('parent_id', array('class'=>'select2', 'empty'=>__('Select an Item...')));
		echo $this->Form->input('name');
		echo $this->Form->input('nickname');
		echo $this->Form->input('acronym');
		echo $this->Form->input('responsible');
        echo $this->Form->input('phone');
		echo $this->Form->input('email');
	?>
	</fieldset>
    <?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
    <?php echo $this->Html->link(__('Cancel'), $this->request->referer(), array('class'=>'btn btn-default')); ?>
    <?php echo $this->Form->end(); ?>
</div>
<div class="actions">
    <?=$this->element('actions.organizations');?>
</div>
