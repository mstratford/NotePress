<?php
session_start();
// Error reporting:
error_reporting(E_ALL^E_NOTICE);

// This is the URL your users are redirected,
// when registered succesfully:

$redirectURL = '../';

$errors = array();

// Checking the input data and adding potential errors to the $errors array:

if(!$_POST['name'] || strlen($_POST['name'])<3 || strlen($_POST['name'])>50)
{
	$errors['name']='Please fill in a valid name!<br />Must be between 3 and 50 characters.';
}



if(!$_POST['pass'] || strlen($_POST['pass'])<5)
{
	$errors['pass']='Please fill in a valid password!<br />Must be at least 5 characters long.';
}

// Checking whether the request was sent via AJAX
// (we manually send the fromAjax var with the AJAX request):

if($_POST['fromAjax'])
{
	if(count($errors))
	{
		$errString = array();
		foreach($errors as $k=>$v)
		{
			// The name of the field that caused the error, and the
			// error text are grouped as key/value pair for the JSON response:
			$errString[]='"'.$k.'":"'.$v.'"';
		}
		
		// JSON error response:
		die	('{"status":0,'.join(',',$errString).'}');
	}
	
	// JSON success response. Returns the redirect URL:
	echo '{"status":1,"redirectURL":"'.$redirectURL.'"}';

	exit;
}

// If the request was not sent via AJAX (probably JavaScript
// has been disabled in the visitors' browser):

if(count($errors))
{
	echo '<h2>'.join('<br /><br />',$errors).'</h2>';
	exit;
}

// Directly redirecting the visitor:

require("../connect.php");
$pass = "58gb". hash("sha256",$_POST['pass']);
$user = $_POST['name'];
$result = mysql_query("SELECT * FROM users WHERE user='$user' AND pass='$pass'") or die(mysql_error());
if(mysql_num_rows($result) == 0){
header("Location: index.php");
}
else{
$row = mysql_fetch_array($result);
$_SESSION['user'] = $row['user'];
}
header("Location: ".$redirectURL);
?>