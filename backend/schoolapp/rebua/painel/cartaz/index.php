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
// Última modificação em: 03/04/2015 14:15

	include("../connect_db.php");
	include("pode_nao_pode.php");
	include("../values/head.php");
?>
<html>
<head>
<title>Início - Painel RebuApp</title>
<? configHeader("Início"); ?>
<body>
<section class="margin list center"><span style="line-height: 50px;"><? echo $info['nome']; ?></span><div class="backbutton" onclick="window.open('../logout.php', '_self');">Sair</div></section>
<div class="list">
      <div class="listitem" onclick="window.open('editar_cartaz.php', '_self');">
          Editar cartaz
      </div>
      <div class="listitem" onclick="window.open('editar_cartaz.php?editor=true', '_self');">
          Editar cartaz com editor avançado
      </div>
	</div>
<div class="list" style="border-bottom: none;">
      <div class="listitem" onclick="window.open('enviarmensagem.php', '_self');" style="border-bottom: none;">
          Enviar mensagem ao administrador
      </div>
</div>
<div class="list" style="border-bottom: none;">
      <div class="listitem" onclick="window.open('confirm.php', '_self');" style="border-bottom: none;">
          Remover meu cartaz
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