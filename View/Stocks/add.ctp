<div class="container">
	<div class="stocks form col-md-9">
	<?php echo $this->Form->create('Stock'); ?>
		<fieldset>
			<legend><?php echo __('Add Stock'); ?></legend>
		<?php
			echo $this->Form->input('stock_type_id', array('class'=>'selectize', 'empty'=>__('Select an Item...')));
			echo $this->Form->input('description', array('class'=>'uppercase'));
			echo $this->Form->input('stock_unit_id', array('class'=>'selectize', 'empty'=>__('Select an Item...')));
	        echo $this->Form->input('units', array('value'=> 1, 'min'=>1));
	        echo $this->Form->input('price', array('step'=>0.001, 'min'=>0));
		?>
		<?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
	    <?php echo $this->Html->link(__('Cancel'), array('action'=>'index'), array('class'=>'btn btn-default reset')); ?>
		</fieldset>
	<?php echo $this->Form->end(); ?>
	</div>
	<div class="actions col-md-3">
	    <?=$this->element('actions.stocks');?>
	</div>
</div>
