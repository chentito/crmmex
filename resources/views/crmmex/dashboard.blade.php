
<div class="row">

  <div class="col-sm-12 mt-3">
    <div class="card card-sm">
        <div class="card-header">Reporte de Ventas</div>
        <div class="card-body">
            <div id="container" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
            <script type="text/javascript">
              Highcharts.chart('container', {
                  chart: {
                      type: 'column'
                  },
                  title: {
                      text: 'Ventas VS Cumplimiento'
                  },
                  xAxis: {
                      categories: [
                          'Jul 2018',
                          'Ago 2018',
                          'Sep 2018',
                          'Oct 2019',
                          'Nov 2018',
                          'Dic 2018',
                          'Ene 2019',
                          'Feb 2019',
                          'Mar 2019',
                          'Abr 2019',
                          'May 2019',
                          'Jun 2019'
                      ],
                      crosshair: true
                  },
                  yAxis: {
                      min: 0,
                      title: {
                          text: 'Ventas'
                      }
                  },
                  tooltip: {
                      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                      pointFormat: '<tr><td style="color:{series.color};padding:0">$ {series.name}: </td>' +
                          '<td style="padding:0"><b>$ {point.y:.1f} </b></td></tr>',
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
                  series: [{
                      name: 'Objetivo',
                      data: [350000.00, 300000.00, 380000.0, 440000.00, 420000.00, 400000.00, 380500.00, 420000.00, 420000.00, 390000.00, 420000.00, 405000.00]

                  }, {
                      name: 'Cumplimiento',
                      data: [322490.31, 316782.80, 345790.56, 380905.56, 395005.36,318690.56, 395000.00, 442085.65, 418680.45, 399596.00, 380675.56, 195078.77]

                  }]
              });
            </script>
        </div>
    </div>
  </div>

  <div class="col-sm-9 mt-3">
      <div class="card card-sm">
          <div class="card-header">Ventas por Ejecutivo</div>
          <div class="card-body">
              <div id="container2" style="min-width: 310px; height: 250px; margin: 0 auto"></div>
              <script type="text/javascript">
                Highcharts.chart('container2', {
                    title: {
                        text: 'Ventas por ejecutivo'
                    },
                    yAxis: {
                        title: {
                            text: 'Ventas'
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },

                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: false
                            },
                            pointStart: 2010
                        }
                    },

                    series: [{
                        name: 'Carlos Reyes',
                        data: [43934.90, 52503.18, 57177.66, 69658.98, 97031.26, 119931.69, 137133.11, 154175.18]
                    }, {
                        name: 'Carlos Lam',
                        data: [55970.56, 54064.66, 69742.33, 79851.69, 85490.65, 109975.56, 133985.15, 120599.60]
                    }, {
                        name: 'José Gutierrez',
                        data: [42960.66, 58970.65, 51596.66, 63950.78, 89915.56, 114691.26, 139958.56, 148953.26]
                    }],
                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }

                });
                		</script>
          </div>
      </div>
  </div>

  <div class="col-sm-3 mt-3">
      <div class="card card-sm">
          <div class="card-header">Propuestas generadas</div>
          <div class="card-body">
              <div id="container3" style="min-width: 200px; height: 250px; margin: 0 auto"></div>
              <script>
                  Highcharts.chart('container3', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Estatus'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    },
                    series: [{
                        name: 'Brands',
                        colorByPoint: true,
                        data: [{
                            name: 'Aceptadas',
                            y: 39,
                            sliced: true,
                            selected: true
                        }, {
                            name: 'Rechazadas',
                            y: 16
                        }, {
                            name: 'En proceso',
                            y: 25
                        }]
                    }]
                  });
              </script>
          </div>
      </div>
  </div>

  <div class="col-sm-6 mt-3">
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

  <div class="col-sm-6 mt-3">
      <div class="card card-sm">
          <div class="card-header">Altas</div>
          <div class="card-body">
              <div id="container5" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
              <script type="text/javascript">
                Highcharts.chart('container5', {
                    chart: {
                        type: 'bar'
                    },
                    title: {
                        text: 'Clientes/Prospectos'
                    },
                    xAxis: {
                        categories: ['Enero','Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Alta de registros',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    tooltip: {
                        valueSuffix: ' '
                    },
                    plotOptions: {
                        bar: {
                            dataLabels: {
                                enabled: true
                            }
                        }
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
                        data: [19,33,30,28,25,14]
                    }, {
                        name: 'Prospectos',
                        data: [25,42,18,29,33,16]
                    }]
                });
          		</script>
          </div>
      </div>
  </div>

</div>
