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
// Última modificação em: 08/04/2015 14:08

	include("connect_db.php");
	$id = $_GET['id'];
	$query = mysqli_query($dbi, "SELECT * FROM eventos WHERE id='$id'");
	$info = mysqli_fetch_array($query);
?>
<? include("partes/default.php"); ?>
<html>
<head>
  <title><? echo $info['titulo']; ?> - RebuApp</title>
  <? include("partes/head.php") ?>
<script src="/libs/polymer/components/webcomponentsjs/webcomponents.js"></script>
<link rel="import" href="/libs/polymer/components/font-roboto/roboto.html">
<link rel="import" href="/libs/polymer/components/core-toolbar/core-toolbar.html">
<link rel="import" href="/libs/polymer/components/core-icon-button/core-icon-button.html">
<link rel="import" href="/libs/polymer/components/core-icons/core-icons.html">
<? include("partes/tablestyle.php") ?>
<style>
html, body {
	background: #ffffff;
}

.container {
	width: 95%;
	margin: 10px;
}

img {
	margin-right: auto;
	margin-left: auto;
	max-width: 100%;
}
	
@media (min-width: 600px) {
	.container {
		margin: 25px;
	}

	img {
		display: block;
		margin-right: auto;
		margin-left: auto;
		max-width: 600px;
	}
}
</style>
</head>

<body unresolved>
	
	<core-scroll-header-panel main mode="scroll" id="main">
	
    <core-toolbar>
    <core-icon-button icon="arrow-back" onclick="goBack();"></core-icon-button>
    <span flex id="titulo"><? echo $info['titulo']; ?></span>
    </core-toolbar>
    <div class="container">
	<?
		if(!$_GET['special'] == "true") {
		echo "<p><b>".$info['data'];
		if ($info['data'] != "") {
			echo " - ";
		};
		echo $info['titulo']."</b>";}
	if($info['tipo'] == "0") {
		echo "<p>".str_replace("\n", "<br>", $info['descricao'])."</p>";
	} else {
		echo "<p>".$info['descricao']."</p>";
	}
	?>
    </div>
	</core-scroll-header-panel>
<?
include('partes/notif.php');
parte1DaNotificacao(); ?>
</body>

<script type="text/javascript">
document.addEventListener('polymer-ready', function() {
	<? parte2DaNotificacao(); ?>
});

function goBack() {
<? if ($isie) { ?>
	if (window.history.length <= 1) {
<? } else { ?>
	if (document.referrer == "") {
<? } ?>
		window.close();
	} else {
		window.history.back();
	}
}
</script>
<? include("partes/analyticstracking.php") ?>
</html>