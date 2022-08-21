let container = $('.container-cargando');
let barra = $('.barra-carga');

$(document).ready(function() {
    //bara wi 0%
    barra.css('width', '0%');
    //crear una animacion para la barra de carga
    barra.animate({
        width: '100%'
    }, 1000);
    //crear una animacion para el contenedor de carga
    container.animate({
        opacity: '0'
    }, 2000);

    container.hide(1);

}).ajaxStart(function() {
    //cuando se inicia una peticion ajax se muestra el contenedor de carga
    container.show();
}).ajaxStop(function() {
    //cuando se termina una peticion ajax se oculta el contenedor de carga
    container.hide();
}).ajaxError(function() {
    //cuando se produce un error en la peticion ajax se oculta el contenedor de carga
    container.hide();
}).ajaxSuccess(function() {
    //cuando se termina una peticion ajax se oculta el contenedor de carga
    container.hide();
}).ajaxComplete(function() {
    //cuando se termina una peticion ajax se oculta el contenedor de carga
    container.hide();
});