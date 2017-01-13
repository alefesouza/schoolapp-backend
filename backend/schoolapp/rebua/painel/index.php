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
// Última modificação em: 20/05/2015 23:17

	include("connect_db.php");
	include("pode_nao_pode.php");
	include("values/other.php");
	include("values/head.php");

	if($db_tipo == "representante" || $db_tipo == "convidado") { $evorre = "evento"; } else { $evorre = "recado"; }
?>
<html>
<title>Início - Painel RebuApp</title>
<? configHeader("Início"); ?>
<body>
<section class="margin list center"><span style="line-height: 50px;"><? echo $db_nome." - ".getAll($db_sala); ?></span><div class="backbutton" onclick="window.open('logout.php', '_self');">Sair</div></section>
<? if($db_tipo == "representante") { if(!isset($_COOKIE['avisoconvidado'])) { ?>
<section class="margin list center" id="avisoconvidado"><span style="line-height: 50px;">Novo: Agora você pode adicionar convidados para te ajudarem a editar a agenda e horário da sua sala! Clique em "Cadastrar convidado" para começar a adicionar.</span><div class="backbutton" onclick="hide2();">Dispensar</div></section>
<script>
function hide2() {
	document.getElementById('avisoconvidado').style.display = 'none';
	document.cookie='avisoconvidado=true; expires=Fri,01 Jan 2016 12:00:00 UTC';
}
</script>
<? } } ?>
<div class="list">
      <div class="listitem" onclick="window.open('adicionar_evento.php', '_self');">
          Adicionar <? echo $evorre;?>
      </div>
      <div class="listitem" onclick="window.open('adicionar_evento.php?editor=true', '_self');">
          Adicionar <? echo $evorre;?> com editor avançado
      </div>
      <div class="listitem" onclick="window.open('enviar_notificacao.php', '_self');" style="border-bottom: none;">
          Enviar notificação
      </div>
</div>
<div class="list">
      <div class="listitem" onclick="window.open('agenda.php', '_self');">
          Editar ou remover <? echo $evorre;?>s
      </div>
      <div class="listitem" onclick="window.open('notificacoes.php', '_self');">
          Editar ou remover notificações
      </div>
<? if ($db_tipo == "representante") { ?>
      <div class="listitem" onclick="window.open('horario.php', '_self');">
          Editar horário
      </div>
<? } ?>
      <div class="listitem" onclick="window.open('fbid.php', '_self');" style="border-bottom: none;">
          Editar ID do grupo no Facebook
      </div>
	</div>

<? if ($db_tipo != "convidado") { ?>
<div class="list" style="border-bottom: none;">
      <div class="listitem" onclick="window.open('cadastrar_convidado.php', '_self');">
          Cadastrar convidado
      </div>
      <div class="listitem" onclick="window.open('editar_convidado.php', '_self');" style="border-bottom: none;">
          Editar ou remover convidado
      </div>
</div>
<? } ?>

<div class="list" style="border-bottom: none;">
      <div class="listitem" onclick="window.open('enviarmensagem.php', '_self');" style="border-bottom: none;">
          Enviar mensagem ao administrador
      </div>
</div>
</div>
<? if (strpos($_SERVER['HTTP_USER_AGENT'],'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'],'iPad') || strpos($_SERVER['HTTP_USER_AGENT'],'iPod')) {
if($_COOKIE['iosstandalone'] == "true") { ?>
<div class="list">
	<div class="listitem" onclick="window.open('/web/rebuapp/sala.php', '_self');">
		Voltar ao RebuApp
	</div>
</div>
<? } else { ?>
<section class="margin list center" id="avisofavorite"><span style="line-height: 50px;">Dica: Adicione o painel aos seus favoritos para acessar mais rapidamente</span><div class="backbutton" onclick="hide();">Dispensar</div></section>

<script>
function hide() {
	document.getElementById('avisofavorite').style.display = 'none';
	document.cookie='avisofavorite=true; expires=Fri,01 Jan 2016 12:00:00 UTC';
}
</script>
<? }

} else if (!strpos($_SERVER['HTTP_USER_AGENT'],'Android') || (strpos($_SERVER['HTTP_USER_AGENT'],'Android') && strpos($_SERVER['HTTP_USER_AGENT'],'Windows Phone'))) {
if(!isset($_COOKIE['avisofavorite'])) { ?>
<section class="margin list center" id="avisofavorite"><span style="line-height: 50px;">Dica: Adicione o painel aos seus favoritos para acessar mais rapidamente</span><div class="backbutton" onclick="hide();">Dispensar</div></section>

<script>
function hide() {
	document.getElementById('avisofavorite').style.display = 'none';
	document.cookie='avisofavorite=true; expires=Fri,01 Jan 2016 12:00:00 UTC';
}
</script>
<? }} ?>
</body>
</html>