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
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" href="css/jui.css" type="text/css" />
</head>
	<body>
	<div id="wrapper">
		<div id="innerwrapper">
			<h1><a href="http://labs.ryanpriebe.com/passwordr/">Passwordr: Because making new passwords is hard.</a></h1>
			<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
				<div class="options">
					Length: <select name="len">
						<?php foreach($length_values as $num){?>
							<option <?php if(in_array($_POST['len'], $length_values) && $_POST['len'] == $num){ echo "selected='selected'";} ?>><?= $num; ?></option>
						<?php }?>
					</select>
					Salt: <input type="text" name="base" placeholder="<?= $derp->password ?>" />
				</div>
				<p class="small">A salt will make your password more secure.  It defaults to the string above, but you can use whatever you want.</p>
			<?php if(isset($_POST['generatepw'])){?>
				<ul id="genpw">
					<li><a>Your <?= $_POST['len']; ?> digit password is: <strong><?= $password; ?></strong></a></li>
				</ul>
			<?php } ?>
			<?php if(isset($_POST['generatepw'])){?>
				<input type="submit" value="Generate Again" class="submit"/>
				<?php /*?><input type="button" class="submit" id="copytoclipboard" value="Copy to clipboard" /><?php */?>
			<?php }else {?>
				<input type="submit" value="Generate Password" class="submit"/>
			<?php }?>
				<input type="hidden" name="generatepw" class="generated" />
				<?php /*?><input type="hidden" name="pass" value="<?= $password; ?>" /><?php */?>
			</form>
			<div id="footer">
				<p><a id="info">info</a> | &copy; <?= date("Y"); ?> <a href="http://www.ryanpriebe.com" target="_blank">ryanpriebe.com</a></p>
			</div>
			<div id="changelogging" title="Info">
				<div id="changelogcontent">
					<div class="version">
						<h2>Known Issues</h2>
						<ul>
							<li>Sometimes the password won't generate properly.  If this occurs (where the password is shorter than the length that you chose) clicking "generate again" will fix it.</li>
						</ul>
					</div>
					<div class="version">
						<h2>2.1 Planned Features</h2>
						<ul>
							<li>Copy to clipboard.</li>
						</ul>
					</div>
					<h2>Changelog</h2>
					<div class="version">
						<h2>2.0</h2>
						<ul>
							<li>Added a new method that generates better passwords.</li>
							<li>Removed the level options, now defaults to the more secure level.</li>
							<li>Refactored the code to run faster.</li>
							<li>Removed the shorter lengths as most sites ask for passwords of 7 digits or more.</li>
							<li>Updated the style.</li>
						</ul>
					</div>
					<div class="version">
						<h2>1.0</h2>
						<ul>
							<li>Initial release.</li>
							<li><a href="v1/" target="_blank">View version 1.</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<script type="text/javascript" src="lib/js/jquery.js"></script>
	<script type="text/javascript" src="lib/js/jui.js"></script>
	<?php /*?><script type="text/javascript" src="lib/js/jquery.zclip.js"></script><?php */?>
	<script type="text/javascript" src="lib/js/scripts.js"></script>
	</body>
</html>