@extends( 'crm.layout.principal' , ['seccion' => 'configuraciones'] )

@section( 'seccionHeader' ) 
    @include( 'crm.layout.subseccionHeader' , [ 'seccion' => 'configuraciones' , 'subseccion' => 'Alta Producto' ] )
@endsection

@section( 'seccionContenido' )
ALTA DE PRODUCTO
@endsection

@section( 'seccionFooter' )
    @include( 'crm.configuraciones.configuracionesFooter' )
@endsection
