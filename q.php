<table border=1 width=300>
<?php
$con=mysql_connect("127.0.0.1:5689","counter","1234");
if(!$con)
{
	die ('Could not connect' . mysql_error());
}

mysql_select_db("counter", $con);
$sql="SELECT from_unixtime(timestamp,'%Y-%m-%d') as t,act,count(1),count(distinct ip) from record group by t,act";
$res=mysql_query($sql);
print "<tr>";
print "<th>Date</th>";
print "<th>Act</th>";
print "<th>PV</th>";
print "<th>UV</th>";
print "</tr>";
while($row=mysql_fetch_array($res))
{
	print "<tr>";
	print "<td>".$row[0]."</td>";
	print "<td>".$row[1]."</td>";
	print "<td>".$row[2]."</td>";
	print "<td>".$row[3]."</td>";
	print "</tr>";
}
mysql_close($con);
?>
</table>