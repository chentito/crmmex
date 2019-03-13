@extends( 'crm.layout.principal' , ['seccion' => 'configuraciones'] )

@section( 'seccionHeader' ) 
    @include( 'crm.configuraciones.configuracionHeader' , [ 'seccion' => 'configuraciones' , 'subseccion' => 'Configuraciones Generales' ] )
@endsection

@section( 'seccionContenido' )
grales...
@endsection

@section( 'seccionFooter' )
    @include( 'crm.configuraciones.configuracionesFooter' )
@endsection
