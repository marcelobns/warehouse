<div class="container">
	<div class="stockTypes form col-md-9">
		<?php echo $this->Form->create('StockType'); ?>
		<fieldset>
			<legend><?php echo __('Edit Stock Type'); ?></legend>
			<?php
			echo $this->Form->input('id');
			echo $this->Form->input('name');
			echo $this->Form->input('avg_markup');
			echo $this->Form->input('depreciation');
			echo $this->Form->input('gen_code');
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
