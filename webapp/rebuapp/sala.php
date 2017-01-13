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
// Última modificação em: 08/05/2015 22:24

	include("connect_db.php");
		include("partes/facilidadesdialogs.php");
	$sala = $_COOKIE["sala"];
	include("partes/horarios.php");
date_default_timezone_set($userTimezone);
switch(date("l")) {
	case "Sunday":
		$day = "Domingo";
	break;
	case "Monday":
		$day = "Segunda";
	break;
	case "Tuesday":
		$day = "Terça";
	break;
	case "Wednesday":
		$day = "Quarta";
	break;
	case "Thursday":
		$day = "Quinta";
	break;
	case "Friday":
		$day = "Sexta";
	break;
	case "Saturday":
		$day = "Sábado";
	break;
}

include("partes/default.php"); ?>
<html>
<head>
<title>Sala - RebuApp</title>
<? include("partes/head.php") ?>
<? include('partes/polymer.imports.php') ?>
<link rel="import" href="/libs/polymer/components/paper-tabs/paper-tabs.html">
<link rel="import" href="/libs/polymer/components/paper-dialog/paper-action-dialog.html">
<? if($_COOKIE['painel'] != "true" && isset($sala)) { ?>
<link rel="import" href="/libs/polymer/components/core-dropdown/core-dropdown.html">
<? } ?>
<?
include("partes/jquery.php");
include("partes/tablestyle.php"); ?>
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

html /deep/ core-scroll-header-panel::shadow #mainContainer {
	overflow-x: auto;
}
</style>
</head>

<body unresolved>
	
<? if($_COOKIE['painel'] != "true" && isset($sala)) { ?>
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
<? } ?>

<? if ($_COOKIE['painel'] == "true" && !isset($_COOKIE['avisopainel'])) { ?>
	<paper-action-dialog style="width: 20%; min-width: 300px;" heading="RebuApp" id="avisopainel" transition="core-transition-center" backdrop autoCloseDisabled>
		<p>Para acessar o painel, toque no botão circular com um lápis dentro, nele usando sua conta você pode adicionar eventos e enviar notificações para a sala/clube/eletiva que você administra.</p>
		<paper-button affirmative autofocus onclick="document.cookie='avisopainel=true; expires=Fri,01 Jan 2016 12:00:00 UTC';">OK</paper-button>
	</paper-action-dialog>
<? } if(!isset($_COOKIE['avisocard'])) { ?>
	<paper-action-dialog style="width: 20%; min-width: 300px;" heading="RebuApp" id="avisocard" transition="core-transition-center" backdrop autoCloseDisabled>
		<p>Toque em um card para abri-lo em tela cheia. Em algumas salas ao clicar no nome abre o grupo da mesma no Facebook.</p>
		<paper-button affirmative autofocus onclick="document.cookie='avisocard=true; expires=Fri,01 Jan 2016 12:00:00 UTC';">OK</paper-button>
	</paper-action-dialog>
<? } else {
	if(!isset($_COOKIE['avisofacilidade'])) {
		if ($isgc) {
			suggestFacilityDialog("googlechrome");
		} else if ($isios) {
			suggestFacilityDialog("ios");
		} else if ($iswp) {
			suggestFacilityDialog("windowsphone");
		} else if ($isw8 && $isie) {
			suggestFacilityDialog("windows8");
		} else if ($iswindows && $isie) {
			suggestFacilityDialog("internetexplorer");
		} else if ($isff) {
			suggestFacilityDialog("firefox");
		}
	}
}
if($_COOKIE['painel'] != "true" && isset($sala)) { ?>
	<paper-action-dialog style="width: 20%; min-width: 300px;" heading="RebuApp" id="avisosolicitar" transition="core-transition-center" backdrop autoCloseDisabled>
		<p>Você pode pedir uma conta de convidado para o representante ou na sala da coordenação, após isso vá nas configurações e marque "Habilitar painel".</p>
		<paper-button affirmative autofocus>OK</paper-button>
	</paper-action-dialog>
<? }

