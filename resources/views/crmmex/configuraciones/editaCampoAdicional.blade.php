
<h5>Edita Campo Adicional</h5>

<input type="hidden" id="campoAdicionalID" name="campoAdicionalID" value="{{$param}}">

@include( 'crmmex.configuraciones.camposAdicionales' )

<script>
  buscaDatosCampoAdicional();
  function buscaDatosCampoAdicional() {
      var campoAdicionalID = document.getElementById( 'campoAdicionalID' ).value
      document.getElementById( 'adicional_clientes_id' ).value = campoAdicionalID;
      var url = '/api/datosCampoAdicional/' + campoAdicionalID;

      axios.get( url )
           .then( response => {
                datos = response.data;
                document.getElementById( 'adicional_clientes_seccion' ).value    = datos.seccion;
                document.getElementById( 'adicional_clientes_nombre' ).value     = datos.nombre;
                document.getElementById( 'adicional_clientes_tipoDato' ).value   = datos.tipo;
                document.getElementById( 'adicional_clientes_valores' ).value    = datos.valores;
                document.getElementById( 'adicional_clientes_validacion' ).value = datos.expresion;
                if( datos.obligatoriedad == '1' ) {
                    document.getElementById( 'adicional_clientes_obligatorio' ).checked = true;
                  } else {
                    document.getElementById( 'adicional_clientes_opcional' ).checked    = true;
                }

                document.getElementById( 'idSeccionConsultar' ).value = datos.seccion;
                nombreSeccion();
                generaDataGrid( 'listadoCamposAdicionales' , datos.seccion );

           }).catch( err => {console.log( err );});
  }
</script>
