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

if(mysqli_num_rows($result) == 0) { $t[0] = "Não há notificações"; } else {
for($i = 0; $i < 3; $i ++) {
	if($titulos[$i] == "") {
		$t[$i] = " ";
	} else {
		$t[$i] = $titulos[$i];
	}
	if($descricoes[$i] == "") {
		$d[$i] = " ";
	} else {
		$d[$i] = $descricoes[$i];
	}
}
}

$tile = new SimpleXMLElement('<tile>
<visual lang="pt-BR" version="2">
<binding template="TileSquare150x150Text02" fallback="TileSquareBlock">
<text id="1">'.$t[0].'</text>
<text id="2">'.$d[0].'</text>
</binding>
<binding template="TileWide310x150Text09" branding="name">
<text id="1">'.$t[0].'</text>
<text id="2">'.$d[0].'</text>
</binding>
<binding template="TileSquare310x310TextList03" branding="name">
<text id="1">'.$t[0].'</text>
<text id="2">'.$d[0].'</text>
<text id="3">'.$t[1].'</text>
<text id="4">'.$d[1].'</text>
<text id="5">'.$t[2].'</text>
<text id="6">'.$d[2].'</text>
</binding>
</visual>
</tile>');
Header('Content-type: text/xml');
print($tile->asXML());
?>