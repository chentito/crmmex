@extends( 'crm.layout.principal' , ['seccion' => 'ejecutivos'] )

@section( 'seccionHeader' )
    @include( 'crm.layout.subseccionHeader' , [ 'seccion' => 'ejecutivos' , 'subseccion' => 'Roles' ] )
@endsection

@section( 'seccionContenido' )
<div class="row">
    <div class="col-sm-12">
        <div class="card card-small">
            <div class="card-header border-bottom">
                Configuración Rol 
                <div class="float-right">
                    <select class="custom-select custom-select-sm" id="comboListadoRoles" name="comboListadoRoles">
                        <option value="" @if ( $rolUrl == "" ) selected="false" @endif disabled="true">Seleccione Rol</option>
                        @foreach( $roles AS $rol )
                            <option value="{{$rol[ 'idty' ]}}" @if ($rol[ 'idty' ]==$rolUrl) selected="selected" @endif >{{$rol[ 'nombre' ]}}</option>
                        @endforeach
                        <option value="N" @if ($rolUrl=='N') selected="selected" @endif >+ Nuevo Rol</option>
                    </select>
                </div>
            </div>
            @if( $rolUrl == 'N' )
                <div class="row mt-2">
                    <div class="col-sm-12">
                        <div class="col-sm-3 ">
                            <label for="nombreNuevoRol">Nombre Rol:</label>
                            <input type="text" id="nombreNuevoRol" placeholder="Nombre" class="form form-control form-control-sm">
                        </div>
                    </div>
                </div>
            @endif
            <div class="card-body">
                <div class="row">
                    @foreach( $modulos AS $modulo )
                    <div class="col-sm-3 mb-3">
                        <div class="card">
                            <div class="card-header border-bottom"><b>{{$modulo[ 'modulo' ][ 'nombre' ]}}</b></div>
                            <div class="card-body">
                                <ul class="list-group list-group-small list-group-flush">
                                    @foreach( $modulo[ 'secciones' ] AS $seccion )
                                    <li class="list-group-item d-flex px-3">
                                        <div class="custom-control custom-checkbox mb-1">
                                            <input type="checkbox" class="custom-control-input" id="roles_dinamic_assign_{{$seccion[ 'id' ]}}"
                                                @if ( $seccion[ 'privilegio' ] == '1' )
                                                    checked="checked"
                                                @endif >
                                            <label class="custom-control-label" for="roles_dinamic_assign_{{$seccion[ 'id' ]}}">{{$seccion[ 'nombre' ]}}</label>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer">
                <div id="app"><boton-regresar></boton-regresar></div>
                @if ( $rolUrl != '' )
                <button class="btn btn-sm btn-outline-accent float-right ml-1"><i class="material-icons">save</i> Guardar</button>
                @endif
                @if ($rolUrl > '1' && $rolUrl != 'N')
                    <button class="btn btn-sm btn-outline-accent btn-danger float-right ml-1"><i class="material-icons">save</i> Eliminar Rol</button>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    
    $( "#comboListadoRoles" ).change(function(){
        this.value != '' ?
            location.replace( '/ejecutivoRoles/' + this.value ) :
            ''
    });
    
</script>
@endsection

@section( 'seccionFooter' )
    @include( 'crm.ejecutivos.ejecutivosFooter' )
@endSection

