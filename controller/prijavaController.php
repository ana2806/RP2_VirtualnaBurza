<?php
session_start();

require_once '../model/service.class.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//echo $_POST["register"];

  if( isset( $_POST['login'] ) ){  //LOGIN

	if( isset( $_POST['korisnik'] ) ) {

	  $kor_ime = $_POST['korisnik'];
	  $sifra = password_hash($_POST['sifra'], PASSWORD_DEFAULT);
	  $t = 0;
	  $s = 0;

	  $dionicarService = new Service();
	  $dionicar = $dionicarService->getDionicarByUsername( $kor_ime ); // = '$kor_ime'";

	  $_SESSION['username'] = $kor_ime;

	  if ( password_verify( $_POST['sifra'], $dionicar->password ) ) {

		header("location: ../view/profilDionice.html");
	  }

    else {

    		header("location: ../view/burza.html");
	  }
  }

	}
  else if( isset( $_POST[ 'register' ] ) ) {				//REGISTERs
	         header("location: ../view/registracija.php");
	}
  
  }



?>
