<?
/*
 * Copyright (C) 2015 Alefe Souza <contato@alefesouza.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
// Última modificação em: 26/03/2015 15:57

$palavra = $_GET['palavra'];

$json = @file_get_contents('http://dicionario-aberto.net/search-json/'.$palavra);
if($json === FALSE) { echo "{ \"nome\": \"\", \"descricoes\": [ { \"genero\": \"\", \"termo\": \"\", \"significado\": ".json_encode("Palavra não encontrada, certifique-se de usar pontuações corretamente.")." } ], \"orig\": \"\" }"; } else {
$site = json_decode($json);
if($site -> superEntry != null) {
	$nome = $site -> superEntry[0] -> entry -> form -> orth;
} else {
	$nome = $site -> entry -> form -> orth;
	$descricao = $site -> entry -> sense;
	$orig = preg_replace('/_([^_]+)_/', '<i>$1</i>', $site -> entry -> etym -> {'#text'});
}

echo "{ \"nome\": \"".$nome."\", \"descricoes\": [ ";

if($site -> superEntry != null) {
$super = $site -> superEntry;
$total = 0;
$count = 0;

for($a = 0; $a < count($super); $a++) {
$descricao = $site -> superEntry[$a] -> entry -> sense;
for($i = 0; $i < count($descricao); $i++) { $total += 1; } }

for($a = 0; $a < count($super); $a++) {
$descricao = $site -> superEntry[$a] -> entry -> sense;
for($i = 0; $i < count($descricao); $i++) {
	$gramGrp = $descricao[$i] -> gramGrp;
	$termo = $descricao[$i] -> usg -> {'#text'};
	if($gramGrp == "") { $gramGrp = ""; }
	if($termo == "") { $termo = ""; }
	$def = preg_replace('/_([^_]+)_/', '<i>$1</i>', $descricao[$i] -> def);
	echo "{ \"genero\": ".json_encode($gramGrp).", \"termo\": ".json_encode($termo).", \"significado\": ".json_encode($def)." }";
	$count += 1;
	if($count < $total) {
		echo ", ";
	}
}
}
} else {
for($i = 0; $i < count($descricao); $i++) {
	$gramGrp = $descricao[$i] -> gramGrp;
	$termo = $descricao[$i] -> usg -> {'#text'};
	if($gramGrp == "") { $gramGrp = ""; }
	if($termo == "") { $termo = ""; }
	$def = preg_replace('/_([^_]+)_/', '<i>$1</i>', $descricao[$i] -> def);
	$def = preg_replace('/\[\[([^_]+)\]\]/', '<a href="http://apps.aloogle.net/schoolapp/rebua/dicionario?palavra=$1">$1</a>', $def);
	$def = str_replace(':1', '', $def); $def = str_replace(':2', '', $def);
	echo "{ \"genero\": ".json_encode($gramGrp).", \"termo\": ".json_encode($termo).", \"significado\": ".json_encode($def)." }";
	if($i < count($descricao) - 1) {
		echo ", ";
	}
}
}
if($orig == "") { $orig = ""; }
echo " ], \"orig\": ".json_encode($orig).", \"creditos\": ".json_encode("Informações de dicionario-aberto.net, toque aqui para ajuda com abreviações").", \"creditoslink\": ".json_encode("http://dicionario-aberto.net/estaticos/abrev.html")." }"; }
?>