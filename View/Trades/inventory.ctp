<div class="trades view">
    <legend>
        <?php echo __('Stock'); ?>
        <span class="pull-right"><?= isset($this->request->data['Stock']['num']) ? $this->request->data['StockGroup']['name'].' - <b>'.$this->request->data['Stock']['num'].'</b>' : '<b>'.$stock['Stock']['id'].'</b>';?></span>
    </legend>
    <dl style="font-size: 1.1em">
        <dt><?php echo __('Stock Type'); ?></dt>
        <dd>
            <?php echo h($this->request->data['StockType']['name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Description'); ?></dt>
        <dd>
            <?php echo h($this->request->data['Stock']['description']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Stock Unit'); ?></dt>
        <dd>
            <?php echo h($this->request->data['StockUnit']['name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Units'); ?></dt>
        <dd>
            <?php echo h($this->request->data['Stock']['units']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Price'); ?></dt>
        <dd>
            <?php echo h($this->request->data['Stock']['price']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Stock Situation'); ?></dt>
        <dd>
            <?php echo h($this->request->data['StockSituation']['name']); ?>
            &nbsp;
        </dd>
    </dl>
    <?php echo $this->Form->create('Trade'); ?>
    <fieldset>
        <?php
        echo $this->Form->input('Trade.id');
        echo $this->Form->input('Trade.stock_id', array('type'=>'text', 'value'=>@$stock_id, 'label'=>false, 'hidden'));
        echo $this->Form->input('Trade.order_id', array('type'=>'text', 'value'=>@$order_id, 'label'=>false, 'hidden'));
        echo $this->Form->input('Trade.buyer_id', array('class'=>'select2', 'empty'=>__('Select an Item...'), 'required'=>'required', 'value'=>@$this->Session->read('Inventory.buyer_id')));
        echo $this->Form->input('Trade.stock_situation_id', array('class'=>'select2', 'empty'=>__('Select an Item...'), 'required'=>'required'));
        ?>
    </fieldset>
    <?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
    <?php echo $this->Html->link(__('Cancel'), $this->Session->read('request_ref'), array('class'=>'btn btn-default')); ?>
    <?php echo $this->Form->end(); ?>
    <?php if($this->request->data['Trade']['id']) echo $this->Form->postLink('<i class="fa fa-ban"></i> '.__('Remover Item do Inventário'),
        array('action' => 'delete', $this->request->data['Trade']['id']), array('class'=>'btn btn-link pull-right', 'escape'=>false),
        __('Are you sure you want to delete # %s?', $this->request->data['Trade']['id'])); ?>
</div>
<div class="actions">
    <?=$this->element('actions.stocks');?>
</div>
