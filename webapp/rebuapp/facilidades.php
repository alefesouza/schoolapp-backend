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
// Última modificação em: 27/07/2015 00:44

header('Content-Type: text/html; charset=utf-8');
include("connect_db.php");
include("partes/default.php");

function googleChrome($forYou) { ?>
	<paper-shadow class="card2" onclick="window.open('facilidades2.php?oque=googlechrome', '_self')">
	<img class="image" src="imagens/facilidades/googlechrome.jpg">
	<h2><? if ($forYou == true) { echo "Para você: Extensão de Google Chrome"; } else { echo "Para Google Chrome"; } ?></h2>
		<p>Com a extensão de Google Chrome do RebuApp você recebe novas notificações do Rebuá quando abre o navegador e enquanto navega.</p>
		Também acesse os eventos da escola muito mais rapidamente e em qualquer página, e mesmo sem acesso à internet, exatamente como no aplicativo para Android.
	<paper-ripple fit class="recenteringTouch"></paper-ripple>
	</paper-shadow>
<? }

function iOS($forYou) { ?>
	<paper-shadow class="card2" onclick="window.open('facilidades2.php?oque=ios', '_self')">
	<img class="image" src="imagens/facilidades/iphone.jpg">
	<h2><? if ($forYou == true) { echo "Para você: Atalho no iPhone/iPad"; } else { echo "Para iPhone/iPad"; } ?></h2>
		<p>Adicionando o atalho do RebuApp na tela inicial você pode acessa-lo mais rapidamente, e sem as barras do Safari, assim ficando como qualquer outro aplicativo.</p>
	<paper-ripple fit class="recenteringTouch"></paper-ripple>
	</paper-shadow>
<? }

function windowsPhone($forYou) { ?>
	<paper-shadow class="card2" onclick="window.open('facilidades2.php?oque=windowsphone', '_self')">
	<img class="image" src="imagens/facilidades/windowsphone.jpg">
	<h2><? if ($forYou == true) { echo "Para você: Live tile no Windows Phone"; } else { echo "Para Windows Phone"; } ?></h2>
		<p>Adicione um atalho e acompanhe suas notificações e eventos a partir da tela inicial com o RebuApp no Windows Phone.</p>
	<paper-ripple fit class="recenteringTouch"></paper-ripple>
	</paper-shadow>
<? }

function windows8($forYou) { ?>
	<paper-shadow class="card2" onclick="window.open('facilidades2.php?oque=windows8', '_self')">
	<img class="image" src="imagens/facilidades/windows8.jpg">
	<h2><? if ($forYou == true) { echo "Para você: Live tile no Windows 8"; } else { echo "Para Windows 8"; } ?></h2>
		<p>Assim como no Windows Phone, tenha um atalho e acompanhe suas notificações a partir da tela inicial adicionando o RebuApp no Windows 8.</p>
	<paper-ripple fit class="recenteringTouch"></paper-ripple>
	</paper-shadow>
<? }

function internetExplorer($forYou) { ?>
	<paper-shadow class="card2" onclick="window.open('facilidades2.php?oque=internetexplorer', '_self')">
	<img class="image" src="imagens/facilidades/internetexplorer.jpg">
	<h2><? if ($forYou == true) { echo "Para você: Atalho na barra de tarefas"; } else { echo "Para Internet Explorer 10/Windows 7"; } ?></h2>
		<p>Usando o Internet Explorer no Windows 7 você pode adicionar um atalho do RebuApp na barra de tarefas exibindo as últimas notificações e alguns atalhos ao clicar com o botão direito do mouse.</p>
	<paper-ripple fit class="recenteringTouch"></paper-ripple>
	</paper-shadow>
<? }

function firefox($forYou) { ?>
	<paper-shadow class="card2" onclick="window.open('facilidades2.php?oque=firefox', '_self')">
	<img class="image" src="imagens/facilidades/firefox.jpg">
	<h2><? if ($forYou == true) { $isforyou = " (navegador ou Firefox OS)"; echo "Para você: Web app do Firefox"; } else { $isforyou = ""; echo "Para Firefox (navegador ou Firefox OS)"; } ?></h2>
		<p>Adicionando o RebuApp como aplicativo web no Firefox<? echo $isforyou; ?> você pode acessa-lo mais rapidamente, e sem as barras do navegador, assim ficando como qualquer outro aplicativo.</p>
	<paper-ripple fit class="recenteringTouch"></paper-ripple>
	</paper-shadow>
<? } ?>
<html>
<head>
  <title>Facilidades - RebuApp</title>
  <? include("partes/head.php"); ?>
  <? include("partes/polymer.imports.php"); ?>
  <? include("partes/jquery.php"); ?>

<style shim-shadowdom>
.card2 {
	display: block;
	margin: 0 auto;
	background: #ffffff;
	border-radius: 2px;
	padding: 20px;
	margin-top: 10px;
	overflow: auto;
	box-shadow: rgba(0, 0, 0, 0.0980392) 0px 2px 4px 0px, rgba(0, 0, 0, 0.0980392) 0px 0px 3px 0px;
	cursor: pointer;
}

.card2:hover {
	background: #eeeeee;
}

.image {
    margin-left: auto;
    margin-right: auto;
    display: block;
}
	
@media(min-width: 981px) {
	.image {
		float: right;
	}
}
</style>
</head>

<body unresolved>
	
	 <core-drawer-panel id="drawerPanel">
		 <core-header-panel drawer>
	  <core-menu selected="13">
	  <? include("partes/drawer.php"); ?>
	  </core-menu>
		 </core-header-panel>

		 <core-scroll-header-panel main id="main">
    <core-toolbar id="defaultbar">

    <core-icon-button icon="menu" id="navicon"></core-icon-button>
    <span flex>Facilidades</span>
    </core-toolbar>

    <div class="container">
		
		<paper-shadow z="0" class="littlecard">O RebuApp possui várias facilidades de acesso, clique em um card para ter mais informações.</paper-shadow>
		<br>
		<? if ($isgc) {
			googleChrome(true);
			iOS(false);
			windowsPhone(false);
			windows8(false);
			internetExplorer(false);
			firefox(false);
		} else if ($isios) {
			iOS(true);
			windowsPhone(false);
			googleChrome(false);
			windows8(false);
			internetExplorer(false);
			firefox(false);
		} else if ($iswp) {
			windowsPhone(true);
			iOS(false);
			googleChrome(false);
			windows8(false);
			internetExplorer(false);
			firefox(false);
		} else if ($isw8 && $isie) {
			windows8(true);
			internetExplorer(true);
			iOS(false);
			windowsPhone(false);
			googleChrome(false);
			firefox(false);
		} else if ($iswindows && $isie) {
			internetExplorer(true);
			iOS(false);
			windowsPhone(false);
			googleChrome(false);
			windows8(false);
			firefox(false);
		} else if($isff) {
			firefox(true);
			iOS(false);
			windowsPhone(false);
			googleChrome(false);
			windows8(false);
			internetExplorer(false);
		} else {
			iOS(false);
			windowsPhone(false);
			googleChrome(false);
			windows8(false);
			internetExplorer(false);
			firefox(false);
		} ?>
		
		</div>
		</core-scroll-header-panel>

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