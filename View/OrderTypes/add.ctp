<div class="container">
	<div class="orderTypes form col-md-9">
	<?php echo $this->Form->create('OrderType'); ?>
		<fieldset>
			<legend><?php echo __('Add Order Type'); ?></legend>
		<?php
			echo $this->Form->input('name');
			echo $this->Form->input('module_id', array('type'=>'text', 'value'=>$module_id, 'hidden'=>true, 'div'=>false, 'label'=>false));
			echo $this->Form->input('seller_type_id', array('empty'=>__('Select an Item...')));
			echo $this->Form->input('buyer_type_id', array('empty'=>__('Select an Item...')));
		?>
		<?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
	    <?php echo $this->Html->link(__('Cancel'), array('action'=>'index'), array('class'=>'btn btn-default')); ?>
		</fieldset>
	    <?php echo $this->Form->end(); ?>
	</div>
	<div class="actions col-md-3">
		
	</div>
</div>