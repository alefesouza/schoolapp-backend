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
// Última modificação em: 04/10/2015 23:40

include("../connect_db.php");
include("../values/other.php");
include("pode_nao_pode.php");

if($_GET['data'] == "true") {
	$data = "active"; $recente = "backbutton";
	$result = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala NOT IN ('gestao','biblioteca','cantina','cartazprecosdacantina') AND sala NOT like ('%cartaz%') ORDER BY date");
} else {
	$data = "backbutton"; $recente = "active";
	$result = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala NOT IN ('gestao','biblioteca','cantina','cartazprecosdacantina') AND sala NOT like ('%cartaz%') ORDER BY id DESC");
}
?>
<html>
<head>
<? 
$title = "Gerenciar eventos";
include("../values/head.php");
	toTitle($title); ?>
</head>
<body>
<? toTitle2($title); ?>
<section class="margin card center" style="padding: 0; margin-top: 10px;"><div class="<? echo $recente; ?>" style="width: 50%; float: left; border-left: none;" onclick="window.open('agenda.php', '_self');">Mais recentes</div><div class="<? echo $data; ?>" style="width: 50%;" onclick="window.open('agenda.php?data=true', '_self');">Ordenar por data</div></section>
<?
while ($row = mysqli_fetch_array($result)) {
if(strpos($row['sala'], 'clube') !== false) {
	$sala = "Clube de ".getAll($row['sala']);
} else if(strpos($row['sala'], 'eletiva') !== false) {
	$sala = "Eletiva de ".getAll($row['sala']);
} else if (getAll($row['sala']) != "") {
	$sala = "".getAll($row['sala']);
} else {
	$sala = $row['sala'];
} ?>
<section class="margin card">
<p><b>Sala:</b> <? echo $sala; ?></p>
<p><b>Data:</b> <? echo $row['data']; ?></p>
<p><b>Título:</b> <? echo $row['titulo']; ?></p>
<p><b>Descrição:</b> <? if($row['tipo'] == "1") { $tipo = "true"; echo $row['descricao']; } else { $tipo = "false"; echo str_replace("\n", "<br>", $row['descricao']); } ?></p>
<? if($row['historico'] != "") { ?>
<p id="<? echo $row['id']; ?>" style="display: none;"><b>Histórico:</b><br><br><?
$history = json_decode($row['historico']);
foreach($history as $h) {
	echo $h;
} }
?></p>
<a class="btn btn-flat" onclick="window.open('editar_evento.php?id=<? echo $row['id']; ?>&aloogleapp=needinternet&editor=<? echo $tipo; ?>', '_self')"><b>Editar</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-flat" onclick="window.open('apagar_evento.php?id=<? echo $row['id']; ?>&aloogleapp=needinternet&url=<? echo urlencode($_SERVER[REQUEST_URI]); ?>', '_self');"><b>Apagar</b></a><? if($row['historico'] != "") { ?><a class="btn btn-flat" id="history<? echo $row['id']; ?>" onclick="historyShow(<? echo $row['id']; ?>)"><b>Histórico de edições</b></a><? } ?>
</section>
<? }

if(mysqli_num_rows($result) == 0) { ?>
<section class="margin card">
	Não há eventos
</section>
<? }

include("../values/materialinit.php"); ?>
<script>
function historyShow(qual) {
	$('#' + qual).show();
	$('#history' + qual).hide();
}
</script>
</body>
</html>