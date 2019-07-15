<?php
/*
 * Controlador para el registro de visualizaciones en campañas
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Julio 2019
 */
namespace App\Http\Controllers\crmmex\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Sistema\Tracking AS Tracking;

class TrackingController extends Controller
{
    // Registro de la visualizacion del correo
    public function registro( $campaniaID , $contactoID ) {
        $tracking = new Tracking();
        $tracking->campaniaID    = $campaniaID;
        $tracking->contactoID    = $contactoID;
        $tracking->fechaRegistro = date( 'Y-m-d H:i:s' );
        $tracking->status        = 1;
        $tracking->save();
    }

    // Registro de respuestas de formularios
    public function formAnswering( Request $request ) {
        echo "Gracias!";
    }

}
