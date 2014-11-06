document.addEventListener("DOMContentLoaded", function() {
    Select2.set();
    Normalize.set();
    LocalStorage.set();
    Bootstrap.set();
    Loading.set();
    FormFilter.set();

    $('.input-search').focus();
    $('.input-search').select();    
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

        $.each($('.date'), function(i, o){
            if($(o).val() !== ""&& $(o).val().indexOf('/') <= 0){
                console.log($(o).val().indexOf('/'));
                var timestamp = $(o).val().split(' ');
                var date = timestamp[0].split('-');
                $(o).val(date[2]+'/'+date[1]+'/'+date[0]);
            }
        });
        $('.date').mask('99/99/9999');
        $('.date').datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });

        Assets.uppercase();
        Assets.trackChanges();
        
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
        this.modal.loadData();
        return true;
    },
    modal : {
        removeData : function(){
            $('body').on('hide.bs.modal', function(){
                $('.modal-content').html('');
            });
        },
        loadData : function(){
            $("a[data-toggle=modal]").click(function(e) {
                $(".modal-content").load(e.currentTarget.href);
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
    },
    sisyphus:function(){
        $('.add form').sisyphus({ timeout: 10 });
        $('.reset').click(function(e){
            $('.add form').sisyphus().manuallyReleaseData();
            console.log('reset');
        });        
    },
    trackChanges: function(){
        $('form').trackChanges();
    }
};