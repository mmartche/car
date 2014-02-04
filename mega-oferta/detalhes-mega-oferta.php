<?
session_start();
$_SESSION["tokenTime"] = time();
include ("../scripts/conectDB.php");
include ("../admin/scripts/functions.php");
$sql = "SELECT *, model.name as modelName, version.name as versionName from megaOferta, version, model where megaOferta.versionId = version.id and megaOferta.modelId = model.id and megaOferta.id = '".$_GET[veiculo]."'";
$query = mysql_query($sql) or die ($sql);
$res = mysql_fetch_array($query);
if (file_exists("../carImagesMegaOferta/".$res[picture])) {
    $picture = "../carImagesMegaOferta/".$res[picture];
} elseif (file_exists("../carImages/".$res[picture])) {
    $picture = "../carImages/".$res[picture];
} elseif (file_exists("http://carsale.uol.com.br/foto/".$res[picture]."_g.jpg")) {
    $picture = "http://carsale.uol.com.br/foto/".$res[picture]."_g.jpg";
} else {
    $picture = "http://carsale.uol.com.br/foto/".$res[picture]."_g.jpg";
}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn1/50192_124345857613786_740480673_q.jpg" />

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!--meta name="google-site-verification" content="htc5j0tj4c1Fsee2bSoUs42QzGEcsSiviny-uUICt6Y" />
	<meta property="fb:admins" content="100000868647048" />
	<meta property="fb:page_id" content="124345857613786" />
	<meta name="msvalidate.01" content="270B7706358DDE8D5FA26B2B7522BC42" /-->
	
	<!--meta http-equiv="Pragma" content="no-cache"/-->
	<meta name="robots" content="index, follow" />
	<meta name="description" content="Carsale,o maior e mais completo site de compra e venda direta de veículos na internet, com garantia de fábrica e entrega pela concessionária,Carros novos, Classificados, Notícias Automotivas, Testes e Opinião do Dono" />
	<meta name="keywords" content="Carsale notícias,Opinião do dono,Opiniao do dono,Classificados,Carros novos,carros okm,Anúncio,Testes / Comparativos,Avaliação de carros,Oferta de carros,Venda de carros" />
	<title>Carsale</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="Search The" />
	<script type="text/javascript" src="../scripts/jquery.2.9.3.min.js"></script>
	<script type="text/javascript" src="../scripts/bootstrap.min.js"></script>

	<script type="text/javascript" src="Dfp_home.js"></script>
	<script type="text/javascript" src="http://tm.uol.com.br/h/par/parceiros.js"></script>
	<script type="text/javascript" src="../scripts/scriptHome.js"></script>

	<link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../styles/home.css" />
	<link rel="stylesheet" type="text/css" href="../styles/megaOfertaOld.css" />
	<!--link rel="stylesheet" type="text/css" href="http://carsale.uol.com.br/classificado/css/carsale.css?no_cache=20120305"-->
	<link rel="stylesheet" type="text/css" href="../styles/megaOferta.css" />
</head>
<body>
<script type="text/javascript" src="http://tm.uol.com.br/b/par/parceiros.js"></script>

<div id="uolBar"></div>
<header>
	<?
	include ("../includes/logoBanner.php");
	include ("../includes/menu.php");
	include ("../includes/socialBar.php");
	?>
	
