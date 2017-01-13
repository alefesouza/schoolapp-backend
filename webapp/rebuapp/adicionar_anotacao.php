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
// Última modificação em: 07/04/2015 03:12

	include("connect_db.php");
	include("partes/default.php"); ?>
<html>
<head>
<title>Adicionar anotação - RebuApp</title>
<? include("partes/head.php"); ?>
<? include("partes/polymer.imports.php"); ?>

<? include("partes/jquery.php"); ?>
<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/ripples.min.css" rel="stylesheet">
<script src="/libs/js/autosize/autosize.js"></script>

<style>
.list {
	padding: 30px;
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
    <span flex>Adicionar anotação</span>
    </core-toolbar>

    <div class="container">
<paper-shadow z="0" class="list">
<div class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label for="title" class="col-lg-2 control-label">Título</label>
            <div class="col-lg-10">
                <input name="title" type="text" class="form-control" id="title">
            </div>
        </div>
        <div class="form-group">
            <label for="editor1" class="col-lg-2 control-label">Descrição</label>
            <div class="col-lg-10">
				<textarea class="form-control" id="description"></textarea><br>
            </div>
        </div>
            <div class="col-lg-10 col-lg-offset-2">
				<button id="anotar" class="btn btn-primary">Anotar</button>&nbsp;&nbsp;<button onclick="window.location.replace('anotacoes.php');" class="btn btn-default">Cancelar</button>
            </div>
        </div>
    </fieldset>
</div>
</paper-shadow>
    </div></core-scroll-header-panel>
	  </core-drawer-panel>
<?
include('partes/notif.php');
parte1DaNotificacao(); ?>
</body>

<? include("http://apps.aloogle.net/schoolapp/rebua/painel/values/materialinit.php"); ?>

	<script>
document.addEventListener('polymer-ready', function() {
	<? include("partes/defaultscript.php");
	parte2DaNotificacao(); ?>
	autosize(document.querySelector('textarea'));
});
	
function addEntry() {
	if (!localStorage["lastNumber"]) {
		localStorage["lastNumber"] = 0;
	}

	var existingEntries = JSON.parse(localStorage.getItem("annotations"));
	if (existingEntries == null)
		existingEntries = [];
	var entryTitle = document.getElementById("title").value;
	var entryText = document.getElementById("description").value;
	x = parseInt(localStorage["lastNumber"]) + 1;
	var entry = {
		"id" : x,
		"title" : entryTitle,
		"description" : entryText
	};
	localStorage["lastNumber"] = x;
	localStorage.setItem("entry", JSON.stringify(entry));
	existingEntries.unshift(entry);
	localStorage.setItem("annotations", JSON.stringify(existingEntries));
	window.location.replace("anotacoes.php");
};

window.onload = function () {
	document.getElementById("anotar").onclick = function () {
		addEntry();
	}
}
	</script>
	<? include("partes/analyticstracking.php") ?>

</html>