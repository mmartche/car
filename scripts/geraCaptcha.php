<?
header("content-type: image/jpeg");
date_default_timezone_set("America/Sao_Paulo");
///////-------GERA IMAGEM COM TEXTO (TUDO DINÂMICO-------/////////
//array das fontes
$fonte_array = array("../fonts/action.ttf","../fonts/base.ttf","../fonts/facerg.ttf");
$fonte = $fonte_array[rand(0,2)];
//$fonte = "Arial";
//$fonte = "../fonts/action.ttf";

//array com as imagens
//$imagem1 = imagecreate(150,40);
$imagem1 = imagecreatefromjpeg("../images/captcha".rand(1,4).".jpg");


//cores da imagem (fundo,fonte,outros)
$azul = imagecolorallocate($imagem1,0,0,150);
$branco = imagecolorallocate($imagem1,255,255,255);
$preto = imagecolorallocate($imagem1,0,0,0);
$cinza = imagecolorallocate($imagem1,190,190,190);

$horaEnquete = date('Hie');
$criptHora = md5($horaEnquete);
//$palavra = substr($criptHora, 0, 5);
if ($_GET[code] != ""){
	$palavra = substr($_GET[code],0,5);
} else {
	$palavra = "null";
}
//print $palavra;

//aplica modificações na imagem
imagettftext($imagem1,20,15,20,50,$preto,$fonte,$palavra);

//anexa e destroi memoria
imagejpeg($imagem1);
imagedestroy($imagem1);

?>

