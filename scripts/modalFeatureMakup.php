<?
$arrayModalVersion = array_unique($arrayModalVersion);
for ($i=0; $i < count($arrayModalVersion); $i++) { 
	$sqlF = "SELECT *, feature.id as featureId, max(yearModel), megaOferta.picture as pictureMO, version.name as versionName from feature, megaOferta, version WHERE feature.idVersion = megaOferta.versionId and  feature.idVersion = '".$arrayModalVersion[$i]."' and feature.idVersion = version.id GROUP by feature.id";
	$queryF = mysql_query($sqlF) or die(mysql_error()."error #5");
	$resF = mysql_fetch_array($queryF);
?>
<style type="text/css">
.dealerFichaTecnicaImg {
    overflow: hidden;
}
.dealerFichaTecnicaTituloDesc, .dealerFichaTecnicaDescClaroLine, .dealerFichaTecnicaDescEscuroLine, .dealerFichaTecnicaTitulo {
    height: auto;
    min-height: 25px;
}
.dealerFichaTecnicaBgInterno {
    width: 100%;
    overflow: hidden;
}
.modal-body {
    overflow: hidden;
}
.descriptionItem {
    float: left;
    width: 100%;
}
.descItemSerie {
    font: 11px Arial, sans-serif;
    padding: 5px;
}
.descriptionItem>div:nth-child(odd) {
    background-color: #ccc;
}
</style>
<div class="modal fade" id="feature_<?=$arrayModalVersion[$i]?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?=$resF[versionName]?> - <?=$resF[pictureMO]?></h4>
      </div>
      <div class="modal-body">
        <div class="dealerFichaTecnicaBgInterno">
            <div class="dealerFichaTecnicaTitulo">Ficha Técnica</div>
            <?
                if (file_exists("../carImagesMegaOferta/".$resF[pictureMO])) {
                    $picture = "../carImagesMegaOferta/".$resF[pictureMO];
                } elseif (file_exists("../carImages/".$resF[picture])) {
                    $picture = "../carImages/".$resF[picture];
                } elseif (file_exists("http://carsale.uol.com.br/foto/".$resF[picture]."_g.jpg")) {
                    $picture = "http://carsale.uol.com.br/foto/".$resF[picture]."_g.jpg";
                } else {
                    $picture = "http://carsale.uol.com.br/foto/".$resF[picture]."_g.jpg";
                }
            ?>
            <div class="dealerFichaTecnicaImg"><img src="<?=$picture?>"></div>
            <div class="dealerFichaTecnicaTxtCarro"></div>
            <div class="dealerFichaTecnicaTxtLegenda">Foto meramente ilustrativa</div>
            <div class="dealerFichaTecnicaTituloDesc">Itens de série inclusos</div>
            <div class="descriptionItem">
            <?
            $sqlIS = "SELECT * FROM `serieFeature` where idFeature = '".$resF[featureId]."'";
            //echo $sqlIS;
            $queIS = mysql_query($sqlIS) or die (mysql_error()."error #64");
            while ($resIS = mysql_fetch_array($queIS)) {
            ?>
                <div class="descItemSerie"><?=$resIS[description]?></div>
            <?
            }
            ?>
            </div>
            <?
            switch (strtolower($resF[fuel])) {
                case 'g':
                    $fuelType = "Gasolina";
                    break;
                case 'f':
                    $fuelType = "Flex";
                    break;
                case 'a':
                    $fuelType = "Alcool";
                    break;
                case 'd':
                    $fuelType = "Diesel";
                    break;
                default:
                    $fuelType = "";
                    break;
            }
            ?>
            
            <?
            $result.='{
                "resFponse":"true",
                "featureId":"'.$resF[featureId].'",
                "modelName":"'.$resF[modelName].'",
                "versionName":"'.$resF[versionName].'",
                "code":"'.$resF[code].'",
                "engine":"'.$resF[engine].'",
                "doors":"'.$resF[doors].'",
                "acceleration":"'.$resF[acceleration].'",
                "passagers":"'.$resF[passagers].'",
                "speedMax":"'.$resF[speedMax].'",
                "powerMax":"'.$resF[powerMax].'",
                "steering":"'.$resF[steering].'",
                "fuel":"'.$fuelType.'",
                "feeding":"'.$resF[feeding].'",
                "torque":"'.$resF[torque].'",
                "traction":"'.$resF[traction].'",
                "frontSuspension":"'.$resF[frontSuspension].'",
                "rearSuspension":"'.$resF[rearSuspension].'",
                "frontBrake":"'.$resF[frontBrake].'",
                "wheels":"'.$resF[wheels].'",
                "dimensionLength":"'.$resF[dimensionLength].'",
                "dimensionHeight":"'.$resF[dimensionHeight].'",
                "dimensionWidth":"'.$resF[dimensionWidth].'",
                "rearBrake":"'.$resF[rearBrake].'",
                "weight":"'.$resF[weight].'",
                "trunk":"'.$resF[trunk].'",
                "tank":"'.$resF[tank].'",
                "dimensionSignAxes":"'.$resF[dimensionSignAxes].'",
                "warranty":"'.$resF[warranty].'",
                "gear":"'.$resF[gear].'",
                "consumptionCity":"'.$resF[consumptionCity].'",
                "consumptionRoad":"'.$resF[consumptionRoad].'",
                "yearModel":"'.$resF[yearModel].'",
                "yearProduced":"'.$resF[yearProduced].'",
                "picture":"'.$resF[picture].'",
                "dualFrontAirBag":"'.$resF[dualFrontAirBag].'",
                "electricSteering":"'.$resF[electricSteering].'",
                "hydraulicSteering":"'.$resF[hydraulicSteering].'",
                "airConditioning":"'.$resF[airConditioning].'",
                "leatherSeat":"'.$resF[leatherSeat].'",
                "alarm":"'.$resF[alarm].'",
                "autoGear":"'.$resF[autoGear].'",
                "absBrake":"'.$resF[absBrake].'",
                "traction4x4":"'.$resF[traction4x4].'",
                "countryOrigin":"'.$resF[countryOrigin].'",
                "hotAir":"'.$resF[hotAir].'",
                "heightAdjustment":"'.$resF[heightAdjustment].'",
                "rearSeatSplit":"'.$resF[rearSeatSplit].'",
                "bluetoothSpeakerphone":"'.$resF[bluetoothSpeakerphone].'",
                "bonnetSea":"'.$resF[bonnetSea].'",
                "onboardComputer":"'.$resF[onboardComputer].'",
                "accelerationCounter":"'.$resF[accelerationCounter].'",
                "rearWindowDefroster":"'.$resF[rearWindowDefroster].'",
                "sidesteps":"'.$resF[sidesteps].'",
                "fogLamps":"'.$resF[fogLamps].'",
                "xenonHeadlights":"'.$resF[xenonHeadlights].'",
                "integratedGPSPanel":"'.$resF[integratedGPSPanel].'",
                "rearWindowWiper":"'.$resF[rearWindowWiper].'",
                "bumper":"'.$resF[bumper].'",
                "autopilot":"'.$resF[autopilot].'",
                "bucketProtector":"'.$resF[bucketProtector].'",
                "roofRack":"'.$resF[roofRack].'",
                "cdplayerUSBInput":"'.$resF[cdplayerUSBInput].'",
                "radio":"'.$resF[radio].'";
                "headlightsHeightAdjustment":"'.$resF[headlightsHeightAdjustment].'",
                "rearviewElectric":"'.$resF[rearviewElectric].'",
                "alloyWheels":"'.$resF[alloyWheels].'",
                "rainSensor":"'.$resF[rainSensor].'",
                "parkingSensor":"'.$resF[parkingSensor].'",
                "isofix":"'.$resF[isofix].'",
                "sunroof":"'.$resF[sunroof].'",
                "electricLock":"'.$resF[electricLock].'",
                "electricWindow":"'.$resF[electricWindow].'",
                "rearElectricWindow":"'.$resF[rearElectricWindow].'",
                "steeringWheelAdjustment":"'.$resF[steeringWheelAdjustment].'",
                "description":"'.$resF[description].'",
                "active":"'.$resF[active].'",
                "price":"'.$resF[price].'"}';
            ?>
            
            <div class="dealerFichaTecnicaTituloDesc">Geral</div>
            <div class="dealerFichaTecnicaDescEscuroLine">
            	<div class="dealerFichaTecnicaDescLineTxtA">Ano Modelo</div>
                <div class="dealerFichaTecnicaDescLineTxtB"><?=$resF[yearModel]?></div>
            </div>
            <div class="dealerFichaTecnicaDescClaroLine">
            	<div class="dealerFichaTecnicaDescLineTxtA">Ano Fabricação</div>
                <div class="dealerFichaTecnicaDescLineTxtB"><?=$resF[yearProduced]?></div>
            </div>
            <div class="dealerFichaTecnicaDescEscuroLine">
            	<div class="dealerFichaTecnicaDescLineTxtA">Portas</div>
                <div class="dealerFichaTecnicaDescLineTxtB"><?=$resF[doors]?></div>
            </div>
            <div class="dealerFichaTecnicaDescClaroLine">
            	<div class="dealerFichaTecnicaDescLineTxtA">Ocupantes</div>
                <div class="dealerFichaTecnicaDescLineTxtB"><?=$resF[passagers]?></div>
            </div>
            <div class="dealerFichaTecnicaTituloDesc">Motor</div>
            <div class="dealerFichaTecnicaDescEscuroLine">
            	<div class="dealerFichaTecnicaDescLineTxtA">Motor</div>
                <div class="dealerFichaTecnicaDescLineTxtB"><?=$resF[engine]?></div>
            </div>
            <div class="dealerFichaTecnicaDescClaroLine">
            	<div class="dealerFichaTecnicaDescLineTxtA">Alimentação</div>
                <div class="dealerFichaTecnicaDescLineTxtB"><?=$resF[feeding]?></div>
            </div>
            <div class="dealerFichaTecnicaDescEscuroLine">
            	<div class="dealerFichaTecnicaDescLineTxtA">Combustível</div>
                <div class="dealerFichaTecnicaDescLineTxtB"><?=$fuelType?></div>
            </div>
            <div class="dealerFichaTecnicaDescClaroLine">
            	<div class="dealerFichaTecnicaDescLineTxtA">Potência (cv)</div>
                <div class="dealerFichaTecnicaDescLineTxtB"><?=$resF[powerMax]?></div>
            </div>
            <div class="dealerFichaTecnicaDescEscuroLine">
            	<div class="dealerFichaTecnicaDescLineTxtA">Torque (kgfm)</div>
                <div class="dealerFichaTecnicaDescLineTxtB"><?=$resF[torque]?></div>
            </div>
            <div class="dealerFichaTecnicaTituloDesc">Desempenho</div>
            <div class="dealerFichaTecnicaDescEscuroLine">
                <div class="dealerFichaTecnicaDescLineTxtA">Aceleração (0-100)</div>
                <div class="dealerFichaTecnicaDescLineTxtB"><?=$resF[acceleration]?></div>
            </div>
            <div class="dealerFichaTecnicaDescClaroLine">
                <div class="dealerFichaTecnicaDescLineTxtA">Velocidade (km/h)</div>
                <div class="dealerFichaTecnicaDescLineTxtB"><?=$resF[speedMax]?></div>
            </div>
            <div class="dealerFichaTecnicaDescEscuroLine">
                <div class="dealerFichaTecnicaDescLineTxtA">Consumo Cidade (km/l)</div>
                <div class="dealerFichaTecnicaDescLineTxtB"><?=$resF[consumptionCity]?></div>
            </div>
            <div class="dealerFichaTecnicaDescClaroLine">
                <div class="dealerFichaTecnicaDescLineTxtA">Consumo Estrada (km/l)</div>
                <div class="dealerFichaTecnicaDescLineTxtB"><?=$resF[consumptionRoad]?></div>
            </div>
            <div class="dealerFichaTecnicaTituloDesc">Dimensões</div>
            <div class="dealerFichaTecnicaDescEscuroLine">
                <div class="dealerFichaTecnicaDescLineTxtA">Comprimento</div>
                <div class="dealerFichaTecnicaDescLineTxtB"><?=$resF[dimensionWidth]?></div>
            </div>
            <div class="dealerFichaTecnicaDescClaroLine">
                <div class="dealerFichaTecnicaDescLineTxtA">Largura</div>
                <div class="dealerFichaTecnicaDescLineTxtB"><?=$resF[dimensionLength]?></div>
            </div>
            <div class="dealerFichaTecnicaDescEscuroLine">
                <div class="dealerFichaTecnicaDescLineTxtA">Altura</div>
                <div class="dealerFichaTecnicaDescLineTxtB"><?=$resF[dimensionHeight]?></div>
            </div>
            <div class="dealerFichaTecnicaDescClaroLine">
                <div class="dealerFichaTecnicaDescLineTxtA">Entre Eixos</div>
                <div class="dealerFichaTecnicaDescLineTxtB"><?=$resF[dimensionSignAxes]?></div>
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
?>