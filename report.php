<?php
	
	require_once 'lib/config.inc.php';
	require_once 'lib/hit.php';

	if(in_array($_SERVER['REMOTE_ADDR'], $myips)){
		
		if(isset($_GET['s'])){
		
			$sort = $_GET['s'];
		
		}else {
		
			$sort = "date";
		
		}
		
		if(isset($_GET['d'])){
		
			$dir = $_GET['d'];
		
		}else {
		
			$dir = "DESC";
		
		}
		
		
		/*
$dupes = $db->query_as_array("SELECT DISTINCT(ip) as distinct_ip, COUNT(ip) as count_user, hits FROM passwordr_hits GROUP BY ip HAVING count_user > 1");
		
		for($i = 0; $i < count($dupes); $i++){
			
			$fix_dupes = $db->insert("DELETE FROM passwordr_hits WHERE ip = ". $dupes[$i]['distinct_ip'] ." AND hits = 1");
			
		}
*/
	
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Passwordr | Random Password Generator</title>
<style type="text/css">
/* body {background: url("images/bg2.jpg"); font-family: "Trebuchet MS";} */
body {background: #C0DEED url("/passwordr/images/bg.png") repeat-x; font-family: "Trebuchet MS";}
a {color: #fff; text-decoration: none;}
a:hover {text-decoration: underline;}
.selected {color: #bde405;}
.alert {color: #bde405; background-color: #000; display: block; padding: 3px; margin: -3px;}
ul {list-style-type: none; margin: 0 auto;}
li {background: #333; border: 1px solid #212629; color: #fff; margin: 5px 0 5px -40px; margin-top: 20px;}
.options {background: #333; border: 1px solid #212629; margin: 0;}
.orderby {float: right;}
li a, .options {color: #fff; font-size: 18px;text-decoration: none;padding:10px;outline: none;}
#wrapper {width: 600px; margin: 50px auto;}
input#submit {font-family: Georgia; font-weight: bold; font-size: 20px; cursor: pointer; float: right; background: transparent; border: none; color: #333;}
input#submit:hover {text-decoration: underline; color: #333;}
h1 {font-family: Georgia;/*  text-shadow: #111 1px 1px 3px; */ border-top: 1px solid #333; padding-top: 5px;}
/* a:hover, li.titles {text-decoration: none; background-color: #49b8a8; color: #fff;} */
/* a:active {color: #fff;background-color: #259780;} */
.small {font-size: 11px;}
#footer a {color: #333; text-decoration: none;}
#footer {font-size: 11px; margin-top: 60px; border-top: 1px solid #333;}
#footer p {margin: 5px 0;}
.d {background: #a9d0e3; /* url('images/bg3.jpg') */;}
</style>
</head>
	<body>
		<div id="wrapper">
	
			<table width="600" border="0" cellspacing="2" cellpadding="3" align="center">
				<tr>
					<td></td>
					<?php if($sort == "ip"){?>
						<td class="options"><a href="report.php?s=ip" class="selected"><strong>IP Address</strong></a>
						<span class="orderby"><a href="report.php?s=ip&amp;d=ASC"><img src="images/arrow_up.png" alt="" /></a><a href="report.php?s=<?= $_GET['s']; ?>&amp;d=DESC"><img src="images/arrow_dn.png" alt="" /></a></span>
						</td>
					<? }else {?>
						<td class="options"><a href="report.php?s=ip"><strong>IP Address</strong></a>
						<span class="orderby"><a href="report.php?s=ip&amp;d=ASC"><img src="images/arrow_up.png" alt="" /></a><a href="report.php?s=<?= $_GET['s']; ?>&amp;d=DESC"><img src="images/arrow_dn.png" alt="" /></a></span>
						</td>
					<?php }?>
					<?php if($sort == "date"){?>
						<td class="options"><a href="report.php?s=date" class="selected"><strong>Date Accessed</strong></a>
						<span class="orderby"><a href="report.php?s=date&amp;d=ASC"><img src="images/arrow_up.png" alt="" /></a><a href="report.php?s=<?= $_GET['s']; ?>&amp;d=DESC"><img src="images/arrow_dn.png" alt="" /></a></span>
						</td>
					<? }else {?>
						<td class="options"><a href="report.php?s=date"><strong>Date Accessed</strong></a>
						<span class="orderby"><a href="report.php?s=date&amp;d=ASC"><img src="images/arrow_up.png" alt="" /></a><a href="report.php?s=<?= $_GET['s']; ?>&amp;d=DESC"><img src="images/arrow_dn.png" alt="" /></a></span>
						</td>
					<?php }?>
					<?php if($sort == "hits"){?>
						<td class="options" width="110"><a href="report.php?s=hits" class="selected"><strong># Hits</strong></a>
						<span class="orderby"><a href="report.php?s=hits&amp;d=ASC"><img src="images/arrow_up.png" alt="" /></a><a href="report.php?s=<?= $_GET['s']; ?>&amp;d=DESC"><img src="images/arrow_dn.png" alt="" /></a></span>
						</td>
					<? }else {?>
						<td class="options" width="110"><a href="report.php?s=hits"><strong># Hits</strong></a>
						<span class="orderby"><a href="report.php?s=hits&amp;d=ASC"><img src="images/arrow_up.png" alt="" /></a><a href="report.php?s=<?= $_GET['s']; ?>&amp;d=DESC"><img src="images/arrow_dn.png" alt="" /></a></span>
						</td>
					<?php }?>
					<?php if($sort == "page"){?>
						<td class="options"><a href="report.php?s=page" class="selected"><strong>Page</strong></a>
						<span class="orderby"><a href="report.php?s=page&amp;d=ASC"><img src="images/arrow_up.png" alt="" /></a><a href="report.php?s=<?= $_GET['s']; ?>&amp;d=DESC"><img src="images/arrow_dn.png" alt="" /></a></span>
						</td>
					<? }else {?>
						<td class="options"><a href="report.php?s=page"><strong>Page</strong></a>
						<span class="orderby"><a href="report.php?s=page&amp;d=ASC"><img src="images/arrow_up.png" alt="" /></a><a href="report.php?s=<?= $_GET['s']; ?>&amp;d=DESC"><img src="images/arrow_dn.png" alt="" /></a></span>
						</td>
					<?php }?>
				</tr>
					<?php 
					
						$results = $db->query_as_array("SELECT DISTINCT ip, date, hits, page FROM passwordr_hits GROUP BY ip ORDER BY $sort $dir LIMIT 20");
						
						$i = 1;
						
						foreach($results as $item){
						
							if($i % 2 != 0){
							
								$class = "d";
								
							}else {
							
								$class = "l";
							
							}
							
							if($item['page'] == "report.php"){
							
								$item['page'] = "<span class='alert'>". $item['page'] . "</span>";
							
							}
						
						?>
						
							<tr class="<?= $class; ?>">
								<td><?= $i; ?></td>
								<td><?= $item['ip']; ?></td>
								<td><?= date("F jS, Y", $item['date']); ?></td>	
								<td><?= $item['hits']; ?></td>
								<td><?= $item['page']; ?></td>
							</tr>
						
						<?php 
						
						$total_hits = $db->query_as_array("SELECT SUM(hits) as total FROM passwordr_hits");
						$total_ips = $db->query_as_array("SELECT COUNT(DISTINCT ip) as total FROM passwordr_hits");
						
						$i++;
						
						}
					
					?>
					<tr>
					
						<td></td>
						<td class="options" align="center">Unique: <?= $total_ips[0]['total']; ?></td>
						<td class="options" align="center"><?= date("F jS, Y"); ?></td>
						<td class="options" align="center">Total: <?= $total_hits[0]['total']; ?></td>
						<td></td>
					
					</tr>
				
			</table>
	
<?php }else { header("Location: http://labs.ryanpriebe.com/passwordr/");}?>

		</div>
	</body>
</html>