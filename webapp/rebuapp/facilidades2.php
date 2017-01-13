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
// Última modificação em: 07/04/2015 03:14

header('Content-Type: text/html; charset=utf-8');
include("connect_db.php");
include("partes/default.php");

function googleChrome() { ?>
	<paper-shadow class="card2">
	<h2>Extensão do RebuApp para Google Chrome</h2>
		<p>Com a extensão do RebuApp para Google Chrome você pode acessar rápidamente os seus eventos e notificações no aplicativos, com as notificações aparecendo perto da hora em que são enviadas, assim como no aplicativo Android!</p>
		<p>Para usar a extensão é simples:</p>
		<ol>
			<li><a href="https://chrome.google.com/webstore/detail/gefhfinklkikjpoddkgkmnppbjaikhgd" target="_blank">Clique aqui para abrir a página da extensão na Chrome Web Store</a></li>
			<li>Clique em "+ Usar no Chrome" na páginas que abrir</li>
			<li>Clique em Adicionar</li>
			<li>Pronto! Você já pode ver seus eventos e receber notificações sem precisar abrir o site.</li>
		</ol>
		<h3>Algumas imagens</h3>
		Clique na imagem para expandir
		<div horizontal>
			<? for($i = 1; $i <= 4; $i++) { ?>
				<a href="imagens/facilidades/gc/img<? echo $i; ?>.jpg" target="_blank"><img src="imagens/facilidades/gc/img<? echo $i; ?>.jpg" width="200"></a>
			<? } ?>
		</div>
		<h3>Algumas informações</h3>
		<p>Por causa da extensão ser nova, alguns antivírus, como o Avast podem dizer que ela tem má reputação e recomendar a desinstalação, isso ocorre porque poucas pessoas avaliaram a extensão, então caso apareça algum aviso apenas ignore-o. Se quiser você pode ajudar avaliando a extensão <a href="https://chrome.google.com/webstore/detail/rebuapp/gefhfinklkikjpoddkgkmnppbjaikhgd/reviews" target="_blank">clicando aqui</a>.</p>
		<p>As configurações da extensão serão importadas do site assim que instalada, porém ao fazer uma alteração nas configurações de um, não mudará no outro, por isso é recomendado você fazer suas modificações no site e depois clicar no "Importar configurações do rebuapp.tk" nas opções da extensão.</p>
	</paper-shadow>
<? }

function iOS() { ?>
	<paper-shadow class="card2">
	<h2>Atalho do RebuApp para iOS</h2>
		<p>Com o atalho do RebuApp na tela inicial do iPhone/iPad você pode acessar os seus eventos e notificações mais rapidamente, e sem as barras do navegador, assim ficando como qualquer outro aplicativo.</p>
		<p>Para fazer isso é simples:</p>
		<ol>
			<li>Abra a páginas do RebuApp que você quer que apareça quando tocar no ícone, é recomendado a <a href="sala.php" target="_blank">Sala</a></li>
			<li>Nos 5 ícones na barra inferior do navegador toque no do meio, e depois em "Tela de início" (ou "Adicionar à tela inicial")</li>
			<div align="center"><p><a href="imagens/facilidades/ios/img1.jpg" target="_blank"><img src="imagens/facilidades/ios/img1.jpg" width="200"></a><br>Toque para expandir</p></div>
			<li>Toque em Adicionar</li>
			<li>Pronto! Você já pode acessar o RebuApp a partir da sua tela inicial.</li>
			<div align="center"><p><a href="imagens/facilidades/ios/img2.jpg" target="_blank"><img src="imagens/facilidades/ios/img2.jpg" width="200"></a></p></div>
			E também sem as barras do Safari em volta!
			<div align="center"><p><a href="imagens/facilidades/ios/img3.jpg" target="_blank"><img src="imagens/facilidades/ios/img3.jpg" width="200"></a></p></div>
		</ol>
		<h3>Algumas informações</h3>
		<p>O iOS deve considerar-lo como um site novo após adicionar o RebuApp na tela inicial, portanto deve demorar de novo ao abri-lo na primeira vez, mas depois funciona normalmente. As configurações também serão perdidas, por isso ao abri-lo pelo ícone na primeira vez você irá cair direto nas configurações, e então configure-o novamente.</p>
	</paper-shadow>
<? }

