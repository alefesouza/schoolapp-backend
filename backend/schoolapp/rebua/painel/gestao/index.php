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
// Última modificação em: 14/08/2015 02:23

	include("../connect_db.php");
	include("pode_nao_pode.php");
	include("../values/other.php");
	include("../values/head.php");

$result = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala NOT like('%cartaz%') AND sala NOT like('%clube%') AND sala NOT like('%eletiva%') AND sala NOT IN ('cantina', 'biblioteca') ORDER BY id DESC");
while ($row = mysqli_fetch_array($result)) {
		$sala = getAll($row['sala']);
		$salas[] = $sala;
}
?>
<html>
<head>
<title>Início - Painel RebuApp</title>
<? configHeader("Início"); ?>
<body>
<section class="margin list center" style="padding: 0;"><span style="line-height: 50px;"><? echo $info['nome']; ?></span><div class="backbutton" onclick="window.open('../logout.php', '_self');">Sair</div></section>
<?
if(count($salas) > 0) { ?>
<div class="list">
	<div class="listitem" style="border-bottom: none;">
	As salas com eventos no aplicativo:
<? $salas = array_unique($salas);
$count = 0;
$max = count($salas);
foreach($salas as $sala) {
	echo $sala;
	$count += 1;
		if($count < $max) { echo ", "; }
	}
}
?>
	</div>
</div>
	
<div class="list">
	
      <div class="listitem" onclick="window.open('adicionar_comunicado.php', '_self');">
          Adicionar comunicado
      </div>
      <div class="listitem" onclick="window.open('adicionar_comunicado.php?editor=true', '_self');">
          Adicionar comunicado com editor avançado
      </div>
      <div class="listitem" onclick="window.open('enviar_notificacao.php', '_self');">
          Enviar notificação
      </div>
      <div class="listitem" onclick="window.open('cadastrar_usuario.php', '_self');" style="border-bottom: none;">
          Cadastrar usuário
      </div>
	</div>
	<div class="list">
      <div class="listitem" onclick="window.open('comunicados.php', '_self');">
          Editar ou remover comunicados
      </div>
      <div class="listitem" onclick="window.open('notificacoes.php', '_self');">
          Editar ou remover notificações
      </div>
      <div class="listitem" onclick="window.open('remover_usuario.php', '_self');">
          Editar ou remover usuário
      </div>
      <div class="listitem" onclick="window.open('horario.php', '_self');" style="border-bottom: none;">
          Editar horário
      </div>
		</div>
	<div class="list">
      <div class="listitem" onclick="window.open('todos.php?oque=eventos', '_self');">
          Ver todos os eventos&nbsp;
<?
	$sqle = "SELECT * FROM eventos WHERE sala NOT IN ('gestao','bibliotecario','cantina') AND sala NOT like ('%cartaz%') ORDER BY id DESC";
	$result = mysqli_query($dbi, $sqle);
	echo "<sup style=\"color: #ff0000;\">".mysqli_num_rows($result)."</sup>";
?>
      </div>
      <div class="listitem" onclick="window.open('todos.php?oque=notificacoes', '_self');" style="border-bottom: none;">
          Ver todas as notificações&nbsp;
<?
	$sqle2 = "SELECT * FROM notificacoes";
	$result2 = mysqli_query($dbi, $sqle2);
	echo "<sup style=\"color: #ff0000;\">".mysqli_num_rows($result2)."</sup>";
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