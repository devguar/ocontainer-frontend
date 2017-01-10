/**
 * Created by lucas.guarnieri on 10/01/2017.
 */

$(document).ready(function(){
    defineMasksColor();
});

function defineMasksColor() {
    $(".mask-cor").colorpicker({
        format: 'hex'
    });
}