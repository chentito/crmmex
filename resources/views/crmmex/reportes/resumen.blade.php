<div class="row">
  <div class="col-sm-8 mt-1">
    <div class="card card-sm">
        <div class="card-header">
            Ventas por mes
        </div>
        <div class="card-body">
          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Task', 'Ventas por mes'],
                  ['Febrero', 69715.62],
                  ['Marzo'  , 45789.25],
                  ['Abril'  , 52715.66],
                  ['Mayo'   , 93789.01],
                  ['Junio'  , 16850.50]
                ]);

                var options = { title: 'Ventas Netas' };
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
          </script>
          <div id="piechart" style="max-width: 700px;"></div>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm {{$btn}} float-right"><i class="fa fa-download"></i></button>
        </div>
    </div>
  </div>
  <div class="col-sm-4 mt-1">
    <div class="card card-sm">
        <div class="card-header">
            Seguimientos
        </div>
        <div class="card-body">
            <script>
                google.charts.load('current', {packages: ['corechart', 'bar']});
                google.charts.setOnLoadCallback(drawChart4);
                function drawChart4() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('timeofday', 'Time of Day');
                    data.addColumn('number', 'Motivation Level');
                    data.addColumn('number', 'Energy Level');
                    data.addRows([
                        [{v: [8, 0, 0], f: '8 am'}, 1, .25],
                        [{v: [9, 0, 0], f: '9 am'}, 2, .5],
                        [{v: [10, 0, 0], f:'10 am'}, 3, 1],
                        [{v: [11, 0, 0], f: '11 am'}, 4, 2.25],
                        [{v: [12, 0, 0], f: '12 pm'}, 5, 2.25],
                        [{v: [13, 0, 0], f: '1 pm'}, 6, 3],
                        [{v: [14, 0, 0], f: '2 pm'}, 7, 4],
                        [{v: [15, 0, 0], f: '3 pm'}, 8, 5.25],
                        [{v: [16, 0, 0], f: '4 pm'}, 9, 7.5],
                        [{v: [17, 0, 0], f: '5 pm'}, 10, 10],
                    ]);

                    var options = {
                        title: 'Seguimientos de los ultimos 3 meses',
                        colors: ['#9575cd', '#33ac71'],
                        hAxis: { title: 'Time of Day', format: 'h:mm a',
                        viewWindow: { min: [7, 30, 0], max: [17, 30, 0] } },
                        vAxis: { title: 'Rating (scale of 1-10)' }
                    };
                    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_3'));
                    chart.draw(data, options);
                }
            </script>
            <div id="chart_div_3"></div>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm {{$btn}} float-right"><i class="fa fa-download"></i></button>
        </div>
    </div>
  </div>
</div>

<div class="row mt-3">
    <div class="col-sm-3 mt-1">
        <div class="card card-sm">
            <div class="card-header">Nombre del reporte</div>
            <div class="card-body">
              Grafica/listado relacionado al reporte
            </div>
            <div class="card-footer">
              Herramientas relacionadas al reporte
            </div>
        </div>
    </div>
    <div class="col-sm-3 mt-1">
        <div class="card card-sm">
            <div class="card-header">Nombre del reporte</div>
            <div class="card-body">
              Grafica/listado relacionado al reporte
            </div>
            <div class="card-footer">
              Herramientas relacionadas al reporte
            </div>
        </div>
    </div>
    <div class="col-sm-3 mt-1">
        <div class="card card-sm">
            <div class="card-header">Nombre del reporte</div>
            <div class="card-body">
              Grafica/listado relacionado al reporte
            </div>
            <div class="card-footer">
              Herramientas relacionadas al reporte
            </div>
        </div>
    </div>
    <div class="col-sm-3 mt-1">
        <div class="card card-sm">
            <div class="card-header">Nombre del reporte</div>
            <div class="card-body">
              Grafica/listado relacionado al reporte
            </div>
            <div class="card-footer">
              Herramientas relacionadas al reporte
            </div>
        </div>
    </div>
</div>

<script>
    $(window).resize( function() {
        drawChart();
        drawChart4();
    });
</script>
