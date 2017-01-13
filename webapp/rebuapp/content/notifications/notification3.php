<?php
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
// Última modificação em: 05/06/2015 19:26

include("../../connect_db.php");

$sala = $_GET['sala'];
$clube = $_GET['clube'];
$eletiva = $_GET['eletiva'];

$result = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala IN ('$sala','$clube','$eletiva','gestao') ORDER BY date");
while ($row = mysqli_fetch_array($result)) {
	if($row['tipo'] == "0") {
		$descricoes[] = $row['descricao'];
	} else {
		$descricoes[] = "";
	}
	$data = $row['data'];
	if ($row['data'] != "") {
		$data .= " - ";
	};
	
	$titulos[] = $data.$row['titulo'];
}

if(mysqli_num_rows($result) == 0) { $titulos[] = "Não há eventos"; $descricoes[] = ""; }

$lista2 = "";
$v = 1;
for($i = 0; $i < 3; $i ++) {
	if($titulos[$i] == "") {
		$t = " ";
	} else {
		$t = $titulos[$i];
	}
	if($descricoes[$i] == "") {
		$d = " ";
	} else {
		$d = $descricoes[$i];
	}
	$lista2 .= '<text id="'.$v.'">'.$t.'</text>';
	$v = $v + 1;
	$lista2 .= '<text id="'.$v.'">'.$d.'</text>';
	$v = $v + 1;
	if($i == 0) {
		$lista2 .= '<text id="'.$v.'"> </text>';
		$v = $v + 1;
	}
}

if(mysqli_num_rows($result) == 1) { $events = "Evento"; } else { $events = "Eventos"; }

if (!isset($_GET['isw8'])) {
    $lista = "";
$v = 2;
for($i = 0; $i < 4; $i ++) {
	$v = $v + 1;
	if($titulos[$i] == "") {
		$t = " ";
	} else {
		$t = $titulos[$i];
	}
	$lista .= '<text id="'.$v.'">'.$t.'</text>';
}

$tile = new SimpleXMLElement('<tile>
<visual lang="pt-BR" version="2">
<binding template="TileSquare150x150Block" fallback="TileSquareBlock">
<text id="1">'.mysqli_num_rows($result).'</text>
<text id="2">'.$events.'</text>
</binding>
<binding template="TileWide310x150BlockAndText01" branding="name">
<text id="1">'.mysqli_num_rows($result).'</text>
<text id="2">'.$events.'</text>'.$lista.'
</binding>
<binding template="TileSquare310x310BlockAndText01" branding="name">'.$lista2.'
<text id="8">'.mysqli_num_rows($result).'</text>
<text id="9">'.$events.'</text>
</binding>
</visual>
</tile>');
} else {
$lista = "";
for($i = 0; $i < 4; $i ++) {
	$v = $i + 1;
	if($titulos[$i] == "") {
		$t = " ";
	} else {
		$t = $titulos[$i];
	}
	$lista .= '<text id="'.$v.'">'.$t.'</text>';
}
$tile = new SimpleXMLElement('<tile>
<visual lang="pt-BR" version="2">
<binding template="TileSquare150x150Block" fallback="TileSquareBlock">
<text id="1">'.mysqli_num_rows($result).'</text>
<text id="2">'.$events.'</text>
</binding>
<binding template="TileWide310x150BlockAndText01" branding="name">'.$lista.'
<text id="5">'.mysqli_num_rows($result).'</text>
<text id="6">'.$events.'</text>
</binding>
<binding template="TileSquare310x310BlockAndText01" branding="name">'.$lista2.'
<text id="8">'.mysqli_num_rows($result).'</text>
<text id="9">'.$events.'</text>
</binding>
</visual>
</tile>');
}

Header('Content-type: text/xml');
print($tile->asXML());
?>