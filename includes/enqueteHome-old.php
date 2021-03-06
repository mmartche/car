<?
date_default_timezone_set("America/Sao_Paulo");
$horaEnquete = date('Hie');
$criptHora = md5($horaEnquete);
?>
	<div id="homeEnquete" class="enquetes chamadas">
		<h2><span>Qual melhor carro?</span></h2>
		<form action="#" onsubmit="return votaEnquete(this);" id="enqueteHome">
		<h4>Vote no seu favorito</h4>
		<input type="hidden" name="enqueteId" value="123" />
		<div class="chamadaMiddle">
			<input id="inputResult1" type="radio" name="inputEnquete" value="1" class="enqueteRadio" />
			<label for="inputResult1">
				<span class="fieldsEnquete">
					<span class="span">Golf</span>
				</span>
				<span class="inputStatus" id="inputStatus1"></span>
				<img class="imgRight" src="http://www.extuning.com.br/product_images/y/645/parachoque_Traseiro_golf_9__46487_thumb.jpg" alt="..." title="" />
				<span class="resultEnquete" id="resultEnquete1">
					<span class="spanResultEnquete"></span>
				</span>
			</label>
		</div>
		<div class="chamadaMiddle">
			<input id="inputResult2" type="radio" name="inputEnquete" value="2" class="enqueteRadio" />
			<label for="inputResult2">
				<div class="fieldsEnquete">
					<span class="span">Opala</span>
				</div>
				<!--div class="progress progress-striped active">
					<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
						<span class="sr-only">60% Complete</span>
					</div>
				</div-->
				<div class="inputStatus" id="inputStatus2"></div>
				<img class="imgRight" src="http://vecchioveiculos.com.br/miniaturas/136188626334288TMB.JPG" alt="..." title="" />
				<div class="resultEnquete" id="resultEnquete2">
					<div class="spanResultEnquete"></div>
				</div>
			</label>
		</div>
		<div class="chamadaMiddle">
			<input id="inputResult3" type="radio" name="inputEnquete" value="3" class="enqueteRadio" />
			<label for="inputResult3">
				<div class="fieldsEnquete">
					<span class="span">Delorean</span>
				</div>
				<div class="inputStatus" id="inputStatus3"></div>
				<img class="imgRight" src="https://lh5.googleusercontent.com/proxy/u0s_GyiZRhYhRcyshnUgx7OREeVJQ3dHqG7wqzPfbDdevL-Vf4hsKMIzCPbSPAUZAfH-uemq0aMsjZ3Cusp3g8pusi9JW_rdp97tn0rN7sowPIl2JM4vAQ=w120-h120" alt="..." title="" />
				<div class="resultEnquete" id="resultEnquete3">
					<div class="spanResultEnquete"></div>
				</div>
			</label>
		</div>
		<input type="button" id="btnEnqueteVotar" name="btnEnquete" value="Votar" class="btnSubmitEnquete enabled" />
		<div class="modalCaptcha">
			<div class="enqueteContent">
				<h5>Digite o código de validaçāo</h5>
				<div id="captcha">
					<img src="./scripts/geraCaptcha.php?code=<?=$criptHora?>" alt="Informe este código no campo abaixo" />
				</div>
				<input type="text" />
				<input type="submit" id="btnConfirmaVoto" name="btnSubmitEnquete" value="Confirma Voto" class="btnSubmitEnquete" />
			</div>
		</div>
		</form>
	</div>