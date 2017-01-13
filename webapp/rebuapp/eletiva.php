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
// Última modificação em: 07/04/2015 03:14

	include("connect_db.php");
?>
<? include("partes/default.php"); ?>
<html>
<head>
<title>Eletiva - RebuApp</title>
<? include("partes/head.php"); ?>
<? include('partes/polymer.imports.php'); ?>
<? include("partes/jquery.php"); ?>
<? include("partes/tablestyle.php"); ?>
</head>

<body unresolved>
	<? if($_COOKIE['painel'] == "true") { include('partes/editbutton.php'); } ?>

	 <core-drawer-panel id="drawerPanel">
		 <core-header-panel drawer>
	  <core-menu selected="3">
		  <? include("partes/drawer.php"); ?>
	  </core-menu>
		 </core-header-panel>

	<core-scroll-header-panel main mode="scroll" id="main">
	
    <core-toolbar id="defaultbar">
    <core-icon-button icon="menu" id="navicon"></core-icon-button>
    <span flex id="titulo">Eletiva</span>
    </core-toolbar>
    <div class="container">
<? include("partes/other.php"); ?>
<?
if(isset($eletiva)) {
$grupoid = getGrupoID($eletiva); 
if($grupoid == "") {
} else {
	$grupo = " onclick=\"window.open('http://www.facebook.com/groups/{$grupoid}')\"";
}
} else {
	$grupo = " onclick=\"window.open('configuracoes.php', '_self')\"";
}
?>
<paper-shadow z="0" class="littlecard<? if(isset($grupo) || !isset($eletiva)) { echo " clickable\""; } else { ?>" style="cursor: default;"<? } echo "".$grupo; ?>><? echo getEletiva($eletiva); ?> <? if(isset($grupo) || !isset($eletiva)) { echo "<paper-ripple fit class=\"recenteringTouch\"></paper-ripple>"; } ?></paper-shadow>
	<?
$result = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala='$eletiva' ORDER BY date");
$count = 0;
$max = mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result)) { ?>
<paper-shadow z="0" class="card clickable" touch-action="pan-x pan-y" onclick="window.open('evento.php?id=<? echo $row['id']; ?>', '_self');">
	<?	echo "<p><b>".$row['data'];
		if ($row['data'] != "") {
			echo " - ";
		};
		echo $row['titulo']."</b>";
	if($row['tipo'] == "0") {
		echo "<p>".str_replace("\n", "<br>", $row['descricao'])."</p>";
	} else {
		echo "<p>".$row['descricao']."</p>";
	} ?>
<paper-ripple fit class="recenteringTouch"></paper-ripple>
</paper-shadow>
<?	}

if(mysqli_num_rows($result) == 0) {
	if(isset($eletiva)) { ?>
<paper-shadow z="0" class="littlecard" style="cursor: default;">Não há recados da sua eletiva</paper-shadow>
<? } } ?>
    </div></core-scroll-header-panel>

	  </core-drawer-panel>
<?
include('partes/notif.php');
parte1DaNotificacao(); ?>
</body>

<script>
document.addEventListener('polymer-ready', function() {
	<? include("partes/defaultscript.php");
	parte2DaNotificacao(); ?>
});
</script>
<? include("partes/analyticstracking.php") ?>

</html>