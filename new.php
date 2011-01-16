<?php
require("connect.php");
if(!isset($_SESSION['user'])){
die(header("Location: index.php"));
}
$result = mysql_query("SELECT * FROM users");

$row = mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo stripslashes($row['title']);?> - New Note</title>
<link href="styles/global.css" rel="stylesheet" type="text/css" media="screen" />
<link href="styles/buttons.css" rel="stylesheet" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Lobster&subset=latin' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Reenie+Beanie&subset=latin' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/effects.js"></script>
<script type="text/javascript" src="js/autogrow-textarea.js"></script>

</head>
<body>
<div id="wrap">

	<div id="my-notes">
		<h1><?php echo stripslashes($row['title']);?> - New</h1>
		
		<div id="notes">
		
			<!--Note-->
			<div class="full">
			<div class="note">
			<div class="tape"></div>
				<div class="text">
					<p><textarea cols="34"> </textarea></p>
			
							</div>
				<div class="line"></div>
				<div class="bg"></div>
			</div>
								<span class="new"><a class="l-1" title="Add Note" >Add Note</a></span><br><br>
			</div>
		
	
		<a href="http://boxtuffs.com" class="boxtuffs"> Design from <strong>boxtuffs.com</strong></a>
	</div>

</div>
</body>
</html>