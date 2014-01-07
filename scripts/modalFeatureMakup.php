<?
$arrayModalVersion = array_unique($arrayModalVersion);
for ($i=0; $i < count($arrayModalVersion); $i++) { 
	$sqlF = "SELECT *, max(yearModel) from feature WHERE idVersion = '".$arrayModalVersion[$i]."' GROUP by feature.id";
	$queryF = mysql_query($sqlF) or die("error #140");
	$resF = mysql_fetch_array($queryF);
?>
<div class="modal fade" id="feature_<?=$arrayModalVersion[$i]?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?=$resF[idVersion]?> - <?=$arrayModalVersion[$i]?></h4>
      </div>
      <div class="modal-body">
        <div class="dealerFichaTecnicaBgInterno">
            <div class="dealerFichaTecnicaTitulo">Ficha Técnica</div>
            <div class="dealerFichaTecnicaImg"><img src="http://carsale.uol.com.br/foto/fiestaHatchRocam2010_20120309_G.jpg"></div>
            <div class="dealerFichaTecnicaTxtCarro"></div>
            <div class="dealerFichaTecnicaTxtLegenda">Foto meramente ilustrativa</div>
            <div class="dealerFichaTecnicaTituloDesc">Itens de série inclusos</div>
            <div class="dealerFichaTecnicaLineDescEscuro">4 Alto-falantes </div>
            <div class="dealerFichaTecnicaLineDescClaro">Abertura elétrica do porta-malas </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Air bag duplo (motorista/passageiro) </div>
            <div class="dealerFichaTecnicaLineDescClaro">Ajuste de altura da coluna de direção </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Ajuste manual de altura do banco do motorista </div>
            <div class="dealerFichaTecnicaLineDescClaro">Alarme perimétrico </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Alerta de manutenção programada por tempo e/ou quilometragem </div>
            <div class="dealerFichaTecnicaLineDescClaro">Alças de segurança dianteira e traseira </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Antena de teto </div>
            <div class="dealerFichaTecnicaLineDescClaro">Aquecedor </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Ar condicionado </div>
            <div class="dealerFichaTecnicaLineDescClaro">Aviso sonoro dos faróis acesos </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Banco traseiro bipartido e rebatível </div>
            <div class="dealerFichaTecnicaLineDescClaro">Bancos com encosto de cabeça ajustáveis e removíveis </div>
            <div class="dealerFichaTecnicaLineDescEscuro">arra estabilizadora dianteira </div>
            <div class="dealerFichaTecnicaLineDescClaro">Barras de proteção laterais </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Calotas Pulse </div>
            <div class="dealerFichaTecnicaLineDescClaro">Cintos de segurança dianteiros com ajuste de altura </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Cintos de segurança traseiros retratéis de 3 pontos </div>
            <div class="dealerFichaTecnicaLineDescClaro">Computador de bordo </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Console central integral com porta-objetos </div>
            <div class="dealerFichaTecnicaLineDescClaro">Conta-giros (Tacômetro) </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Desembaçador do vidro traseiro </div>
            <div class="dealerFichaTecnicaLineDescClaro">Direção hidráulica </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Emblema SE</div>
            <div class="dealerFichaTecnicaLineDescClaro">spelho de cortesia (motorista) </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Espelho de cortesia (passageiro) </div>
            <div class="dealerFichaTecnicaLineDescClaro">Espelho retrovisor externo do motorista com controle manual interno</div>
            <div class="dealerFichaTecnicaLineDescEscuro">Espelho retrovisor externo do passageiro com controle manual</div>
            <div class="dealerFichaTecnicaLineDescClaro">Espelhos retrovisores externos na cor do veículo </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Faróis de neblina </div>
            <div class="dealerFichaTecnicaLineDescClaro">Faróis dianteiros com acabamento cromado </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Faróis dianteiros com dupla parábola </div>
            <div class="dealerFichaTecnicaLineDescClaro">Forro lateral do porta-malas </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Freios ABS </div>
            <div class="dealerFichaTecnicaLineDescClaro">luminação do porta-malas </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Lavador e limpador do vidro traseiro </div>
            <div class="dealerFichaTecnicaLineDescClaro">Luz de cortesia com temporizador </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Luz de leitura dianteira direcional </div>
            <div class="dealerFichaTecnicaLineDescClaro">Luz elevada de freio (Brake-light) </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Maçanetas externas das portas na cor do veículo </div>
            <div class="dealerFichaTecnicaLineDescClaro">PATS - Sistema Ford antifurto </div>
            <div class="dealerFichaTecnicaLineDescEscuro">Painel central; maçanetas internas e anel da saída de ar cor</div>
            <div class="dealerFichaTecnicaLineDescClaro"> Pneus 175/65 aro 14 </div>
            <div class="dealerFichaTecnicaLineDescEscuro"> Porta-objetos nas portas dianteiras </div>
            <div class="dealerFichaTecnicaLineDescClaro">Porta-objetos no painel </div>
            <div class="dealerFichaTecnicaLineDescEscuro"> Porta-revistas no encosto do banco do passageiro </div>
            <div class="dealerFichaTecnicaLineDescClaro"> Preparação para som (portas) </div>
            <div class="dealerFichaTecnicaLineDescEscuro"> Pára-brisa laminado </div>
            <div class="dealerFichaTecnicaLineDescClaro"> Pára-choques pintados na cor do veículo </div>
            <div class="dealerFichaTecnicaLineDescEscuro"> Relógio digital </div>
            <div class="dealerFichaTecnicaLineDescClaro"> Rodas de aço aro 14 </div>
            <div class="dealerFichaTecnicaLineDescEscuro"> Régua da tampa do porta-malas na cor do veículo </div>
            <div class="dealerFichaTecnicaLineDescClaro">Tanque de combustível com capacidade para 54 Litros </div>
            <div class="dealerFichaTecnicaLineDescEscuro"> Trava elétrica das portas com controle remoto </div>
            <div class="dealerFichaTecnicaLineDescClaro"> Travamento e retravamento automático das portas a 15 km/h </div>
            <div class="dealerFichaTecnicaLineDescEscuro"> Vidros elétricos dianteiros com 1 toque para baixo (motorista) </div>
            <div class="dealerFichaTecnicaLineDescClaro"> Vidros verdes escurecidos (70% de transparência) </div>
            
            <div class="dealerFichaTecnicaTituloDesc">Geral</div>
            <div class="dealerFichaTecnicaDescEscuroLine">
            	<div class="dealerFichaTecnicaDescLineTxtA">Ano Modelo</div>
                <div class="dealerFichaTecnicaDescLineTxtB">2014</div>
            </div>
            <div class="dealerFichaTecnicaDescClaroLine">
            	<div class="dealerFichaTecnicaDescLineTxtA">Ano Fabricação</div>
                <div class="dealerFichaTecnicaDescLineTxtB">2013</div>
            </div>
            <div class="dealerFichaTecnicaDescEscuroLine">
            	<div class="dealerFichaTecnicaDescLineTxtA">Portas</div>
                <div class="dealerFichaTecnicaDescLineTxtB">5</div>
            </div>
            <div class="dealerFichaTecnicaDescClaroLine">
            	<div class="dealerFichaTecnicaDescLineTxtA">Ocupantes</div>
                <div class="dealerFichaTecnicaDescLineTxtB">5</div>
            </div>
            <div class="dealerFichaTecnicaTituloDesc">Motor</div>
            <div class="dealerFichaTecnicaDescEscuroLine">
            	<div class="dealerFichaTecnicaDescLineTxtA">Motor</div>
                <div class="dealerFichaTecnicaDescLineTxtB">Rocam 1.6L Flex</div>
            </div>
            <div class="dealerFichaTecnicaDescClaroLine">
            	<div class="dealerFichaTecnicaDescLineTxtA">Alimentação</div>
                <div class="dealerFichaTecnicaDescLineTxtB">Injeção eletrônica multiponto seqüencial</div>
            </div>
            <div class="dealerFichaTecnicaDescEscuroLine">
            	<div class="dealerFichaTecnicaDescLineTxtA">Combustível</div>
                <div class="dealerFichaTecnicaDescLineTxtB">Flex</div>
            </div>
            <div class="dealerFichaTecnicaDescClaroLine">
            	<div class="dealerFichaTecnicaDescLineTxtA">Potência (cv)</div>
                <div class="dealerFichaTecnicaDescLineTxtB">101 (G)/ 106 (A)</div>
            </div>
            <div class="dealerFichaTecnicaDescEscuroLine">
            	<div class="dealerFichaTecnicaDescLineTxtA">Torque (kgfm)</div>
                <div class="dealerFichaTecnicaDescLineTxtB">14,5 (G)/ 15,3 (A)</div>
            </div>
            <div class="dealerFichaTecnicaTituloDesc">Desempenho</div>
            <div class="dealerFichaTecnicaDescEscuroLine">
                <div class="dealerFichaTecnicaDescLineTxtA">Aceleração (0-100)</div>
                <div class="dealerFichaTecnicaDescLineTxtB">18,6 (G/A)</div>
            </div>
            <div class="dealerFichaTecnicaDescClaroLine">
                <div class="dealerFichaTecnicaDescLineTxtA">Velocidade (km/h)</div>
                <div class="dealerFichaTecnicaDescLineTxtB">146 (G/A)</div>
            </div>
            <div class="dealerFichaTecnicaDescEscuroLine">
                <div class="dealerFichaTecnicaDescLineTxtA">Consumo Cidade (km/l)</div>
                <div class="dealerFichaTecnicaDescLineTxtB">10,4 (G) / 7,7 (A)</div>
            </div>
            <div class="dealerFichaTecnicaDescClaroLine">
                <div class="dealerFichaTecnicaDescLineTxtA">Consumo Estrada (km/l)</div>
                <div class="dealerFichaTecnicaDescLineTxtB">15,7 (G) / 11,7 (A)</div>
            </div>
            <div class="dealerFichaTecnicaTituloDesc">Dimensões</div>
            <div class="dealerFichaTecnicaDescEscuroLine">
                <div class="dealerFichaTecnicaDescLineTxtA">Comprimento</div>
                <div class="dealerFichaTecnicaDescLineTxtB">3,930 m</div>
            </div>
            <div class="dealerFichaTecnicaDescClaroLine">
                <div class="dealerFichaTecnicaDescLineTxtA">Largura</div>
                <div class="dealerFichaTecnicaDescLineTxtB">1,903 m</div>
            </div>
            <div class="dealerFichaTecnicaDescEscuroLine">
                <div class="dealerFichaTecnicaDescLineTxtA">Altura</div>
                <div class="dealerFichaTecnicaDescLineTxtB">1,451 m</div>
            </div>
            <div class="dealerFichaTecnicaDescClaroLine">
                <div class="dealerFichaTecnicaDescLineTxtA">Entre Eixos</div>
                <div class="dealerFichaTecnicaDescLineTxtB">2,488 m</div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<?
}