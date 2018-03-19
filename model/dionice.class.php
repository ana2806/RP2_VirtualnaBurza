<?php

class Dionice
{
	protected $id, $naziv, $vrijednost, $dividenda, $id_dionicara, $id_prodaje;

	function __construct( $id, $naziv, $vrijednost, $dividenda, $username_dionicara, $id_prodaje )
	{
		$this->id = $id;
		$this->naziv = $naziv;
		$this->vrijednost = $vrijednost;
		$this->dividenda = $dividenda;
		$this->username_dionicara = $username_dionicara;
		$this->id_prodaje = $id_prodaje;
	}
	
	function __get( $prop ) { return $this->$prop; }
	function __set( $prop, $val ) { $this->$prop = $val; return $this; }

}

?>
