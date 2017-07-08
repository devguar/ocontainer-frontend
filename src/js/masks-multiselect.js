/**
 * Created by lucas.guarnieri on 10/01/2017.
 */

$(document).ready(function(){
    defineMasksMultiSelect();
});

function defineMasksMultiSelect(){
    $(".mask-multiselect").multiselect({
        search: {
            left: '<input type="text" name="q" class="form-control" placeholder="Buscar..." />',
            right: '<input type="text" name="q" class="form-control" placeholder="Buscar..." />',
        },
        fireSearch: function(value) {
            return value.length >= 1;
        }
    });
}

