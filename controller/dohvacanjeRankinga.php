<?php
session_start();
require_once '../model/service.class.php';

function sendJSONandExit( $message )
{
    header( 'Content-type:application/json;charset=utf-8' );
    echo json_encode( $message );
    flush();
    exit( 0 );
}

if (ISSET ($_SESSION['username']) ) {

	$dionicarBogati = new Service();
  $dionicariLista = array();
	$dionicariLista = $dionicarBogati->getSortedByValue( );
  $dionicariListaReturn = array();

  foreach( $dionicariLista as $d ) {
    $dionicari = new stdClass();
    $dionicari->username = $d->username;
    $dionicari->ime = $d->ime;
    $dionicari->prezime = $d->prezime;
    $dionicari->kapital = $d->kapital;

    array_push( $dionicariListaReturn, $dionicari );
  }
}

sendJSONandExit(  $dionicariListaReturn );

?>
