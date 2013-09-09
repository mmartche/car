<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="css/geral.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="conteudoInterno">
  <div id="contColVert1e2">
    <?php  
		$colsGroup = "colsGroup1e2.php";
		include ("$colsGroup");  
	?>
  </div>
  <div id="contColVertRt">
    <div id="exploradorBnrRt">
      <?php  
		$explorador = "explorador.php";
		include ("$explorador");  
	   ?>
    </div>
    <div id="megaOfertaBnrRt">
      <?php  
		$megaoferta = "megaoferta.php";
		include ("$megaoferta");  
	   ?>
    </div>
    <div id="publicidadeBnrRt" style="margin-bottom:12px;">
      <?php  
		$publicidade = "publicidade.php";
		include ("$publicidade");  
		 ?>
    </div>
  </div>
</div>
</body>
</html>
