<?php

require_once __DIR__.'/../model/service.class.php';

function sendJSONandExit( $message )
{
    header( 'Content-type:application/json;charset=utf-8' );
    echo json_encode( $message );
    flush();
    exit( 0 );
}

$username = $_GET[ 'usernamePHP' ];
$idDionice = $_GET[ 'idDionicePHP' ];
$vrijednostDionice = $_GET[ 'vrijednostDionicePHP' ];

$dbService = new Service();
$dbService->prebaciDionicuNaUsera( $username, $idDionice, $vrijednostDionice );


sendJSONandExit(  1 );

?>
