<?php
require("connect.php");
$result = mysql_query("SELECT * FROM users") or die(mysql_error());
if(mysql_num_rows($result) == 0){
die(header("Location: register"));
}
	
	function clickable($url){
	$url = stripslashes($url);
$url = preg_replace("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", '<a class="click" href="$0" target="_blank">$0</a>', $url);
return $url;
}	

$row = mysql_fetch_array(mysql_query("SELECT * FROM users"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo stripslashes($row['title']);?></title>
<link href="styles/global.css" rel="stylesheet" type="text/css" media="screen" />
<link href="styles/buttons.css" rel="stylesheet" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Lobster&subset=latin' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<?php if(isset($_SESSION['user'])){
?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/effects.js"></script>
<script type="text/javascript" src="js/autogrow-textarea.js"></script>
<?php
}
?>

</head>
<body>
<div id="wrap">

	<div id="my-notes">
		<h1><a class="none" href="http://twitter.com/<?php echo $row['twitter'];?>" target="_blank"><?php echo stripslashes($row['title']);?></a></h1>
		
		<div id="notes">
		
			<?php
			$result = mysql_query("SELECT * FROM notes ORDER BY time DESC");
			if(mysql_num_rows($result) == 0){
			?>
			<div class="full">
			<div class="note">
			<div class="tape"></div>
				<div class="text">
					<p>You don't have any notes yet, why not <a href="new.php">make one</a>?</p>
			
							</div>
				<div class="line"></div>
				<div class="bg"></div>
			</div>
			</div>
			<?php
			}
			while($row = mysql_fetch_array($result)){
			?>
			<div class="full">
			<h2 class="title"><?php echo date("F d, Y",$row['time']);?></h2>
			<?php if(isset($_SESSION['user'])){
			?>
			<h2 class="id"><?php echo $row['id'];?></h2>
			<?php
			}
			?>
			<div class="note">
			<div class="tape"></div>
				<div class="text">
					<p><?php echo clickable($row['body']);?></p>
							</div>
				<div class="line"></div>
				<div class="bg"></div>
			</div>
			<?php if(isset($_SESSION['user'])){
			?>
								<span class="save"><a class="l-1" title="Add Note" >Save</a></span><br><br>
								<?php
								}
								?>
			</div>
						
			
			<?php
			}
			?>
			
		
		</div>
	
		<?php
		if(!isset($_SESSION['user'])){
		?>
		<a href="login" class="boxtuffs"><strong>Login</strong></a><br>
		<?php
		}
		if(isset($_SESSION['user'])){
		?>
		<a href="new.php" class="boxtuffs"><strong>Add Note</strong></a><br>
		<a href="logout.php" class="boxtuffs"><strong>Logout</strong></a><br>
		<?php
		}
		?>			<a href="https://github.com/zackify/NotePress" class="boxtuffs"> Made With <strong>NotePress</strong></a>
	</div>

</div>
</body>
</html>
