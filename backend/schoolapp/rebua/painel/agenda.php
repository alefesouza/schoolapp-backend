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
// Última modificação em: 08/05/2015 22:16

include("connect_db.php");
include("pode_nao_pode.php");

if($db_tipo == "representante" || $db_tipo == "convidado") { $evorre = "evento"; } else { $evorre = "recado"; }

$sala = $info['sala'];
?>
<html>
<head>
<? 
$title = "Gerenciar {$evorre}s";
include("values/head.php");
	toTitle($title); ?>
</head>
<body>
<? toTitle2($title); ?>
<?
$result = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala='$sala' ORDER BY data");
while ($row = mysqli_fetch_array($result)) { ?>
<section class="margin card" id="evento<? echo $row['id']; ?>">
<p><b><? echo $row['data'];
if ($row['data'] != "") {
	echo " - ";
};
echo $row['titulo']; ?></b></p>
<p><? if($row['tipo'] == "1") { $tipo = "true"; echo $row['descricao']; } else { $tipo = "false"; echo str_replace("\n", "<br>", $row['descricao']); } ?></p>
<? if($row['historico'] != "") { ?>
<p id="<? echo $row['id']; ?>" style="display: none;"><b>Histórico:</b><br><br><?
$history = json_decode($row['historico']);
foreach($history as $h) {
	echo $h;
} }
?></p>
<a class="btn btn-flat" onclick="window.open('editar_evento.php?id=<? echo $row['id']; ?>&aloogleapp=needinternet&editor=<? echo $tipo; ?>', '_self')"><b>Editar</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-flat" onclick="del('<? echo $row['id']; ?>')"><b>Apagar</b></a><? if($row['historico'] != "") { ?><a class="btn btn-flat" id="history<? echo $row['id']; ?>" onclick="historyShow(<? echo $row['id']; ?>)"><b>Histórico de edições</b></a><? } ?>
</section>
<? }

if(mysqli_num_rows($result) == 0) { ?>
<section class="margin card">
	Não há eventos
</section>
<? }

include("values/materialinit.php"); ?>
<script>
function historyShow(qual) {
	$('#' + qual).show();
	$('#addedby' + qual).hide();
	$('#history' + qual).hide();
}

function del(id) {
	$.ajax('apagar_evento.php?id=' + id)
	.done(function (json) {
		$("#evento" + id).remove();
	})
	.fail(function () {
		alert('Falha ao apagar evento');
	});
}
</script>
</body>
</html>