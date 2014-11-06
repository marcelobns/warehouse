<div class="trades form">
<?php echo $this->Form->create('Trade'); ?>
	<fieldset>
		<legend><?php echo __('Add Trade'); ?></legend>
	<?php
		echo $this->Form->input('Trade.order_id', array('type'=>'text', 'value'=>$order['Order']['id'], 'hidden'=>true, 'label'=>false));
        switch($order['OrderType']['trade_mode']){
            case 'select' :
                echo $this->Form->input('Trade.stock_code', array('type'=>'number', 'label'=>__('Num')));
                echo $this->Form->input('Trade.stock_id', array('class'=>'select2', 'empty'=>__('Select an Item...')));

                echo $this->Form->input('Trade.amount', array('type'=>'number', 'value'=> 1, 'min'=>0, 'required'=>'required', 'style'=>'width: 30%'));
                echo $this->Form->input('Trade.amount_unit', array('type'=>'number', 'value'=> 0, 'min'=>0, 'required'=>'required', 'style'=>'width: 30%', 'disabled'=>true));
                echo $this->Form->input('Stock.units', array('value'=>1, 'hidden'=>true, 'label'=>false));
                echo $this->Form->input('Trade.price', array('type'=>'number', 'value'=>0, 'step'=>0.01, 'required'=>'required', 'style'=>'width: 30%'));

                echo $this->Form->input('Trade.total', array('type'=>'number', 'value'=>0, 'step'=>0.01, 'style'=>'width: 30%'));
                break;
            case 'create' :
                echo $this->Form->input('Stock.stock_type_id', array('class'=>'select2', 'empty'=>__('Select an Item...')));
                echo $this->Form->input('Stock.description', array('class'=>'uppercase'));
                echo $this->Form->input('Stock.stock_group_id', array('class'=>'select2', 'empty'=>__('Select an Item...'), 'required'=>'required'));
                echo $this->Form->input('Stock.num', array('min'=>1, 'required'=>'required'));
                echo $this->Form->input('Stock.stock_situation_id', array('hidden'=>true, 'label'=>false));
                echo $this->Form->input('Stock.amount', array('type'=>'number', 'min'=>1, 'required'=>'required'));
                echo $this->Form->hidden('Stock.price', array('value'=>0.00));
                if(@$isInventory) {
                    echo $this->Form->input('Trade.buyer_id', array('class'=>'select2', 'empty'=>__('Select an Item...'), 'required'=>'required','value'=>@$this->Session->read('Inventory.buyer_id')));
                }
                if($isBuy) {
                    echo $this->Form->input('Stock.price', array('value'=>0.00, 'step'=>0.01));
                    echo $this->Form->input('Stock.buy_order_id', array('type'=>'text', 'value'=>$order['Order']['id'], 'hidden'=>true, 'label'=>false));
                    echo $this->Form->input('Trade.stock_situation_id', array('hidden'=>true, 'label'=>false));
                } else {
                    echo $this->Form->input('Trade.stock_situation_id', array('class'=>'select2', 'empty'=>__('Select an Item...'), 'required'=>'required'));
                }
                break;
            case 'num' :
                echo $this->Form->input('Trade.stock_group_id', array('id'=>'StockStockGroupId2', 'class'=>'select2', 'empty'=>__('Select an Item...'), 'required'=>'required'));
                echo $this->Form->input('Trade.num', array('type'=>'number', 'required'=>'required'));
                echo $this->Form->input('Trade.num_end', array('type'=>'number', 'required'=>'required'));
                if($isBuy) {
                    echo $this->Form->input('Stock.buy_order_id', array('type'=>'text', 'value'=>$order['Order']['id'], 'hidden'=>true, 'label'=>false));
                    echo $this->Form->input('Trade.stock_situation_id', array('hidden'=>true, 'label'=>false));
                } else {
                    echo $this->Form->input('Trade.stock_situation_id', array('class'=>'select2', 'empty'=>__('Select an Item...'), 'required'=>'required'));
                }
                break;
        }
	?>
    <?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
    <?php echo $this->Html->link(__('Cancel'), $this->request->referer(), array('class'=>'btn btn-default')); ?>
	</fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<div class="actions">
    <?=$this->element('actions.trades');?>
</div>
<?php $this->start('script'); ?>
<script type="text/javascript">
    $(function(){
        StockUnitsEnable();
        calcTotal();
    });
    function getMaxCode(){
        $.ajax({
            url: '<?php echo Router::url(array('controller' => 'stocks', 'action' => 'getMaxCode')); ?>'+'/'+$("#StockStockGroupId").val()
        }).done(function(r){
            $('#StockNum').val(JSON.parse(r).max+1);
        });
    }
    function getStock(){
        if($("#TradeStockId").val() != '')
            $.ajax({
                url: '<?php echo Router::url(array('controller' => 'stocks', 'action' => 'getStock')); ?>'+'/'+$("#TradeStockId").val()
            }).done(function(r){
                obj = JSON.parse(r);
                if(obj.Stock !== undefined){
                    obj = JSON.parse(r);
                    $('[for=TradeAmount]').text(obj.StockUnit.name+'s/'+obj.Stock.units);
                    $('#TradePrice').val(obj.Stock.price);
                    $('#StockUnits').val(obj.Stock.units);
                    StockUnitsEnable();
                    calcTotal();
                }
            });
    }
    function calcTotal(){
        var price = $('#TradePrice').val();
        var amount = parseInt($('#TradeAmount').val());
        var amount_unit = parseInt($('#TradeAmountUnit').val());
        var stock_units = parseInt($('#StockUnits').val());

        if(amount_unit > stock_units-1){
            $('#TradeAmountUnit').val(stock_units-1);
            amount_unit = stock_units-1;
        }
        $('#TradeTotal').val( ((amount*stock_units+amount_unit) * price/stock_units).toFixed(2) );
    }
    function calcTotalInverse(){
        var total = $('#TradeTotal').val();
        var amount = parseInt($('#TradeAmount').val());
        var amount_unit = parseInt($('#TradeAmountUnit').val());
        var stock_units = parseInt($('#StockUnits').val());
        $('#TradePrice').val( (total*stock_units / (amount*stock_units+amount_unit)).toFixed(2) );
    }
    $("#StockStockGroupId").change(function(e){
        getMaxCode();
    });
    $('#TradeStockCode').blur(function(){
        $('#TradeStockId').select2('val', $('#TradeStockCode').val());
        getStock();
    });
    $('#TradeStockId').change(function(e){
        $('#TradeStockCode').val($('#TradeStockId').val());
        getStock();
    });
    $('#TradeAmount').blur(function(){
        calcTotal();
    });
    $('#TradeAmountUnit').blur(function(){
        calcTotal();
    });
    $('#TradePrice').blur(function(){
        calcTotal();
    });
    $('#TradeTotal').blur(function(){
        calcTotalInverse();
    });

    function StockUnitsEnable(){
        if($('#StockUnits').val()-1 > 0){
            $('#TradeAmountUnit').prop('disabled', false);
            $('#TradeAmountUnit').attr('max', $('#StockUnits').val()-1);
        } else {
            $('#TradeAmountUnit').prop('disabled', true);
            $('#TradeAmountUnit').attr('max', 1);
        }
    }
    $('#TradeNum').blur(function(){
        $('#TradeNumEnd').val($('#TradeNum').val());
    });
</script>
<?php $this->end(); ?>