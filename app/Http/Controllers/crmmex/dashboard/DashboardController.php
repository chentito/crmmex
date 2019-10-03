<?php
/*
 * Controlador del dashboard, widgets
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Junio 2019
 */
namespace App\Http\Controllers\crmmex\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\dashboard\Widgets AS Widgets;
use App\Models\crmmex\dashboard\WidgetsConfig AS WidgetsConfig;

class DashboardController extends Controller
{
  // Listado de widgets
  public function listadoWidgets() {
    $widgets = Widgets::where( 'status' , 1 )->get();
    return response()->json( $widgets );
  }

  // Guarda la configuracion de cada widget
  public function guardaConfWidgets( Request $request ) {
    $widgets = Widgets::where( 'status' , 1 )->get();
    foreach( $widgets AS $widget ) {
      $currWgt = Widgets::find( $widget->id );
      $comboID = 'widget_' . $widget->id;
      $confID  = 'conf_' . $widget->id;

      if( isset( $request->$comboID ) ) {
        $currWgt->estado = "1";
      } else {
        $currWgt->estado = "0";
      }

      $currWgt->configuracion = $request->$confID;
      $currWgt->save();
    }
  }

  public function listadoStatusWidgets() {
    $estados = array();
    $widgets = Widgets::where( 'status' , 1 )->orderBy( 'orden' , 'asc' )->get();
    foreach( $widgets AS $widget ) {
      $estados[] = array(
        'id'        => $widget->id,
        'estado'    => $widget->estado,
        'titulo'    => $widget->titulo,
        'contenido' => $widget->contenido,
        'tamanio'   => $widget->tamanio
      );
    }
    return response()->json( $estados )
  }

  public function actualizaPosicionWidget( $widgetID , $posicion ) {
    $widget = Widgets::find( $widgetID );
    $widget->orden = ( $posicion + 1 );
    $widget->save();
  }

}
