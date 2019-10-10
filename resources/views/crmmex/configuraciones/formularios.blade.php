<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-align-justify fa-sm"></i><span class="d-none d-sm-inline">  Formularios Disponibles</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
      <i class="fa fa-align-justify fa-sm"></i><span class="d-none d-sm-inline">  Agregar formulario</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="{{$container}} border-left border-right border-bottom">
        <div id="listadoFormularios_config"></div>
        <table id="listadoFormularios" class="table table-striped responsive nowrap" style="width:100%"></table>
    </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="{{$container}} border-left border-right border-bottom">
      <form id="formularios_form" name="formularios_form">
        <div class="row mt-2">
            <div class="col-sm-4">
                <label for="">Nombre formulario:</label>
                <input type="text" name="formularios_nombreForm" id="formularios_nombreForm" value="" class="form-control form-control-sm" placeholder="Nombre del formulario">
                <input type="hidden" name="formularios_idForm" id="formularios_idForm" value="0">
            </div>
            <div class="col-sm-6"></div>
            <div class="col-sm-2">
              <button type="button" name="formularios_AgregarCampo" id="formularios_AgregarCampo" class="btn btn-sm {{$btn}}"><i class="fa fa-plus fa-sm"></i> Agregar otro campo</button>
            </div>
        </div>
        <div class="row" id="contenedorCamporFormulario">
            <div class="col-sm-12 mt-1">
              <div class="row">
                <div class="col-sm-2">
                  <label for="formularios_nombreCampo">Nombre del campo:</label>
                  <input type="text" name="formularios_nombreCampo[]" id="formularios_nombreCampo" value="" class="form-control form-control-sm formularios_nombreCampo_dinamico" placeholder="Nombre del campo" maxlength="50">
                  <input type="hidden" name="formularios_campoID[]" id="formularios_campoID" value="0">
                </div>
                <div class="col-sm-2">
                  <label for="formularios_tipoCampo">Tipo:</label>
                  <select class="custom-select custom-select-sm formularios_tipoCampo_dinamico" name="formularios_tipoCampo[]" id="formularios_tipoCampo">
                      <option value="1">Texto libre</option>
                      <option value="2">Listado</option>
                      <option value="3">Multiples opciones</option>
                  </select>
                </div>
                <div class="col-sm-2">
                  <label for="formularios_oblCampo">Obligatoriedad:</label>
                  <select class="custom-select custom-select-sm formularios_oblCampo_dinamico" name="formularios_oblCampo[]" id="formularios_oblCampo">
                    <option value="1">Opcional</option>
                    <option value="2">Obligatorio</option>
                  </select>
                </div>
                <div class="col-sm-2">
                  <label for="formularios_oblCampo">Validación:</label>
                  <select class="custom-select custom-select-sm formularios_valCampo_dinamico" name="formularios_valCampo[]" id="formularios_valCampo">
                    <option value="0">Ninguna</option>
                    <option value="1">Correo</option>
                    <option value="2">Número telefónico</option>
                    <option value="3">RFC</option>
                  </select>
                </div>
                <div class="col-sm-3 text-center">
                  <label for="formularios_valoresCampo">Valores</label>
                  <input type="text" placeholder="Valores" name="formularios_valoresCampo[]" id="formularios_valoresCampo" class="form-control form-control-sm formularios_valoresCampo_dinamico" value="">
                </div>
                <div class="col-sm-1 text-center"></div>
              </div>
            </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-sm-12 text-center">
            <button class="btn btn-sm {{$btn}}" id="formulario_btnGuardaCamposForm" name="formulario_btnGuardaCamposForm"><i class="fa fa-save fa-sm"></i> Guardar</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>

<script>
  generaDataGrid( 'listadoFormularios' );

  document.getElementById( 'formularios_AgregarCampo' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    axios.get( '/api/formsNuevoCampo' , { headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' ) } } )
     .then( response => {
       $( '#contenedorCamporFormulario' ).append( response.data.contenido );
     })
     .catch( err => {
       console.log( err );
     });
  });

  document.getElementById( 'formulario_btnGuardaCamposForm' ).addEventListener( 'click' , function( e ) {
    e.preventDefault();
    var datos      = new FormData( document.getElementById( 'formularios_form' ) );
    var nombres    = document.getElementsByClassName( 'formularios_nombreCampo_dinamico' );
    var valores    = document.getElementsByClassName( 'formularios_valoresCampo_dinamico' );
    var validacion = document.getElementsByClassName( 'formularios_valCampo_dinamico' );
    var tipos      = document.getElementsByClassName( 'formularios_tipoCampo_dinamico' );
    var oblig      = document.getElementsByClassName( 'formularios_oblCampo_dinamico' );

    if( document.getElementById( 'formularios_nombreForm' ).value == '' ) {
      aviso( 'No ha proporcionado el nombre del formulario' , false );
      document.getElementById( 'formularios_nombreForm' ).focus();
    } else {
      var err = 0;
      for( var n = 0 ; n < nombres.length ; n ++ ) {
        if( nombres[ n ].value == '' ) {
          aviso( 'El nombre del campo no puede ser vacio' , false );
          nombres[ n ].value.focus();
          err ++;
        }
      }

    for( var n2 = 0 ; n2 < valores.length ; n2 ++ ) {
      if( valores[ n2 ].value == "" && ( tipos[ n2 ].value == '2' || tipos[ n2 ].value == '3' ) ) {
        aviso( 'El valor del campo no puede ser vacio si es un listado o multiples opciones' , false );
        err ++;
      }
    }

    if( err == 0 ) {
      if( document.getElementById( 'formularioID' ) != null ) { //edita
        var url = '/api/actualizaFormulario';
        var mov = 'actualizado';
      } else { //agrega
        var url = '/api/guardaFormulario';
        var mov = 'agregado';
      }

      axios.post( url , datos , { headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' ) } } )
        .then( response => {
          aviso( 'Formulario ' + mov + ' correctamente' );
          contenidos( 'configuraciones_formularios' );
        })
        .catch( err => {
          console.log( err );
        });
      }

    }
  });

</script>
