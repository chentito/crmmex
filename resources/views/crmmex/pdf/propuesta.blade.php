<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Propuesta Comercial</title>
    <style>
      h3 { text-align: center; text-transform: uppercase; }
      body { font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
      header { position: fixed; top: -100px; left: 0px; right: 0px; height: 100px; text-align: left;}
      footer { position: fixed; bottom: -40px; left: 0px; right: 0px; height: 90px; text-align: center;}
      @page { margin-top: 110px; }
      .page-break { page-break-before: always; }
      #primero { background-color: #ccc; }
      #segundo { color:blue; }
      #tercero { text-decoration:line-through; bottom: 5px; }
      #tag { border-bottom: 1px solid #000; background-color: #000; }
    </style>
  </head>
  <body>
    <header><img src="{{ asset( '/imagenParaPropuesta/1' ) }}" width="200"></header>
    <footer>
      <hr>
      {{$datos[ 'footer' ][ 'razonSocial' ]}}<br />
      {{$datos[ 'footer' ][ 'calle' ]}} {{$datos[ 'footer' ][ 'exterior' ]}}, {{$datos[ 'footer' ][ 'interior' ]}}. COL. {{$datos[ 'footer' ][ 'colonia' ]}}, {{$datos[ 'footer' ][ 'municipio' ]}} {{$datos[ 'footer' ][ 'estado' ]}}. CP {{$datos[ 'footer' ][ 'codigoPostal' ]}}
      <br />Tel {{$datos[ 'footer' ][ 'telefonos' ]}} Email {{$datos[ 'footer' ][ 'correoElectronico' ]}}
      <p style="color:red">{{$datos[ 'disclaimer' ]}}</p>
    </footer>

    <table width="100%" border="0" class="table" >
      <tr>
        <td width="75%" colspan="4" align="center" valign="top">
          <h3>PROPUESTA COMERCIAL</h3>
          <b>{{$datos['propuestaIDTY']}}</b>
          <br />
          <i style="float:right">{{$datos['fechaCreacion']}}</i>
        </td>
      </tr>
      <tr><td><br /></td></tr>
      <tr>
        <th colspan="4">Dirigido a:</th>
      </tr>
      <tr>
        <td colspan="4">
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
        <th valign="top" colspan="4">Requerimientos:</th>
      </tr>
      <tr>
        <td colspan="4">{!! nl2br(e($datos[ 'requerimientos' ])) !!}</td>
      </tr>
      <tr><td><br /></td></tr>
      <tr><td colspan="4" align="center"><hr><b>CONCEPTOS</b><hr></td></tr>
        <tr>
          <td colspan="4">
            <table width="100%" border="0" style="border-bottom-style: dashed">
              <thead>
                <tr>
                  <th align="center">Cantidad</th>
                  <th align="center">Producto/Servicio</th>
                  <th align="center">Unitario</th>
                  <th align="center">Descuento</th>
                  <th align="center">Importe</th>
                </tr>
              </thead>
              <tbody>
                {{$totalTraslados=0}}
                {{$totalRetenciones=0}}
                {{$subtotal=0}}
                {{$divisa=''}}
                @foreach($datos['detalle'] AS $producto)
                  <tr>
                    <td width="10%" align="center">{{$producto[ 'cantidad' ]}}</td>
                    <td width="50%">{{$producto[ 'productoTxt' ]}}</td>
                    <td width="10%" align="center">{{@moneda($producto[ 'unitario' ])}}</td>
                    <td width="10%" align="center">{{@moneda($producto[ 'descuento' ])}}</td>
                    <td width="10%" align="center">{{@moneda($producto[ 'cantidad' ]*$producto[ 'unitario' ])}}</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>{!! nl2br(e($producto[ 'comentarios' ])) !!}</td>
                    <td colspan="3"></td>
                  </tr>
                  {{$totalTraslados=$totalTraslados+( ( $producto[ 'traslados' ] == 0 ) ? 0 : ( $producto[ 'traslados' ]/100) * ($producto[ 'cantidad' ]*$producto[ 'unitario' ]) )}}
                  {{$totalRetenciones=$totalRetenciones+( ( $producto[ 'retenciones' ] == 0 ) ? 0 : ( $producto[ 'retenciones' ]/100 ) * ($producto[ 'cantidad' ]*$producto[ 'unitario' ]) )}}
                  {{$subtotal=$subtotal+(($producto[ 'cantidad' ]*$producto[ 'unitario' ]))}}
                  {{$divisa=$producto['divisa']}}
                @endforeach
                  <tr><th colspan="5"><hr></th></tr>
              </tbody>
              <tfoot>
                <tr>
                  <td></td>
                  <td colspan="2" align="right"><b>Subtotal:</b></td>
                  <td colspan="2" align="right">{{@moneda($subtotal)}}</td>
                </tr>
                <tr>
                  <td></td>
                  <td colspan="2" align="right"><b>Traslados:</b></td>
                  <td colspan="2" align="right">{{@moneda($totalTraslados)}}</td>
                </tr>
                <tr>
                  <td></td>
                  <td colspan="2" align="right"><b>Retenciones:</b></td>
                  <td colspan="2" align="right">{{@moneda($totalRetenciones)}}</td>
                </tr>
                <tr>
                  <td></td>
                  <td colspan="4"><hr></td>
                </tr>
                <tr>
                  <td></td>
                  <td colspan="2" align="right"><b>Total Cotización:</b></td>
                  <td colspan="2" align="right"><b>{{$divisa}}  {{@moneda($datos[ 'total' ])}}</b></td>
                </tr>
              </tfoot>
            </table>
          </td>
        </tr>
    </table>
    <br>
    <div>
      <center><h4>Políticas y Condiciones:</h4></center>
      <div style="text-align: justify">{!! nl2br(e($datos[ 'condiciones' ])) !!}</div>
    </div>
    <br>
    <table width="100%" style="position: relative">
      <tr>
        <td width="10%">Observaciones:</td>
        <td>{!! nl2br(e($datos[ 'observaciones' ])) !!}</td>
      </tr>
    </table>
    <br><br>
    <table width="100%">
      <tr>
        <td align="left" colspan="2">
          @if( $datos['usaFirma'] == 1 )
            <img src="{{ asset( '/imagenParaPropuesta/2' ) }}" width="180" height="180">
          @else
            <p style="margin-bottom: 3cm;"></p>
          @endif
        </td>
      </tr>
      <tr>
        <td width="30%" align="left">
          <hr>
          Ejecutivo {{$datos['ejecutivoTxt']}}
        </td>
        <td width="70%"></td>
      </tr>
    </table>


    <script type="text/php">
      if ( isset($pdf) ) {
        $x = 550;
        $y = 730;
        $font = $fontMetrics->get_font("Arial", "bold");
        $pdf->page_text($x, $y, "{PAGE_NUM} de {PAGE_COUNT}", $font, 8, array(0,0,0), 0.0, 0.0, 0.0);
      }
    </script>
  </body>
</html>
