<?php

require_once 'db.class.php';
require_once 'dionicar.class.php';
require_once 'dionice.class.php';

class Service
{
	/*function getDioniceByIdDionicara( $id )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT id, naziv, vrijednost, id_prodaje FROM dionice WHERE id_dionicara=:id' );
			$st->execute( array( 'id' => $id ) );
		}
		catch( PDOException $e ) { exit( 'PDO error getDioniceByIdDionicara ' . $id . '-->' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Dionice( $row['id'], $row['naziv'], $row['vrijednost'], $row['id_prodaje'] );
		}

		return $arr;
	}*/

//ovo mi je trebalo za moje dionice
	function getDioniceByUsernameDionicara( $username )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT id, naziv, vrijednost, dividenda, username_dionicara, id_prodaje FROM dionice WHERE username_dionicara= :username' );
			$st->execute( array( 'username' => $username ) );
		}
		catch( PDOException $e ) { exit( 'PDO error getDioniceByUsernameDionicara ' . $id . '-->' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Dionice( $row['id'], $row['naziv'], $row['vrijednost'], $row['dividenda'], $row['username_dionicara'], $row['id_prodaje'] );
		}

		return $arr;
	}



	function getDionicarByUsername( $username )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( "SELECT username, password, ime, prezime, kapital FROM dionicari WHERE username= :username" );
			$st->execute( array( 'username' => $username ) );

		}
		catch( PDOException $e ) { exit( 'PDO error getDionicarByUsername ' . $username . '-->' . $e->getMessage() ); }

		$row = $st->fetch();
		if( $row === false ) {
			//exit( 'PDO info getDionicarByUsername ' . $username . '-->' . 'return null');
			return null;
		}

		else {
			//exit( 'PDO info getDionicarByUsername ' . $username . '-->' . 'return new dionicar');
			return new Dionicar( $row['username'], $row['password'], $row['ime'],
															$row['prezime'], $row['kapital'] );
		}

	}

//ovo mi treba za sve dionice koje se prodaju
  function getDioniceNaProdaju(  )
  {

		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT id, naziv, vrijednost, dividenda, username_dionicara, id_prodaje FROM dionice WHERE id_prodaje=1' );
			$st->execute( );
		}
		catch( PDOException $e ) { exit( 'PDO error getDioniceNaProdaju: ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Dionice( $row['id'], $row['naziv'], $row['vrijednost'], $row['dividenda'], $row['username_dionicara'], $row['id_prodaje'] );
		}

		return $arr;

	}

	function getSortedByValue()
	{
		  try
	    {
		    $db = DB::getConnection();
		    $st = $db->prepare( 'SELECT username, password, ime, prezime, kapital FROM dionicari ORDER BY kapital DESC' );
		    $st->execute( );
	    }
	   catch( PDOException $e ) { exit( 'PDO error  getSortedByValue: ' . $e->getMessage() ); }

	 $arr = array();
	 while( $row = $st->fetch() )
	 {
		$arr[] = new Dionicar($row['username'], $row['password'], $row['ime'],
														$row['prezime'], $row['kapital']);
	 }

	return $arr;

	}

	function getPopisDionica(  )
  {

		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT id, naziv, vrijednost, dividenda, username_dionicara, id_prodaje FROM dionice' );
			$st->execute( );
		}
		catch( PDOException $e ) { exit( 'PDO error getPopisDionica: ' . $e->getMessage() ); }


		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Dionice( $row['id'], $row['naziv'], $row['vrijednost'], $row['dividenda'], $row['username_dionicara'], $row['id_prodaje'] );
		}

		return $arr;
	}

	function prebaciDionicuNaUsera ($username, $idDionice, $vrijednostDionice) {

		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'UPDATE dionice SET username_dionicara = :username, id_prodaje = 0 where id = :idDionice' );
			$st->execute( array( 'username' => $username, 'idDionice' =>  $idDionice ) );
		}
		catch( PDOException $e ) { exit( 'PDO error prebaciDionicuNaUsera update 1: ' . $e->getMessage() ); }

		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'UPDATE dionicari SET kapital = kapital - :vrijednostDionice where username = :username ' );
			$st->execute( array( 'vrijednostDionice' => $vrijednostDionice, 'username' => $username ) );
		}
		catch( PDOException $e ) { exit( 'PDO error prebaciDionicuNaUsera update 2: ' . $e->getMessage() ); }

		return 1;
	}

	function postaviDionicuNaTrziste ($idDionice) {
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'UPDATE dionice SET id_prodaje = 1 where id = :idDionice' );
			$st->execute( array( 'idDionice' =>  $idDionice ) );
		}
		catch( PDOException $e ) { exit( 'PDO error postaviDionicuNaTrziste: ' . $e->getMessage() ); }

		return 1;
	}

};

?>
