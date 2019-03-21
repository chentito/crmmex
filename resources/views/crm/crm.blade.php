@extends( 'crm.layout.principal' )

@section( 'seccionHeader' ) 
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Dashboard</span>
        <h3 class="page-title">Estad&iacute;sticas</h3>
      </div>
    </div>
@endsection

@section( 'seccionContenido' )
    <div class="row">
        <div class="col-lg col-md-6 col-sm-6 mb-4">
          <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
              <div class="d-flex flex-column m-auto">
                <div class="stats-small__data text-center">
                  <span class="stats-small__label text-uppercase">Ventas</span>
                  <h6 class="stats-small__value count my-3">$ 79,650.00</h6>
                </div>
                <div class="stats-small__data">
                  <span class="stats-small__percentage stats-small__percentage--increase">4.7%</span>
                </div>
              </div>
              <canvas height="120" class="blog-overview-stats-small-1"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg col-md-6 col-sm-6 mb-4">
          <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
              <div class="d-flex flex-column m-auto">
                <div class="stats-small__data text-center">
                  <span class="stats-small__label text-uppercase">Propuestas enviadas</span>
                  <h6 class="stats-small__value count my-3">25</h6>
                </div>
                <div class="stats-small__data">
                  <span class="stats-small__percentage stats-small__percentage--increase">12.4%</span>
                </div>
              </div>
              <canvas height="120" class="blog-overview-stats-small-2"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg col-md-4 col-sm-6 mb-4">
          <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
              <div class="d-flex flex-column m-auto">
                <div class="stats-small__data text-center">
                  <span class="stats-small__label text-uppercase">Seguimientos</span>
                  <h6 class="stats-small__value count my-3">16</h6>
                </div>
                <div class="stats-small__data">
                  <span class="stats-small__percentage stats-small__percentage--decrease">3.8%</span>
                </div>
              </div>
              <canvas height="120" class="blog-overview-stats-small-3"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg col-md-4 col-sm-6 mb-4">
          <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
              <div class="d-flex flex-column m-auto">
                <div class="stats-small__data text-center">
                  <span class="stats-small__label text-uppercase">Prospectos</span>
                  <h6 class="stats-small__value count my-3">23</h6>
                </div>
                <div class="stats-small__data">
                  <span class="stats-small__percentage stats-small__percentage--increase">12.4%</span>
                </div>
              </div>
              <canvas height="120" class="blog-overview-stats-small-4"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg col-md-4 col-sm-12 mb-4">
          <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
              <div class="d-flex flex-column m-auto">
                <div class="stats-small__data text-center">
                  <span class="stats-small__label text-uppercase">Clientes</span>
                  <h6 class="stats-small__value count my-3">5,950</h6>
                </div>
                <div class="stats-small__data">
                  <span class="stats-small__percentage stats-small__percentage--decrease">2.4%</span>
                </div>
              </div>
              <canvas height="120" class="blog-overview-stats-small-5"></canvas>
            </div>
          </div>
        </div>
      </div>
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 mb-4">
                <div class="card card-small">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Ventas</h6>
                  </div>
                  <div class="card-body pt-0">
                    <div class="row border-bottom py-2 bg-light">
                      <div class="col-12 col-sm-6">
                        <div id="blog-overview-date-range" class="input-daterange input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
                          <input type="text" class="input-sm form-control" name="start" placeholder="Fecha Inicial" id="blog-overview-date-range-1">
                          <input type="text" class="input-sm form-control" name="end" placeholder="Fecha Final" id="blog-overview-date-range-2">
                          <span class="input-group-append">
                            <span class="input-group-text">
                              <i class="material-icons"></i>
                            </span>
                          </span>
                        </div>
                      </div>
                    </div>
                    <canvas height="130" style="max-width: 100% !important;" class="blog-overview-users"></canvas>
                  </div>
                </div>
              </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card card-small h-100">
          <div class="card-header border-bottom">
            <h6 class="m-0">Usuarios por dispositivo</h6>
          </div>
          <div class="card-body d-flex py-0">
            <canvas height="220" class="blog-users-by-device m-auto"></canvas>
          </div>
          <div class="card-footer border-top">
            <div class="row">
              <div class="col">
                <select class="custom-select custom-select-sm" style="max-width: 130px;">
                  <option selected>Ultima semana</option>
                  <option value="1">Hoy</option>
                  <option value="2">Mes anterior</option>
                  <option value="3">Año completo</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection