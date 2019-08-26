
<div class="row">

  <div class="col-sm-12 mt-1">
    <div class="card">
      <div class="card-header">
        Accesos rápidos
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3">
            <div class="list-group">
              <a href="javascript:void(0)" onclick="contenidos('prospectos_nuevo')" class="list-group-item list-group-item-action py-1"><i class="fa fa-sm fa-user-plus"></i> Alta Prospecto </a>
              <a href="javascript:void(0)" onclick="contenidos('prospectos_listado')" class="list-group-item list-group-item-action py-1"><i class="fa fa-sm fa-users"></i> Prospectos </a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="list-group">
              <a href="javascript:void(0)" onclick="contenidos('clientes_alta')" class="list-group-item list-group-item-action py-1"><i class="fa fa-sm fa-user-check"></i> Alta Cliente </a>
              <a href="javascript:void(0)" onclick="contenidos('clientes_listado')" class="list-group-item list-group-item-action py-1"><i class="fa fa-sm fa-user-friends"></i> Clientes </a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="list-group">
              <a href="javascript:void(0)" onclick="contenidos('mercadotecnia_campanias')" class="list-group-item list-group-item-action py-1"><i class="fa fa-sm fa-envelope"></i> Agregar campaña </a>
              <a href="javascript:void(0)" onclick="contenidos('mercadotecnia_listado')" class="list-group-item list-group-item-action py-1"><i class="fa fa-sm envelope-open-text"></i> Listado de campañas </a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="list-group">
              <a href="javascript:void(0)" onclick="contenidos('ejecutivos_listado')" class="list-group-item list-group-item-action py-1"><i class="fa fa-sm fa-user-tie"></i> Usuarios </a>
              <a href="javascript:void(0)" onclick="contenidos('ejecutivos_roles')" class="list-group-item list-group-item-action py-1"><i class="fa fa-sm fa-cogs"></i> Perfiles </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 mt-3" id="contWidget_1" style="display: none" draggable="true">
    <div class="card card-sm">
      <div class="card-header">Reporte de Ventas</div>
        <div class="card-body">
          <div id="container" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
          <script type="text/javascript">
            axios.get( '/api/datosWidget/1' , { headers: { 'Accept' : 'application\json' , 'Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' ) } } )
              .then( response => {
                var datos = response.data;
                Highcharts.chart( 'container' , {
                  chart: { type: 'column' },
                  title: { text: 'Objetivo vs Cumplimiento' },
                  xAxis: { categories: datos[ 'categorias' ], crosshair: true },
                  yAxis: { min: 0, title: { text: 'Ventas' } },
                  tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">$ {series.name}: </td>' + '<td style="padding:0"><b>$ {point.y:.1f} </b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                  },
                  plotOptions: {
                    column: {
                      pointPadding: 0.2,
                      borderWidth: 0
                    }
                  },
                  credits: {
                    enabled: false
                  },
                  series: [{
                    name: 'Objetivo',
                    data: datos[ 'objetivos' ]
                  }, {
                    name: 'Cumplimiento',
                    data: datos[ 'cumplimiento' ]
                  }]
              });
            })
            .catch( err => {
              console.log( err );
            });
          </script>
      </div>
    </div>
  </div>

  <div class="col-sm-9 mt-3" id="contWidget_2" style="display: none" draggable="true">
      <div class="card card-sm">
          <div class="card-header">Ventas por Ejecutivo</div>
          <div class="card-body">
              <div id="container2" style="min-width: 310px; height: 250px; margin: 0 auto"></div>
              <script type="text/javascript">
                axios.get( '/api/datosWidget/2' , { headers: { 'Accept' : 'application\json' , 'Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' ) } } )
                  .then( response => {
                   //alert( JSON.stringify( response.data ) );
                   //response.data.periodos.forEach( function( e , i ){ alert( JSON.stringify( e ) ) } );

                  })
                  .catch( err => {
                    console.log( err );
                  });

                Highcharts.chart('container2', {
                  chart: {
                    type: 'area'
                  },
                  title: {
                    text: 'Ventas por ejecutivo'
                  },
                  xAxis: {
                    categories: ['2019-05', '2019-06', '2019-07', '2019-08'],
                    tickmarkPlacement: 'on',
                    title: {
                      enabled: false
                    }
                  },
                  yAxis: {
                    title: {
                      text: 'Miles de pesos'
                    },
                    labels: {
                      formatter: function () {
                        return this.value / 1000;
                      }
                    }
                  },
                  tooltip: {
                    split: true,
                    valueSuffix: ' Pesos'
                  },
                  credits: {
                    enabled: false
                  },
                  plotOptions: {
                    area: {
                      stacking: 'normal',
                      lineColor: '#666666',
                      lineWidth: 1,
                      marker: {
                        lineWidth: 1,
                        lineColor: '#666666'
                      }
                    }
                  },
                  series: [{
                    name: 'Carlos Reyes',
                    data: [502, 635, 809, 947]
                  }, {
                    name: 'Jose Gutierrez',
                    data: [106, 107, 111, 133]
                  }, {
                    name: 'Carlos Lam',
                    data: [163, 203, 276, 408]
                  }]
              });
          		</script>
          </div>
      </div>
  </div>

  <div class="col-sm-3 mt-3" id="contWidget_3" style="display: none" draggable="true">
    <div class="card card-sm">
      <div class="card-header">Propuestas generadas</div>
      <div class="card-body">
        <div id="container3" style="min-width: 200px; height: 250px; margin: 0 auto"></div>
          <script>
            axios.get( '/api/datosWidget/3' , { headers: { 'Accept' : 'application\json' , 'Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' ) } } )
              .then( response => {
                var datos = response.data;
                Highcharts.chart('container3', {
                  chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                  },
                  title: { text: 'Estatus' },
                  tooltip: { pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>' },
                  credits: {
                    enabled: false
                  },
                  plotOptions: {
                    pie: {
                      allowPointSelect: true,
                      cursor: 'pointer',
                      dataLabels: { enabled: false },
                      showInLegend: true
                    }
                  },
                  series: [{
                    name: 'Total ',
                    colorByPoint: true,
                    data: [{
                      name: 'Aceptadas: '+ datos.aceptadas,
                      y: datos.aceptadas,
                      sliced: false,
                      selected: true
                    }, {
                      name: 'Rechazadas:  '+ datos.rechazadas,
                      y: datos.rechazadas
                    }, {
                      name: 'En proceso:  '+ datos.proceso,
                      y: datos.proceso
                    }]
                  }]
                });
              })
              .catch( err => {
                console.log( err );
              });
          </script>
      </div>
    </div>
  </div>

  <div class="col-sm-6 mt-3" id="contWidget_4" style="display: none" draggable="true">
      <div class="card card-sm">
          <div class="card-header">Ventas por producto/servicio</div>
          <div class="card-body">
            <div id="container4" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            <script type="text/javascript">
              Highcharts.chart('container4', {
                  chart: {
                      type: 'pie'
                  },
                  title: {
                      text: 'Productos/Servicios'
                  },
                  plotOptions: {
                      series: {
                          dataLabels: {
                              enabled: true,
                              format: '{point.name}: {point.y:.1f}%'
                          }
                      }
                  },
                  tooltip: {
                      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                  },
                  credits: {
                      enabled: false
                  },
                  series: [
                      {
                          name: "Browsers",
                          colorByPoint: true,
                          data: [
                              {
                                  name: "Facturacion Electronica",
                                  y: 62.74,
                                  drilldown: "Facturacion"
                              },
                              {
                                  name: "Hosting",
                                  y: 10.57,
                                  drilldown: "Hosting"
                              },
                              {
                                  name: "Dominios",
                                  y: 7.23,
                                  drilldown: "Internet Explorer"
                              },
                              {
                                  name: "Servicios",
                                  y: 5.58,
                                  drilldown: "Safari"
                              },
                              {
                                  name: "Consumibles",
                                  y: 4.02,
                                  drilldown: "Edge"
                              }
                          ]
                      }
                  ],
                  drilldown: {
                      series: [
                          {
                              name: "Chrome",
                              id: "Chrome",
                              data: [
                                  [
                                      "v65.0",
                                      0.1
                                  ],
                                  [
                                      "v64.0",
                                      1.3
                                  ],
                                  [
                                      "v63.0",
                                      53.02
                                  ],
                                  [
                                      "v62.0",
                                      1.4
                                  ],
                                  [
                                      "v61.0",
                                      0.88
                                  ],
                                  [
                                      "v60.0",
                                      0.56
                                  ],
                                  [
                                      "v59.0",
                                      0.45
                                  ],
                                  [
                                      "v58.0",
                                      0.49
                                  ],
                                  [
                                      "v57.0",
                                      0.32
                                  ],
                                  [
                                      "v56.0",
                                      0.29
                                  ],
                                  [
                                      "v55.0",
                                      0.79
                                  ],
                                  [
                                      "v54.0",
                                      0.18
                                  ],
                                  [
                                      "v51.0",
                                      0.13
                                  ],
                                  [
                                      "v49.0",
                                      2.16
                                  ],
                                  [
                                      "v48.0",
                                      0.13
                                  ],
                                  [
                                      "v47.0",
                                      0.11
                                  ],
                                  [
                                      "v43.0",
                                      0.17
                                  ],
                                  [
                                      "v29.0",
                                      0.26
                                  ]
                              ]
                          },
                          {
                              name: "Firefox",
                              id: "Firefox",
                              data: [
                                  [
                                      "v58.0",
                                      1.02
                                  ],
                                  [
                                      "v57.0",
                                      7.36
                                  ],
                                  [
                                      "v56.0",
                                      0.35
                                  ],
                                  [
                                      "v55.0",
                                      0.11
                                  ],
                                  [
                                      "v54.0",
                                      0.1
                                  ],
                                  [
                                      "v52.0",
                                      0.95
                                  ],
                                  [
                                      "v51.0",
                                      0.15
                                  ],
                                  [
                                      "v50.0",
                                      0.1
                                  ],
                                  [
                                      "v48.0",
                                      0.31
                                  ],
                                  [
                                      "v47.0",
                                      0.12
                                  ]
                              ]
                          },
                          {
                              name: "Internet Explorer",
                              id: "Internet Explorer",
                              data: [
                                  [
                                      "v11.0",
                                      6.2
                                  ],
                                  [
                                      "v10.0",
                                      0.29
                                  ],
                                  [
                                      "v9.0",
                                      0.27
                                  ],
                                  [
                                      "v8.0",
                                      0.47
                                  ]
                              ]
                          },
                          {
                              name: "Safari",
                              id: "Safari",
                              data: [
                                  [
                                      "v11.0",
                                      3.39
                                  ],
                                  [
                                      "v10.1",
                                      0.96
                                  ],
                                  [
                                      "v10.0",
                                      0.36
                                  ],
                                  [
                                      "v9.1",
                                      0.54
                                  ],
                                  [
                                      "v9.0",
                                      0.13
                                  ],
                                  [
                                      "v5.1",
                                      0.2
                                  ]
                              ]
                          }
                      ]
                  }
                });
        		</script>
          </div>
      </div>
  </div>

  <div class="col-sm-6 mt-3" id="contWidget_5" style="display: none" draggable="true">
      <div class="card card-sm">
          <div class="card-header">Altas</div>
          <div class="card-body">
              <div id="container5" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
              <script type="text/javascript">

                axios.get( '/api/datosWidget/5' , { headers: { 'Accept' : 'application\json' , 'Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' ) } } )
                     .then( response => {
                        var datos = response.data;

                        Highcharts.chart('container5', {
                            chart: { type: 'bar' },
                            title: { text: 'Clientes/Prospectos' },
                            xAxis: {
                                categories: datos.periodos,
                                title: { text: null }
                            },
                            yAxis: {
                                min: 0,
                                title: { text: 'Alta de registros', align: 'high' },
                                labels: { overflow: 'justify' }
                            },
                            tooltip: { valueSuffix: ' ' },
                            plotOptions: {
                                bar: { dataLabels: { enabled: true } }
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'top',
                                x: -40,
                                y: 80,
                                floating: true,
                                borderWidth: 1,
                                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                                shadow: true
                            },
                            credits: {
                                enabled: false
                            },
                            series: [{
                                name: 'Clientes',
                                data: datos.clientes
                            }, {
                                name: 'Prospectos',
                                data: datos.prospectos
                            }]
                        });

                     })
                     .catch( err => {
                        console.log( err );
                     });

          		</script>
          </div>
      </div>
  </div>
</div>

<script>
  axios.get( '/api/listadoEstadoWidgets' , { headers:{ 'Accept' : 'application/json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
       .then( response => {
          response.data.forEach( function( e , i ) {
              if( e.estado == '0' ) {
                    document.getElementById( 'contWidget_' + e.id ).remove();
                  } else {
                    document.getElementById( 'contWidget_' + e.id ).style.display = 'block';
              }
          });
       })
       .catch( err => {
          console.log( err );
       });
</script>
