<?php 
echo $_SERVER['REMOTE_ADDR']."<br>";
if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == 'localhost' || $_SERVER['REMOTE_ADDR'] == '::1')
{
	$host="localhost";
	$usuario="root";
	$senha="";
	$db="carsale";
} else {
	$host="db499362938.db.1and1.com";
	$usuario="administrator";
	$senha="31michti07";
	$db="carsale";
}
$conexao=mysql_connect($host,$usuario,$senha) or die(" Erro ao conectar com o MySQL, arquivo conect");
mysql_select_db($db,$conexao) or die("bd not found");
echo $conecao."asssss";


$sql = "select * from model";
$query = mysqli_query($sql) or die (mysqli_error());
$resultado = mysqli_fetch_array($query);
print "z<pre>".$resultado."</pre>";
?>



