<?php
/* 
 * Helper que verifica si un documento es pdf o no
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Abril 2019
 */
namespace App\Facades;

class EsPDF {
    
    private static $extension = '.pdf';
  
    public static function check( $file ) {
        $ext = substr( strtolower( $file ) , -4 );
        return ( $ext == self::$extension ? 'Es pdf' : 'NO es pdf' );
    }
    
}

