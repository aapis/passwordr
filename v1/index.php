<?php

	require_once 'lib/header.php';
	
	$derp->salt = time();
	$derp->length = $_POST['len'];
	$derp->password = $_POST['base'];
	$derp->level = $_POST['level'];
	
	$length_values = array("5", "6", "7", "8", "9", "10", "15", "20");
	$level_values = array("1", "2");
	$password = $derp->confusitizer();
	
	if(in_array($_POST['len'], $length_values)){
		
		$sel = "selected='selected'";
		
	}else {
	
		$sel = "";
		
	}
	
	// stop tracking hits to v1 | July 9, 2011
	//require_once 'lib/hit.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Passwordr | Random Password Generator</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="lib/js/scripts.js"></script>
</head>
	<body>
	<div id="wrapper">
		<h1>Passwordr: Because making new passwords is hard.</h1>
		<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
			<div class="options">
				Length: <select name="len">
					<?php foreach($length_values as $num){?>
						<option <?php if(in_array($_POST['len'], $length_values) && $_POST['len'] == $num){ echo "selected='selected'";} ?>><?= $num; ?></option>
					<?php }?>
				</select>
				Level: <select name="level">
					<?php foreach($level_values as $level){?>
						<option <?php if(in_array($_POST['level'], $level_values) && $_POST['level'] == $level){ echo "selected='selected'";} ?>><?= $level; ?></option>
					<?php }?>
				</select>
				Base password <sup>(optional)</sup>: <input type="text" name="base" />
			</div>
			<!-- <p class="small">Including a base password adds an extra salt and decreases the likely hood of decoding it.</p> -->
		<?php if(isset($_POST['generatepw'])){?>
			<ul>
				<li><a>Your <?= $_POST['len']; ?> digit level <?= $_POST['level']; ?> password is: <strong><?= $password; ?></strong></a></li>
			</ul>
		<?php } ?>
		<!-- <input type="button" class="submit" onclick="toClipboard('<?= $password; ?>');" value="to clipboard" /> -->
		<?php if(isset($_POST['generatepw'])){?>
			<input type="submit" value="Generate Again" class="submit"/>
		<?php }else {?>
			<input type="submit" value="Generate Password" class="submit"/>
		<?php }?>
			<input type="hidden" name="generatepw" />
			<input type="hidden" name="pass" value="<?= $password; ?>" />
		</form>
		<div id="footer">
			<p><a href="http://twitter.com/">Background Texture</a> | &copy; 2011 <a href="http://www.ryanpriebe.com">ryanpriebe.com</a></p>
		</div>
	</div>
	</body>
</html>