</header>
<div class="content">
	<div class="columnMiddle">
		<div class="contentMiddle">
			<div class="megaOfertasCarsaleFormBg">
            <div class="megaOfertasCarsaleFormColunaTxt">
			    <div class="bgPalcoCar">
					<div class="megaOfertasCarsaleFormImg"><img alt="" title="" border="0" src="<?=$picture?>"></div>
					<div class="megaOfertasCarsaleFormTitulo">Como funciona?</div>
					<div class="megaOfertasCarsaleFormTxt">Estamos aqui para tornar sua a experiência de compra a mais fácil e transparente possível, além de oferecer ótimos negócios. Aqui não tem 'papo de vendedor'.<br><br>
						Entre em contato com a gente, informando a cor do veículo desejada. Se você estiver na Grande São Paulo, você pode também financiar o carro e dar seu usado na troca.<br><br>
						Rapidamente  retornamos o contato com informações precisas sobre a negociaçao.<br><br>
						Para começar você pode preencher o formulário ao lado, ligar para a gente (tel: 11 3274-5922), ou usar o chat no final da página.<br><br>
						Mande sua proposta sem nenhum compromisso. Experimente!
					</div>
				</div>
			
			</div>
            <form action="/classificado/campanha/proposta/enviar" method="post" id="form_Enviarproposta">
                <input type="hidden" name="origem" value="explorador">
                <input type="hidden" name="propostaMegaOferta.megaOferta.id" value="259">
                <input type="hidden" name="propostaMegaOferta.megaOferta.versao.id" value="1605">
                <input type="hidden" name="propostaMegaOferta.megaOferta.preco" value="131500.0">
                <div class="megaOfertasCarsaleFormColunaInput">
                    <div class="megaOfertasCarsaleFormModelo"><?=$res[modelName]?> - <?=$res[versionName]?></div>
                    <div class="megaOfertasCarsaleFormCatalogo"></div>
                    <div class="megaOfertasCarsaleFormPreco">R$ <?=formatToPrice($res[price])?> <span style="font-size:14px;"></span></div>
                    <div class="megaOfertasCarsaleFormBtnFicha"><a data-toggle="modal" data-target="#feature_<?=$res[versionId]?>" id="fichaTecnica">Ficha Técnica</a></div>
                    <div class="megaOfertasCarsaleFormPrecoLine"></div>
                    <div class="megaOfertasCarsaleFormLineInput">
                        <div class="megaOfertasCarsaleFormTxtLegenda"><label for="nome"><span class="obigatorio">*</span>Nome:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="input_frm" placeholder="Insira seu nome" name="propostaMegaOferta.nome" id="nome">
                        </fieldset>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInput">
                        <div class="megaOfertasCarsaleFormTxtLegenda"><label for="email"><span class="obigatorio">*</span>E-mail:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="input_frm" placeholder="Insira seu e-mail" name="propostaMegaOferta.email" id="email">
                        </fieldset>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInput">
                        <div class="megaOfertasCarsaleFormTxtLegenda"><label for="telefone">Telefone:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="input_ddd" name="propostaMegaOferta.ddd" id="ddd">
                            <input type="text" class="input_tel" name="propostaMegaOferta.telefone" id="telefone">
                        </fieldset>
                    </div>

                    <div class="megaOfertasCarsaleFormLineInput">
                        <div class="megaOfertasCarsaleFormTxtLegenda"><label for="estado"><span class="obigatorio">*</span>Estado:</label></div>
                        <select class="input_text12" name="propostaMegaOferta.unidadeFederativa.id" id="estado">
                            <option value="">Selecione:</option>                            
                                <option value="AC">AC</option>                            
                                <option value="AL">AL</option>                            
                                <option value="AM">AM</option>                            
                                <option value="AP">AP</option>                            
                                <option value="BA">BA</option>                            
                                <option value="CE">CE</option>                            
                                <option value="DF">DF</option>                            
                                <option value="ES">ES</option>                            
                                <option value="GO">GO</option>                            
                                <option value="MA">MA</option>                            
                                <option value="MG">MG</option>                            
                                <option value="MS">MS</option>                            
                                <option value="MT">MT</option>                            
                                <option value="PA">PA</option>                            
                                <option value="PB">PB</option>                            
                                <option value="PE">PE</option>                            
                                <option value="PI">PI</option>                            
                                <option value="PR">PR</option>                            
                                <option value="RJ">RJ</option>                            
                                <option value="RN">RN</option>                            
                                <option value="RO">RO</option>                            
                                <option value="RR">RR</option>                            
                                <option value="RS">RS</option>                            
                                <option value="SC">SC</option>                            
                                <option value="SE">SE</option>                            
                                <option value="SP">SP</option>                            
                                <option value="TO">TO</option>                            
                        </select>

                        <div class="cidadeFrm"><label for="cidade"><span class="obigatorio">*</span>Cidade:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="input_Cidade" placeholder="Insira sua cidade" name="propostaMegaOferta.cidade" id="cidade">
                        </fieldset>
                    </div>


                    <div class="megaOfertasCarsaleFormLineInput">
                        <div class="megaOfertasCarsaleFormTxtLegenda"><span class="obigatorio">*</span>Cor:</div>
                        <select class="opcaoCorAlt" name="propostaMegaOferta.cor.id">
                            <option value="">Escolha uma cor</option>                            
                                <option value="1">Branco</option>                            
                                <option value="2">Preto</option>                            
                                <option value="3">Azul</option>                            
                                <option value="4">Prata</option>                            
                                <option value="6">Vermelho</option>                            
                                <option value="7">Cinza</option>                            
                                <option value="13">Prata Riviera</option>                            
                        </select>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInput">
                        <div class="megaOfertasCarsaleFormTxtLegenda">Cor Alternativa:</div>
                        <select class="opcaoCorAlt" name="propostaMegaOferta.corAlternativa.id">
                            <option value="">Escolha uma cor</option>                            
                                <option value="1">Branco</option>                            
                                <option value="2">Preto</option>                            
                                <option value="3">Azul</option>                            
                                <option value="4">Prata</option>                            
                                <option value="6">Vermelho</option>                            
                                <option value="7">Cinza</option>                            
                                <option value="13">Prata Riviera</option>                            
                        </select>
                    </div>

                    <div class="megaOfertasCarsaleFormLineInputB financiaCheck">
                        <div class="megaOfertasCarsaleFormTxtLegenda"></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.querFinanciar" id="querFinanciar"></div>
                        <div class="megaOfertasCarsaleFormTxtCheck"><label for="querFinanciar">Quero financiar</label></div>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInput financia">
                        <div class="megaOfertasCarsaleFormTxtLegenda">Entrada:</div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="hidden" name="propostaMegaOferta.valorEntradaFinanciamento" id="valorEntradaHidden">
                            <input type="text" class="megaOfertasCarsaleFormTrocaInputBox numeric numericFormated" name="valorEntradaFinanciamento" id="valorEntrada" maxlength="10">
                        </fieldset>
                        <div class="megaOfertasCarsaleFormTxtLegendaC"><label for="parcelas">Quantas parcelas:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="megaOfertasCarsaleFormInputDddBox" name="propostaMegaOferta.quantidadeParcelasFinanciamento" id="parcelas" maxlength="2">
                        </fieldset>
                    </div>

                    <div class="megaOfertasCarsaleFormLineInput trocaCheck">
                        <div class="megaOfertasCarsaleFormTxtLegenda"></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.temVeiculoTroca" id="checkboxTroca"></div>
                        <div class="megaOfertasCarsaleFormTxtCheck"><label for="checkboxTroca">Quero dar veículo na troca</label></div>
                    </div>

                    <div class="megaOfertasCarsaleFormLineInput troca">
                        <div class="megaOfertasCarsaleFormTxtLegenda">Modelo:</div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="megaOfertasCarsaleFormTrocaInputBox" name="propostaMegaOferta.modeloVeiculoTroca">
                        </fieldset>
                        <div class="megaOfertasCarsaleFormTxtLegendaB">Versão:</div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="megaOfertasCarsaleFormTrocaInputBox" name="propostaMegaOferta.versaoVeiculoTroca">
                        </fieldset>
                    </div>

                    <div class="megaOfertasCarsaleFormLineInput troca">
                        <div class="megaOfertasCarsaleFormTxtLegenda">Motorização:</div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="megaOfertasCarsaleFormTrocaInputBox" name="propostaMegaOferta.motorVeiculoTroca" id="motor">
                        </fieldset>
                        <div class="megaOfertasCarsaleFormTxtLegendaB">Ano Modelo:</div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="megaOfertasCarsaleFormTrocaInputBox" name="propostaMegaOferta.anoVeiculoTroca" id="anoVeiculoTroca" maxlength="4">
                        </fieldset>
                    </div>

                    <div class="megaOfertasCarsaleFormLineInput troca">
                        <div class="megaOfertasCarsaleFormTxtLegenda">Quilometragem:</div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="megaOfertasCarsaleFormTrocaInputBox" name="propostaMegaOferta.kilometragemVeiculoTroca" id="kilometragemVeiculoTroca" maxlength="6">
                        </fieldset>
                        <div class="megaOfertasCarsaleFormTxtLegendaB">Cor:</div>
                        <select class="megaOfertasCarsaleFormSelectCor" name="propostaMegaOferta.corVeiculoTroca">
                            <option value="">Selecione:</option>                            
                                <option value="Branco">Branco</option>                            
                                <option value="Preto">Preto</option>                            
                                <option value="Azul">Azul</option>                            
                                <option value="Prata">Prata</option>                            
                                <option value="Verde">Verde</option>                            
                                <option value="Vermelho">Vermelho</option>                            
                                <option value="Cinza">Cinza</option>                            
                                <option value="Bege">Bege</option>                            
                                <option value="Amarelo">Amarelo</option>                            
                                <option value="Marrom">Marrom</option>                            
                                <option value="Laranja">Laranja</option>                            
                                <option value="Dourado">Dourado</option>                            
                                <option value="Prata Riviera">Prata Riviera</option>                            
                        </select>
                    </div>

                    <div class="megaOfertasCarsaleFormLineInput troca">
                        <div class="megaOfertasCarsaleFormTxtLegenda">Câmbio:</div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <select name="propostaMegaOferta.cambioVeiculoTroca.id" id="cambioVeiculoTroca" style="width: 120px;">
                                <option value="">Selecione</option>
                                <option value="1">Automático</option>
                                <option value="2">Manual</option>
                            </select>
                        </fieldset>
                        <div class="megaOfertasCarsaleFormTxtLegendaB">Portas:</div>
                        <select class="megaOfertasCarsaleFormSelectCor" name="propostaMegaOferta.quantidadePortasVeiculoTroca">
                            <option value="">Selecione:</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="megaOfertasCarsaleFormLineInputB troca">
                        <div class="megaOfertasCarsaleFormTxtLegenda"></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.arCondicionado" id="arCondicionado"></div>
                        <div class="megaOfertasCarsaleFormTxtCheck"><label for="arCondicionado">Ar Condicionado</label></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.direcaoHidraulica" id="direcaoHidraulica"></div>
                        <div class="megaOfertasCarsaleFormTxtCheck"><label for="direcaoHidraulica">Direção Hidraulica</label></div>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInputB troca noTopPadding">
                        <div class="megaOfertasCarsaleFormTxtLegenda"></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.vidroEletrico" id="vidroEletrico"></div>
                        <div class="megaOfertasCarsaleFormTxtCheck"><label for="vidroEletrico">Vidro Elétrico</label></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.travaEletrica" id="travaEletrica"></div>
                        <div class="megaOfertasCarsaleFormTxtCheck"><label for="travaEletrica">Trava Elétrica</label></div>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInputB troca noTopPadding">
                        <div class="megaOfertasCarsaleFormTxtLegenda"></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.kitVisibilidade" id="kitVisibilidade"></div>
                        <div class="megaOfertasCarsaleFormTxtCheck"><label for="kitVisibilidade">Kit Visibilidade</label></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.rodaLigaLeve" id="rodaLigaLeve"></div>
                        <div class="megaOfertasCarsaleFormTxtCheck"><label for="rodaLigaLeve">Roda de liga leve</label></div>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInputB troca noTopPadding">
                        <div class="megaOfertasCarsaleFormTxtLegenda"></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.airBag" id="airbag"></div>
                        <div class="megaOfertasCarsaleFormTxtCheck"><label for="airbag">Airbag</label></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.freioAbs" id="freioAbs"></div>
                        <div class="megaOfertasCarsaleFormTxtCheck"><label for="freioAbs">Freio ABS</label></div>
                    </div>

                    <div class="megaOfertasCarsaleFormLineMsgInput">
                        <div class="megaOfertasCarsaleFormTxtLegenda">Observações:</div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <textarea title="" placeholder="Insira suas dúvidas" cols="62" rows="5" class="megaOfertasCarsaleFormMsgInputBox" name="propostaMegaOferta.observacoes"></textarea>
                        </fieldset>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInput">
                        <div class="megaOfertasCarsaleFormTxtLegenda"></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.queroReceberOfertas" id="newsletter"></div>
                        <div class="megaOfertasCarsaleFormTxtCheck"><label for="newsletter">Quero receber ofertas e promoções do Carsale</label></div>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInput">
                        <div class="megaOfertasCarsaleFormTxtLegenda"></div>
                        <div class="megaOfertasCarsaleFormBtn">
						<!--	<input type="submit" value="Enviar" />-->	
						<input class="buttonFrmMo" type="submit" value="Enviar">
							
						</div>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInput">
                        <div class="megaOfertasCarsaleFormTxtLegenda"></div>
                        <div class="megaOfertasCarsaleTxtAsterisco"><i><span class="obigatorio">* Campos obrigatórios</span></i></div>
                    </div>
                </div>
            </form>
        </div>
		</div>
	</div>
