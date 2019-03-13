@extends( 'crm.layout.principal' , ['seccion' => 'ventas'] )

@section( 'seccionHeader' ) 
    @include( 'crm.ventas.ventaHeader' , [ 'seccion' => 'ventas' , 'subseccion' => 'Seguimiento Propuestas' ] )
@endsection

@section( 'seccionContenido' )
ALTA DE PRODUCTO
@endsection

@section( 'seccionFooter' )
    @include( 'crm.ventas.ventaFooter' )
@endsection