if($_COOKIE['painel'] == "true") { include('partes/editbutton.php'); } ?>

	 <core-drawer-panel id="drawerPanel">
		 <core-header-panel drawer>
	  <core-menu selected="1">
		  <? include("partes/drawer.php"); ?>
	  </core-menu>
		 </core-header-panel>

	<core-scroll-header-panel main mode="scroll" id="main">
	
    <core-toolbar class="perfect-for-tabs" id="defaultbar">
    <core-icon-button icon="menu" id="navicon"></core-icon-button>
    <span flex id="titulo">Sala</span>
<?
if($day != "Sábado" && $day != "Domingo") {
?>
	<core-tooltip label="Mostrar semana" position="bottom" class="fancy" id="toggletooltip">
	<core-icon-button icon="view-week" onclick="toggle()" id="toggle" style="display: none;"></core-icon-button>
	</core-tooltip>
<? }
if($_COOKIE['painel'] != "true" && isset($sala)) { ?>
      <x-trigger icon="more-vert">
        <core-dropdown halign="right" onclick="document.getElementById('avisosolicitar').toggle();">
			Solicitar edição
			<paper-ripple fit class="recenteringTouch"></paper-ripple>
        </core-dropdown>
      </x-trigger>
<? } ?>
		
	<div class="bottom fit" horizontal layout>
      <paper-tabs id="tabs" selected="agenda" self-end>
        <paper-tab name="agenda" id="guiaagenda">Agenda</paper-tab>
        <paper-tab name="horario" id="guiahorario">Horário</paper-tab>
      </paper-tabs>
		</div>
    </core-toolbar>
	
    <div class="container">
<div id="agenda">
<? include("partes/other.php"); ?>
<?
if(isset($sala)) {
$grupoid = getGrupoID($sala); 
if($grupoid == "") {
} else {
	$grupo = " onclick=\"window.open('http://www.facebook.com/groups/{$grupoid}')\"";
}
} else {
	$grupo = " onclick=\"window.open('configuracoes.php', '_self')\"";
}
?>
<paper-shadow z="0" class="littlecard<? if(isset($grupo) || !isset($sala)) { echo " clickable\""; } else { ?>" style="cursor: default;"<? } echo "".$grupo; ?>><? echo getSala($sala); ?> <? if(isset($grupo) || !isset($sala)) { echo "<paper-ripple fit class=\"recenteringTouch\"></paper-ripple>"; } ?></paper-shadow>
	<?
$result = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala='$sala' ORDER BY date");
$count = 0;
$max = mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result)) { ?>
<paper-shadow z="0" class="card clickable" touch-action="pan-x pan-y" onclick="window.open('evento.php?id=<? echo $row['id']; ?>', '_self');">
	<?	echo "<p><b>".$row['data'];
		if ($row['data'] != "") {
			echo " - ";
		};
		echo $row['titulo']."</b>";
	if($row['tipo'] == "0") {
		echo "<p>".str_replace("\n", "<br>", $row['descricao'])."</p>";
	} else {
		echo "<p>".$row['descricao']."</p>";
	} ?>
<paper-ripple fit class="recenteringTouch"></paper-ripple>
</paper-shadow>
<?	}

if(mysqli_num_rows($result) == 0) {
	if(isset($sala)) { ?>
<paper-shadow z="0" class="littlecard" style="font-weight: normal;"><b>Não há eventos na agenda da sua sala</b><p>Caso você tenha interesse em adicionar eventos na agenda desta sala você pode pedir uma conta de convidado para o representante ou na sala da coordenação.</p></paper-shadow>
<? } } ?>
    </div>
	<div id="horario" style="display: none;" touch-action="pan-x pan-y">
