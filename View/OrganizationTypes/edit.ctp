<div class="container">
	<div class="organizationTypes form col-md-9">
		<?php echo $this->Form->create('OrganizationType'); ?>
		<fieldset>
			<legend><?php echo __('Edit Organization Type'); ?></legend>
			<?php
			echo $this->Form->input('id');
			echo $this->Form->input('name');
			echo $this->Form->input('register_type');
			echo $this->Form->input('register_mask');
			echo $this->Form->input('sort');
			echo $this->Form->input('internal');
			?>
			<?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
			<?php echo $this->Html->link(__('Cancel'), array('action'=>'index'), array('class'=>'btn btn-default reset')); ?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>
	<div class="actions col-md-3">
		<h4>Relacionado</h4>
		<ul>
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OrganizationType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('OrganizationType.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Organization Types'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		</ul>
	</div>	
</div>