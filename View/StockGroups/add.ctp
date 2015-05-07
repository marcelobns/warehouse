<div class="container">
	<div class="stockGroups form col-md-9">
		<?php echo $this->Form->create('StockGroup'); ?>
		<fieldset>
			<legend><?php echo __('Add Stock Group'); ?></legend>
			<?php
			echo $this->Form->input('name');
			echo $this->Form->input('inventory');
			echo $this->Form->input('acronym');
			echo $this->Form->input('sort');
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