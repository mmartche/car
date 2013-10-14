<?php 
echo $_SERVER['REMOTE_ADDR']."<br>";
if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == 'localhost' || $_SERVER['REMOTE_ADDR'] == '::1')
{
	$host="localhost";
	$usuario="marcelo";
	$senha="";
	$db="carsale";
} else {
	$host="200.147.22.26";
	$usuario="administrator";
	$senha="31michti07";
	$db="carsale";
}
$conexao = mysqli_connect($host,$usuario,$senha,$db) or die("Error " . mysqli_error() . "conectDB file");
//$conexao=mysqli_connect($host,$usuario,$senha) or die(mysql_error()." Erro ao conectar com o MySQL, arquivo conect");
//mysql_select_db("marche");
echo $conecao."asssss";


$sql = "select * from enqueteIndice";
$query = mysql_query($sql) or die (mysql_error());
$resultado = mysql_fetch_array($query);
print "foi";
print "z<pre>$resultado</pre>";
?>



