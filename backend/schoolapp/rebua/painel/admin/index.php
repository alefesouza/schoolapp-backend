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
// Última modificação em: 15/10/2014 22:40

	include("../connect_db.php");
	include("pode_nao_pode.php");
	include("../values/head.php");
?>
<html>
<head>
<title>Início - Painel RebuApp</title>
<? configHeader("Início"); ?>
<link rel="shorcut icon" href="http://apps.aloogle.net/web/rebuapp/imagens/favicon.png" />
<link rel="author" href="https://plus.google.com/101361157875821775334" />
<link rel="stylesheet" href="/styles/card.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
</head>
<body>
<section class="margin list center" style="padding: 0;"><span style="line-height: 50px;"><? echo $info['nome']; ?></span><div class="backbutton" onclick="window.open('../logout.php', '_self');">Sair</div></section>
<div class="list">
	
      <div class="listitem" onclick="window.open('adicionar_evento.php', '_self');">
          Adicionar evento
      </div>
      <div class="listitem" onclick="window.open('enviar_notificacao.php', '_self');">
          Enviar notificação
      </div>
      <div class="listitem" onclick="window.open('cadastrar_usuario.php', '_self');" style="border-bottom: none;">
          Cadastrar usuário
      </div>
	</div>
	<div class="list">
      <div class="listitem" onclick="window.open('remover_eventos.php', '_self');">
           Editar ou remover eventos&nbsp;
<?
	$sqle = "SELECT * FROM eventos";
	$result = mysqli_query($dbi, $sqle);
	echo "<sup style=\"color: #ff0000;\">".mysqli_num_rows($result)."</sup>";
?>
      </div>
      <div class="listitem" onclick="window.open('remover_notificacoes.php', '_self');">
          Editar ou remover notificações&nbsp;
<?
	$sqle2 = "SELECT * FROM notificacoes";
	$result2 = mysqli_query($dbi, $sqle2);
	echo "<sup style=\"color: #ff0000;\">".mysqli_num_rows($result2)."</sup>";
?>
      </div>
      <div class="listitem" onclick="window.open('remover_usuario.php', '_self');" style="border-bottom: none;">
          Editar ou remover usuário
      </div>
	</div>
	<div class="list">
      <div class="listitem" onclick="window.open('mensagens.php', '_self');" style="border-bottom: none;">
          Mensagens&nbsp;
<?
	$sqlm = "SELECT * FROM mensagens";
	$resultm = mysqli_query($dbi, $sqlm);
	echo "<sup style=\"color: #ff0000;\">".mysqli_num_rows($resultm)."</sup>";
?>
      </div>
		</div>
</div>
<? if (strpos($_SERVER['HTTP_USER_AGENT'],'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'],'iPad')) {
if($_COOKIE['iosstandalone'] == "true") { ?>
<div class="list">
	<div class="listitem" onclick="window.open('/web/rebuapp/sala.php', '_self');">
		Voltar ao RebuApp
	</div>
</div>
<? }} ?>
</body>
</html>