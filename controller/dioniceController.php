<?php

require_once (__DIR__.'/../model/service.class.php');

class DioniceController
{
	public function mojeDionice( $username )
	{
		$mojeDioniceService = new Service();

		$mojeDioniceList = $mojeDioniceService->getDioniceByUsernameDionicara( $username );

	}

	public function dioniceNaProdaju( )
	{
		$prodajaDioniceService = new Service();

		$prodajaDioniceList = $prodajaDioniceService->getDioniceNaProdaju( );

	}
};

?>
