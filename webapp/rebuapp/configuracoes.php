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
// Última modificação em: 07/04/2015 15:14

	include("connect_db.php");
	include("partes/other.php");

if ($isios || $isandroid || $iswp) {
	$isaffirmative = " ";
	$okorcancel = "OK";
} else {
	$isaffirmative = "affirmative ";
	$okorcancel = "Cancelar";
}

function configSalaClick($sala, $label) {
	global $isaffirmative;
	echo "<paper-radio-button {$isaffirmative}name=\"".$sala."\" label=\"".$label."\" onclick=\"setCookie('sala', '{$sala}');\"></paper-radio-button><br>";
}

function configClubeClick($clube, $label) {
	global $isaffirmative;
	echo "<paper-radio-button {$isaffirmative}name=\"".$clube."\" label=\"".$label."\" onclick=\"setCookie('clube', '{$clube}')\"></paper-radio-button><br>";
}

function configEletivaClick($eletiva, $label) {
	global $isaffirmative;
	echo "<paper-radio-button {$isaffirmative}name=\"".$eletiva."\" label=\"".$label."\" onclick=\"setCookie('eletiva', '{$eletiva}')\"></paper-radio-button><br>";
}

function configColorClick($color, $label) {
	global $isaffirmative;
	echo "<paper-radio-button {$isaffirmative}name=\"".$color."\" label=\"".$label."\" onclick=\"setCookie('cor', '{$color}'); document.getElementById('defaultbar').style.background = '#".$color."';\"></paper-radio-button><br>";
}

include("partes/default.php"); ?>
<html>
<head>
  <title>Configurações - RebuApp</title>
  <? include("partes/head.php"); ?>
  <? include("partes/polymer.imports.php"); ?>
  <? include("partes/jquery.php"); ?>
<link rel="import" href="/libs/polymer/components/core-label/core-label.html">
<link rel="import" href="/libs/polymer/components/paper-checkbox/paper-checkbox.html">
<link rel="import" href="/libs/polymer/components/paper-dialog/paper-dialog.html">
<link rel="import" href="/libs/polymer/components/paper-radio-group/paper-radio-group.html">
<link rel="import" href="/libs/polymer/components/paper-dialog/paper-action-dialog.html">

<style shim-shadowdom>
.listitem {
	padding-left: 77px;
	line-height: 167%;
}
</style>
</head>

<body unresolved>
	
<? if ($isios) {
	if(isset($_GET['standalone'])) { ?>
		<paper-action-dialog style="width: 20%; min-width: 300px;" heading="RebuApp" id="avisostandalone" transition="core-transition-center" backdrop autoCloseDisabled>
		<p>Por favor selecione suas configurações de novo.</p>
		<paper-button affirmative autofocus>OK</paper-button>
	</paper-action-dialog>
<? } } ?>
	
	 <core-drawer-panel id="drawerPanel">
		 <core-header-panel drawer>
	  <core-menu selected="14">
	  <? include("partes/drawer.php"); ?>
	  </core-menu>
		 </core-header-panel>

		 <core-scroll-header-panel main id="main">
    <core-toolbar id="defaultbar">

    <core-icon-button icon="menu" id="navicon"></core-icon-button>
    <span flex>Configurações</span>
    </core-toolbar>

    <div class="container">
		
