<?php 

if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == 'localhost')
{
	$dbHost="localhost";
	$dbUser="root";
	$dbPassw="";
	$db="carsale";
} elseif ($_SERVER['REMOTE_ADDR'] == '::1') {
	$dbHost="localhost";
	$dbUser="root";
	$dbPassw="root"; //macbook
	$db="carsale";
} else {
	$dbHost="db499362938.db.1and1.com";
	$dbUser="dbo499362938";
	$dbPassw="carsale";
	$db="db499362938";
}
$conectDB = mysql_connect($dbHost,$dbUser,$dbPassw) or die (mysql_error());
mysql_select_db($db) or die(mysql_error());
/*
$sql_cargo = "select * from model";
$query_cargo = mysql_query($sql_cargo) or print (mysql_error()." erro 5");
while ($res_cargo = mysql_fetch_array($query_cargo))
{
	$opt_cargo .= "<br />".$res_cargo[name].">".$res_cargo[id]."<br />";
}
echo $opt_cargo;
*/


?>



