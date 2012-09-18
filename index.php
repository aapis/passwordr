<?php

	require_once 'lib/config.inc.php';

	$length_values = array("7", "8", "9", "10", "11", "12", "13", "14", "15", "20");
	$password = $derp->confusitizer();
	
	if(in_array($_POST['len'], $length_values)){
		
		$sel = "selected='selected'";
		
	}else {
	
		$sel = "";
		
	}
	
	require_once 'lib/hit.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Passwordr | Random Password Generator</title>
<!-- <link rel="stylesheet" type="text/css" href="css/style.css" /> -->
<link rel="stylesheet" type="text/css" href="css/passwordr.min.css" />
<link rel="stylesheet" href="css/jui.css" type="text/css" />
</head>
	<body>
	<div id="wrapper">
		<div id="innerwrapper">
			<h1 id="title"><a href="/">Passwordr</a></h1>
			<h2>Because making new passwords is hard</h2>
			<form method="post" action="">
				<div class="options">
					Length: <select name="len" class="strlen">
						<?php foreach($length_values as $num){?>
							<option <?php if(in_array($_POST['len'], $length_values) && $_POST['len'] == $num){ echo "selected='selected'";} ?>><?= $num; ?></option>
						<?php }?>
					</select>
					<div class="hide">Salt: <input type="hidden" class="strsalt" name="base" placeholder="<?= $derp->password ?>" value="<?= $derp->password ?>" /></div>
				</div>
				<!-- <p class="small">A salt will make your password more secure.  It defaults to the string above, but you can use whatever you want.</p> -->
			<?php if(isset($_POST['generatepw'])){?>
				<ul id="genpw">
					<li><a>Your <?= $_POST['len']; ?> digit password is: <strong><?= $password; ?></strong></a></li>
				</ul>
			<?php } ?>
			<?php if(isset($_POST['generatepw'])){?>
				<input type="submit" value="Generate Again" class="submit"/>
				<?php /*?><input type="button" class="submit" id="copytoclipboard" value="Copy to clipboard" /><?php */?>
			<?php }else {?>
				<input type="submit" value="Generate" class="submit"/>
			<?php }?>
				<input type="hidden" name="generatepw" class="generated" />
			</form>
			<div id="subfooter">
				
			</div>
			<div id="modal"></div>
		</div>	
		<div id="footer">
			<p><a href="#changelogging">info</a> | <a href="#api-help">API</a> | &copy; <?php echo date("Y"); ?> <a href="http://www.ryanpriebe.com" target="_blank" class="copyright">ryanpriebe.com</a></p>
		</div>
	</div>
	<script type="text/javascript" src="lib/js/jquery.js"></script>
	<script type="text/javascript" src="lib/js/jui.js"></script>
	<?php /*?><script type="text/javascript" src="lib/js/jquery.zclip.js"></script><?php */?>
	<!--<script type="text/javascript" src="lib/js/scripts.js"></script>-->
	<script type="text/javascript" src="lib/js/passwordr.min.js"></script>
	</body>
</html>