function windowsPhone() { ?>
	<paper-shadow class="card2">
	<h2>Live tile do RebuApp para Windows Phone</h2>
		<p>Com a live tile do RebuApp para Windows Phone você pode acessar os seus eventos e notificações mais rapidamente, e também acompanha-los a partir da sua tela inicial.</p>
		<p>Para fazer isso é simples:</p>
		<ol>
			<li>Abra a página do RebuApp que você quer que apareça quando tocar na live tile, é recomendado a <a href="sala.php" target="_blank">Sala</a></li>
			<li>Toque nos três pontos ao lado da barra de endereços</li>
			<div align="center"><p><a href="imagens/facilidades/wp/img1.png" target="_blank"><img src="imagens/facilidades/wp/img1.png" width="200"></a><br>Toque para expandir</p></div>
			<li>Toque em "Fixar na tela inicial"</li>
			<div align="center"><p><a href="imagens/facilidades/wp/img2.png" target="_blank"><img src="imagens/facilidades/wp/img2.png" width="200"></a></div>
			<li>Pronto! Você já pode acessar o RebuApp e ver notificações a partir da sua tela inicial. Irá adicionar uma tile quadrada, mas é recomendado redimensionar para uma retangular, pois como ela é maior fica mais fácil ler.</li>
		<h3>Algumas imagens</h3>
		<div horizontal>
			<? for($i = 3; $i <= 6; $i++) { ?>
				<a href="imagens/facilidades/wp/img<? echo $i; ?>.jpg" target="_blank"><img src="imagens/facilidades/wp/img<? echo $i; ?>.jpg" width="200"></a>
			<? } ?>
		</div>
		</ol>
		<h3>Algumas informações</h3>
		<p>Quando você muda algumas configuração no RebuApp, por motivos do Windows Phone, ela não é mudada na live tile, portando caso você mude algo, você precisará remover a live tile da tela inicial e adicioná-la novamente.</p>
	</paper-shadow>
<? }

function windows8() { ?>
	<paper-shadow class="card2">
	<h2>Live tile do RebuApp para Windows 8</h2>
		<p>Com a live tile do RebuApp para Windows 8 você pode acessar os seus eventos e notificações mais rapidamente, e também acompanha-los a partir da sua tela inicial.</p>
		<p>Antes de tudo, devido a limitações do sistema, você precisar ter o Internet Explorer como navegador, caso ele não seja seu navegador padrão, há outra opção, veja <a href="facilidades2.php?oque=internetexplorer">clicando aqui</a>.</p>
		<p>Para fazer isso é simples:</p>
		<ol>
			<li>No Internet Explorer no modo Windows 8, abra a página do RebuApp que você quer que apareça quando tocar na live tile, é recomendado a <a href="sala.php" target="_blank">Sala</a></li>
			<li>Clique no ícone de Favoritos (o da estrela)</li>
			<div align="center"><p><a href="imagens/facilidades/w8/img1.jpg" target="_blank"><img src="imagens/facilidades/w8/img1.jpg"></a><br>Toque para expandir</p></div>
			<div align="center"><p><a href="imagens/facilidades/w8/img2.png" target="_blank"><img src="imagens/facilidades/w8/img2.png"></a></p></div>
			<li>Clique no ícone de Fixar</li>
			<div align="center"><p><a href="imagens/facilidades/w8/img3.jpg" target="_blank"><img src="imagens/facilidades/w8/img3.jpg"></a></div>
			<div align="center"><p><a href="imagens/facilidades/w8/img4.png" target="_blank"><img src="imagens/facilidades/w8/img4.png"></a></div>
			<li>Clique em "Fixar na Tela inicial"</li>
			<div align="center"><p><a href="imagens/facilidades/w8/img5.jpg" target="_blank"><img src="imagens/facilidades/w8/img5.jpg"></a></div>
			<div align="center"><p><a href="imagens/facilidades/w8/img6.png" target="_blank"><img src="imagens/facilidades/w8/img6.png"></a></div>
			<li>Pronto! Você já pode acessar o RebuApp e ver notificações a partir da sua tela inicial.</li>
		<h3>Algumas imagens</h3>
		<div horizontal>
			<? for($i = 7; $i <= 14; $i++) { ?>
				<a href="imagens/facilidades/w8/img<? echo $i; ?>.jpg" target="_blank"><img src="imagens/facilidades/w8/img<? echo $i; ?>.jpg" width="200"></a>
			<? } ?>
		</div>
		</ol>
		<h3>Algumas informações</h3>
		<p>Quando você muda algumas configuração no RebuApp, por motivos do Windows 8, ela não é mudada na live tile, portando caso você mude algo, você precisará tirar a live tile da tela inicial e adicioná-la novamente.</p>
	</paper-shadow>
<? }

