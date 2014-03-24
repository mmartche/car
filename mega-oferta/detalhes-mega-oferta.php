<?php
include('../includes/header.php');
?>
<?
include ("../admin/scripts/functions.php");
$sql = "SELECT megaOferta.id as megaOfertaId, manufacturer.name as manufacturerName, model.id as modelId, model.name as modelName, version.id as versionId, version.name as versionName, megaOferta.price, megaOferta.yearModel, megaOferta.place, megaOferta.orderMega, megaOferta.description, megaOferta.dateLimit, feature.picture FROM megaOferta, manufacturer, model, version, feature WHERE feature.idVersion = version.id and feature.yearModel = megaOferta.yearModel and megaOferta.manufacturerId = manufacturer.id and megaOferta.versionId = version.id AND megaOferta.modelId = model.id and megaOferta.id = '".$_GET[veiculo]."'";
$query = mysql_query($sql) or die ($sql);
$res = mysql_fetch_array($query);
if (file_exists("../carImages/".$res[picture])) {
    $picture = "../carImages/".$res[picture];
} elseif (file_exists("../carImages/".$res[picture])) {
    $picture = "../carImages/".$res[picture];
} elseif (file_exists("http://carsale.uol.com.br/foto/".$res[picture]."_g.jpg")) {
    $picture = "http://carsale.uol.com.br/foto/".$res[picture]."_g.jpg";
} else {
    $picture = "http://carsale.uol.com.br/foto/".$res[picture]."_g.jpg";
}

