<?
/*
steps:
1.
gerar cripto referente a hora atual:
-
date_default_timezone_set("America/Sao_Paulo");
$horaEnquete = date('Hie');
$criptHora = md5($horaEnquete);
-

2.
validar se a chave gerada é igual a chave informada (envio 4 caracteres, verificar se esses 4 estao dentro da chave gerada)

3.
se nao validado, retornar erro
'{
	"idEnquete":"1",
	"resultadoEnquete":{},
	"resultadoAcao":"false",
	"codError":"1"
}'

4.
validado? bele, imprime esse trecho
'{
"idEnquete": "1",
"resultadoEnquete":{
	"opt1Id":"1",
	"opt1Nome":"Golf",
	"opt1Votos":"1",
	"opt2Id":"2",
	"opt2Nome":"Opalao",
	"opt2Votos":"10",
	"opt3Id":"3",
	"opt3Nome":"Delorean",
	"opt3Votos":"10"
	},
"resultadoAcao":"true",
"codError":"0"
}'

*/
echo ('{
	"idEnquete": "1",
	"resultadoEnquete":{
		"opt1Id":"1",
		"opt1Nome":"Golf",
		"opt1Votos":"16",
		"opt2Id":"2",
		"opt2Nome":"Opalao",
		"opt2Votos":"10",
		"opt3Id":"3",
		"opt3Nome":"Delorean",
		"opt3Votos":"70"
		},
	"resultadoAcao":"true",
	"codError":"0"
	}');
/*
echo ('{
	"idEnquete": "1",
	"resultadoEnquete1":[
		"optId":"1",
		"optName":"Golf",
		"optVotes":"2222",
		"optOrdem":"1"
		],
	"resultadoEnquete1":[
		"optId":"2",
		"optName":"Opalao",
		"optVotes":"1",
		"optOrdem":"2"
		],
	"resultadoEnquete3":[
		"optId":"3",
		"optName":"Delorean",
		"optVotes":"9372992",
		"optOrdem":"3"
		]
	}');
*/

?>