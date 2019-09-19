<?php
/*
 * Controlador para la funcionalidad de grids
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Julio 2019
 */
namespace App\Http\Controllers\crmmex\Utils;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\crmmex\Utils\UtilsController AS Utils;

use App\Models\crmmex\Utils\Datatable;
use App\Models\crmmex\Utils\CamposAdicionales AS CamposAdicionales;

class DatatableController extends Controller
{

  /* Metodo que obtiene la configuracion del grid */
  public function dataTableConfig( $idty ) {
    $datatable = DataTable::where( 'idty' , $idty )->first();
    $config = array(
      'titulo'          => $datatable->titulo,
      'titulos'         => $datatable->colnames . ( $datatable->idSeccionAdicionales > 0 ? $this->infoDatosAdicionales( $datatable->idSeccionAdicionales )[ 0 ] : '' ),
      'campos'          => $datatable->fieldnames,
      'datasource'      => $datatable->datasource,
      'visibilidad'     => $datatable->visibility . ( $datatable->idSeccionAdicionales > 0 ? $this->infoDatosAdicionales( $datatable->idSeccionAdicionales )[ 1 ] : '' )
    );
    return response()->json( $config );
  }

  /* Muestra la vista para la configuracion del grid */
  public function dataTableConfigView( $idty ) {
    $datatable = DataTable::where( 'idty' , $idty )->first();
    $config = array(
      'titulos'     => $datatable->colnames . ( $datatable->idSeccionAdicionales > 0 ? $this->infoDatosAdicionales( $datatable->idSeccionAdicionales )[ 0 ] : '' ),
      'campos'      => $datatable->fieldnames . ( $datatable->idSeccionAdicionales > 0 ? $this->infoDatosAdicionales( $datatable->idSeccionAdicionales )[ 0 ] : '' ),
      'datasource'  => $datatable->datasource,
      'seccion'     => $datatable->seccion,
      'visibilidad' => $datatable->visibility . ( $datatable->idSeccionAdicionales > 0 ? $this->infoDatosAdicionales( $datatable->idSeccionAdicionales )[ 1 ] : '' )
    );

    return view( 'crmmex.utils.gridConfig' ,
      [
        'gridID'      => $idty ,
        'seccion'     => $config[ 'seccion' ] ,
        'titulos'     => explode( ',' , $config[ 'titulos' ] ),
        'campos'      => explode( ',' , $config[ 'campos' ] ),
        'fields'      => $config[ 'campos' ],
        'container'   => ( Utils::tipoMenu() == 1 ? 'container' : 'container-fluid' ),
        'visibilidad' => explode( ',' , $config[ 'visibilidad' ] )
      ]
    );
  }

  public function actualizaGridConfig( Request $request ) {
    $datatable   = DataTable::where( 'idty' , $request->confGrid_id )->first();
    $fields      = explode( ',' , $request->confGrid_fields );
    $visibilidad = '';
    foreach( $fields AS $field ) {
      if( isset( $request->$field ) ) {
        $visibilidad .= '1,';
      } else {
        $visibilidad .= '0,';
      }
    }
    $datatable->visibility = trim( $visibilidad , ',' );
    $datatable->save();
  }

  /* Obtiene registros de datos adicionales para ser incluidos en el grid */
  public function infoDatosAdicionales( $seccionID ) {
    $adicionales = CamposAdicionales::where( 'seccion' , $seccionID )->where( 'status' , 1 )->get();
    $titulos     = '';
    $visibilidad = '';
    foreach( $adicionales AS $adicional ) {
      $titulos     .= $adicional->nombre . ',';
      $visibilidad .= '0,';
    }
    return array( trim( $titulos , ',' ) , trim( $visibilidad , ',' ) );
  }

}
