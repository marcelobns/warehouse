<?php //echo $this->Form->create('Trade'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div id="logo" style="height: 180px; outline: 1px solid gray;">
                <p>Logo</p>
            </div>
            <div id="items" style="outline: 1px solid gray; height:450px;">
                <?php echo $this->Form->input('Trade.order_id', array('class'=>'select2'));?>
                <?php echo $this->Form->input('Trade.stock_id', array('class'=>'select2', 'empty'=>''));?>
                <legend>Lista de Produtos</legend>
            </div>
        </div>
        <div class="col-md-5">
            <div id="details" style="outline: 1px solid gray; height:305px;">
                <legend>Detalhes</legend>
                <ul>
                    <?php foreach($trades as $trade) : ?>
                    <li></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div id="payment" style="outline: 1px solid gray">
                <legend>Pagamento</legend>
                <?php echo $this->Form->input('Trade.payment_type_id', array('class'=>'select2'));?>
                <?php echo $this->Form->input('Trade.total', array('disabled'));?>
                <?php echo $this->Form->input('Trade.paid', array('type'=>'number', 'step'=>0.01));?>
                <?php echo $this->Form->input('Trade.change', array('disabled'));?>
            </div>
            <button class="btn btn-primary btn-lg pull-right">Finalizar</button>
        </div>
    </div>
</div>
<?php //echo $this->Form->end(); ?>