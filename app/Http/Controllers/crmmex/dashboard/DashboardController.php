<?php
/*
 * Controlador del dashboard, widgets
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Junio 2019
 */
namespace App\Http\Controllers\crmmex\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\crmmex\dashboard\Widgets AS Widgets;
use App\Models\crmmex\dashboard\WidgetsConfig AS WidgetsConfig;

class DashboardController extends Controller
{
  // Listado de widgets
  public function listadoWidgets() {
    $widgets = Widgets::where( 'status' , 1 )->get();
    $datos   = array();

    foreach( $widgets AS $widget ) {
      $configUsr = WidgetsConfig::where( [ 'userID' => Auth::user()->id , 'widgetID' => $widget->id ] )->first();
      if( $configUsr ) {
        $estado        = $configUsr->visible;
        $configuracion = $configUsr->configuracion;
      } else {
        $estado        = $widget->estado;
        $configuracion = $widget->configuracion;
      }

      $datos[] = array(
        'titulo'        => $widget->titulo,
        'descripcion'   => $widget->descripcion,
        'id'            => $widget->id,
        'estado'        => $estado,
        'configuracion' => $configuracion
      );
    }

    return response()->json( $datos );
  }

  // Guarda la configuracion de cada widget
  public function guardaConfWidgets( Request $request ) {
    $widgets = Widgets::where( 'status' , 1 )->get();
    foreach( $widgets AS $widget ) {
      $comboID = 'widget_' . $widget->id;
      $confID  = 'conf_' . $widget->id;
      $visible = isset( $request->$comboID ) ? '1' : '0';
      $currWgt = WidgetsConfig::updateOrCreate( [ 'userID' => Auth::user()->id , 'widgetID' => $widget->id  ] , [ 'visible' => $visible , 'configuracion' => $request->$confID ] );
    }
  }

  public function listadoStatusWidgets() {
    $estados   = array();
    $configUsr = WidgetsConfig::where( [ 'userID' => Auth::user()->id ] )->first();

    if( $configUsr ) {
        $widgets = WidgetsConfig::where( [ 'userID' => Auth::user()->id , 'visible' => 1 ] )->orderBy( 'orden' , 'asc' )->get();
        foreach( $widgets AS $widget ) {
          $default   = Widgets::find( $widget->widgetID );
          $estados[] = array(
            'id'        => $default->id,
            'estado'    => $default->estado,
            'titulo'    => $default->titulo,
            'contenido' => $default->contenido,
            'tamanio'   => $default->tamanio
          );
        }
      } else {
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
    }

    return response()->json( $estados );
  }

  public function actualizaPosicionWidget( $widgetID , $posicion ) {
    $configUsr = WidgetsConfig::where( [ 'userID' => Auth::user()->id , 'widgetID' => $widgetID ] )->first();
    if( !$configUsr ) {
      $default = Widgets::find( $widgetID );
      $widget  = WidgetsConfig::updateOrCreate( [ 'userID' => Auth::user()->id , 'widgetID' => $widgetID ] , [ 'visible' => $default->estado , 'configuracion' => $default->configuracion , 'orden' => $posicion ] );
    } else {
      $configUsr->orden = ( $posicion + 1 );
      $configUsr->save();
    }
  }

}
