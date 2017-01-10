/**
 * Created by lucas.guarnieri on 10/01/2017.
 */

$(document).ready(function(){
    defineMasksNumbers();
});

function defineMasksNumbers() {
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
}