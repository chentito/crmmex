<?php
/*
 * Controlador para la funcionalidad de grids
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Julio 2019
 */
namespace App\Http\Controllers\crmmex\Utils;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Utils\Datatable;

class DatatableController extends Controller
{
    /* Metodo que obtiene la configuracion del grid */
    public function dataTableConfig( $idty ) {
        $datatable = DataTable::where( 'idty' , $idty )->first();
        $config = array(
          'titulo'      => $datatable->titulo,
          'titulos'     => $datatable->colnames,
          'campos'      => $datatable->fieldnames,
          'datasource'  => $datatable->datasource,
          'visibilidad' => $datatable->visibility
        );
        return response()->json( $config );
    }

    /* Muestra la vista para la configuracion del grid */
    public function dataTableConfigView( $idty ) {
      $datatable = DataTable::where( 'idty' , $idty )->first();
      $config = array(
        'titulos'     => $datatable->colnames,
        'campos'      => $datatable->fieldnames,
        'datasource'  => $datatable->datasource,
        'seccion'     => $datatable->seccion,
        'visibilidad' => $datatable->visibility
      );
      return view( 'crmmex.utils.gridConfig' , [ 'gridID'      => $idty ,
                                                 'seccion'     => $config[ 'seccion' ] ,
                                                 'titulos'     => explode( ',' , $config[ 'titulos' ] ),
                                                 'campos'      => explode( ',' , $config[ 'campos' ] ),
                                                 'fields'      => $config[ 'campos' ],
                                                 'visibilidad' => explode( ',' , $config[ 'visibilidad' ] ) ] );
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

}
