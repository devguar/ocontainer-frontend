/**
 * Created by lucas.guarnieri on 03/11/2016.
 */

$(document).ready(function(){
    defineMasks();

    $('.tabela-dinamica').on('post-body.bs.table', function (data) {
        defineMasks();
    });
});

function defineMasks() {
    $(".mask-data").mask("99/99/9999");
    $(".mask-data").datepicker({language: 'pt-BR'});

    $(".mask-hora").mask("99:99");

    $(".mask-cep").mask("99999-999");

    $(".mask-cpf").mask("999.999.999-99");

    $(".mask-cnpj").mask("99.999.999/9999-99");

    $(".mask-telefone").mask("(99) 9999-9999?9").ready(function (event) {
        var target, phone, element;
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;

        if (target != undefined) {
            phone = target.value.replace(/\D/g, '');
            element = $(target);
            element.unmask();
            if (phone.length > 10) {
                element.mask("(99) 99999-999?9");
            } else {
                element.mask("(99) 9999-9999?9");
            }
        }
    });

    $(".mask-decimal_old").keypress(function (evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    });

    $('.mask-chosen').select2({
        theme: "bootstrap",
        placeholder: "Selecione uma opção",
        language: 'pt-BR',
    });

    var options_ac = {
        theme: "bootstrap",
        placeholder: "Selecione uma opção",
        language: 'pt-BR',
        minimumInputLength: 1,
        minimumResultsForSearch: 10,
        ajax: {
            dataType: "json",
            type: "GET",
            data: function (params) {
                return {termo: params.term};
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.text,
                            id: item.id
                        }
                    })
                };
            }
        }
    };

    var options_ac_allowclear = Object.create(options_ac);
    options_ac_allowclear.allowClear = true;

    var options_ac_autoload = Object.create(options_ac);
    options_ac_autoload.minimumInputLength = 0;

    var options_ac_autoload_allowclear = Object.create(options_ac_autoload);
    options_ac_autoload_allowclear.allowClear = true;

    $(".mask-chosen-autocomplete").select2(options_ac);
    $('.mask-chosen-autocomplete-allow-deselect').select2(options_ac_allowclear);
    $(".mask-chosen-autocomplete-autoload").select2(options_ac_autoload);
    $('.mask-chosen-autocomplete-allow-deselect-autoload').select2(options_ac_autoload_allowclear);

    $('.mask-chosen-cidade_id').select2({
        theme: "bootstrap",
        placeholder: "Selecione uma opção",
        language: 'pt-BR',
        minimumInputLength: 1,
        minimumResultsForSearch: 10,
        ajax: {
            url: function(){
                var estadoid = $("#estadoid").val();

                var urlcontroller = urlcidades;
                urlcidades = urlcidades.replace(/999999/g, estadoid);
                return urlcontroller;
            },
            dataType: "json",
            type: "GET",
            data: function (params) {
                return {termo: params.term};
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.text,
                            id: item.id
                        }
                    })
                };
            },

        },
        allowClear: true
    });

    $('.mask-decimal').maskMoney({
        prefix: '',
        allowNegative: false,
        thousands: '',
        decimal: ',',
        affixesStay: false
    });

    $('.mask-money').maskMoney({
        prefix: 'R$ ',
        allowNegative: false,
        thousands: '',
        decimal: ',',
        affixesStay: false
    });

    $('.mask-integer').maskMoney({
        prefix: '',
        precision: 0,
        allowNegative: false,
        thousands: '',
        decimal: ',',
        affixesStay: false
    });

    $('.mask-tooltip').tooltip();

    $(".mask-cor").colorpicker({
        format: 'hex'
    });

    $(".mask-multiselect").multiSelect();
};
