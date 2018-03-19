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

$loginInfo = new stdClass();

if (ISSET ($_SESSION['username']) ) {
	$loginInfo->username = $_SESSION['username'];

	$dionicarService = new Service();
	$dionicar = $dionicarService->getDionicarByUsername( $loginInfo->username );

	$loginInfo->name = $dionicar->ime;
	$loginInfo->surname = $dionicar->prezime;
	$loginInfo->kapital = 	$dionicar->kapital;
}

sendJSONandExit( $loginInfo );

?>
