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
// Última modificação em: 15/10/2014 22:40

	include("../connect_db.php");
	include("../values/other.php");
	include("pode_nao_pode.php");
		if($_GET['data'] == "true") {
			$data = "active"; $recente = "backbutton";
			$result = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala NOT IN ('gestao','biblioteca','cantina') AND sala NOT like ('%cartaz%') ORDER BY date");
		} else {
			$data = "backbutton"; $recente = "active";
			$result = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala NOT IN ('gestao','biblioteca','cantina') AND sala NOT like ('%cartaz%') ORDER BY id DESC");
		}
		$oque = "eventos";
		$title = "Gerenciar eventos";
?>
<html>
<head>
<?
include("../values/head.php");
	toTitle($title); ?>
</head>
<body>
<? toTitle2($title); if($oque == "eventos") { ?>
<section class="margin card center" style="padding: 0; margin-top: 10px;"><div class="<? echo $recente; ?>" style="width: 50%; float: left; border-left: none;" onclick="window.open('remover_eventos.php?oque=eventos', '_self');">Mais recentes</div><div class="<? echo $data; ?>" style="width: 50%;" onclick="window.open('remover_eventos.php?oque=eventos&data=true', '_self');">Ordenar por data</div></section>
<? }
while ($row = mysqli_fetch_array($result)) { ?>
<section class="margin card">
<p><b>Sala:</b> <? echo $row['sala']; ?></p>
<p><b>Data:</b> <? echo $row['data']; ?></p>
<p><b>Título:</b> <? echo $row['titulo']; ?></p>
<p><b>Descrição:</b> <? if($row['tipo'] == "1") { echo $row['descricao']; } else { echo str_replace("\n", "<br>", $row['descricao']); } ?></p>
<p id="addedby<? echo $row['id']; ?>"><b>Adicionado por:</b> <? echo $row['editadopor']; ?></p>
<? if($row['historico'] != "") { ?>
<b><a class="btn btn-flat" id="history<? echo $row['id']; ?>" onclick="historyShow(<? echo $row['id']; ?>)">Histórico de edições</a></b>
<p id="<? echo $row['id']; ?>" style="display: none;"><b>Histórico:</b><br><br><?
$history = json_decode($row['historico']);
foreach($history as $h) {
	echo $h;
} }
?></p>
</section>
<? }
if(mysqli_num_rows($result) == 0) { ?>
<section class="margin card">
	Não há <? echo $oque; ?>
</section>
<? }

include("../values/materialinit.php"); ?>
<script>
function historyShow(qual) {
	$('#' + qual).show();
	$('#addedby' + qual).hide();
	$('#history' + qual).hide();
}
</script>
</body>
</html>