</div>
<!-- Modals -->
<? 
$arrayModalVersion = array();
$arrayModalVersion[] = $res[versionId];
include ("../scripts/modalFeatureMakup.php");
include ("../includes/footer.php");
?>


<script type="text/javascript">
var uolJsHost = (("https:" == document.location.protocol) ? "https://ssl.carsale.com.br/js/carsale.js" : "http://me.jsuol.com/omtr/carsale.js");
document.write(unescape("%3Cscript language='JavaScript' src='" + uolJsHost + "' type='text/javascript' %3E%3C/script%3E"));
</script>
<script type="text/javascript"><!--
uol_sc.channel="Carros-parceiros-carsale";
/************* DO NOT ALTER ANYTHING BELOW THIS LINE ! **************/
var s_code=uol_sc.t();if(s_code)document.write(s_code)//--></script>
<!-- End SiteCatalyst code version: H.20.2. -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-10478324-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
 </script>
<script type="text/javascript">
function updateField(obj){
	$("#expModel option").remove();
	var optTemp;
	$.getJSON('../admin/api/index.php?type=askModel&mainId='+obj.value, function(data) {
		$.each(data, function(key, val) {
			optTemp += '<option value="'+val.id+'" >'+val.label+'</option>';
		});
		$("#expModel").append(optTemp);
	});
}


</script>

</body>
</html>