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
?>
<? include("partes/default.php"); ?>
<html>
<head>
  <title>Sobre - RebuApp</title>
  <? include("partes/head.php"); ?>
  <? include('partes/polymer.imports.php'); ?>
  <? include("partes/jquery.php"); ?>
	<style shim-shadowdom>
.opcoes {
	display: block;
	margin: 0 auto;
	background: #ffffff;
	border-radius: 2px;
	box-shadow: rgba(0, 0, 0, 0.0980392) 0px 2px 4px 0px, rgba(0, 0, 0, 0.0980392) 0px 0px 3px 0px;
	padding: 25px;
}
	</style>
</head>

<body unresolved>
	 <core-drawer-panel id="drawerPanel">
		 <core-header-panel drawer>
	  <core-menu selected="15">
		  <? include("partes/drawer.php"); ?>
	  </core-menu>
		 </core-header-panel>

	<core-scroll-header-panel main mode="scroll" id="main">
	
    <core-toolbar id="defaultbar">
    <core-icon-button icon="menu" id="navicon"></core-icon-button>
    <span flex id="titulo">Sobre</span>
    </core-toolbar>
    <div class="container">
	<div class="opcoes">
		<h2>Aplicativo</h2>
		Aplicativo/site desenvolvido por <a href="http://google.com/+AlefeSouza/about" target="_blank">Alefe Souza</a>.
		<p>RebuApp &eacute; um <a href="https://play.google.com/store/apps/details?id=aloogle.rebuapp" target="_blank">aplicativo para Android</a> e web que cont&eacute;m o hor&aacute;rio e agenda de todas as salas, recados de clubes e eletivas, comunicados da dire&ccedil;&atilde;o, acesso à pesquisa de todos os livros dispon&iacute;veis na biblioteca, e atalhos para redes sociais da Escola Estadual Prof&ordm; Willian Rodrigues Rebu&aacute; em Carapicu&iacute;ba, S&atilde;o Paulo, Brasil.</p>
		<h2>Créditos</h2>
		O design da versão web desse aplicativo foi possível graças a:
		<p><a href="http://polymer-project.org" target="_blank">Polymer Project</a></p>
		<p><a href="https://github.com/FezVrasta/bootstrap-material-design" target="_blank">Bootstrap Material Design</a></p>
		<p><a href="http://ckeditor.com" target="_blank">CKEditor</a></p>
		<a href="https://github.com/jackmoore/autosize" target="_blank">Autosize</a>
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
</script>
<? include("partes/analyticstracking.php") ?>

</html>