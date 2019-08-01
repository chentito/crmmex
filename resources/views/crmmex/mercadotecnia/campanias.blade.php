<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Detalle Campa&ntilde;a</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="container border-left border-bottom border-right p-1">
      <form id="detalleCampania_Form" name="detalleCampania_Form">
        <div class="row">
            <div class="col-sm-4 mb-1">
                <input type="hidden" id="detalleCampania_id" name="detalleCampania_id" value="">
                <label for="detalleCampania_nombre">Nombre de la campa&ntilde;a:</label>
                <input id="detalleCampania_nombre" name="detalleCampania_nombre" type="text" placeholder="Nombre de campaña" class="form-control form-control-sm" value="">
            </div>
            <div class="col-sm-4 mb-1">
                <label for="detalleCampania_fechaEnvio">Fecha de env&iacute;o:</label>
                <input id="detalleCampania_fechaEnvio" name="detalleCampania_fechaEnvio" type="text" placeholder="Fecha de Envío" class="form-control form-control-sm" value="" readonly>
            </div>
            <div class="col-sm-2 mb-1">
              <label for="detalleCampania_horaEnvio">Hora:</label>
              <select class="custom-select custom-select-sm" id="detalleCampania_horaEnvio" name="detalleCampania_horaEnvio">
                @for ($i = 0; $i <= 23; $i++)
                    <option value="@if(strlen($i)===1) {{ '0'.$i }} @else {{$i}} @endif">@if(strlen($i)===1) {{ '0'.$i }} @else {{$i}} @endif</option>
                @endfor
              </select>
            </div>
            <div class="col-sm-2 mb-1">
              <label for="detalleCampania_minutoEnvio">Minuto:</label>
              <select class="custom-select custom-select-sm" id="detalleCampania_minutoEnvio" name="detalleCampania_minutoEnvio">
                @for ($i = 0; $i <= 59; $i++)
                    <option value="@if(strlen($i)===1) {{ '0'.$i }} @else {{$i}} @endif">@if(strlen($i)===1) {{ '0'.$i }} @else {{$i}} @endif</option>
                @endfor
              </select>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-4 mb-1">
              <label for="detalleCampania_asunto">Asunto:</label>
              <input id="detalleCampania_asunto" name="detalleCampania_asunto" type="text" placeholder="Asunto" class="form-control form-control-sm" value="">
          </div>
          <div class="col-sm-4 mb-1">
                <label for="detalleCampania_destinatarios">Destinatarios:</label>
                <select id="detalleCampania_destinatarios" name="detalleCampania_destinatarios" class="custom-select custom-select-sm">
                </select>
            </div>
            <div class="col-sm-4 mb-1">
                <label for="detalleCampania_templates">Piezas de correo:</label>
                <select id="detalleCampania_templates" name="detalleCampania_templates" class="custom-select custom-select-sm">
                </select>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="row pt-2">
  <div class="col-sm-12 mb-2 text-center">
    <button onclick="contenidos( 'mercadotecnia_listado' )" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-undo"></i> Regresar</button>
    <button id="btnGuardaCampania" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-undo"></i> Guardar</button>
  </div>
</div>

<script>

    $( '#detalleCampania_fechaEnvio' ).datepicker({
        format: "yyyy-mm-dd",
        language: "es",
        todayBtn: "linked",
        clearBtn: true,
        startDate: "today",
        daysOfWeekDisabled: "0,6",
        daysOfWeekHighlighted: "0,6"
    });

    $( '#btnGuardaCampania' ).click( function() {

        var datos  = $( '#detalleCampania_Form' ).serialize();
        var token  = sessionStorage.getItem( 'apiToken' );

        if( document.getElementById( 'detalleCampania_id' ).value != '' ) {
            // Edita registro
            var url = '/api/actualizaCampania';
            var msj = 'actualizado';
          } else {
            // Nuevo registro
            var url = '/api/guardaCampania';
            var msj = 'agregado';
        }

        var config = {
          headers: {
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + token
          }
        };

        if( document.getElementById( 'detalleCampania_fechaEnvio' ).value == '' ) {
            aviso( "No ha proporcionado una fecha de envío para la campaña" , false );
        } else if( document.getElementById( 'detalleCampania_nombre' ).value == '' ) {
            aviso( "No ha proporcionado un nombre para la campaña" , false );
        } else if( document.getElementById( 'detalleCampania_asunto' ).value == '' ) {
            aviso( "No ha proporcionado un asunto para el correo electrónico de la campaña" , false );
        } else {
            axios.post( url , datos , config )
                 .then( response => {
                    aviso( 'La campaña se ha '+msj+' correctamente' );
                    contenidos( 'mercadotecnia_listado' );
                 })
                 .catch( err => {
                   console.log( err );
                 });
       }
   });

    axios.get( '/api/listadoListas' , { headers: { 'Accept': 'application/json', 'Authorization': 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
         .then( response => {
            response.data.forEach( function( e , i ){
                document.getElementById( 'detalleCampania_destinatarios' ).add( new Option( e.nombre , e.id, false, false ) );
            });
         })
         .catch( err => {
           console.log( err );
         });

    axios.get( '/api/listadoPiezasDisponibles' , { headers: { 'Accept': 'application/json', 'Authorization': 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
         .then( response => {
            response.data.forEach( function( e , i ){
                document.getElementById( 'detalleCampania_templates' ).add( new Option( e.nombrePieza , e.id, false, false ) );
            });
         })
         .catch( err => {
           console.log( err );
         });

</script>
