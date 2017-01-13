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
?>
<? include("partes/default.php"); ?>
<html>
<head>
  <title>Anotações - RebuApp</title>
  <? include("partes/head.php"); ?>
  <? include("partes/polymer.imports.php"); ?>
  <? include("partes/jquery.php"); ?>
<style>
a:hover {
	cursor: pointer;
}
</style>
</head>

<body unresolved>
	
	 <core-drawer-panel id="drawerPanel">
		 <core-header-panel drawer>
	  <core-menu selected="8">
	  <? include("partes/drawer.php"); ?>
	  </core-menu>
		 </core-header-panel>

		 <core-scroll-header-panel main id="main">
    <core-toolbar id="defaultbar">

    <core-icon-button icon="menu" id="navicon"></core-icon-button>
    <span flex>Anotações</span>
    </core-toolbar>

    <div class="container">
<paper-shadow z="0" class="littlecard clickable" onclick="window.location.replace('adicionar_anotacao.php');">Adicionar anotação<paper-ripple fit class="recenteringTouch"></paper-ripple></paper-shadow>
<div id="annotations">
<script>
var annotations = JSON.parse(localStorage.annotations); 
for (var i=0; i < annotations.length; i++) {
  document.write("<paper-shadow z=\"0\" class=\"card\" id=\"anotacao" + i + "\">");
  document.write("<p><b>" + JSON.parse(localStorage.getItem("annotations"))[i].title + "</b></p>");
  document.write("<p>" + JSON.parse(localStorage.getItem("annotations"))[i].description + "</p>");
  document.write("<a onclick=\"Delete(" + JSON.parse(localStorage.getItem("annotations"))[i].id + "); document.getElementById('anotacao" + i + "').style.display = 'none';\" style=\"color: #0000ff; float: right;\">Apagar</a>");
  document.write("</paper-shadow>");
}
</script>
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
});

function Delete(id) {
for ( var i = 0; i < annotations.length; i++ ) {
    if (annotations[i].id === parseInt(id)) {
        annotations.splice(i,1); 
    }
}

localStorage.annotations = JSON.stringify(annotations);

function _GET(name){
    var url = window.location.search.replace("?", "");
    var itens = url.split("&");

    for(n in itens){
        if(itens[n].match(name)){
            return decodeURIComponent(itens[n].replace(name+"=", ""));
        }
    }
} }
	</script>

	<script>
function Delete(id) {
for ( var i = 0; i < annotations.length; i++ ) {
    if (annotations[i].id === parseInt(id)) {
        annotations.splice(i,1); 
    }
}

localStorage.annotations = JSON.stringify(annotations);

function _GET(name){
    var url = window.location.search.replace("?", "");
    var itens = url.split("&");

    for(n in itens){
        if(itens[n].match(name)){
            return decodeURIComponent(itens[n].replace(name+"=", ""));
        }
    }
} }
	</script>
	<? include("partes/analyticstracking.php") ?>
</html>