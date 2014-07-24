document.addEventListener("DOMContentLoaded", function() {
    Select2.set();
    Normalize.set();
    LocalStorage.set();
    Bootstrap.set();
    Loading.set();
    FormFilter.set();
}, false);

var Select2 = {
    set : function(){
        $('.select2').select2();
        $('.select2-open').select2().on('select2-focus', function(){
            $(this).select2('open');
        }).on('select2-open', function() {
            $('#select2-drop-mask').hide();
        });
        return true;
    }
};
var Normalize = {
    set : function(){
        $('.fade-in').hide();
        $('.fade-in').fadeIn();
        $('.message').animate({
            opacity: 0.75
        }, 2200);
        $('.message').hover(function(){
            $('.message').css('opacity', 1);
        },function(){
            $('.message').css('opacity', 0.6);
        });

        $('.date').attr('type','date');
        if(!Modernizr.inputtypes.date){
            if($('input[type=date]').val() != undefined){
                var dt = $('input[type=date]').val().split('-');
                $('input[type=date]').val(dt[2]+'-'+dt[1]+'-'+dt[0])
            }

            $('input[type=date]').mask('99/99/9999');
            $('input[type=date]').datepicker({
                dateFormat: 'dd/mm/yy',
                dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                nextText: 'Próximo',
                prevText: 'Anterior'
            });
        };

        Assets.uppercase();
        $('.phone').mask('9999-9999');

        return true;
    }
};
var LocalStorage = {
    set : function(){
        if(localStorage['actions-toggle'] === undefined){
            localStorage['actions-toggle'] = 'open';
        }
        if(localStorage['actions-toggle'] == 'open'){
            actions_open();
        } else {
            actions_close();
        }
        return true;
    }
};
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
var Loading = {
    set :function(){
        this.indicator()
        return true;
    },
    indicator : function(){
        $('.loader').on('click', function() {
            $('#loading-indicator').fadeIn();
        });
        $(document).ajaxSend(function(event, request, settings) {
            $('#loading-indicator').fadeIn();
        });
        $(document).ajaxComplete(function(event, request, settings) {
            $('#loading-indicator').fadeOut();
        });
    }
};
var FormFilter = {
    set : function(){
        $('.submitFormFilter').click(function(){
            if(('.formFilter').data('changed'))
                $('.formFilter').submit();
        });
        $(':input').change(function() {
            $('.formFilter').data('changed', true);
        });

        $('.filter .dropdown-menu').on('click', function (e) {
            $('.filter').hasClass('open') && e.stopPropagation();
        });

        $('.filter').on('shown.bs.dropdown', function (e) {
            $('#'+ e.currentTarget.id +' .select2-search-field input').focus();
        });
        $('.filter').on('hide.bs.dropdown', function (e) {
            $('#'+ e.currentTarget.id +' .select2-open').select2('close');
        });
        $('.Apply').on('click', function (e) {
            $('.refresh').addClass('fa-spin');
            $('.btn-group').hasClass('open') && e.stopPropagation();
            if($('.formFilter').data('changed')){
                $('.formFilter').submit();
            }
        });
        $('.Clear').on('click', function (e) {
            $('.refresh').addClass('fa-spin');
            $('#'+ e.currentTarget.id + 'Filter').hasClass('open');
            $('#'+ e.currentTarget.id+ 'Filter ' +' :input').val('');
            if($('.formFilter').data('changed')){
                $('.formFilter').submit();
            }
        });
    }
};

function actions_close(){
    $('.actions-toggle').prev().css('width', '100%');
    $('.actions-toggle').prev().css('float', 'none');
    $('.actions-toggle').hide();
    $('#actions-hide').hide();
    $('#actions-show').show();
    localStorage['actions-toggle'] = "close";
}
function actions_open(){
    $('#actions-show').hide();
    $('.actions-toggle').prev().animate({
        width: '76%',
        float: 'right'
    }, 300, function(){
        $('.actions-toggle').show();
        $('#actions-hide').show();
    });
    localStorage['actions-toggle'] = "open";
}
$('#actions-hide').click(function(){
    actions_close();
});
$('#actions-show').click(function(){
    actions_open();
});
$('.refresh').click(function(){
    $('.refresh').addClass('fa-spin');
});
var Assets = {
    isset : function(args){
        if (typeof args != 'undefined') {
            return true;
        }
        return args;
    },
    uppercase : function(selector){
        if(this.isset(selector)){
            $(selector).blur(function(e){
                $('#'+e.currentTarget.id).val(($('#'+e.currentTarget.id).val()).toUpperCase());
            });
        } else {
            $('.uppercase').blur(function(e){
                $('#'+e.currentTarget.id).val(($('#'+e.currentTarget.id).val()).toUpperCase());
            });
        }
    }
};