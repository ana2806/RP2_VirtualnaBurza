<?php
require_once __DIR__.'/../model/service.class.php';
require_once __DIR__.'/../model/dionice.class.php';


function sendJSONandExit( $message )
{
    header( 'Content-type:application/json;charset=utf-8' );
    echo json_encode( $message );
    flush();
    exit( 0 );
}

$username = $_GET[ 'usernamePHP' ];


$dioniceProdajaService = new Service();

$dioniceProdajaList = array();
$dioniceProdajaList = $dioniceProdajaService->getPopisDionica( );

$dioniceProdajaListReturn = array();

foreach( $dioniceProdajaList as &$d ) {
  $dioniceProdaja = new stdClass();
  $dioniceProdaja->id = $d->id;
  $dioniceProdaja->naziv = $d->naziv;
  $dioniceProdaja->vrijednost = $d->vrijednost;
  $dioniceProdaja->dividenda = $d->dividenda;
  $dioniceProdaja->username_dionicara = $d->username_dionicara;
  $dioniceProdaja->id_prodaje = $d->id_prodaje;

  array_push( $dioniceProdajaListReturn, $dioniceProdaja );
}


sendJSONandExit( $dioniceProdajaListReturn );

?>
