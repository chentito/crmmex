
<div class="row">
    <div class="col-sm-12 text-center mx-lg-n5">Datos Rápidos<br><br><br></div>
</div>

<style>
    .chart {
        width: 100%; 
        min-height: 450px;
    }

    .row {
        margin:0 !important;
    }
</style>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback( drawChart );
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            ['Diciembre', 19],
            ['Enero'    , 10],
            ['Febrero'  , 11],
            ['Marzo'    , 16],
            ['Abril'    , 9]
        ]);

      var options = {'title':'Propuestas enviadas por mes' };

      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback( drawChart2 );
    function drawChart2() {
        var data = google.visualization.arrayToDataTable([
            ['Clientes por mes', 'Clientes por mes'],
            ['Diciembre', 9],
            ['Enero'    , 15],
            ['Febrero'  , 6],
            ['Marzo'    , 12],
            ['Abril'    , 7]
        ]);

        var options = {
            title: 'Alta de clientes',
            pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div_2'));
        chart.draw(data, options);
    }
    
    google.charts.load("current", {packages:["timeline"]});
    google.charts.setOnLoadCallback(drawChart3);
    function drawChart3() {
        var container = document.getElementById('timeline');
        var chart = new google.visualization.Timeline(container);
        var dataTable = new google.visualization.DataTable();
        dataTable.addColumn({ type: 'string', id: 'Position' });
        dataTable.addColumn({ type: 'string', id: 'Name' });
        dataTable.addColumn({ type: 'date', id: 'Start' });
        dataTable.addColumn({ type: 'date', id: 'End' });
        dataTable.addRows([
          [ 'Alta de datos'     , 'Mexagon SA de CV'            , new Date(2018, 12, 19), new Date(2019, 04, 16)],
          [ 'Alta de datos'     , 'Carlos Reyes Salazar'        , new Date(2019, 01, 07), new Date(2019, 04, 16)],
          [ 'Alta de datos'     , 'José Gutierrez'              , new Date(2019, 01, 19), new Date(2019, 04, 16)],
          [ 'Envio de propuesta', 'Audatex SA de CV'            , new Date(2019, 03, 06), new Date(2019, 04, 16)],
          [ 'Envio de propuesta', 'Autoonline AS de CV'         , new Date(2019, 03, 06), new Date(2019, 04, 16)],
          [ 'Envio de propuesta', 'Marmoles Ponzanelli SA de CV', new Date(2019, 03, 19), new Date(2019, 04, 16)],
          [ 'Envio de propuesta', 'Grupo Polak SA de CV'        , new Date(2019, 03, 15), new Date(2019, 04, 16)],
          [ 'Envio de Factura'  , 'John Jay'                    , new Date(2019, 03, 10), new Date(2019, 04, 16)],
          [ 'Envio de Factura'  , 'Thomas Jefferson'            , new Date(2019, 02, 22), new Date(2019, 04, 16)],
          [ 'Envio de Factura'  , 'Edmund Randolph'             , new Date(2019, 02, 02), new Date(2019, 04, 16)],
          [ 'Envio de Factura'  , 'Timothy Pickering'           , new Date(2019, 03, 09), new Date(2019, 04, 16)],
          [ 'Alta de servicio'  , 'Charles Lee'                 , new Date(2019, 03, 13), new Date(2019, 04, 16)],
          [ 'Alta de servicio'  , 'John Marshall'               , new Date(2019, 04, 01), new Date(2019, 04, 16)],
          [ 'Alta de servicio'  , 'Levi Lincoln'                , new Date(2019, 04, 02), new Date(2019, 04, 16)],
          [ 'Alta de servicio'  , 'James Madison'               , new Date(2019, 04, 06), new Date(2019, 04, 16)]
        ]);
        
        var options = {
            height: '400'
        };

        chart.draw(dataTable,options);
    }

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
            title: 'Motivation and Energy Level Throughout the Day',
            colors: ['#9575cd', '#33ac71'],
            hAxis: {
                title: 'Time of Day',
                format: 'h:mm a',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            vAxis: {
                title: 'Rating (scale of 1-10)'
            }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_3'));
        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart();
        drawChart2();
        drawChart3();
        drawChart4();
    });
</script>

<div class="row">
    <div class="col-sm-4">
        <div id="chart_div"></div>
    </div>
    <div class="col-sm-4">
        <div id="chart_div_2"></div>
    </div>
    <div class="col-sm-4">
        <div id="chart_div_3"></div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">Seguimientos</div>
    <div class="col-sm-10"><hr /></div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div id="timeline"></div>
    </div>
</div>
