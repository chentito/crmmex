/*
 * Control de navegacion en herramienta tabs
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Febrero 2019
 */

$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });

    $('.nav-tabs a').on('shown.bs.tab', function(event){
        var x = $(event.target).text();         // active tab
        var y = $(event.relatedTarget).text();  // previous tab
    });
});
