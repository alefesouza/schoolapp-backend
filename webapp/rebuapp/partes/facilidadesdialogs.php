<?
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
// Última modificação em: 03/04/2015 17:52

function suggestFacilityDialog($qual) { ?>
		<paper-action-dialog <? global $iswp; if($iswp) { ?>class="scrolling" <? } ?>style="width: 30%; min-width: 300px; max-height: 80%;" heading="RebuApp" id="avisofacilidade" transition="core-transition-center" backdrop autoCloseDisabled>
		<p>
			<? switch($qual) {
				case "googlechrome": ?>
				Usando Google Chrome? Baixe a extensão do RebuApp e acesse com muito mais facilidade, também receba notificações igual um dispositivo Android!</p>
				<p><img style="margin-left: auto; margin-right: auto; display: block;" src="imagens/facilidades/googlechrome.jpg"></p>
			<? break;
				case "ios":
				global $isiphone;
				global $isipad;
				global $isipod;
				if($isiphone) { $iosoque = "iPhone"; } else if($isipad) { $iosoque = "iPad"; } else if($isipod) { $iosoque = "iPod"; } ?>
				Usando <? echo $iosoque; ?>? Adicione o atalho do RebuApp na tela inicial e acesse com muito mais facilidade, e sem as barras do navegador!</p>
				<p><img style="margin-left: auto; margin-right: auto; display: block;" src="imagens/facilidades/iphone.jpg"></p>
			<? break;
				case "windowsphone": ?>
				Usando Windows Phone? Adicione o atalho/live tile do RebuApp na tela inicial e acesse com muito mais facilidade, também acompanhe suas notificações e eventos a partir da tela inicial!</p>
				<p><img style="margin-left: auto; margin-right: auto; display: block;" src="imagens/facilidades/windowsphone.jpg"></p>
			<? break;
				case "windows8": ?>
				Usando Windows 8? Adicione o atalho/live tile do RebuApp na tela inicial e acesse com muito mais facilidade, também acompanhe suas notificações e eventos a partir da tela inicial!</p>
				<p><img style="margin-left: auto; margin-right: auto; display: block;" src="imagens/facilidades/windows8.jpg"></p>
			<? break;
				case "internetexplorer": ?>
				Usando Internet Explorer? Adicione o atalho do RebuApp na barra de tarefas e acesse com muito mais facilidade, também acompanhe suas notificações com apenas um clique!</p>
				<p><img style="margin-left: auto; margin-right: auto; display: block;" src="imagens/facilidades/internetexplorer.jpg"></p>
			<? break;
				case "firefox": ?>
				Usando Firefox? Adicione o RebuApp como aplicativo web e acesse-o com muito mais facilidade à partir da sua tela inicial/área de trabalho!</p>
				<p><img style="margin-left: auto; margin-right: auto; display: block;" src="imagens/facilidades/firefox.jpg"></p>
			<? break; } ?>
		<paper-button affirmative autofocus onclick="document.cookie='avisofacilidade=true; expires=Fri,01 Jan 2016 12:00:00 UTC'; document.getElementById('avisodepois').toggle();">Agora não</paper-button>
		<paper-button affirmative autofocus onclick="document.cookie='avisofacilidade=true; expires=Fri,01 Jan 2016 12:00:00 UTC'; window.open('facilidades2.php?oque=<? echo $qual; ?>', '_self');">Saiba mais</paper-button>
	</paper-action-dialog>

	<paper-action-dialog style="width: 20%; min-width: 300px;" heading="RebuApp" id="avisodepois" transition="core-transition-center" backdrop autoCloseDisabled>
		<p>Caso mude de ideia você pode acessar "Facilidades" no menu lateral.</p>
		<paper-button affirmative autofocus>OK</paper-button>
	</paper-action-dialog>
<? } ?>