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
// Última modificação em: 07/04/2015 15:13

	include("connect_db.php");
	$login_cookie = $_COOKIE['login'];
	$room = mysqli_query($dbi, "SELECT * FROM usuarios WHERE login='$login_cookie'");
	$info = mysqli_fetch_array($room);
	$busca = $_GET['q'];
?>
<? include("partes/default.php"); ?>
<html>
<head>
  <title>Biblioteca - RebuApp</title>
  <? include("partes/head.php"); ?>
  <? include('partes/livros.polymer.imports.php'); ?>
  <? include("partes/jquery.php"); ?>
</head>

<body unresolved>
	
	<? include('partes/topbutton.php'); ?>
	<paper-progress indeterminate id="loadalfabetica" style="position: absolute; bottom: 50%; margin-top: -2px; width: 100%; display: none;"></paper-progress>

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
    <core-toolbar>

    <core-icon-button icon="menu" id="navicon"></core-icon-button>
	<paper-input label="Pesquisar livro, autor ou editora" flex class="custom" id="q" name="q" value="<? echo $busca; ?>" onkeydown="suggest()"></paper-input>
   <core-tooltip label="Fazer pesquisa" position="bottom" class="fancy">
	   <core-icon-button icon="search" id="searchform" onclick="doSearch();"></core-icon-button>
	</core-tooltip>
    </core-toolbar>
	<div id="suggestions" class="list"></div>
	
    <div class="container">
<div id="conteudo">
<?
$result = mysqli_query($dbi, "SELECT * FROM livros WHERE trim(obra) like('%$busca%') OR trim(autor) like('%$busca%') OR trim(editora) like('%$busca%') order by trim(obra)");
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

if(mysqli_num_rows($result) == 0) { ?>
<paper-shadow z="0" class="littlecard" style="cursor: default;">Nenhum livro foi encontrado</paper-shadow>
<? } ?>
</div>
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

<? if(!isset($_COOKIE['avisolivros'])) { ?>
if(getCookie("avisolivros") != "true") {
	document.getElementById('avisolivros').toggle();
}
<? } ?>
});
		
$(function() {
$topbutton=$("#topbutton");
$topbutton.click(function() {document.querySelector('#main').scroller.scrollTop = 0;});
document.getElementById('main').onscroll = function() { if(document.querySelector('#main').scroller.scrollTop<=0){$topbutton.fadeOut("fast")}else{$topbutton.fadeIn("fast")} }; });

	function cancel() {
		$('#form').show();
		$('#search').hide();
		$('#back').show();
		$('#titulo').show();
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