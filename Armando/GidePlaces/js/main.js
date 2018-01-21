$(document).ready(function() {
    /*Funcion para enviar datos de formularios con ajax*/
    $('.FormCatElec').submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        var type = $(this).attr('method');
        var url = $(this).attr('action');
        var formType = $(this).attr('data-form');
    });
});