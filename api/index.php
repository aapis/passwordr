<?php
		
	include('../lib/passwordr.class.php');
	include('../lib/api.class.php');

	$API = new API($_GET['k'], intval($_GET['l']), $_GET['s']);

	echo $API->result();

?>