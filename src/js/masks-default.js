/**
 * Created by lucas.guarnieri on 03/11/2016.
 */

$(document).ready(function(){
    defineMasksDefault();
});

function defineMasksDefault() {
    $(".mask-data").mask("99/99/9999").datepicker({language: 'pt-BR'});

    $(".mask-hora").mask("99:99");

    $(".mask-cep").mask("99999-999");

    $(".mask-cpf").mask("999.999.999-99");

    $(".mask-cnpj").mask("99.999.999/9999-99");
    
    $(".mask-telefone").mask("(00) 0000-00009");
    
    $(".mask-telefone").on("blur", function() {
        var phone = $(this).val().replace(/\D/g, '');
        if (phone.length > 10) {
            $(this).mask("(00) 00000-0009");
        } else {
            $(this).mask("(00) 0000-00009");
        }
    });
}
