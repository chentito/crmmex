<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      Datos del pago
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="container border-left border-right border-bottom p-1">
        <div class="row">
          <div class="col-sm-3">
              <label for="altaPago_monto">Monto</label>
              <input type="text" id="altaPago_monto" name="altaPago_monto" placeholder="Monto" class="form-control form-control-sm">
          </div>
          <div class="col-sm-3">
              <label for="altaPago_banco">Banco</label>
              <select id="altaPago_banco" name="altaPago_banco" class="custom-select custom-select-sm">
                  <option value="1">Santander</option>
                  <option value="2">Bancomer</option>
                  <option value="3">Banamex</option>
                  <option value="4">Banco Azteca</option>
                  <option value="5">HSBC</option>
                  <option value="6">Banorte</option>
              </select>
          </div>
          <div class="col-sm-3">
              <label for="altaPago_cuenta">Cuenta</label>
              <select id="altaPago_cuenta" name="altaPago_cuenta" class="custom-select custom-select-sm">
                  <option value="1">Santander</option>
                  <option value="2">Bancomer</option>
                  <option value="3">Banamex</option>
                  <option value="4">Banco Azteca</option>
                  <option value="5">HSBC</option>
                  <option value="6">Banorte</option>
              </select>
          </div>
          <div class="col-sm-3">
              <label for="altaPago_fechaPago">Fecha de pago</label>
              <input type="text" id="altaPago_fechaPago" name="altaPago_fechaPago" placeholder="Fecha de pago" class="form-control form-control-sm">
          </div>
          <div class="col-sm-12 mt-2 mb-2 text-center">
            <button class="btn btn-sm {{$btn}}" id="btnGuardaPago">Guardar Pago</button>
          </div>
        </div>
      </div>
  </div>
</div>

<script>
    document.getElementById( 'btnGuardaPago' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        contenidos( 'ventas_facturas' );
    });
</script>
