
@extends( 'principales.prospectos' )

@section( 'individual' )

<div class="container mt-2 pt-2">
    
    <table id="example" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Tel&eacute;fono</th>
                <th>Area</th>
                <th>Puesto</th>
                <th>M&aacute;s</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Tel&eacute;fono</th>
                <th>Area</th>
                <th>Puesto</th>
                <th>M&aacute;s</th>
            </tr>
        </tfoot>
    </table>
</div>

<div class="row pt-2">
    <div class="col-sm-6" align="center">
        <button class="btn btn-sm btn-info" id="btnRegresar">Regresar al listado</button>
    </div>
    <div class="col-sm-6" align="center">
        <button class="btn btn-sm btn-info" id="btnAgregarContacto">Agregar Contacto</button>
    </div>
</div>

<script>
    $(document).ready( function() {
        
        $( '#btnRegresar' ).click( function(){
            history.back();
        });
        
        $( '#btnAgregarContacto' ).click( function(){
            location.replace( '/prospectos/altaContacto/{{$id}}' );
        });
        
        $('#example').DataTable({
            ajax   :{
                url: '/api/listadoContactos',
                dataSrc: 'contactos'
            },
            columns: [
                { data: 'nombre' },
                { data: 'correo' },
                { data: 'telefono' },
                { data: 'area' },
                { data: 'puesto' },
                { data: 'opts' }
            ],
            select: {
                items: 'rows',
                info: false
            }
        });
    });
</script>

@endsection
