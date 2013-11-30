<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Carsale</title>
<link href="css/geral.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
</head>
<body>
<div id="geral">
  <div id="barraUol">
    <?php
		$bannerUol = "bannerUol.php";
		include ("$bannerUol");
	?>
  </div>
  <div id="bannerTop">
    <?php
		$bannerTop = "bannerTop.php";
		include ("$bannerTop");
	?>
  </div>
  <div id="menuHorizontal">
    <?php
		$menuHor = "menuHorizontal.php";
		include ("$menuHor");
	?>
  </div>
  <div  id="breadcrumbs">
    <?php
		$breadcrumbs = "breadcrumbs.php";
		include ("$breadcrumbs");
	?>
  </div>
  <!-- <div id="midias">
  	Midias
  </div>
 -->
  <div id="conteudo">
    <div id="bannerCtroSlide">
      <div id="bannerDestaque">
        <?php   
			$bannerSld = "banner.php";
			include ("$bannerSld");  
		  ?>
      </div>
      <div id="contRtBannerSld">
        <?php   
			$midias = "midias.php";
			include ("$midias");  
		  ?>
      </div>
    </div>
    <div id="contCol3">
      <?php   
			$conteudo = "conteudo.php";
			include ("$conteudo");  
		  ?>
    </div>
  </div>
</div>
<div id="rodape">
  <div class="bgRodape">
    <div class="celAtendimento">
      <?php   
		$atendimento = "atendimento.php";
		include ("$atendimento");  
	  ?>
    </div>
  </div>
  <div id="bgGeralRodape">
    <div class="cxContMenu">
      <div class="contMenu">
        <?php   
			$menurodape = "menurodape.php";
			include ("$menurodape");  
		?>
      </div>
    </div>
    <div class="cxContMenuVerRdp">
      <div class="celContMenuVerRdp">
        <?php   
			$links = "links.php";
			include ("$links");  
		?>
      </div>
    </div>
  </div>
  <div class="cxContEnd">
    <div class="celContEnd">
      <?php   
			$endereco = "endereco.php";
			include ("$endereco");  
	  ?>
    </div>
  </div>
</div>
</body>
</html>