?>
<div class="content">
    <div class="columnMiddle">
        <div class="contentMiddleMegaOferta"> <!--Alterado!-->
            <h2 class="expTitle">
                <div class="titleBar"></div>
                <div class="titleContent">
                    <b>Explorador Carsale</b>
                </div>
            </h2>
            <div class="megaOfertaTituloNomedoCarro"><?=$res[modelName]?> - <?=$res[versionName]?></div>
             <div class="conteutoSuperiorFormularioMegaOferta">   
                <div class="imageBarMegaOferta">
                    <div class="valoreFichaTecnica" >
                        <span class="valorMegaOferta1">R$</span>
                        <span class="valorMegaOferta2"><?=formatToPrice($res[price])?></span>
                        <div  class="fichaTecnicaValorPrincipal">
                          <div class="fichaTecnicaValorInterna">
                            <a class="linktitlefichaTecnica" data-toggle="modal" data-target="#feature_<?=$res[versionId]?>" id="fichaTecnica">Ficha Técnica</a>
                          </div>
                        </div>                                            
                    </div>
                </div>       
                <div class="imgMegaOferta"><img alt="" title="" border="0" src="<?=$picture?>">
                    <div class="txtFotoMeramenteIlustrativa" >fotos Meramente ilustrativa</div>
                </div>
            </div>
        </div>
            <div class="megaOfertasCarsaleFormBg">
            <div class="megaOfertasCarsaleFormColunaTxt">
                <div class="bgPalcoCar">    

                    <div class="comoFuncionaMegaOfertaFormulario">Como funciona?
                        <div class="linhaComoFuncionaMegaOfertaFormulario"></div>
                    </div>
                    <div class="megaOfertasComoFuncionaFormTxt">Estamos aqui para tornar sua a experiência de compra a mais fácil e transparente possível, além de oferecer ótimos negócios. Aqui não tem 'papo de vendedor'.<br><br>
                        Entre em contato com a gente, informando a cor do veículo desejada. Se você estiver na Grande São Paulo, você pode também financiar o carro e dar seu usado na troca.<br><br>
                        Rapidamente  retornamos o contato com informações precisas sobre a negociaçao.<br><br>
                        Para começar você pode preencher o formulário ao lado, ligar para a gente <span class="megaOfertasComoFuncionaFormTxtTelefone"> (tel: 11 3274-5922)</span>, ou usar o chat no final da página.<br><br>
                        Mande sua proposta sem nenhum compromisso. Experimente!
                    </div>

                </div>
            
            </div>
            <form action="send-mail.php" method="post" id="form_Enviarproposta" onsubmit="return checkValues();">
                <input type="hidden" name="origem" value="explorador">
                <input type="hidden" name="propostaMegaOferta.megaOferta.id" value="<?=$res[megaOfertaId]?>">
                <input type="hidden" name="propostaMegaOferta.megaOferta.versao.id" value="<?=$res[versionId]?>">
                <input type="hidden" name="propostaMegaOferta.megaOferta.preco" value="<?=$res[price]?>">
                <div class="megaOfertasCarsaleFormColunaInputb">
             
                    <span class="preenchimentoObrigatorioTxt">
                        <span class="campoObrigatorioMegaOferta">*</span>
                        Preenchimento obrigatorio
                    </span>          
                    <div class="megaOfertasCarsaleFormLineInputB">
                        <div class="megaOfertasCarsaleFormTxtLegenda"><label class="labelCzFormMegaOferta" for="nome">Nome:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="txtInput input_frmMegaOferta" placeholder="Insira seu nome" name="propostaMegaOferta.nome" id="nome">
                        </fieldset>
                        <span class="campoObrigatorioMegaOferta">*</span>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInputB">
                        <div class="megaOfertasCarsaleFormTxtLegenda"><label class="labelCzFormMegaOferta" for="email">E-mail:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="txtInput input_frmMegaOferta" placeholder="Insira seu e-mail" name="propostaMegaOferta.email" id="email">
                        </fieldset>
                        <span class="campoObrigatorioMegaOferta">*</span>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInputB">
                        <div class="megaOfertasCarsaleFormTxtLegenda"><label class="labelCzFormMegaOferta" for="telefone">Telefone:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="txtInput inputForm_ddd" name="propostaMegaOferta.ddd" id="ddd">
                            <input type="text" class="txtInput inputForm_tel" name="propostaMegaOferta.telefone" id="telefone">
                        </fieldset>
                        <span class="campoObrigatorioMegaOferta">*</span>
                        <span class="exemploFormMegaOfertaTel">Ex.:(11) 9999-9999</span>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInputB">
                        <div class="megaOfertasCarsaleFormTxtLegenda"><label class="labelCzFormMegaOferta" for="telefone">Celular:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="txtInput inputForm_ddd" name="propostaMegaOferta.ddd" id="ddd">
                            <input type="text" class="txtInput inputForm_tel" name="propostaMegaOferta.telefone" id="telefone">
                        </fieldset>
                        <span class="exemploFormMegaOfertaCel">Ex.:(11) 99999-9999</span>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInputB">
                        <div class="megaOfertasCarsaleFormTxtLegenda"><label class="labelCzFormMegaOferta" for="estado"><span class="campoObrigatorioMegaOferta">*</span>Estado:</label></div>
                        <select class="input_Select" name="propostaMegaOferta.unidadeFederativa.id" id="estado" onchange="checkInputs()">
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
                                <span class="campoObrigatorioMegaOferta">*</span>                           
                        </select>

                        <div class="cidadeFrm"><label class="labelCzFormMegaOferta" for="cidade">Cidade:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="txtInput input_frmCidadeMegaOferta" placeholder="Insira sua cidade" name="propostaMegaOferta.cidade" id="cidade">
                        </fieldset>
                        <span class="campoObrigatorioMegaOferta">*</span>
                    </div>


                    <div class="megaOfertasCarsaleFormLineInputB">
                        <div class="megaOfertasCarsaleFormTxtLegenda"><label class="labelCzFormMegaOferta" for="cor1"><span class="campoObrigatorioMegaOferta">*</span>Cor:</label></div>
                        <select class="input_SelectOpcaoCorAlt" name="propostaMegaOferta.cor.id">
                            <option value="">Escolha uma cor</option>                            
                                <option value="1">Branco</option>                            
                                <option value="2">Preto</option>                            
                                <option value="3">Azul</option>                            
                                <option value="4">Prata</option>                            
                                <option value="6">Vermelho</option>                            
                                <option value="7">Cinza</option>                            
                                <option value="13">Prata Riviera</option>                            
                        </select>
                        <div class="telefoneAlternativoFrmB"><label class="labelCzFormMegaOferta" for="cor1">Cor Alternativa:</label></div>
                        <select class="input_SelectOpcaoCorAlt" name="propostaMegaOferta.cor.id">
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

                <div id="contentParaSp" class="hide">
                    <div class="megaOfertasCarsaleFormLineInputB financiaCheck">
                        <div class="megaOfertasCarsaleFormTxtLegenda"></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.querFinanciar" id="querFinanciar" onchange="checkInputs()"></div>
                        <div class="megaOfertasCarsaleFormTxtCheck"><label class="labelCzFormMegaOferta" for="querFinanciar">Quero financiar</label></div>
                    </div>
                <div id="contentFinanciamento" class="hide" >
                    <span class="sombraDivisoria"></span>
                    <div class="megaOfertasCarsaleFormLineInputB financia">
                        <div class="megaOfertasCarsaleFormTxtLegenda"><label class="labelCzFormMegaOferta" for="querFinanciar">Entrada:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="hidden" name="propostaMegaOferta.valorEntradaFinanciamento" id="valorEntradaHidden">
                            <input type="text" class="megaOfertasCarsaleFormTrocaInput numeric numericFormated" name="valorEntradaFinanciamento" id="valorEntrada" maxlength="10">
                        </fieldset>
                        <div class="megaOfertasCarsaleFormTxtLegendaC"><label  class="labelCzFormMegaOferta" for="parcelas">Quantas parcelas:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="megaOfertasCarsaleFormTrocaInputParcelas" name="propostaMegaOferta.quantidadeParcelasFinanciamento" id="parcelas" maxlength="2">
                        </fieldset>
                    </div>
                    <span class="sombraDivisoria"></span>
                </div>
                    <div class="megaOfertasCarsaleFormLineInput trocaCheck">
                        <div class="megaOfertasCarsaleFormTxtLegenda"></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.temVeiculoTroca" id="checkboxTroca" onchange="checkInputs()"></div>
                        <div class="megaOfertasCarsaleFormTxtCheck"><label  class="labelCzFormMegaOferta" for="checkboxTroca">Quero dar veículo na troca</label></div>
                    </div> 
                </div>
                <div id="contentQuerTrocar" class="hide">
                    <div class="megaOfertasCarsaleFormLineInputB troca">
                        <div class="megaOfertasCarsaleFormTxtLegenda"><label  class="labelCzFormMegaOferta" for="checkboxTroca">Modelo:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="megaOfertasCarsaleFormTrocaInput" name="propostaMegaOferta.modeloVeiculoTroca">
                        </fieldset>
                        <div class="megaOfertasCarsaleFormTxtLegendaSeg"><label  class="labelCzFormMegaOferta" for="checkboxTroca">Versão:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="megaOfertasCarsaleFormTrocaInput" name="propostaMegaOferta.versaoVeiculoTroca">
                        </fieldset>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInputB troca">
                        <div class="megaOfertasCarsaleFormTxtLegenda"><label  class="labelCzFormMegaOferta" for="checkboxTroca">Motorização:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="megaOfertasCarsaleFormTrocaInput" name="propostaMegaOferta.motorVeiculoTroca" id="motor">
                        </fieldset>
                        <div class="megaOfertasCarsaleFormTxtLegendaSeg"><label  class="labelCzFormMegaOferta" for="checkboxTroca">Ano Modelo:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="megaOfertasCarsaleFormTrocaInput" name="propostaMegaOferta.anoVeiculoTroca" id="anoVeiculoTroca" maxlength="4">
                        </fieldset>
                    </div>                   
                    <div class="megaOfertasCarsaleFormLineInputB troca">
                        <div class="megaOfertasCarsaleFormTxtLegenda"><label  class="labelCzFormMegaOferta" for="checkboxTroca">Quilometragem:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <input type="text" class="megaOfertasCarsaleFormTrocaInput" name="propostaMegaOferta.kilometragemVeiculoTroca" id="kilometragemVeiculoTroca" maxlength="6">
                        </fieldset>
                        <div class="megaOfertasCarsaleFormTxtLegendaSeg"><label  class="labelCzFormMegaOferta" for="checkboxTroca">Cor:</label></div>
                        <select class="input_SelectWidht120" name="propostaMegaOferta.corVeiculoTroca">
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

                    <div class="megaOfertasCarsaleFormLineInputB troca">
                        <div class="megaOfertasCarsaleFormTxtLegenda"><label  class="labelCzFormMegaOferta" for="checkboxTroca">Câmbio:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <select class="input_SelectWidht120" name="propostaMegaOferta.cambioVeiculoTroca.id" id="cambioVeiculoTroca" style="width: 120px;">
                                <option value="">Selecione</option>
                                <option value="1">Automático</option>
                                <option value="2">Manual</option>
                            </select>
                        </fieldset>
                        <div class="megaOfertasCarsaleFormTxtLegendaPortas"><label  class="labelCzFormMegaOferta" for="checkboxTroca">Portas:</label></div>
                        <select class="input_SelectWidht120" name="propostaMegaOferta.quantidadePortasVeiculoTroca">
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
                        <div class="megaOfertasCarsaleFormTxtCheckPrincipais"><label class="labelCzFormMegaOferta" for="arCondicionado">Ar Condicionado</label></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.direcaoHidraulica" id="direcaoHidraulica"></div>
                        <div class="megaOfertasCarsaleFormTxtCheckPrincipais"><label class="labelCzFormMegaOferta" for="direcaoHidraulica">Direção Hidraulica</label></div>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInputB troca noTopPadding">
                        <div class="megaOfertasCarsaleFormTxtLegenda"></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.vidroEletrico" id="vidroEletrico"></div>
                        <div class="megaOfertasCarsaleFormTxtCheckPrincipais"><label class="labelCzFormMegaOferta" for="vidroEletrico">Vidro Elétrico</label></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.travaEletrica" id="travaEletrica"></div>
                        <div class="megaOfertasCarsaleFormTxtCheckPrincipais"><label class="labelCzFormMegaOferta" for="travaEletrica">Trava Elétrica</label></div>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInputB troca noTopPadding">
                        <div class="megaOfertasCarsaleFormTxtLegenda"></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.kitVisibilidade" id="kitVisibilidade"></div>
                        <div class="megaOfertasCarsaleFormTxtCheckPrincipais"><label class="labelCzFormMegaOferta" for="kitVisibilidade">Kit Visibilidade</label></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.rodaLigaLeve" id="rodaLigaLeve"></div>
                        <div class="megaOfertasCarsaleFormTxtCheckPrincipais"><label class="labelCzFormMegaOferta" for="rodaLigaLeve">Roda de liga leve</label></div>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInputB troca noTopPadding">
                        <div class="megaOfertasCarsaleFormTxtLegenda"></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.airBag" id="airbag"></div>
                        <div class="megaOfertasCarsaleFormTxtCheckPrincipais"><label class="labelCzFormMegaOferta" for="airbag">Airbag</label></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.freioAbs" id="freioAbs"></div>
                        <div class="megaOfertasCarsaleFormTxtCheckPrincipais"><label class="labelCzFormMegaOferta" for="freioAbs">Freio ABS</label></div>
                    </div>
                    <span class="sombraDivisoria"></span>
                    <div class="megaOfertasCarsaleFormLineMsgInput">
                        <div class="megaOfertasCarsaleFormTxtLegenda"><label  class="labelCzFormMegaOferta" for="observacao">Observações:</label></div>
                        <fieldset class="megaOfertasCarsaleFormInput">
                            <textarea title="" placeholder="Insira suas dúvidas" cols="62" rows="5" class="textArea_SelectWidhtObservacao" name="propostaMegaOferta.observacoes"></textarea>
                        </fieldset>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInput">
                        <div class="megaOfertasCarsaleFormTxtLegenda"></div>
                        <div class="megaOfertasCarsaleFormCheckBox"><input type="checkbox" name="propostaMegaOferta.queroReceberOfertas" id="newsletter"></div>
                        <div class="megaOfertasCarsaleFormTxtCheck"><label class="labelCzFormMegaOferta" for="newsletter">Quero receber ofertas e promoções do Carsale</label></div>
                    </div>
                    <div class="megaOfertasCarsaleFormLineInputBottom">
                        <div class="megaOfertasCarsaleFormTxtLegenda"></div>
                        <div class="megaOfertasCarsaleFormBtn">
                        <!--    <input type="submit" value="Enviar" />-->   
                        <input class="buttonFrmVm" type="submit" value="Enviar">
                            
                        </div>
                    </div>                   
                </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
<? 
$arrayModalVersion = array();
$arrayModalVersion[] = $res[versionId];
$arrayModalYear = array();
$arrayModalYear[] = $res[yearModel];
include ("../scripts/modalFeatureMakup.php");
include ("../includes/footer.php");
?>
<script>
function checkInputs(){
    if ($("#estado").val() == "SP") {
        $("#contentParaSp").removeClass("hide");
    } else {
        $("#contentParaSp").addClass("hide");
    }
    if ($("#querFinanciar")) {}
    if ($("#checkboxTroca")) {}
}
</script>

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
<link rel="stylesheet" type="text/css" href="megaOfertaFormulario.css" />
<link rel="stylesheet" type="text/css" href="http://noticias.carsale.uol.com.br/styles/megaOfertaOld.css" />
<link rel="stylesheet" type="text/css" href="http://noticias.carsale.uol.com.br/styles/megaOferta.css" />

</body>
</html>