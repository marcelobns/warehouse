<div class="container">
	<div class="organizations form col-md-9">
	<?php echo $this->Form->create('Organization'); ?>
		<fieldset>
			<legend><?php echo __('Add').' '.$type['OrganizationType']['name']; ?></legend>
		<?php
	        echo $this->Form->hidden('organization_type_id', array('type'=>'text', 'value'=>$type['OrganizationType']['id']));
	        echo $this->Form->input('parent_id', array('class'=>'selectize', 'empty'=>__('Select an Item...')));
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
	<div class="actions col-md-3">
	    <?=$this->element('actions.organizations');?>
	</div>
</div>
