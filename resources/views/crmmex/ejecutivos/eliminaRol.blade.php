
<input type="hidden" id="perfilID" name="perfilID" value="{{$param}}">

<div class="row">
  <div class="col-sm-12 text-center pb-2">
    Desea eliminar el perfil seleccionado?
  </div>
  <div class="col-sm-12 text-center">
      <button type="button" name="btnEliminaRol_regresar" id="btnEliminaRol_regresar" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-undo"></i> Regresar</button>
      <button type="button" name="btnEliminaRol_elimina" id="btnEliminaRol_elimina" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-trash"></i> Eliminar</button>
  </div>
</div>

<script>

    document.getElementById( 'btnEliminaRol_regresar' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        contenidos( 'ejecutivos_roles' );
    });

    document.getElementById( 'btnEliminaRol_elimina' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        contenidos( 'ejecutivos_roles' );
        var perfilID = document.getElementById( 'perfilID' ).value;
        axios.post( '/api/eliminaPerfil/' + perfilID , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
             .then( response => {
                  contenidos( 'ejecutivos_roles' );
                  aviso( 'Perfil eliminado correctamente' );
             })
             .catch( err => {
                  console.log( err );
             });
    });

</script>