<?
$horas = getHorarios(true);
if($day != "Sábado" && $day != "Domingo") {
?>
	<table id="day" width="100%" style="background: #ffffff;">
	<?

		echo "<tr>";
		echo "<td colspan=\"2\">".$day." - ".getSala($sala)."</td>";
		echo "</tr>";

	if(isset($sala)) {
		for ($i = 0; $i < count($horas); $i++) {
			echo "<tr>";
			echo "<td>{$horas[$i]}</td>";
			echo "<td>";
			switch($day) {
				case "Segunda":
					echo $segunda[$i];
				break;
				case "Terça":
					echo $terca[$i];
				break;
				case "Quarta":
					echo $quarta[$i];
				break;
				case "Quinta":
					echo $quinta[$i];
				break;
				case "Sexta":
					echo $sexta[$i];
				break;
			}
			echo "</td>";
			echo "</tr>";
		}
	}
	?>
	</table>
<? }
	 ?>
	<table id="week" style="background: #ffffff;
<? if($day != "Sábado" && $day != "Domingo") { echo " display: none;"; } ?> width: 100%;">
	<?
		$dias = array("", "Segunda", "Terça", "Quarta", "Quinta", "Sexta");

		echo "<tr>";
		echo "<td colspan=\"".count($dias)."\">".getSala($sala)."</td>";
		echo "</tr>";

	if(isset($sala)) {
		echo "<tr>";
		for ($i = 0; $i < count($dias); $i++) {
			echo "<td>{$dias[$i]}</td>";
		}
		echo "</tr>";

		for ($a = 0; $a < count($horas); $a++) {
			echo "<tr>";
			echo "<td>{$horas[$a]}</td>";
			for ($i = 0; $i < count($dias) - 1; $i++) {
				echo "<td>";
				switch($i) {
					case 0:
					echo $segunda[$a];
					break;
					case 1:
					echo $terca[$a];
					break;
					case 2:
					echo $quarta[$a];
					break;
					case 3:
					echo $quinta[$a];
					break;
					case 4:
					echo $sexta[$a];
					break;
				}
				echo "</td>";
			}
			echo "</tr>";
		}
	} ?>
	</table>
	</div>
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
	parte2DaNotificacao();
if($_COOKIE['painel'] == "true" && !isset($_COOKIE['avisopainel'])) { ?>
if(getCookie("avisopainel") != "true") {
	document.getElementById('avisopainel').toggle();
}
<? }
if(!isset($_COOKIE['avisocard'])) { ?>
if(getCookie("avisocard") != "true") {
	document.getElementById('avisocard').toggle();
}

<? } else {
		if(!isset($_COOKIE['avisofacilidade']) && ($isgc || $isios || $iswp || ($isw8 && $isie) || ($iswindows && $isie) || $isff)) {
			?>
if(getCookie("avisofacilidade") != "true") {
	document.getElementById('avisofacilidade').toggle();
}
<? } } ?>

document.getElementById('guiaagenda').onclick = function() {
	document.getElementById('agenda').style.display = '';
	document.getElementById('horario').style.display = 'none';
<? if($day != "Sábado" && $day != "Domingo") { ?>
	document.getElementById('toggle').style.display = 'none';
<? } ?>
};

document.getElementById('guiahorario').onclick = function() {
	document.getElementById('agenda').style.display = 'none';
	document.getElementById('horario').style.display = '';
<? if($day != "Sábado" && $day != "Domingo") { ?>
	document.getElementById('toggle').style.display = '';
<? } ?>
};
});
</script>
<? if($day != "Sábado" && $day != "Domingo") { ?>

<script>
var semana = false;

function toggle() {
	if(semana) {
		document.getElementById('toggle').icon='view-week';
		document.getElementById('toggletooltip').label='Mostrar semana';
		semana = false;
		document.getElementById('week').style.display = 'none';
		document.getElementById('day').style.display = '';
	} else {
		document.getElementById('toggle').icon='today';
		document.getElementById('toggletooltip').label='Mostrar dia';
		semana = true;
		document.getElementById('week').style.display = '';
		document.getElementById('day').style.display = 'none';
	}
}
</script>
<? } ?>
<? include("partes/analyticstracking.php") ?>

</html>