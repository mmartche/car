<?
date_default_timezone_set("America/Sao_Paulo");
$horaEnquete = date('Hie');
$criptHora = md5($horaEnquete);
?>
	<div id="homeEnquete" class="enquetes chamadas">
		<h2 class="enqueteHeader"><span>Enquete</span></h2>
		<h4 class="enqueteTitle">De acordo com blablablablabla aslkdjasljad jsakjas</h4>
		<div class="enqueteFigure">
			<div class="enqFigure">
				<div class="enqCheckRight"></div>
				<img src="./imgs/testes/carro251x155.jpg" class="enqueteImg" />
			</div>
			<img src="./imgs/question.png" class="enqueteSubImg" />
		</div>
		<form action="#" onsubmit="return votaEnquete(this);" id="enqueteHome" class="enqueteForm">
		<input type="hidden" name="enqueteId" value="123" />
		<div class="chamadaMiddle">
			<input id="inputResult1" type="radio" name="inputEnquete" value="1" class="enqueteRadio" />
			<label for="inputResult1">
				<span class="fieldsEnquete">
					<span class="span">Golf</span>
				</span>
				<span class="inputStatus" id="inputStatus1"></span>
				<img class="imgRight" src="./imgs/testes/delorean.jpg" alt="..." title="" />
				<span class="resultEnquete" id="resultEnquete1">
					<div class="spanResultEnquete progress progress-striped">
						<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" >
							<span class="sr-only"></span>
						</div>
					</div>
					<div class="resultText"></div>
				</span>
			</label>
		</div>
		<div class="chamadaMiddle">
			<input id="inputResult2" type="radio" name="inputEnquete" value="2" class="enqueteRadio" />
			<label for="inputResult2">
				<span class="fieldsEnquete">
					<span class="span">Opala</span>
				</span>
				<span class="inputStatus" id="inputStatus2">
				</span>
				<img class="imgRight" src="./imgs/testes/delorean.jpg" alt="..." title="" />
				<span class="resultEnquete" id="resultEnquete2">
					<div class="spanResultEnquete progress progress-striped">
						<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
							<span class="sr-only"></span>
						</div>
					</div>
					<div class="resultText"></div>
				</span>
			</label>
		</div>
		<div class="chamadaMiddle">
			<input id="inputResult3" type="radio" name="inputEnquete" value="3" class="enqueteRadio" />
			<label for="inputResult3">
				<span class="fieldsEnquete">
					<span class="span">Delorean</span>
				</span>
				<span class="inputStatus" id="inputStatus3"></span>
				<img class="imgRight" src="./imgs/testes/delorean.jpg" alt="..." title="" />
				<span class="resultEnquete" id="resultEnquete3">
					<div class="spanResultEnquete progress progress-striped active">
						<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" >
							<span class="sr-only"></span>
						</div>
					</div>
					<div class="resultText"></div>
				</span>
			</label>
		</div>
		<div class="chamadaMiddle">
			<input id="inputResult3" type="radio" name="inputEnquete" value="3" class="enqueteRadio" />
			<label for="inputResult3">
				<span class="fieldsEnquete">
					<span class="span">Delorean</span>
				</span>
				<span class="inputStatus" id="inputStatus3"></span>
				<img class="imgRight" src="./imgs/testes/delorean.jpg" alt="..." title="" />
				<span class="resultEnquete" id="resultEnquete3">
					<div class="spanResultEnquete progress progress-striped active">
						<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" >
							<span class="sr-only"></span>
						</div>
					</div>
					<div class="resultText"></div>
				</span>
			</label>
		</div>
		<div class="chamadaMiddle">
			<input id="inputResult3" type="radio" name="inputEnquete" value="3" class="enqueteRadio" />
			<label for="inputResult3">
				<span class="fieldsEnquete">
					<span class="span">Delorean</span>
				</span>
				<span class="inputStatus" id="inputStatus3"></span>
				<img class="imgRight" src="./imgs/testes/delorean.jpg" alt="..." title="" />
				<span class="resultEnquete" id="resultEnquete3">
					<div class="spanResultEnquete progress progress-striped active">
						<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" >
							<span class="sr-only"></span>
						</div>
					</div>
					<div class="resultText"></div>
				</span>
			</label>
		</div>
		<div class="chamadaMiddle">
			<input id="inputResult3" type="radio" name="inputEnquete" value="3" class="enqueteRadio" />
			<label for="inputResult3">
				<span class="fieldsEnquete">
					<span class="span">Delorean</span>
				</span>
				<span class="inputStatus" id="inputStatus3"></span>
				<img class="imgRight" src="./imgs/testes/delorean.jpg" alt="..." title="" />
				<span class="resultEnquete" id="resultEnquete3">
					<div class="spanResultEnquete progress progress-striped active">
						<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" >
							<span class="sr-only"></span>
						</div>
					</div>
					<div class="resultText"></div>
				</span>
			</label>
		</div>
		<div class="chamadaMiddle last">
			<input id="inputResult3" type="radio" name="inputEnquete" value="3" class="enqueteRadio" />
			<label for="inputResult3">
				<span class="fieldsEnquete">
					<span class="span">Delorean</span>
				</span>
				<span class="inputStatus" id="inputStatus3"></span>
				<img class="imgRight" src="./imgs/testes/delorean.jpg" alt="..." title="" />
				<span class="resultEnquete" id="resultEnquete3">
					<div class="spanResultEnquete progress progress-striped active">
						<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" >
							<span class="sr-only"></span>
						</div>
					</div>
					<div class="resultText"></div>
				</span>
			</label>
		</div>
		<input type="button" id="btnEnqueteVotar" name="btnEnquete" value="Votar" class="btnSubmitEnquete enabled" />
		<div class="modalCaptcha">
			<div class="opacityWhite"></div>
			<div class="enqueteContent">
				<h5 class="captchaTitle">Digite o código de validaçāo</h5>
				<input type="text" placeholder="digite" class="captchaInput" />
				<div id="captcha" class="captchaCaptcha">
					<img src="./scripts/geraCaptcha.php?code=<?=$criptHora?>" alt="Informe este código no campo abaixo" />
				</div>
				<input type="submit" id="btnConfirmaVoto" name="btnSubmitEnquete" value="Confirma Voto" class="btnSubmitEnquete" />
			</div>
			<div class="enqClose">X</div>
		</div>
		</form>
	</div>