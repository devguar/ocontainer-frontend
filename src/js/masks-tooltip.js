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

    $('.mask-popover').popover({
        trigger: 'manual',
        html: true,
        animation:false,
        viewport: '.container'
    }).on('mouseenter', function () {
        var self = this;
        jQuery(this).popover("show");
        jQuery(".popover").on('mouseleave', function () {
            jQuery(self).popover('hide');
        });
    }).on('mouseleave', function () {
        var self = this;
        setTimeout(function () {
            if (!jQuery('.popover:hover').length) {
                jQuery(self).popover('hide');
            }
        }, 600);
    });
}
