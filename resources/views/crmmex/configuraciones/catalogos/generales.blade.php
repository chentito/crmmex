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
      <div class="row" id="contenedorCatalogosSistema">

          <div class="col-sm-3">
            <div class="card">
              <div class="card-header">
                Medio de contacto
              </div>
              <div class="card-body">
                <select multiple class="custom-select custom-select-sm">
                    <option value="1">Opción 1</option>
                    <option value="1">Opción 1</option>
                    <option value="1">Opción 1</option>
                </select>
              </div>
              <div class="card-footer text-center">
                <button class="btn btn-sm btn-info">+</button>
                <button class="btn btn-sm btn-danger">-</button>
              </div>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>

<script>
    //cargaCatalogosAdmin();
    //configuracionesGenerales();

    axios.get( '/api/catalogos' , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
         .then( response => {
            var html = '';

            response.data.forEach( function( e , v ){
                    html += '<div class="col-sm-3"><div class="card"><div class="card-header">';
                    html += e.nombre;
                    html += '</div><div class="card-body">';
                    html += '<select multiple class="custom-select custom-select-sm">';
                    e.opciones.forEach( function( el , vl ){
                        html += '<option value="1">'+el+'</option>';
                    });
                    html += '</select>';
                    html += '</div><div class="card-footer text-center"><button class="btn btn-sm btn-info">+</button><button class="btn btn-sm btn-danger">-</button></div></div></div>';
            });

            document.getElementById( 'contenedorCatalogosSistema' ).innerHTML = document.getElementById( 'contenedorCatalogosSistema' ).value + html;
         })
         .catch( err => {
           console.log( err );
         });


</script>
