<?=$this->Form->create('Report'); ?>
    <fieldset>
        <?=$this->Form->input('organization_id'); ?>        
        <?=$this->Form->input('stock_type_id'); ?>        
    </fieldset>
<?=$this->Form->end(); ?>
</div>
<div class="modal-footer">
    <?=$this->html->link('<i class="fa fa-print fa-lg"></i> Imprimir',
        array(),
        array('id'=>'href_print' ,'class'=>'pull-right', 'style'=>'font-size:1.5em', 'escape'=>false, 'target'=>'_blank')); ?>
</div>
<script type="text/javascript">
    $(function(){
        set_href();
    });

    $('input, select').change(function(){
        set_href();
    });

    function set_href(){
        $('#href_print').attr('href', '/<?=APP_DIR?>/reports/print_report/lista_estoque?p='+
            'stock_type_id='+$('#ReportStockTypeId').val()+','+
            'fator='+$('#ReportFator').val()
        );
    };
</script>