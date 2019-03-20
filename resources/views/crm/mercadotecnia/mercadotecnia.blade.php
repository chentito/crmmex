@extends( 'crm.layout.principal' , ['seccion' => 'mercadotecnia'] )

@section( 'seccionHeader' ) 
    @include( 'crm.layout.subseccionHeader' , [ 'seccion' => 'mercadotecnia' , 'subseccion' => 'Mercadotecnia' ] )
@endsection

@section( 'seccionContenido' )
Contenido de la seccion
@endsection

@section( 'seccionFooter' )
    @include( 'crm.mercadotecnia.mercadotecniaFooter' )
@endsection
