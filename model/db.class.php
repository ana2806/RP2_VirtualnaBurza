<?php

// Datoteku treba preimenovati u db.class.php

class db
{
	private static $db = null;

	private function __construct() { }
	private function __clone() { }

	public static function getConnection()
	{
		/* if( DB::$db === null )
	    { */
	    	try
	    	{
	    		// Unesi ispravni HOSTNAME, DATABASE, USERNAME i PASSWORD
		    	db::$db = new PDO( "mysql: host=rp2.studenti.math.hr; dbname=hanzek; charset=utf8", 'student', 'pass.mysql' );
		    	db::$db-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    }
		    catch( PDOException $e ) { exit( 'PDO Error: ' . $e->getMessage() ); }
	   // }
		return db::$db;
	  }
}

?>
