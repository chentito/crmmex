<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
          h3{
            text-align: center;
            text-transform: uppercase;
          }

          .contenido{
            font-size: 20px;
          }

          #primero {
            background-color: #ccc;
          }

          #segundo {
            color:blue;
          }

          #tercero {
            text-decoration:line-through;
            bottom: 5px;
          }

          #tag{
            border-bottom: 1px solid #000;
            background-color: #000;
          }
        </style>
    </head>
    <body>
      <center><h3>PROPUESTA COMERCIAL</h3></center>
      <br />
      <table width="100%" border="0" class="table">
          <tr>
              <td width="25%" rowspan="2"><img src="http://192.168.30.102/imgs/logo/crm.png" width="200"></td>
              <td width="25%" valign="top" class="tag">Id Cotización:</td>
              <td width="25%" valign="top">Fecha:</td>
              <td width="25%" valign="top">Otro:</td>
          </tr>
          <tr>
              <td><b>{{$datos['propuestaIDTY']}}</b></td>
              <td><b>{{$datos['fechaCreacion']}}</b></td>
              <td><b>{{$datos['fechaCreacion']}}</b></td>
          </tr>
          <tr>
              <td valign="top">Ejecutivo</td>
              <td valign="top">{{$datos['ejecutivoTxt']}}</td>
              <td valign="top">Contacto</td>
              <td valign="top">{{$datos['contactoTxt']}}</td>
          </tr>
          <tr>
              <td valign="top">Fecha Envío:</td>
              <td valign="top"><b>{{$datos['fechaEnvio']}}</b></td>
              <td valign="top">Fecha Vigencia:</td>
              <td valign="top"><b>{{$datos['fechaVigencia']}}</b></td>
          </tr>
          <tr><td>&nbsp;</td></tr>
          <tr>
              <td valign="top" colspan="2">Requerimientos:</td>
              <td valign="top" colspan="2">Observaciones:</td>
          </tr>
          <tr>
              <td colspan="2"><b>{{$datos['requerimientos']}}</b></td>
              <td colspan="2"><b>{{$datos['observaciones']}}</b></td>
          </tr>
          <tr><td>&nbsp;</td></tr>
          <tr><td>Detalle:</td></tr>
          <tr>
              <td colspan="4">
                  <table width="100%" border="1">
                    <thead>
                      <tr>
                        <th class="border-bottom">Producto/Servicio</th>
                        <th>Cantidad</th>
                        <th>Unitario</th>
                        <th>Descuento</th>
                        <th>Importe</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($datos['detalle'] AS $producto)
                        <tr>
                            <td>{{$producto[ 'productoTxt' ]}}</td>
                            <td>{{$producto[ 'cantidad' ]}}</td>
                            <td>{{@moneda($producto[ 'unitario' ])}}</td>
                            <td>{{$producto[ 'descuento' ]}}</td>
                            <td>{{@moneda($producto[ 'cantidad' ]*$producto[ 'unitario' ])}}</td>
                        </tr>
                        <tr>
                            <td colspan="5">{{$producto[ 'comentarios' ]}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                          <td colspan="3"></td>
                          <td><h4>Total Cotización:</h4></td>
                          <td><h4>{{@moneda($datos[ 'total' ])}}</h4></td>
                      </tr>
                    </tfoot>
                  </table>
              </td>
          </tr>
          <tr><td>Políticas y Condiciones:</td></tr>
          <tr><td colspan="4" align="justify">{{$datos[ 'condiciones' ]}}</td></tr>
      </table>
    </body>
</html>
