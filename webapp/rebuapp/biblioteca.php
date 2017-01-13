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
	$sql = "SELECT * FROM livros";
	$total = "SELECT * FROM eventos WHERE sala='biblioteca'";
	$totalrecados = mysqli_query($dbi, $total);
	$num = mysqli_num_rows($totalrecados);

function catCard($category, $name) {
	global $dbi;
	$count = 0;
	$linhas = mysqli_num_rows(mysqli_query($dbi, "SELECT * FROM livros WHERE categoria='$category'"));
	$random = mysqli_query($dbi, "SELECT * FROM livros WHERE categoria='$category' ORDER BY RAND() LIMIT 3");
	echo "<paper-shadow z=\"0\" class=\"card clickable cardlivro\" style=\"cursor: pointer;\" onclick=\"window.open('livros.php?categoria=".$category."', '_self');\"><h2>".$name."</h2><font style=\"color: #ff0000;\">".$linhas."</font> livros<br>";
	while ($row = mysqli_fetch_array($random)) { $count = $count + 1; echo trim ($row['obra']); if($count != "3") { echo "<font color=\"#ff0000\">,</font> "; }}
	echo "...<paper-ripple fit class=\"recenteringTouch\"></paper-ripple></paper-shadow>";
} 
?>
<? include("partes/default.php"); ?>
<html>
<head>
  <title>Biblioteca - RebuApp</title>
  <? include("partes/head.php"); ?>
  <? include("partes/polymer.imports.php"); ?>
  <? include("partes/jquery.php"); ?>
<link rel="import" href="/libs/polymer/components/core-icons/hardware-icons.html">
<link rel="import" href="/libs/polymer/components/paper-input/paper-input.html">
</head>

<body unresolved>
	<? include("partes/analyticstracking.php") ?>
	<? include('partes/topbutton.php'); ?>
	
	 <core-drawer-panel id="drawerPanel">
		 <core-header-panel drawer>
	  <core-menu selected="6">
	  <? include("partes/drawer.php"); ?>
	  </core-menu>
		 </core-header-panel>

		 <core-scroll-header-panel main id="main">
    <core-toolbar id="defaultbar">

    <core-icon-button icon="menu" id="navicon"></core-icon-button>
    <span flex>Biblioteca</span>
    <core-tooltip label="Pesquisar" position="bottom" class="fancy">
    		<core-icon-button icon="search" onclick="search();" id="search"></core-icon-button>
	</core-tooltip>
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
<? if(!$num == 0) { ?>
<paper-shadow z="0" class="littlecard clickable" onclick="window.open('bibliotecarecados.php', '_self');"><? if($num == 1) { $rec = "recado"; } else { $rec = "recados"; } echo "<font color='#ff0000'>".$num."</font> ".$rec." da biblioteca"; ?><paper-ripple fit class="recenteringTouch"></paper-ripple></paper-shadow>
<? } ?>
<paper-shadow z="0" class="littlecard clickable" onclick="window.open('livros.php', '_self');">Total de 
<? echo "<font style=\"color: #ff0000;\">".mysqli_num_rows(mysqli_query($dbi, $sql))."</font>"; ?> livros cadastrados<paper-ripple fit class="recenteringTouch"></paper-ripple></paper-shadow>
<? include("partes/other.php"); ?>
<?
	$livrosarray = getArray("livros", false);
	$livrosarrayvalue = getArray("livros", true);
	for($i = 0; $i < count($livrosarray); $i++) {
		catCard($livrosarrayvalue[$i], $livrosarray[$i]);
	}
?>
</div></div>
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
		
$(function() {
$topbutton=$("#topbutton");
$topbutton.click(function() {document.querySelector('#main').scroller.scrollTop = 0;});
document.getElementById('main').onscroll = function() { if(document.querySelector('#main').scroller.scrollTop<=0){$topbutton.fadeOut("fast")}else{$topbutton.fadeIn("fast")} };
});

	function search() {
		$('#searchbar').show();
		$('#q').focus();
		$('#defaultbar').hide();
	}
		
	function cancel() {
		$('#defaultbar').show();
    	$('#suggestions').html("");
		$('#suggestions').hide();
		$('#searchbar').hide();
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
