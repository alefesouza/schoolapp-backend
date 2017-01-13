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
// Última modificação em: 06/04/2015 18:30

$notif = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala='$sala'");
$num1 = mysqli_num_rows($notif);
$notif = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala='$clube'");
$num2 = mysqli_num_rows($notif);
$notif = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala='$eletiva'");
$num3 = mysqli_num_rows($notif);
$notif = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala='gestao'");
$num4 = mysqli_num_rows($notif);
if($_COOKIE['responsavel'] == "true") { $isrespon = "responsaveis"; } else { $isrespon = ""; }
$notif = mysqli_query($dbi, "SELECT * FROM notificacoes WHERE para IN ('$sala','$clube','$eletiva','todos','$isrespon','$cantina')");
$num5 = mysqli_num_rows($notif);
?>

	  <img src="imagens/drawer_logo.png" onclick="window.open('sala.php', '_self')" style="margin-bottom: 10px;">
	  <core-item icon="social:school" id="sala">
		<div flex>Sala</div>
		<div class="drawerNumber" horizontal center-center layout><? echo $num1; ?></div>
	 <paper-ripple fit class="recenteringTouch"></paper-ripple> </core-item>
      <core-item icon="maps:directions-walk" id="clube">
		<div flex>Clube</div>
		<div class="drawerNumber" horizontal center-center layout><? echo $num2; ?></div>
	  <paper-ripple fit class="recenteringTouch"></paper-ripple></core-item>
      <core-item icon="maps:local-florist" id="eletiva">
		<div flex>Eletiva</div>
		<div class="drawerNumber" horizontal center-center layout><? echo $num3; ?></div>
	  <paper-ripple fit class="recenteringTouch"></paper-ripple></core-item>
      <core-item icon="announcement" id="comunicados">
		<div flex>Comunicados</div>
		<div class="drawerNumber" horizontal center-center layout><? echo $num4; ?></div>
	  <paper-ripple fit class="recenteringTouch"></paper-ripple></core-item>
      <core-item icon="social:notifications" id="notificacoes">
		<div flex>Notificações</div>
		<div class="drawerNumber" horizontal center-center layout><? echo $num5; ?></div>
	  <paper-ripple fit class="recenteringTouch"></paper-ripple></core-item>
      <core-item icon="maps:local-library" label="Biblioteca" id="biblioteca"><paper-ripple fit class="recenteringTouch"></paper-ripple></core-item>
      <core-item icon="maps:local-restaurant" label="Cantina" id="cantina"><paper-ripple fit class="recenteringTouch"></paper-ripple></core-item>
      <core-item icon="note-add" label="Anotações" id="anotacoes"><paper-ripple fit class="recenteringTouch"></paper-ripple></core-item>
      <core-item icon="book" label="Dicionário" id="dicionario"><paper-ripple fit class="recenteringTouch"></paper-ripple></core-item>
      <core-item icon="image:remove-red-eye" label="Cartazes" id="cartazes"><paper-ripple fit class="recenteringTouch"></paper-ripple></core-item>
      <core-item icon="description" label="Blog" onclick="window.open('http://willianrrebua.blogspot.com.br', '_blank')"><paper-ripple fit class="recenteringTouch"></paper-ripple></core-item>
      <core-item icon="description" label="Jornal" onclick="window.open('http://facebook.com/REVOLUCIONARIOSREBUA', '_blank')"><paper-ripple fit class="recenteringTouch"></paper-ripple></core-item>
      <core-item icon="star" label="Facilidades" id="facilidades"><paper-ripple fit class="recenteringTouch"></paper-ripple></core-item>
      <core-item icon="settings" label="Configurações" id="configuracoes"><paper-ripple fit class="recenteringTouch"></paper-ripple></core-item>
      <core-item icon="info" label="Sobre" id="sobre"><paper-ripple fit class="recenteringTouch"></paper-ripple></core-item>