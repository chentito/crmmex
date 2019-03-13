@extends( 'crm.layout.principal' , ['seccion' => 'productos'] )

@section( 'seccionHeader' ) 
    @include( 'crm.productos.productoHeader' , [ 'seccion' => 'productos' , 'subseccion' => 'Alta Producto' ] )
@endsection

@section( 'seccionContenido' )
ALTA DE PRODUCTO
@endsection

@section( 'seccionFooter' )
    @include( 'crm.productos.productoFooter' )
@endsection
