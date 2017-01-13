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
// Última modificação em: 07/04/2015 21:07

	include("connect_db.php");
?>
<? include("partes/default.php"); ?>
<html>
<head>
<title>Cantina - RebuApp</title>
<? include("partes/head.php"); ?>
<? include('partes/polymer.imports.php'); ?>
<link rel="import" href="/libs/polymer/components/paper-dialog/paper-action-dialog.html">
<link rel="import" href="/libs/polymer/components/core-dropdown/core-dropdown.html">
<link rel="import" href="/libs/polymer/components/core-label/core-label.html">
<link rel="import" href="/libs/polymer/components/paper-checkbox/paper-checkbox.html">
<? include("partes/jquery.php"); ?>
<style shim-shadowdom>
html /deep/ core-dropdown {
	background-color: #ffffff;
	color: #000;
	border-radius: 2px;
	padding: 8px;
	box-shadow: rgba(0, 0, 0, 0.0980392) 0px 2px 4px 0px, rgba(0, 0, 0, 0.0980392) 0px 0px 3px 0px;
}

html /deep/ core-dropdown:hover {
	background-color: #eeeeee;
}

paper-button[autofocus] {
	color: #4285f4;
}
</style>
</head>

<body unresolved>
	<? if($_COOKIE['painel'] == "true") { include('partes/editbutton.php'); } ?>
  <polymer-element name="x-trigger" extends="core-icon-button" relative on-tap="{{toggle}}">
  <script>
    Polymer({
      toggle: function() {
        if (!this.dropdown) {
          this.dropdown = this.querySelector('core-dropdown');
        }
        this.dropdown && this.dropdown.toggle();
      }
    });
  </script>
  </polymer-element>

<? if (!isset($_COOKIE['cantinanotificacoes'])) { ?>
	<paper-action-dialog style="width: 20%; min-width: 300px;" heading="RebuApp" id="cantinanotificacoesdialog" transition="core-transition-center" backdrop autoCloseDisabled>
		<p>Deseja ver notificações de novidades e promoções da cantina?</p>
      <paper-button affirmative onclick="setCheck('false');">Não</paper-button>
      <paper-button affirmative autofocus onclick="setCheck('true');">Sim</paper-button>
	</paper-action-dialog>
<? } ?>
	 <core-drawer-panel id="drawerPanel">
		 <core-header-panel drawer>
	  <core-menu selected="7">
		  <? include("partes/drawer.php"); ?>
	  </core-menu>
		 </core-header-panel>

	<core-scroll-header-panel main mode="scroll" id="main">
	
    <core-toolbar id="defaultbar">
    <core-icon-button icon="menu" id="navicon"></core-icon-button>
    <span flex id="titulo">Cantina</span>
      <x-trigger icon="more-vert">
        <core-dropdown halign="right">
			<core-label horizontal layout style="width: 95%;">
				Receber notificações
			<paper-ripple fit class="recenteringTouch"></paper-ripple>
   			<paper-checkbox for checked="<? if(isset($_COOKIE['cantinanotificacoes'])) { echo $_COOKIE["cantinanotificacoes"]; } else { echo "false"; } ?>" id="checkcantina" onchange="checkCantina();"></paper-checkbox>
		</core-label>
        </core-dropdown>
      </x-trigger>
    </core-toolbar>
    <div class="container">
		<img src="imagens/logo_cantina.jpg" style="display: block; margin-left: auto; margin-right: auto; max-width: 100%;">
		<paper-shadow z="0" class="littlecard clickable" onclick="window.open('https://www.facebook.com/pages/Geração-Saúde/388344088010898', '_blank')">Página no Facebook<paper-ripple fit class="recenteringTouch"></paper-ripple></paper-shadow>
		<paper-shadow z="0" class="littlecard clickable" onclick="window.open('evento.php?id=238&special=true', '_self')">Cardápio<paper-ripple fit class="recenteringTouch"></paper-ripple></paper-shadow>
		<paper-shadow z="0" class="littlecard clickable" onclick="window.open('evento.php?id=290&special=true', '_self')">Promoções<paper-ripple fit class="recenteringTouch"></paper-ripple></paper-shadow>
    </div></core-scroll-header-panel>

	  </core-drawer-panel>
<?
include('partes/notif.php');
parte1DaNotificacao(); ?>
</body>

<script>
document.addEventListener('polymer-ready', function() {
	<? include("partes/defaultscript.php");
	parte2DaNotificacao();

if(!isset($_COOKIE['cantinanotificacoes'])) { ?>
if(getCookie("cantinanotificacoes") != "true") {
	document.getElementById('cantinanotificacoesdialog').toggle();
}
<? } ?>
});
	
function checkCantina() {
	setTimeout(function() {
		var value = document.getElementById('checkcantina').getAttribute('aria-checked');
		document.cookie='cantinanotificacoes=' + value + '; expires=Fri,01 Jan 2016 12:00:00 UTC';
	}, 100);
}

<? if(!isset($_COOKIE['cantinanotificacoes'])) { ?>
function setCheck(oque) {
	if(oque == 'true') {
		document.getElementById('checkcantina').checked = oque;
	}
	document.cookie='cantinanotificacoes=' + oque + '; expires=Fri,01 Jan 2016 12:00:00 UTC';
}
<? } ?>
</script>
	<? include("partes/analyticstracking.php") ?>

</html>