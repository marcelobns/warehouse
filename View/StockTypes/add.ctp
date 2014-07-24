<div class="stockTypes form">
<?php echo $this->Form->create('StockType'); ?>
	<fieldset>
		<legend><?php echo __('Add Stock Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('avg_markup');
		echo $this->Form->input('depreciation');
		echo $this->Form->input('consumer_goods');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <?=$this->element('actions.stocks');?>
</div>
