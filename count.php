<?php

$con=mysql_connect("127.0.0.1:5689","counter","1234");
if(!$con)
{
die ('Could not connect' . mysql_error());
}

mysql_select_db("counter", $con);
$sql= "INSERT INTO record (ip, timestamp, act) VALUES('" . $_SERVER['REMOTE_ADDR'] . "','" . $_SERVER['REQUEST_TIME'] . "','" . $_SERVER['REQUEST_URI'] . "')";
mysql_query($sql);
mysql_close($con);

$gifurl="/a.gif";
header("Content-type:image/gif");
header("Content-Length:".filesize($gifurl));
header("Content-Disposition: attachment; filename=" . urldecode($gifurl));
readfile($gifurl);
exit();
?>
