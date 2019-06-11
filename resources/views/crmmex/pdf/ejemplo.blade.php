<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>

        <style>
          @font-face {
            font-family: 'roboto_condensedregular';
            src: url('robotocondensed-regular-webfont.woff2') format('woff2'),
                 url('robotocondensed-regular-webfont.woff') format('woff'),
                 url('RobotoCondensed-Regular.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
          }

          body{
            font-family: 'roboto_condensedregular';
          }

          h1{
            text-align: center;
            text-transform: uppercase;
          }

          .contenido{
            font-size: 20px;
          }

          #primero{
            background-color: #ccc;
          }

          #segundo{
            color:blue;
          }

          #tercero{
            text-decoration:line-through;
            bottom: 5px;
          }
        </style>
    </head>
    <body>
        <h2><center>Popuesta Comercial <br> Solicitada por {{$nombre}}</center></h2>
        <h4>{{$fecha}}</h4>
        <hr>
        <div class="contenido">
            <p id="primero">
              <table width="100%" border="1">
                  <tr>
                      <th>PRODUCTO</th>
                      <th>CANTIDAD</th>
                      <th>COSTO</th>
                      <th>IMPORTE</th>
                      <th>TOTAL</th>
                  </tr>
                  <tr>
                      <td>PROD-0001|Asesoría Informática</td>
                      <td>5 (hrs)</td>
                      <td>350</td>
                      <td>1750</td>
                      <td>1750</td>
                  </tr>
              </table>
            </p>
            <p id="segundo">
              Aqui se coloca todo el texto relativo a la propuesta así como su diseño visual...
            </p>
            <p id="tercero">
              <center>La presente propuesta tiene una vigencia de 30 días después de su emisión</center>
            </p>
        </div>
    </body>
</html>
