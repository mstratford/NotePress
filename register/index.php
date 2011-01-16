<?php
require("../connect.php");
$result = mysql_query("SELECT * FROM users") or die(mysql_error());
if(mysql_num_rows($result) != 0){
die("Delete this folder.");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carbon Fiber Signup Form | Tutorialzine Demo</title>

<link rel="stylesheet" type="text/css" href="styles.css" />

</head>

<body>

<div id="carbonForm">
	<h1>Signup</h1>

    <form action="submit.php" method="post" id="signupForm">

    <div class="fieldContainer">

        <div class="formRow">
            <div class="label">
                <label for="name">Name:</label>
            </div>
            
            <div class="field">
                <input type="text" name="name" id="name" />
            </div>
        </div>
        
        <div class="formRow">
            <div class="label">
                <label for="title">Title:</label>
            </div>
            
            <div class="field">
                <input type="text" name="title" id="email" />
            </div>
        </div>
        
          <div class="formRow">
            <div class="label">
                <label for="twitter">Twitter:</label>
            </div>
            
            <div class="field">
                <input type="text" name="twitter" id="email" />
            </div>
        </div>
                <div class="formRow">
            <div class="label">
                <label for="pass">Password:</label>
            </div>
            
            <div class="field">
                <input type="password" name="pass" id="pass" />
            </div>
        </div>
        
        
    </div> <!-- Closing fieldContainer -->
    
    <div class="signupButton">
        <input type="submit" name="submit" id="submit" value="Signup" />
    </div>
    
    </form>
        
</div>




</body>
</html>
