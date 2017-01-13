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
// Última modificação em: 05/06/2015 19:27

include("../../connect_db.php");

$sala = $_GET['sala'];
$clube = $_GET['clube'];
$eletiva = $_GET['eletiva'];
if($_GET['responsavel'] == "true") { $isrespon = "responsaveis"; } else { $isrespon = ""; }

$result = mysqli_query($dbi, "SELECT * FROM notificacoes WHERE para IN ('$sala','$clube','$eletiva','todos','$isrespon') ORDER BY id DESC");
while ($row = mysqli_fetch_array($result)) {
	$titulos[] = $row['titulo'];
	$descricoes[] = $row['descricao'];
}

if(mysqli_num_rows($result) == 0) { $titulos[] = "Não há notificações"; $descricoes[] = ""; }

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

if(mysqli_num_rows($result) == 1) { $notifs = "Notificação"; } else { $notifs = "Notificações"; }

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
<text id="2">'.$notifs.'</text>
</binding>
<binding template="TileWide310x150BlockAndText01" branding="name">
<text id="1">'.mysqli_num_rows($result).'</text>
<text id="2">'.$notifs.'</text>'.$lista.'
</binding>
<binding template="TileSquare310x310BlockAndText01" branding="name">'.$lista2.'
<text id="8">'.mysqli_num_rows($result).'</text>
<text id="9">'.$notifs.'</text>
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
<text id="2">'.$notifs.'</text>
</binding>
<binding template="TileWide310x150BlockAndText01" branding="name">'.$lista.'
<text id="5">'.mysqli_num_rows($result).'</text>
<text id="6">'.$notifs.'</text>
</binding>
<binding template="TileSquare310x310BlockAndText01" branding="name">'.$lista2.'
<text id="8">'.mysqli_num_rows($result).'</text>
<text id="9">'.$notifs.'</text>
</binding>
</visual>
</tile>');
}
Header('Content-type: text/xml');
print($tile->asXML());
?>