/**
 * Created by lucas.guarnieri on 10/01/2017.
 */

$(document).ready(function(){
    defineMasksTooltip();

    $('.tabela-dinamica').on('post-body.bs.table', function (data) {
        defineMasksTooltip();
    });
});

function defineMasksTooltip(){
    $('.mask-tooltip').tooltip();
    $('.mask-popover').popover({html : true})
}
