<?php
require("connect.php");
$note = addslashes($_POST['note']);
$id = $_POST['id'];
$time = time();

mysql_query("UPDATE notes SET body='$note', time='$time' WHERE id='$id'") or die(mysql_error());
echo $id;
?>