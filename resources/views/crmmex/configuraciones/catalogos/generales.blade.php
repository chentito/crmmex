<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-list fa-sm"></i><span class="d-none d-sm-inline">  Catálogos Generales</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="container border-left border-bottom border-right p-1">
      <div class="row">
        <div class="col-sm-3">Catalogo</div>
        <div class="col-sm-3">Opciones</div>
        <div class="col-sm-6"></div>
        <div class="col-sm-3">
          <select class="custom-select custom-select-sm" id="confGenerales_listadoCatalogos" name="confGenerales_listadoCatalogos" multiple style="height:280px"></select>
        </div>
        <div class="col-sm-3">
          <select class="custom-select custom-select-sm" id="confGenerales_listadoOpciones" name="confGenerales_listadoOpciones" multiple style="height:280px"></select>
        </div>
        <div class="col-sm-6">

            <div class="row">
                <div class="col-sm-8">
                  <label for="confGenerales_opcionCatalogoNombre">Editar opción:</label>
                  <input type="text" id="confGenerales_opcionCatalogoNombreEdita" nam="confGenerales_opcionCatalogoNombreEdita" class="form-control form-control-sm" placeholder="Opción editada">
                  <input type="hidden" id="confGenerales_opcionCatalogoNombreEditaID" name="confGenerales_opcionCatalogoNombreEditaID" value="">
                </div>
                <div class="col-sm-4 text-center">
                    <label for="btnConfGrales_editarOpcion">&nbsp;</label>
                    <button type="button" class="btn btn-sm {{$btn}}" id="btnConfGrales_editarOpcion" name="btnConfGrales_editarOpcion"><i class="fa fa-edit fa-sm"></i>  Editar</button>
                </div>
                <div class="col-sm-12"><hr></div>
                <div class="col-sm-8">
                  <label for="confGenerales_opcionCatalogoNombre">Agregar opción:</label>
                  <input type="text" id="confGenerales_opcionCatalogoNombre" nam="confGenerales_opcionCatalogoNombre" class="form-control form-control-sm" placeholder="Nombre de la nueva opción">
                </div>
                <div class="col-sm-4 text-center">
                    <label for="btnConfGrales_agregaOpcion">&nbsp;</label>
                    <button type="button" class="btn btn-sm {{$btn}}" id="btnConfGrales_agregaOpcion" name="btnConfGrales_agregaOpcion"><i class="fa fa-plus fa-sm"></i>  Agregar</button>
                </div>
                <div class="col-sm-12"><hr></div>
                <div class="col-sm-8">
                  <label for="confGenerales_opcionCatalogoNombre">Eliminar opción:</label>
                  <input type="text" id="confGenerales_opcionCatalogoNombreElimina" name="confGenerales_opcionCatalogoNombreElimina" class="form-control form-control-sm" readonly>
                  <input type="hidden" id="confGenerales_opcionCatalogoNombreEliminaID" name="confGenerales_opcionCatalogoNombreEliminaID" >
                </div>
                <div class="col-sm-4 text-center">
                    <label for="btnConfGrales_eliminaOpcion">&nbsp;</label>
                    <button type="button" class="btn btn-sm {{$btn}}" id="btnConfGrales_eliminaOpcion" name="btnConfGrales_eliminaOpcion"><i class="fa fa-trash fa-sm"></i>  Eliminar</button>
                </div>
            </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script>

    // Actualizacion
    document.getElementById( 'btnConfGrales_editarOpcion' ).addEventListener( 'click' , function( e ){
        if( document.getElementById( 'confGenerales_listadoCatalogos' ).value == '' ) {
            aviso( 'No ha seleccionado un catalogo' , false );
        } else if( document.getElementById( 'confGenerales_listadoOpciones' ).value == ''  ) {
            aviso( 'No ha seleccionado una opción' , false );
        } else if( document.getElementById( 'confGenerales_opcionCatalogoNombreEdita' ).value == '' ) {
            aviso( 'No ha proporcionado el nombre de la opción' , false );
        } else {
            actualizaOpcion( document.getElementById( 'confGenerales_opcionCatalogoNombreEditaID' ).value , document.getElementById( 'confGenerales_opcionCatalogoNombreEdita' ).value );
            document.getElementById( 'confGenerales_opcionCatalogoNombreEditaID' ).value = '';
            document.getElementById( 'confGenerales_opcionCatalogoNombreEdita' ).value = '';
        }
    });

    // Alta
    document.getElementById( 'btnConfGrales_agregaOpcion' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        if( document.getElementById( 'confGenerales_listadoCatalogos' ).value == '' ) {
            aviso( 'No ha seleccionado un catalogo' , false );
        } else if( document.getElementById( 'confGenerales_opcionCatalogoNombre' ).value == '' ) {
            aviso( 'No ha proporcionado el nombre de la opción' , false );
        } else {
            agregaOpcion( document.getElementById( 'confGenerales_listadoCatalogos' ).value , document.getElementById( 'confGenerales_opcionCatalogoNombre' ).value );
            document.getElementById( 'confGenerales_opcionCatalogoNombre' ).value = '';
        }
    });

    // Eliminacion
    document.getElementById( 'btnConfGrales_eliminaOpcion' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        if( document.getElementById( 'confGenerales_listadoCatalogos' ).value == '' ) {
            aviso( 'No ha seleccionado un catalogo' , false );
        } else if( document.getElementById( 'confGenerales_listadoOpciones' ).value == ''  ) {
            aviso( 'No ha seleccionado una opción' , false );
        } else {
            eliminaOpcion( document.getElementById( 'confGenerales_listadoOpciones' ).value );
        }
    });

    // Eventos
    document.getElementById( 'confGenerales_listadoOpciones' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        var sel = document.getElementById( 'confGenerales_listadoOpciones' );
        var text= sel.options[sel.selectedIndex].text;
        document.getElementById( 'confGenerales_opcionCatalogoNombreEdita' ).value   = text;
        document.getElementById( 'confGenerales_opcionCatalogoNombreEditaID' ).value = this.value;

        document.getElementById( 'confGenerales_opcionCatalogoNombreElimina' ).value   = text;
        document.getElementById( 'confGenerales_opcionCatalogoNombreEliminaID' ).value = this.value;
    });

    document.getElementById( 'confGenerales_listadoCatalogos' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        catalogoOpciones( this.value );
        limpiaForms();
    });

    document.getElementById( 'confGenerales_listadoCatalogos' ).addEventListener( 'change' , function( e ){
        e.preventDefault();
        catalogoOpciones( this.value );
        limpiaForms();
    });

    function limpiaForms() {
        document.getElementById( 'confGenerales_opcionCatalogoNombreEdita' ).value = '';
        document.getElementById( 'confGenerales_opcionCatalogoNombreEditaID' ).value = '';
        document.getElementById( 'confGenerales_opcionCatalogoNombre' ).value = '';
        document.getElementById( 'confGenerales_opcionCatalogoNombreElimina' ).value = '';
        document.getElementById( 'confGenerales_opcionCatalogoNombreEliminaID' ).value = '';
    }

    function catalogoOpciones( catalogoID ) {
        axios.get( '/api/opcionesCombosPorId/' + catalogoID )
             .then( response => {
               document.getElementById( 'confGenerales_listadoOpciones' ).innerHTML = '';
                response.data.forEach( function( item , i ){
                    document.getElementById( 'confGenerales_listadoOpciones' ).add( new Option( item.nombre , item.id , false , false ) );
                });
             })
             .catch( err => {
               console.log( err );
             });
    }

    function actualizaOpcion( id , texto ) {
        axios.post( '/api/actualizaOptCat/'+id+'/'+texto , {} , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
             .then( response => {
                aviso( 'Se ha actulizado la opción correctamente' );
                catalogoOpciones( document.getElementById( 'confGenerales_listadoCatalogos' ).value );
             })
             .catch( err => {
                console.log( err );
             });
    }

    function agregaOpcion( catalogoID , texto ) {
      axios.post( '/api/agregaOptCat/'+catalogoID+'/'+texto , {} , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
           .then( response => {
              aviso( 'Se ha agregado la opción correctamente' );
              catalogoOpciones( document.getElementById( 'confGenerales_listadoCatalogos' ).value );
           })
           .catch( err => {
              console.log( err );
           });
    }

    function eliminaOpcion( optID ) {
      axios.post( '/api/eliminaOptCat/' + optID , {} , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
           .then( response => {
             aviso( 'Se ha eliminado la opción correctamente' );
             catalogoOpciones( document.getElementById( 'confGenerales_listadoCatalogos' ).value );
           })
           .catch( err => {
             console.log( err );
           });
    }

    axios.get( '/api/catalogos' , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
         .then( response => {
            response.data.forEach( function( item , v ){
                document.getElementById( 'confGenerales_listadoCatalogos' ).add( new Option( item.nombre , item.id , false , false ) );
            });
         })
         .catch( err => {
           console.log( err );
         });

</script>
