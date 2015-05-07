<div class="container">
	<div class="roles form col-md-9">
	<?php echo $this->Form->create('Role'); ?>
		<fieldset>
			<legend><?php echo __('Add Role'); ?></legend>
		<?php
			echo $this->Form->input('name');
			echo $this->Form->input('sort');
		?>
		<?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
	    <?php echo $this->Html->link(__('Cancel'), $_SESSION['HTTP_REFERER'], array('class'=>'btn btn-default')); ?>
		</fieldset>
	<?php echo $this->Form->end(); ?>
	</div>
	<div class="actions col-md-3">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('List Roles'), array('action' => 'index')); ?></li>
		</ul>
	</div>
</div>
