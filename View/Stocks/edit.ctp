<div class="stocks form">
<?php echo $this->Form->create('Stock'); ?>
	<fieldset>
		<legend><?php echo __('Edit Stock'); ?><span class="pull-right"><?= isset($this->request->data['Stock']['num']) ? $this->request->data['StockGroup']['name'].' - <b>'.$this->request->data['Stock']['num'].'</b>' : '<b>'.$this->request->data['Stock']['id'].'</b>';?></span></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('stock_type_id', array('class'=>'select2', 'empty'=>__('Select an Item...')));
		echo $this->Form->input('description', array('class'=>'uppercase'));
		echo $this->Form->input('stock_unit_id', array('class'=>'select2', 'empty'=>__('Select an Item...')));
		echo $this->Form->input('units', array('min'=>1));
		echo $this->Form->input('price', array('step'=>0.01));
	?>
	</fieldset>
    <?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
    <?php echo $this->Html->link(__('Cancel'), array('type'=>'reset', 'action'=>'index'), array('class'=>'btn btn-default')); ?>
    <?php echo $this->Form->end(); ?>
</div>
<div class="actions">
    <?=$this->element('actions.stocks');?>
</div>
