<?php

	$myips = array("68.149.122.191", "96.52.132.249");
	$pagename = substr($_SERVER['PHP_SELF'], 11);
	
	if(!$derp->virgin() && !in_array($_SERVER['REMOTE_ADDR'], $myips)){
	
		$db->insert("INSERT INTO passwordr_hits (ip, date, hits, page) VALUES ('". $_SERVER['REMOTE_ADDR'] ."', '". time() ."', '1', '". $pagename ."')");
	
	}else {
	
		$ips = $db->query_as_array("SELECT ip FROM passwordr_hits");
		
			if(in_array($_SERVER['REMOTE_ADDR'], $ips) && !in_array($_SERVER['REMOTE_ADDR'], $myips)){
		
				$db->insert("UPDATE passwordr_hits SET hits = hits + 1, date = ". time() ." WHERE ip = '". $_SERVER['REMOTE_ADDR'] ."'");
				
			}
	
	}

?>