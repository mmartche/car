<?php 

if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == 'localhost')
{
	$dbHost="localhost";
	$dbUser="root";
	$dbPassw="";
	$db="carsale";
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'carsale');
} elseif ($_SERVER['REMOTE_ADDR'] == '::1') {
	$dbHost="localhost";
	$dbUser="root";
	$dbPassw="root"; //macbook
	$db="carsale";
	define('DB_NAME', 'carsale');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_HOST', 'localhost');
} else {
	$dbHost="localhost";
	$dbUser="root";
	$dbPassw="a485618455b4d7471a4e708157096232";
	$db="carsale";
	// define('DB_NAME', 'db499362938');
	// define('DB_USER', 'dbo499362938');
	// define('DB_PASSWORD', 'carsale');
	// define('DB_HOST', 'db499362938.db.1and1.com');

	// $dbHost="db499362938.db.1and1.com";
	// $dbUser="dbo499362938";
	// $dbPassw="carsale";
	// $db="db499362938";
	// define('DB_NAME', 'db499362938');
	// define('DB_USER', 'dbo499362938');
	// define('DB_PASSWORD', 'carsale');
	// define('DB_HOST', 'db499362938.db.1and1.com');
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



