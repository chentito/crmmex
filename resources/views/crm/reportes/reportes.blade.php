@extends( 'crm.layout.principal' , ['seccion' => 'reportes'] )

@section( 'seccionHeader' ) 
    @include( 'crm.reportes.reporteHeader' , [ 'seccion' => 'reportes' , 'subseccion' => 'Reportes' ] )
@endsection

@section( 'seccionContenido' )
Contenido de la seccion
@endsection

@section( 'seccionFooter' )
    @include( 'crm.reportes.reporteFooter' )
@endsection