<div class="list">
    <paper-shadow z="0" class="listitem" onclick="document.getElementById('saladialog').toggle();">
          <span class="titulo">Escolher sala</span>
          <div class="sumario">Clique aqui para escolher sua sala</div>
	  <paper-action-dialog style="width: 20%; min-width: 300px; text-align: center;" heading="Escolher sala" id="saladialog" transition="core-transition-center" backdrop autoCloseDisabled>
     <paper-radio-group selected="<? echo $_COOKIE['sala']; ?>">
		<?
			$salaarray = getArray("sala", false);
			$salaarrayvalue = getArray("sala", true);
			for($i = 0; $i < count($salaarray); $i++) {
				configSalaClick($salaarrayvalue[$i], $salaarray[$i]);
			} ?>
    </paper-radio-group>
        <paper-button affirmative autofocus><? echo $okorcancel; ?></paper-button>
      </paper-action-dialog>
        
		<paper-ripple fit class="recenteringTouch"></paper-ripple>
	</paper-shadow>
    <paper-shadow z="0" class="listitem" onclick="document.getElementById('clubedialog').toggle();">
          <span class="titulo">Escolher clube</span>
          <div class="sumario">Clique aqui para escolher seu clube</div>
	<paper-action-dialog style="width: 20%; min-width: 300px;" heading="Escolher clube" id="clubedialog" transition="core-transition-center" backdrop autoCloseDisabled>
     <paper-radio-group selected="<? echo $_COOKIE['clube']; ?>">
		<?
			$clubearray = getArray("clube", false);
			$clubearrayvalue = getArray("clube", true);
			for($i = 0; $i < count($clubearray); $i++) {
				configClubeClick($clubearrayvalue[$i], $clubearray[$i]);
			} ?>
    </paper-radio-group>
        <paper-button affirmative autofocus><? echo $okorcancel; ?></paper-button>
      </paper-action-dialog>
        
		<paper-ripple fit class="recenteringTouch"></paper-ripple>
	</paper-shadow>
    <paper-shadow z="0" class="listitem" onclick="document.getElementById('eletivadialog').toggle();">
          <span class="titulo">Escolher eletiva</span>
          <div class="sumario">Clique aqui para escolher sua eletiva</div>
	<paper-action-dialog style="width: 20%; min-width: 300px;" heading="Escolher eletiva" id="eletivadialog" transition="core-transition-center" backdrop autoCloseDisabled>
     <paper-radio-group selected="<? echo $_COOKIE['eletiva']; ?>">
		<?
			$eletivaarray = getArray("eletiva", false);
			$eletivaarrayvalue = getArray("eletiva", true);
			for($i = 0; $i < count($eletivaarray); $i++) {
				configEletivaClick($eletivaarrayvalue[$i], $eletivaarray[$i]);
			} ?>
    </paper-radio-group>
        <paper-button affirmative autofocus><? echo $okorcancel; ?></paper-button>
      </paper-action-dialog>
        
		<paper-ripple fit class="recenteringTouch"></paper-ripple>
	</paper-shadow>
	<paper-shadow z="0" class="listitem">
	<core-label horizontal layout style="width: 95%;">
    <div flex vertical layout>
      <span class="titulo">Habilitar painel</span>
      <div>Ative essa opção caso você tenha uma conta no aplicativo</div></div>
    <paper-checkbox for style="float: right; margin:auto auto auto 0;" checked="<? if(isset($_COOKIE['painel'])) { echo $_COOKIE["painel"]; } else { echo "false"; } ?>" id="checkpanel" onchange="checkPanel();"></paper-checkbox>
	<paper-ripple fit class="recenteringTouch"></paper-ripple>
	</core-label>
	</paper-shadow>
	<paper-shadow z="0" class="listitem">
	<core-label horizontal layout style="width: 95%;">
    <div flex vertical layout>
      <span class="titulo">Sou responsável</span>
      <div>Ative essa opção para ver notificações direcionadas aos responsáveis</div></div>
    <paper-checkbox for style="float: right; margin:auto auto auto 0;" checked="<? if(isset($_COOKIE['responsavel'])) { echo $_COOKIE["responsavel"]; } else { echo "false"; } ?>" id="checkresponsavel" onchange="checkResponsavel();"></paper-checkbox>
	<paper-ripple fit class="recenteringTouch"></paper-ripple></core-label>
	</paper-shadow>
    <paper-shadow z="0" class="listitem" onclick="document.getElementById('cordialog').toggle();">
          <span class="titulo">Cor do aplicativo</span>
          <div class="sumario">Toque aqui para escolher a cor do aplicativo</div>
	<paper-action-dialog style="width: 20%; min-width: 300px; text-align: center;" heading="Cor do aplicativo" id="cordialog" transition="core-transition-center" backdrop autoCloseDisabled>
      <paper-radio-group selected="<? echo $color; ?>">
      <? configColorClick("005400", "Verde 1"); ?>
      <? configColorClick("008002", "Verde 2"); ?>
      <? configColorClick("00cc00", "Verde 3"); ?>
      <? configColorClick("003061", "Azul 1"); ?>
      <? configColorClick("0a4e91", "Azul 2"); ?>
      <? configColorClick("0000cc", "Azul 3"); ?>
    </paper-radio-group>
        <paper-button affirmative autofocus><? echo $okorcancel; ?></paper-button>
      </paper-action-dialog>
        
		<paper-ripple fit class="recenteringTouch"></paper-ripple>
	</paper-shadow>
	<paper-shadow z="0" class="listitem" style="border-bottom: none;" id="ok">
          <span class="titulo">OK</span>
          <div class="sumario">Ir a sala</div>
		<paper-ripple fit class="recenteringTouch"></paper-ripple>
        </paper-shadow>
      </div>
</div></div>
    </div></core-scroll-header-panel>

	  </core-drawer-panel>
</body>
	<script>
<? function okButton($link) { ?>
	$('#ok').one("click", function() {
		window.open('<? echo $link; ?>', '_self');
	});
<? } ?>
document.addEventListener('polymer-ready', function() {
<? include("partes/defaultscript.php"); ?>
<? if ($isios) {
	if(isset($_GET['standalone'])) { ?>
	document.getElementById('avisostandalone').toggle();
<?
	okButton(urldecode($_GET['url'])); } else { okButton("sala.php"); }
} else { okButton("sala.php"); } ?>
});

function checkPanel() {
	setTimeout(function() {
		var value = document.getElementById('checkpanel').getAttribute('aria-checked');
		document.cookie='painel=' + value + '; expires=Fri,01 Jan 2016 12:00:00 UTC';
	}, 100);
}
	
function checkResponsavel() {
	setTimeout(function() {
		var value = document.getElementById('checkresponsavel').getAttribute('aria-checked');
		document.cookie='responsavel=' + value + '; expires=Fri,01 Jan 2016 12:00:00 UTC';
	}, 100);
}

function setCookie(oque, valor) {
	setTimeout(function() {
		document.cookie=oque + '=' + valor + '; expires=Fri,01 Jan 2016 12:00:00 UTC';
	}, 100);
}
	</script>
<? include("partes/analyticstracking.php") ?>

</html>