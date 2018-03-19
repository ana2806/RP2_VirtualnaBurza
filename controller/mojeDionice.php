<?php
require_once __DIR__.'/../model/service.class.php';
require_once __DIR__.'/../model/dionice.class.php';


function sendJSONandExit( $message )
{
    // Kao izlaz skripte pošalji $message u JSON formatu i prekini izvođenje.
    header( 'Content-type:application/json;charset=utf-8' );
    echo json_encode( $message );
    flush();
    exit( 0 );
}

$username = $_GET[ 'usernamePHP' ];


$mojeDioniceService = new Service();

$mojeDioniceList = array();
$mojeDioniceList = $mojeDioniceService->getDioniceByUsernameDionicara( $username );

$mojeDioniceListReturn = array();

foreach( $mojeDioniceList as &$d ) {
  $mojaDionica = new stdClass();
  $mojaDionica->id = $d->id;
  $mojaDionica->naziv = $d->naziv;
  $mojaDionica->vrijednost = $d->vrijednost;
  $mojaDionica->dividenda = $d->dividenda;
  $mojaDionica->username_dionicara = $d->username_dionicara;
  $mojaDionica->id_prodaje = $d->id_prodaje;

  array_push($mojeDioniceListReturn, $mojaDionica);
}


sendJSONandExit( $mojeDioniceListReturn );

?>
