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
// Última modificação em: 15/03/2015 18:34

include('../connect_db.php');
include("pode_nao_pode.php");
include('../values/other.php');

$sala = $_GET['sala']; ?>
<html>
<head>
<?
$title = "Editar horário - ".getSala($sala);
include("../values/head.php");
	toTitle($title); ?>
</head>
<body>
<section class="margin list center"><span style="line-height: 50px;"><? echo $title; ?></span><div class="backbutton" onclick="window.open('index.php', '_self');">Voltar</div></section>
<div class="list">
      <div class="header">
		  <span class="titulo">Editar horário de:</span>
      </div>
      <div class="listitem" onclick="window.open('editar_horario.php?sala=<? echo $sala; ?>&dia=segunda', '_self');">
          Segunda
      </div>
      <div class="listitem" onclick="window.open('editar_horario.php?sala=<? echo $sala; ?>&dia=terca', '_self');">
          Terça
      </div>
      <div class="listitem" onclick="window.open('editar_horario.php?sala=<? echo $sala; ?>&dia=quarta', '_self');">
          Quarta
      </div>
      <div class="listitem" onclick="window.open('editar_horario.php?sala=<? echo $sala; ?>&dia=quinta', '_self');">
          Quinta
      </div>
      <div class="listitem" style="border-bottom: none;" onclick="window.open('editar_horario.php?sala=<? echo $sala; ?>&dia=sexta', '_self');">
          Sexta
      </div>
</div>
<? include("../values/materialinit.php"); ?>
</body>
</html>