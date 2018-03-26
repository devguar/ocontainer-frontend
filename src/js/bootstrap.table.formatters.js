/**
 * Created by Lucas on 06/11/2016.
 */

function bootstrapTableButtons(value, row, index) {
    if (row.actions !== undefined && row.actions !== null){
        return row.actions;
    }else{
        var coluna = $(this);
        var divButtons = "table-butons";

        if(coluna[0].hasOwnProperty("nomeDivFormatter")){
            divButtons = coluna[0].nomeDivFormatter;
        }

        return $("#" + divButtons).html().replace(/999999/g, row.id);
    }
}

function bootstrapTableFormatSimNao(value, row, index) {
    if (value === 'S') return 'Sim';
    return 'Não';
}

function bootstrapTableFormatCor(value, row, index) {
    if (value === "") return 'Sem cor';
    else{
        return '<span class="label" style="background-color: ' + value + '">____</span>';
    }
}

function bootstrapTableFormatDate(value, row, index) {
    if (value !== null) value = formatDate(value);
    return value;
}

function formatDate(value){
    var partes = value.split('-');
    return partes[2].trim() + '/' + partes[1].trim() + '/' + partes[0].trim();
}

function formatDateTime(value) {
    var partes = value.split(' ');

    var data = formatDate(partes[0]);
    var hora = partes[1].substr(0, 5);

    value = data + " " + hora;

    return value;
}

function bootstrapTableFormatDateTime(value, row, index) {
    if (value !== null){
        value = formatDateTime(value);
    }
    return value;
}

function bootstrapTableFormatAtivo(value, row, index) {
    if (row.ativo === 'S'){
        return value;
    }else {
        if (value.indexOf('</a>') > 0){
            value = value.replace('</a>',' <span class="label label-default">Inativo</span></a>');
            value = value.replace('<a href','<a class="text-muted" href');
        }else{
            value = '<p class="text-muted">' + value + ' <span class="label label-default">Inativo</span></p>';
        }

        return value;
    }
}

function bootstrapTableValueSorter(a, b) {
    if (a.valor < b.valor) return -1;
    if (a.valor > b.valor) return 1;
    return 0;
}