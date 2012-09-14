<?php
		
	include('../lib/passwordr.class.php');
	include('../lib/api.class.php');

	$API = new API('dfkj', intval($_GET['length']));

	echo $API->result();

?>