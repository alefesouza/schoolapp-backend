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
  <title>Notificações - RebuApp</title>
  <? include("partes/head.php"); ?>
  <? include('partes/polymer.imports.php'); ?>
  <? include("partes/jquery.php"); ?>
<style>
hr {
	border: 0px;
	height: 1px;
	background: #e0e0e0;
}
</style>
</head>

<body unresolved>
	<? if($_COOKIE['painel'] == "true") { include('partes/editbutton.php'); } ?>

	 <core-drawer-panel id="drawerPanel">
		 <core-header-panel drawer>
	  <core-menu selected="5">
		  <? include("partes/drawer.php"); ?>
	  </core-menu>
		 </core-header-panel>

	<core-scroll-header-panel main mode="scroll" id="main">
	
    <core-toolbar id="defaultbar">
    <core-icon-button icon="menu" id="navicon"></core-icon-button>
    <span flex id="titulo">Notificações</span>
    </core-toolbar>
    <div class="container">
	<?
$result = mysqli_query($dbi, "SELECT * FROM notificacoes WHERE para IN ('$sala','$clube','$eletiva','todos','$isrespon','$cantina') ORDER BY id DESC");
$count = 0;
$max = mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result)) {
		echo "<paper-shadow z=\"0\" class=\"card\">\n";
		echo "<b>".$row['titulo']."</b>";
		echo "<p>".$row['descricao']."</p>";
		echo "<hr>";
		echo $row['sumario']."";
		echo "</paper-shadow>\n";
	}

if(mysqli_num_rows($result) == 0) { ?>
<paper-shadow z="0" class="littlecard" style="cursor: default;">Não há notificações</paper-shadow>
<? } ?>
    </div></core-scroll-header-panel>

	  </core-drawer-panel>
</body>

<script>
document.addEventListener('polymer-ready', function() {
	<? include("partes/defaultscript.php"); ?>
});
</script>
<? include("partes/analyticstracking.php") ?>

</html>