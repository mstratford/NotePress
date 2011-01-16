<?php
require("connect.php");
$note = addslashes($_POST['note']);
$id = $_POST['id'];
$time = time();
$result = mysql_query("SELECT * FROM notes WHERE id='$id'");
$result2 = mysql_query("SELECT * FROM notes WHERE body='$note'") or die(mysql_error());
if(mysql_num_rows($result2) != 0){
die("Updated");
}
if(mysql_num_rows($result) == 0){
mysql_query("INSERT INTO notes (body,time) VALUES ('$note','$time')") or die(mysql_error());
$msg = 'Added';
}
else{
mysql_query("UPDATE notes SET body='$note', time='$time' WHERE id='$id'") or die(mysql_error());
$msg = 'Updated';
}
echo $msg;
?>