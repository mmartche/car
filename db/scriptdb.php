<?php 
// //pega o array 
// insere no banco de dados 
// guarda o id_insert para nome do arquivo 
// valida se existe o arquivo no source
// // verificar dimensao da imagem ????
// copia ele para pasta local 
// poe no relatorio 
// proximo item 

// "idnoticia","img_arquivo_zoom","img_ordem"|
echo "string";
$listaFull = '
(12390,"Audi-S1-2.jpg",1,"redator","publish",0,[name],0,0,0),
(12390,"Audi-S1-13.jpg",2,"redator","publish",0,[name],0,0,0),
(12390,"Audi-S1-19.jpg",3,"redator","publish",0,[name],0,0,0),
(12390,"Audi-S1-22.jpg",4,"redator","publish",0,[name],0,0,0),
(12390,"Audi-S1-23.jpg",5,"redator","publish",0,[name],0,0,0)';
$arrayImgs = explode("),(", $listaFull)

for ($i=0; $i < count($arrayImgs); $i++) { 
	$sqlImg = "insert into `wp_wppa_photos` (`ext`, `album`, `name`, `p_order`, `owner`, `status`, `rating_count`, `filename`, `modified`, `views`, `page_id`) values (".$arrayImgs[$i].");"
	// $qImg = mysql_query($sqlImg) or die ("fudeu no => ".$i." com o array =+ ".$arrayImgs[$i]);
	// $id_inserted = mysql_insert_id();
	$id_inserted = "teste.jpg"
	$arrayValues = new array($arrayImgs[$i]);
	$imgTemp = "http://carsale.uol.com.br/asp/img/Album/".$arrayValues[1];
	$imgDest = "/noticias-br/wp-content/uploads/wppa/".$id_inserted;
	echo "<p>".$$sqlImg."</p><p>".$arrayValues."</p><p>".$imgDest."</p>";
	// if (file_exists($imgTemp) {
	// 	echo "Encontrei ".$imgTemp;
	// 	move_uploaded_file($imgTemp, $imgDest) or echo "Essa img ".$imgTemp." nao foi copiada para ".$imgDest;
	// 	echo "Essa img ".$imgTemp." foi para ".$imgDest;
	// } else {
	// 	echo "Essa img ".$imgTemp." nao foi encontrada";
	// }
}




?>