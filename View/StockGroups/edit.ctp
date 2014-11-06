<div class="stockGroups form">
<?php echo $this->Form->create('StockGroup'); ?>
	<fieldset>
		<legend><?php echo __('Edit Stock Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('inventory');
        echo $this->Form->input('acronym');
		echo $this->Form->input('sort');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <?=$this->element('actions.stocks');?>
</div>
