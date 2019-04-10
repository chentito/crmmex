
<input type="hidden" id="idCargaInfo" name='idCargaInfo' value="{{$param}}" />

@include( 'crmmex.prospectos.nuevo' )

<script>
    idContenido = document.getElementById( 'idCargaInfo' ).value;
    document.getElementById( 'expediente_id' ).value = idContenido;
    path  = '/api/obtieneExpediente/' + idContenido;
    axios( path )
        .then( datos => {
            // Direccion
            d = datos.data;
            direccion = d[ 'direccion' ];
            document.getElementById( 'direccion_calle' ).value       = direccion[ 'calle' ];
            document.getElementById( 'direccion_no_exterior' ).value = direccion[ 'noExterior' ];
            document.getElementById( 'direccion_no_interior' ).value = direccion[ 'noInterior' ];
            document.getElementById( 'direccion_colonia' ).value     = direccion[ 'colonia' ];
            document.getElementById( 'direccion_cp' ).value          = direccion[ 'cp' ];
            document.getElementById( 'direccion_delegacion' ).value  = direccion[ 'delegacion' ];
            document.getElementById( 'direccion_ciudad' ).value      = direccion[ 'ciudad' ];
            document.getElementById( 'direccion_estado' ).value      = direccion[ 'estado' ];
            document.getElementById( 'direccion_pais' ).value        = direccion[ 'pais' ];
            // Cliente
            cliente = d[ 'cliente' ];
            document.getElementById( 'cliente_razon_social' ).value = cliente[ 'razonSocial' ];
            document.getElementById( 'cliente_rfc' ).value          = cliente[ 'rfc' ];
            document.getElementById( 'catalogo_5' ).value           = cliente[ 'giro' ];
            document.getElementById( 'catalogo_1' ).value           = cliente[ 'categoria' ];
            document.getElementById( 'catalogo_2' ).value           = cliente[ 'subcategoria' ];
            // Contactos
            contactos = d[ 'contactos' ];
            $.each( contactos , function( a , b ){
                document.getElementById( 'contacto_nombre' ).value           = b.nombre;
                document.getElementById( 'contacto_paterno' ).value          = b.apellidoPaterno;
                document.getElementById( 'contacto_materno' ).value          = b.apellidoMaterno;
                document.getElementById( 'contacto_email' ).value            = b.correoElectronico;
                document.getElementById( 'contacto_celular' ).value          = b.celular;
                document.getElementById( 'contacto_celular_compania' ).value = b.compania;
                document.getElementById( 'contacto_telefono' ).value         = b.telefono;
                document.getElementById( 'contacto_extension' ).value        = b.extension;
                document.getElementById( 'contacto_area' ).value             = b.area;
                document.getElementById( 'contacto_puesto' ).value           = b.puesto;
            });
    
        })
        .catch( err => {
            console.error( err );
        });
    
</script>