function internetExplorer() { ?>
	<paper-shadow class="card2">
	<h2>Atalho do RebuApp para Internet Explorer</h2>
		<p>Com o atalho do RebuApp para Internet Explorer você pode acessar mais atalhos e ver notificações a partir da barra de tarefas do Windows 7 ou superior.</p>
		<p>Antes de tudo, certifique-se de que você esteja usando a versão 10 ou superior do Internet Explorer.</p>
		<p>Para fazer isso é simples:</p>
		<ol>
			<li>No Internet Explorer, abra a página do RebuApp que você quer que apareça quando clicar no ícone, é recomendado a <a href="sala.php" target="_blank">Sala</a></li>
			<li>Clique na aba/guia do RebuApp e arraste para a barra de tarefas, até aparecer "Fixar em Barra de Tarefas"</li>
			<div align="center"><p><a href="imagens/facilidades/ie/img1.jpg" target="_blank"><img src="imagens/facilidades/ie/img1.jpg"></a><br>Clique para expandir</p></div>
			<div align="center"><p><a href="imagens/facilidades/ie/img2.png" target="_blank"><img src="imagens/facilidades/ie/img2.png"></a></p></div>
			<div align="center"><p><a href="imagens/facilidades/ie/img3.jpg" target="_blank"><img src="imagens/facilidades/ie/img3.jpg"></a></div>
			<div align="center"><p><a href="imagens/facilidades/ie/img4.jpg" target="_blank"><img src="imagens/facilidades/ie/img4.jpg"></a></div>
			<div align="center"><p><a href="imagens/facilidades/ie/img5.png" target="_blank"><img src="imagens/facilidades/ie/img5.png"></a></div>
			<li>Pronto! Após isso o Internet Explorer irá reiniciar "em um estilo RebuApp", e você já pode acessar o RebuApp e ver notificações com um único clique!</li>
			<div align="center"><p><a href="imagens/facilidades/ie/img6.jpg" target="_blank"><img src="imagens/facilidades/ie/img6.jpg"></a></div>
			<div align="center"><p><a href="imagens/facilidades/ie/img7.png" target="_blank"><img src="imagens/facilidades/ie/img7.png"></a></div>
		</ol>

	</paper-shadow>
<? }

function firefox() { ?>
	<paper-shadow class="card2">
	<h2>Aplicativo web do RebuApp para Firefox (navegador ou Firefox OS)</h2>
		<p>Com o aplicativo web do RebuApp para Firefox você pode acessar o RebuApp com apenas um clique à partir da sua tela inicial.</p>
		<p>Para fazer isso é simples:</p>
		<ol>
			<li>Abra o Firefox Marketplace e pesquise por "RebuApp", ou simplesmente <a href="https://marketplace.firefox.com/app/rebuapp" target="_blank">clique aqui</a>.</li>
			<li>Clique em "Instalar"</li>
			<li>Pronto! Você já pode acessar o RebuApp à partir da tela inicial do Firefox OS, ou da área de trabalho do seu computador.</li>
		<h3>Algumas imagens</h3>
		Clique na imagem para expandir
		<div horizontal>
			<a href="imagens/facilidades/ff/img1.png" target="_blank"><img src="imagens/facilidades/ff/img1.png" width="200"></a>
			<a href="imagens/facilidades/ff/img2.png" target="_blank"><img src="imagens/facilidades/ff/img2.png" width="200"></a>
			<a href="imagens/facilidades/ff/img3.jpg" target="_blank"><img src="imagens/facilidades/ff/img3.jpg" width="200"></a>
			<a href="imagens/facilidades/ff/img4.jpg" target="_blank"><img src="imagens/facilidades/ff/img4.jpg" width="200"></a>
		</div>
		</ol>

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
		
		<? 
		$oque = $_GET['oque'];

		if ($oque == "googlechrome") {
			googleChrome();
		} else if ($oque == "ios") {
			iOS();
		} else if ($oque == "windowsphone") {
			windowsPhone();
		} else if ($oque == "windows8") {
			windows8();
		} else if ($oque == "internetexplorer") {
			internetExplorer();
		} else if ($oque == "firefox") {
			firefox();
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