<div class="container">
	<div class="roles form col-md-8">
	<?php echo $this->Form->create('Role'); ?>
		<fieldset>
			<legend><?php echo __('Edit Role'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('name');
			echo $this->Form->input('sort');
			echo $this->AuthView->input_rules($this->request->data['Rule'], 'Role');
		?>
		<?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
	    <?php echo $this->Html->link(__('Cancel'), $_SESSION['HTTP_REFERER'], array('class'=>'btn btn-default')); ?>
		</fieldset>
	<?php echo $this->Form->end(); ?>
	</div>
	<div class="actions col-md-4">
		<h3><?php echo __('Context'); ?></h3>
		<ul>

			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Role.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Role.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Roles'), array('action' => 'index')); ?></li>
		</ul>
	</div>
<div class="container">
