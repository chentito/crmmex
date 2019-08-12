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

          body{
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
          }

          .page-break {
              page-break-before: always;
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

          footer { position: fixed; bottom: -60px; left: 0px; right: 0px; background-color: black; color: white; height: 50px; }
        </style>
    </head>
    <body>
      <table width="100%" border="0" class="table">
          <tr>
              <td width="25%"><img src="http://192.168.30.103/imagenParaPropuesta" width="200"></td>
              <td width="75%" colspan="3" align="center" valign="top">
                  <h3>PROPUESTA COMERCIAL</h3>
                  <b>{{$datos['propuestaIDTY']}}</b>
                  <br />
                  <i style="float:right">{{$datos['fechaCreacion']}}</i>
              </td>
          </tr>
          <tr><td><br /></td></tr>
          <tr>
              <th colspan="2">Elaborado por:</th>
              <th colspan="2">Dirigido a:</th>
          </tr>
          <tr>
              <td colspan="2">
                  {{$datos['ejecutivoTxt']}}
              </td>
              <td colspan="2">
                  {{$datos['contactoTxt']}}
              </td>
          </tr>
          <tr>
            <td colspan="4">
              <table width="100%">
                <tr>
                  <th valign="top" align="center">Fecha Envío:</th>
                  <th valign="top" align="center">Fecha Vigencia:</th>
                  <th valign="top" align="center">Orden de compra:</th>
                </tr>
                <tr>
                  <td align="center">{{$datos['fechaEnvio']}}</td>
                  <td align="center">{{$datos['fechaVigencia']}}</td>
                  <td align="center">{{$datos['ordenCompra']}}</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr><td><br /></td></tr>
          <tr>
              <th valign="top" colspan="2">Requerimientos:</th>
              <th valign="top" colspan="2">Observaciones:</th>
          </tr>
          <tr>
              <td colspan="2">{{$datos['requerimientos']}}</td>
              <td colspan="2">{{$datos['observaciones']}}</td>
          </tr>
          <tr><td><br /></td></tr>
          <tr><td colspan="4" align="center"><hr><b>CONCEPTOS</b><hr></td></tr>
          <tr>
              <td colspan="4">
                  <table width="100%" border="0" style="border-bottom-style: dashed">
                    <thead>
                      <tr>
                        <th>Producto/Servicio</th>
                        <th>Cantidad</th>
                        <th>Unitario</th>
                        <th>Descuento</th>
                        <th>Importe</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{$totalTraslados=0}}
                      {{$totalRetenciones=0}}
                      {{$subtotal=0}}
                      @foreach($datos['detalle'] AS $producto)
                        <tr>
                            <td width="50%">{{$producto[ 'productoTxt' ]}}</td>
                            <td width="10%" align="center">{{$producto[ 'cantidad' ]}}</td>
                            <td width="10%" align="right">{{@moneda($producto[ 'unitario' ])}}</td>
                            <td width="10%" align="right">{{@moneda($producto[ 'descuento' ])}}</td>
                            <td width="10%" align="right">{{@moneda($producto[ 'cantidad' ]*$producto[ 'unitario' ])}}</td>
                        </tr>
                        <tr>
                            <td colspan="5">{{$producto[ 'comentarios' ]}}</td>
                        </tr>
                        {{$totalTraslados=$totalTraslados+( ( $producto[ 'traslados' ] == 0 ) ? 0 : ( $producto[ 'traslados' ]/100) * ($producto[ 'cantidad' ]*$producto[ 'unitario' ]) )}}
                        {{$totalRetenciones=$totalRetenciones+( ( $producto[ 'retenciones' ] == 0 ) ? 0 : ( $producto[ 'retenciones' ]/100 ) * ($producto[ 'cantidad' ]*$producto[ 'unitario' ]) )}}
                        {{$subtotal=$subtotal+(($producto[ 'cantidad' ]*$producto[ 'unitario' ]))}}
                      @endforeach
                        <tr><th colspan="5"><hr></th></tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="2"></td>
                        <td colspan="2" align="right"><b>Subtotal:</b></td>
                        <td align="right">{{@moneda($subtotal)}}</td>
                      </tr>
                      <tr>
                        <td colspan="2"></td>
                        <td colspan="2" align="right"><b>Traslados:</b></td>
                        <td align="right">{{@moneda($totalTraslados)}}</td>
                      </tr>
                      <tr>
                        <td colspan="2"></td>
                        <td colspan="2" align="right"><b>Retenciones:</b></td>
                        <td align="right">{{@moneda($totalRetenciones)}}</td>
                      </tr>
                      <tr>
                        <td colspan="2"></td>
                        <td colspan="3"><hr></td>
                      </tr>
                      <tr>
                        <td colspan="2"></td>
                        <td colspan="2" align="right"><b>Total Cotización:</b></td>
                        <td align="right"><b>{{@moneda($datos[ 'total' ])}}</b></td>
                      </tr>
                    </tfoot>
                  </table>
              </td>
          </tr>
      </table>

      <div class="page-break">
          <center><h4>Políticas y Condiciones:</h4></center>
          <div style="text-align: justify">{{$datos[ 'condiciones' ]}}</div>
      </div>

      <footer>
          {{$datos[ 'footer' ][ 'razonSocial' ]}}
      </footer>

    </body>
</html>
