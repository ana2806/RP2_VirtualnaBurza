<?php

require_once (__DIR__.'/../../model/db.class.php');

$db = DB::getConnection();

try
{
	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS dionicari (' .
		'id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
		'username varchar(100) NOT NULL,' .
		'password varchar(100) NOT NULL,' .
    'ime varchar(100) NOT NULL,' .
		'prezime varchar(100) NOT NULL,' .
		'kapital int(20))'
	);

	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS dionice (' .
		'id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
		'naziv varchar(100) NOT NULL,' .
		'vrijednost float(11), ' .
    'dividenda float(11),' .
		'id_dionicara int(11) NOT NULL,' .
		'id_prodaje int(11) NOT NULL)'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error #3: " . $e->getMessage() ); }

?>
