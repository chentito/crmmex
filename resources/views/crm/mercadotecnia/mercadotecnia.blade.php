@extends( 'crm.layout.principal' , ['seccion' => 'mercadotecnia'] )

@section( 'seccionHeader' ) 
    @include( 'crm.mercadotecnia.mercadotecniaHeader' , [ 'seccion' => 'mercadotecnia' , 'subseccion' => 'Mercadotecnia' ] )
@endsection

@section( 'seccionContenido' )
Contenido de la seccion
@endsection

@section( 'seccionFooter' )
    @include( 'crm.mercadotecnia.mercadotecniaFooter' )
@endsection
