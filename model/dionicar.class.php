<?php

class Dionicar
{
	protected $id, $username, $password, $ime, $prezime, $kapital;

	function __construct( $username, $password, $ime, $prezime, $kapital )
	{
		$this->username = $username;
		$this->password = $password;
		$this->ime = $ime;
		$this->prezime = $prezime;
		$this->kapital = $kapital;
	}

	function __get( $prop ) { return $this->$prop; }
	function __set( $prop, $val ) { $this->$prop = $val; return $this; }

}

?>
