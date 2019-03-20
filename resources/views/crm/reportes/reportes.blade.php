@extends( 'crm.layout.principal' , ['seccion' => 'reportes'] )

@section( 'seccionHeader' ) 
    @include( 'crm.layout.subseccionHeader' , [ 'seccion' => 'reportes' , 'subseccion' => 'Reportes' ] )
@endsection

@section( 'seccionContenido' )
Contenido de la seccion
@endsection

@section( 'seccionFooter' )
    @include( 'crm.reportes.reporteFooter' )
@endsection


