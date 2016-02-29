<pre>
<?php
$con=mysql_connect("127.0.0.1:5689","counter","1234");
if(!$con)
{
	die ('Could not connect' . mysql_error());
}

mysql_select_db("counter", $con);
$sql="SELECT from_unixtime(timestamp,'%Y-%m-%d') as t,act,count(1),count(distinct ip) from record group by t,act";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res))
{
	print_r($row);
}
mysql_close($con);
?>
</pre>