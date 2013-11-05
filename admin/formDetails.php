<?
include ("scripts/checkPermissions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" />

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<!--meta http-equiv="Pragma" content="no-cache"/-->
	<meta name="robots" content="nofollow" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Carsale Administrativo</title>

	<script type="text/javascript" src="scripts/jquery.2.9.3.min.js"></script>
	<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="styles/index.css" />
	<link rel="stylesheet" type="text/css" href="styles/formDetails.css" />

</head>
<body name="formDetails">
<?
include("./scripts/conectDB.php");
$sql_search = "select feature.id as featureId, manufacturer.name as manufacturerName, model.name as modelName, version.name as versionName, feature.yearProduced, feature.yearModel from manufacturer, model, version, feature where feature.idManufacturer = manufacturer.id and feature.idModel = model.id and feature.idVersion = version.id and feature.id = ".$_GET[vehicle]." order by model.name";
$query_search = mysql_query($sql_search) or die (mysql_error()." error 79");
$res = mysql_fetch_array($query_search);
?>
<div class="body">
	<header>
		<div class="menu">
			<ul>
				<li><a href="#">Montadoras</a></li>
				<li><a href="#">Modelos</a></li>
			</ul>
		</div>
		<h1>Sistema administrativo - Detalhes do veículo</h1>
	</header>
	<div class="formSearch">
		<form action="" method="post" >
			<input type="text" />
			<input type="button" value="Buscar" />
		</form>
	</div>
	<div class="content">
		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li><a href="#">Honda</a></li>
			<li><a href="#">Civic</a>
			<li class="active">2013</li>
		</ol>
		<div class="dataContent">
			<div class="dataColLeft">
				<span><label>Montadora:</label><input type="text" id="txtManufacturer" value="<?=$res[manufacturerName]?>" /></span><br />
				<span><label>Modelo:</label><input type="text" id="txtModel" value="<?=$res[modelName]?>" /></span><br />
				<span><label>Versão:</label><input type="text" id="txtVersion" value="<?=$res[versionName]?>" /></span><br />
				<span><label>Quantidade de portas:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Quantidade de ocupantes:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Motor:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Alimentação:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Combustível:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Potência máxima:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Torque:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Aceleração:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Velocidade máxima (km/h):</label><input type="text" id="txtModel" /></span><br />
				<span><label>Consumo (km/l) na cidade:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Consumo (km/l) na estrada:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Direção:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Câmbio:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Tração:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Suspensão dianteira:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Suspensão traseira:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Freio dianteiro:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Freio traseiro:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Rodas:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Dimensão (mm):</label><input type="text" id="txtModel" /></span><br />
				<span><label>-Comprimento:</label><input type="text" id="txtModel" /></span><br />
				<span><label>-Largura:</label><input type="text" id="txtModel" /></span><br />
				<span><label>-Altura:</label><input type="text" id="txtModel" /></span><br />
				<span><label>-Entre eixos:</label><input type="text" id="txtModel" /></span><br />
				<span><label>Peso (kg):</label><input type="text" id="txtModel" /></span><br />
				<span><label>Porta malas (litros):</label><input type="text" id="txtModel" /></span><br />
				<span><label>Tanque (litros):</label><input type="text" id="txtModel" /></span><br />
				<span><label>Garantia:</label><input type="text" id="txtModel" /></span><br />
				<span><label>País de orígem:</label><input type="text" id="txtModel" /></span><br />
			</div>
			<div class="dataColRight">
				<div class="dataFeatures dataFields">
					<label>ACESSÓRIOS</label>
					<div class="optionsFeatures optionsFields">
						<span><input type="radio" /><input type="radio" /><input type="radio" />Trava Elétrica</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Desembaçador</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Vidro Elétrico</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" /> Airbag duplo frontal</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Alarme</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Ar condicionado</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Ar quente</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Banco de couro</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Banco do motorista com regulagem de altura</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Banco traseiro bipartido</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Bluetooth com viva-voz</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Capota marítima</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Computador de bordo</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Conta giros</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Desembaçador de vidro traseiro</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Direção hidráulica</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Estribos laterais</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Faróis de neblina/milha</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Faróis xenon</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Freios Abs</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />GPS integrado ao painel</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Limpador de vidro traseiro</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Para choque na cor do veículo</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Piloto automático</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Protetor de caçamba</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Rack de teto</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Radio cp player com entrada USB</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Regulagem de altura dos faróis</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Retrovisor elétrico</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Rodas de liga leve</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Sensor de chuva</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Sensor de estacionamento</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Sistema Isofix para cadeira de criança</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Teto solar</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Trava elétrica</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Vidro elétrico</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Vidro elétrico traseiro</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Volante com regulagem de altura</span>
					</div>
				</div>
				<div class="dataOptions dataFields">
					<label>OPCIONAIS (itens de série)</label>
					<div class="optionsOptions optionsFields">
						<span>insira novos itens sepando a cada linha</span>
						<span><input type="textarea" /><input type="button" value="+" /></span><br /><br />
						<label>Opcionais referente a este modelo</label><br />
						<span><input type="radio" /><input type="radio" /><input type="radio" />Trava Elétrica</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Desembaçador</span>
						<span><input type="radio" /><input type="radio" /><input type="radio" />Vidro Elétrico</span>
					</div>
				</div>
				<div class="dataColor dataFields">
					<label>CORES DISPONÍVEIS</label>
					<div class="optionsColor optionsFields">
						<span>insira uma nova cor</span>
						<span><div class="divColor"></div><input type="text" placeholder="qual nome?" /><input type="button" value="+" /></span>
						<span><div class="divColor"></div>Vermelho</span>
						<span><div class="divColor"></div>Branco</span>
						<span><div class="divColor"></div>Preto</span>
					</div>
				</div>
				<div class="dataPicture dataFields">
					<label>FOTOS</label>
					<div class="optionsPicture optionsFields">
						<span>Insira uma nova foto</span>
						<input type="text"><input type="button" value="pesquisar"><br />
						<input type="button" value="+">
						<ol class="listPictures">
							<li>
								<input type="checkbox" />
								<div class="btnDeletePicture"></div>
								<img src="#" />
							</li>
							<li>
								<input type="checkbox" />
								<div class="btnDeletePicture"></div>
								<img src="#" />
							</li>
							<li>
								<input type="checkbox" />
								<div class="btnDeletePicture"></div>
								<img src="#" />
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="relations">
			<span>Itens relacionados</span>
			<div class="dataRelationsFooter"></div>
			<div class="resultSearch">
				<ul class="resultList">
					<li class="resultHeader">
						<div class="rsItems"></div>
						<div class="rsManufacturer">Montadora</div>
						<div class="rsModel">Modelo</div>
						<div class="rsVersion">Versão</div>
						<div class="rsYear">Ano</div>
						<div class="rsOptions">Opcionais</div>
						<div class="rsPicture">Foto</div>
						<div class="rsSegment">Segmento</div>
						<div class="rsGear">Câmbio</div>
						<div class="rsOil">Combustível</div>
						<div class="rsAvaliable">Disponível</div>
					</li>
					<li class="resultFilter">
					<div class="rsItems"></div>
						<div class="rsManufacturer"><input type="text" id="txtRSManufacturer" /></div>
						<div class="rsModel"><input type="text" id="txtRSModel" /></div>
						<div class="rsVersion"><input type="text" id="txtRSVersion" /></div>
						<div class="rsYear"><input type="text" id="txtRSYear" /></div>
						<div class="rsOptions"><input type="text" id="txtRSOptions" /></div>
						<div class="rsPicture"><input type="text" id="txtRSPicture" /></div>
						<div class="rsSegment"><input type="text" id="txtRSSegment" /></div>
						<div class="rsGear"><input type="text" id="txtRSGear" /></div>
						<div class="rsOil"><input type="text" id="txtRSOil" /></div>
						<div class="rsAvaliable"><input type="text" id="txtRSAvaliable" /></div>
					</li>
					<li class="resultContent">
						<div class="rsItems">
							<div class="btnEdit"></div>
							<div class="btnDelete"></div>
							<div class="btnClone"></div>
							<div class="btnActive"></div>
						</div>
						<div class="rsManufacturer">Fiat</div>
						<div class="rsModel">Uno</div>
						<div class="rsVersion">Mille</div>
						<div class="rsYear">2010</div>
						<div class="rsOptions">Opcionais</div>
						<div class="rsPicture">Foto</div>
						<div class="rsSegment">Carro</div>
						<div class="rsGear">Manual</div>
						<div class="rsOil">Gasolina</div>
						<div class="rsAvaliable">Sim</div>
					</li>
					<li class="resultContent">
						<div class="rsItems">
							<div class="btnEdit"></div>
							<div class="btnDelete"></div>
							<div class="btnClone"></div>
							<div class="btnActive"></div>
						</div>
						<div class="rsManufacturer">Fiat</div>
						<div class="rsModel">Uno</div>
						<div class="rsVersion">Mille</div>
						<div class="rsYear">2010</div>
						<div class="rsOptions">Opcionais</div>
						<div class="rsPicture">Foto</div>
						<div class="rsSegment">Carro</div>
						<div class="rsGear">Manual</div>
						<div class="rsOil">Gasolina</div>
						<div class="rsAvaliable">Sim</div>
					</li>
				</ul>
			</div>
		</div>



	</div>








<footer>Copyright</footer>
</div>
</body>
</html>