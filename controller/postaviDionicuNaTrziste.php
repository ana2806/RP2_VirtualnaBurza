<?php

require_once __DIR__.'/../model/service.class.php';

function sendJSONandExit( $message )
{
    header( 'Content-type:application/json;charset=utf-8' );
    echo json_encode( $message );
    flush();
    exit( 0 );
}

$idDionice = $_GET[ 'idDionicePHP' ];

$dbService = new Service();
$dbService->postaviDionicuNaTrziste( $idDionice);


sendJSONandExit(  1 );

?>
