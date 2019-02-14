/*
 * Control de navegacion en herramienta tabs
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Febrero 2019
 */

$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        var $this   = $( this ),
            loadurl = $this.attr( 'href' ),
            targ    = $this.attr( 'data-target' );

        $.get( loadurl , function( data ) {
            $( targ ).html( data );
        });

        $this.tab('show');
        return false;
    });
});
