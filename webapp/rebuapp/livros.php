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
// Última modificação em: 07/04/2015 03:15

	include("connect_db.php");
	$categoria = $_GET['categoria'];
?>
<? include("partes/default.php"); ?>
<html>
<head>
<title>Biblioteca - RebuApp</title>
<? include("partes/head.php") ?>
<? include("partes/jquery.php"); ?>

<? include('partes/livros.polymer.imports.php') ?>
</head>

<body unresolved>
	<? include('partes/topbutton.php'); ?>
	<paper-progress indeterminate id="loadalfabetica"></paper-progress>

<? if(!isset($_COOKIE['avisolivros'])) { ?>
	<paper-action-dialog style="width: 20%; min-width: 300px;" heading="RebuApp" id="avisolivros" transition="core-transition-center" backdrop autoCloseDisabled>
		<p>Clique em um card para pesquisar o livro no Google, onde você pode ver mais informações como capa e resenhas.</p>
		<paper-button affirmative autofocus onclick="document.cookie='avisolivros=true; expires=Fri,01 Jan 2016 12:00:00 UTC';">OK</paper-button>
	</paper-action-dialog>
<? } ?>
	
	 <core-drawer-panel id="drawerPanel">
		 <core-header-panel drawer>
	  <core-menu selected="6">
		  <? include("partes/drawer.php"); ?>
	  </core-menu>
		 </core-header-panel>

	<core-scroll-header-panel main mode="scroll" id="main">
	
    <core-toolbar class="perfect-for-tabs" id="defaultbar">
    <core-icon-button icon="menu" id="navicon"></core-icon-button>
    <span flex id="titulo">Biblioteca</span>
    <core-tooltip label="Pesquisar" position="bottom" class="fancy">
		<core-icon-button icon="search" onclick="search();" id="search"></core-icon-button>
	</core-tooltip>
	<br><div class="bottom fit" horizontal layout>
      <paper-tabs id="tabs" selected="all" self-end>
        <paper-tab name="all" id="guiarecentes">Mais recentes</paper-tab>
        <paper-tab name="favorites" id="guiaalfabetica">Ordem Alfabetica</paper-tab>
      </paper-tabs>
		</div>
    </core-toolbar>
			 
	<core-toolbar style="display: none;" id="searchbar">
	<paper-input label="Pesquisar livro, autor ou editora" flex class="custom" id="q" name="q" value="<? echo $busca; ?>" onkeydown="suggest()"></paper-input>
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
<paper-shadow z="0" class="littlecard" style="cursor: default;"><? include("partes/categoria2.php"); ?></paper-shadow>
<?
if(isset($categoria)) {
$result = mysqli_query($dbi, "SELECT * FROM livros WHERE categoria='$categoria' ORDER BY id DESC LIMIT 15");
while ($row = mysqli_fetch_array($result)) { ?>
<paper-shadow z="0" class="card clickable cardlivro" onclick="window.open('https://google.com.br/search?q=<? echo $row['obra']; ?> <? echo $row['autor']; ?>')">
<h3><? echo $row['obra']; ?></h3>
<p><b>Autor:</b> <? echo $row['autor']; ?></p>
</p><p><b>Editora:</b> <? echo $row['editora']; ?></p>
<p><b>Quantidade:</b> <? echo $row['quantidade']; ?></p>
<paper-ripple fit class="recenteringTouch"></paper-ripple>
</paper-shadow>
<?
		$id_id=$row['id'];
}
} else {
$result = mysqli_query($dbi, "SELECT * FROM livros ORDER BY id DESC LIMIT 15");
while ($row = mysqli_fetch_array($result)) { ?>
<paper-shadow z="0" class="card clickable cardlivro" touch-action="pan-x pan-y" onclick="window.open('https://google.com.br/search?q=<? echo $row['obra']; ?> <? echo $row['autor']; ?>')">
<h3><? echo $row['obra']; ?></h3>
<p><b>Autor:</b> <? echo $row['autor']; ?></p>
<p><b>Categoria:</b> <? include('partes/categoria.php'); ?>
</p><p><b>Editora:</b> <? echo $row['editora']; ?></p>
<p><b>Quantidade:</b> <? echo $row['quantidade']; ?></p>
<paper-ripple fit class="recenteringTouch"></paper-ripple>
</paper-shadow>
<?
		$id_id=$row['id'];
}
}
?>
</div>
<? if(mysqli_num_rows($result) == 15) { ?>
<paper-shadow z="0" class="load_more littlecard clickable" touch-action="pan-x pan-y" id="<?php echo $id_id; ?>"><font id="loadtext">Carregar mais</font><paper-spinner id="load" style="display:none;" active></paper-spinner><paper-ripple fit class="recenteringTouch"></paper-ripple></paper-shadow>
<? } else { ?>
<paper-shadow z="0" class="littlecard" id="nomore">Não há mais resultados</paper-shadow>
<? } ?>
<div id="alfabetica" style="display: none;"></div>
    </div></core-scroll-header-panel>

	  </core-drawer-panel>
<?
include('partes/notif.php');
parte1DaNotificacao(); ?>
</body>
	
<? include("partes/livros.js.php") ?>
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
	window.open('busca.php?q=' + document.getElementById('q').value, '_self');
}

function suggest() {
	$('#suggestions').show();
	<? include("partes/ajax_suggestion.php"); ?>
	
	if (event.keyCode == '13') {
		window.open('busca.php?q=' + document.getElementById('q').value, '_self');
	}
}
</script>
<? include("partes/analyticstracking.php") ?>

</html>