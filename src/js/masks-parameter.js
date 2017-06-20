/**
 * Created by lucas.guarnieri on 03/11/2016.
 */

$(document).ready(function(){
    defineMasksParameters();

    $(".mask-parameter").each(function () {
        ativouMaskParametro($(this));
    });
});

function defineMasksParameters() {
    $(".mask-parameter").on("change", function () {
        ativouMaskParametro($(this));
    });
}

function ativouMaskParametro(fnc){
    var checked = fnc.is(':checked');
    var func_name = fnc.prop('name');
    var seletor_details = '#' + func_name + "_details";

    if ($(seletor_details).length > 0){
        if (checked){
            $(seletor_details).slideDown('slow');
        } else{
            $(seletor_details).slideUp('slow');
        }
    }
}