document.addEventListener("DOMContentLoaded", function() {
    Bootstrap.set();
    $('.date').attr('type','date');
    if(!Modernizr.inputtypes.date){
        if($('input[type=date]').val() != undefined){
            var dt = $('input[type=date]').val().split('-');
            $('input[type=date]').val(dt[2]+'-'+dt[1]+'-'+dt[0])
        }

        $('input[type=date]').mask('99/99/9999');
        $('input[type=date]').datepicker({
            dateFormat: 'dd/mm/yyyy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });
    }
    $('.select2').select2();
    $('.select2-open').select2().on('select2-focus', function(){
        $(this).select2('open');
    }).on('select2-open', function() {
        $('#select2-drop-mask').hide();
    });

    $("input[required]").parent().addClass('required');
    $("select[required]").parent().addClass('required');

    $('.phone').mask('9999-9999');
    $('.cpf').mask('999.999.999-99');
    $('.cnpj').mask('99.999.999/9999-99');
    $('.cep').mask('99999-999');
    $('.money').maskMoney({
        allowZero: true,
        thousands:'',
        decimal:'.'
    });
}, false);
$(document).ajaxSend(function(event, request, settings) {
    $('#loading-indicator').fadeIn();
});
$(document).ajaxComplete(function(event, request, settings) {
    $('#loading-indicator').fadeOut();
});
$("input[type=number]").on('keyup', function(e){
    if(!$.isNumeric(this.value)){
        this.value = '';
    }
});
var Bootstrap = {
    set : function(){
        this.modal.removeData();
        return true;
    },
    modal : {
        removeData : function(){
            $('body').on('hide.bs.modal', '.modal', function(){
                $('.modal-content').html('');
                $(this).removeData('bs.modal');
            });
        }
    }
};