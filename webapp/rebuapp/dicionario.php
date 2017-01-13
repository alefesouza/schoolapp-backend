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

$palavra = $_GET['palavra'];
if(isset($palavra)) {

$json = @file_get_contents('http://dicionario-aberto.net/search-json/'.$palavra);
if($json === FALSE) { } else {
$site = json_decode($json);
if($site -> superEntry != null) {
	$nome = $site -> superEntry[0] -> entry -> form -> orth;
} else {
	$nome = $site -> entry -> form -> orth;
	$descricao = $site -> entry -> sense;
	$orig = preg_replace('/_([^_]+)_/', '<i>$1</i>', $site -> entry -> etym -> {'#text'});
}
}
}
?>
<? include("partes/default.php"); ?>
<html>
<head>
<title>Dicionário - RebuApp</title>
<? include("partes/head.php") ?>
<? include("partes/jquery.php"); ?>

<? include('partes/polymer.imports.php') ?>
<link rel="import" href="/libs/polymer/components/paper-input/paper-input.html">
</head>

<body unresolved>
	 <core-drawer-panel id="drawerPanel">
		 <core-header-panel drawer>
	  <core-menu selected="9">
		  <? include("partes/drawer.php"); ?>
	  </core-menu>
		 </core-header-panel>

	<core-scroll-header-panel main mode="scroll" id="main">
	
    <core-toolbar id="defaultbar">
    <core-icon-button icon="menu" id="navicon"></core-icon-button>
	<span flex id="titulo">Dicionário<? if(isset($palavra)) { echo ": ".$nome; } ?></span>
    <core-tooltip label="Pesquisar" position="bottom" class="fancy">
		<core-icon-button icon="search" onclick="search();" id="search"></core-icon-button>
	</core-tooltip>
    </core-toolbar>
			 
	<core-toolbar style="display: none;" id="searchbar">
	<paper-input label="Pesquisar palavra" flex class="custom" id="q" name="q" onkeydown="suggest()"></paper-input>
   <core-tooltip label="Fazer pesquisa" position="bottom" class="fancy">
	   <core-icon-button icon="search" id="searchform" onclick="doSearch();"></core-icon-button>
	</core-tooltip>
	<core-tooltip label="Cancelar" position="bottom" class="fancy">
		<core-icon-button icon="close" id="cancel" onclick="cancel();"></core-icon-button>
	</core-tooltip>
    </core-toolbar>
	<div id="suggestions" class="list"></div>
	
    <div class="container">
<div id="conteudo">
<?
if($palavra) {
if($site -> superEntry != null) {
$super = $site -> superEntry;

for($a = 0; $a < count($super); $a++) {
$descricao = $site -> superEntry[$a] -> entry -> sense;
for($i = 0; $i < count($descricao); $i++) {
	$gramGrp = $descricao[$i] -> gramGrp;
	$termo = $descricao[$i] -> usg -> {'#text'};
	if($gramGrp == "") { $gramGrp = ""; }
	if($termo == "") { $termo = ""; }
	$def = preg_replace('/_([^_]+)_/', '<i>$1</i>', $descricao[$i] -> def);
	echo "<paper-shadow z=\"0\" class=\"littlecard\" style=\"cursor: default; font-weight: normal;\"><i>{$gramGrp} {$termo}</i><p>{$def}</p></paper-shadow>";
}
}
} else {
for($i = 0; $i < count($descricao); $i++) {
	$gramGrp = $descricao[$i] -> gramGrp;
	$termo = $descricao[$i] -> usg -> {'#text'};
	if($gramGrp == "") { $gramGrp = ""; }
	if($termo == "") { $termo = ""; }
	$def = preg_replace('/_([^_]+)_/', '<i>$1</i>', $descricao[$i] -> def);
	echo "<paper-shadow z=\"0\" class=\"littlecard\" style=\"cursor: default; font-weight: normal;\"><i>{$gramGrp} {$termo}</i><p>{$def}</p></paper-shadow>";
}
}
if($orig != "") {
echo "<paper-shadow z=\"0\" class=\"littlecard\" style=\"cursor: default; font-weight: normal;\">{$orig}</paper-shadow>";}
echo "<paper-shadow z=\"0\" class=\"littlecard clickable\" onclick=\"window.open('http://dicionario-aberto.net/estaticos/abrev.html');\">Informações de dicionario-aberto.net, clique aqui para ajuda com abreviações<paper-ripple fit class=\"recenteringTouch\"></paper-ripple></paper-shadow>";
} else { ?>
	<paper-shadow z="0" class="littlecard" style="cursor: default;">Clique no ícone de lupa para buscar o significado de uma palavra.</paper-shadow>
<? } ?>
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

<script>
function search() {
	$('#searchbar').show();
	$('#q').focus();
	$('#defaultbar').hide();
}
		
function cancel() {
	$('#defaultbar').show();
	$('#searchbar').hide();
    $('#suggestions').html("");
	$('#suggestions').hide();
}
		
function doSearch() {
	window.open('dicionario.php?palavra=' + document.getElementById('q').value, '_self');
}

function suggest() {
	$('#suggestions').show();
	$.ajax({
		type: "POST",
		url: "ajax_dicsuggestion.php",
		data: {"palavra" : document.getElementById('q').value }, 
		beforeSend: function() {
			$("#suggestions").html("");
		},
		success: function(html) {
				$("#suggestions").html(html);
		}
	});
	
	if (event.keyCode == '13') {
		window.open('dicionario.php?palavra=' + document.getElementById('q').value, '_self');
	}
}
</script>
<? include("partes/analyticstracking.php") ?>

</html>