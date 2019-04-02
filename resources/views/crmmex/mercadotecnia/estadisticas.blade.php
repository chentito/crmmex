<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6"><canvas id="estadisticas" style="max-width: 500px;"></canvas></div>
    <div class="col-sm-3"></div>
</div>

<div class="row">
    <div class="col-sm-12 text-center mb-6"><button onclick="contenidos( 'mercadotecnia_listado' )" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-undo"></i> Regresar</button></div>
</div>

<script>
  //pie
  var ctxP = document.getElementById("estadisticas").getContext('2d');
  var myPieChart = new Chart(ctxP, {
    type: 'pie',
    data: {
      labels: ["Sin Leer", "Correo Abierto", "Click"],
      datasets: [{
        data: [35, 12, 9],
        backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C"],
        hoverBackgroundColor: ["#F7464A", "#46BFBD", "#FDB45C"]
      }]
    },
    options: {
      responsive: true
    }
  });

</script>
