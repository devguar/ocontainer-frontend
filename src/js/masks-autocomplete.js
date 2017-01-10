/**
 * Created by lucas.guarnieri on 03/11/2016.
 */

$(document).ready(function(){
    defineMasksAutocomplete();
});

function defineMasksAutocomplete() {
    $('.mask-chosen').select2({
        theme: "bootstrap",
        placeholder: "Selecione uma opção",
        language: 'pt-BR'
    });

    var options_ac = {
        theme: "bootstrap",
        placeholder: "Selecione uma opção",
        language: 'pt-BR',
        minimumInputLength: 1,
        minimumResultsForSearch: 0,
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

    var options_ac_allowinsert = Object.create(options_ac);
    options_ac_allowinsert.tags = true;
    options_ac_allowinsert.placeholder = "Selecione uma opção ou digite";
    options_ac_allowinsert.createTag = function (params) {
        return {
            id: "new:" + params.term,
            text: params.term,
            newOption: true
        }
    };

    var options_ac_autoload_allowinsert = Object.create(options_ac_allowinsert);
    options_ac_autoload_allowinsert.minimumInputLength = 0;

    $(".mask-chosen-autocomplete").select2(options_ac);
    $('.mask-chosen-autocomplete-allow-deselect').select2(options_ac_allowclear);
    $(".mask-chosen-autocomplete-autoload").select2(options_ac_autoload);
    $('.mask-chosen-autocomplete-allow-deselect-autoload').select2(options_ac_autoload_allowclear);
    $('.mask-chosen-autocomplete-allow-insert').select2(options_ac_allowinsert);
    $('.mask-chosen-autocomplete-allow-insert-autoload').select2(options_ac_autoload_allowinsert);

    $('.mask-chosen-cidade_id').select2({
        theme: "bootstrap",
        placeholder: "Selecione uma opção",
        language: 'pt-BR',
        minimumInputLength: 1,
        minimumResultsForSearch: 10,
        ajax: {
            url: function(){
                var estadoid = $("#estado_id").val();

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
            }
        },
        allowClear: true
    });
}
