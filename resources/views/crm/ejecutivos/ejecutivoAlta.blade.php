@extends( 'crm.layout.principal' , ['seccion' => 'ejecutivos'] )

@section( 'seccionHeader' )
    @include( 'crm.layout.subseccionHeader' , [ 'seccion' => 'ejecutivos' , 'subseccion' => 'Alta Ejecutivo' ] )
@endsection

@section( 'seccionContenido' )

@endsection

@section( 'seccionFooter' )
    @include( 'crm.ejecutivos.ejecutivosFooter' )
@endSection
