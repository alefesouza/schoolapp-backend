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
include("pode_nao_pode.php"); ?>
<html>
<head>
<?
$title = "Editar horário";
include("../values/head.php");
	toTitle($title); ?>
</head>
<body>
<section class="margin list center"><span style="line-height: 50px;"><? echo $title; ?></span><div class="backbutton" onclick="window.open('index.php', '_self');">Voltar</div></section>
<div class="list">
      <div class="header">
          <span class="titulo">Editar horário do:</span>
      </div>
		<?
			include("../values/other.php");
			$salaarray = getArray("sala", false);
			$salaarrayvalue = getArray("sala", true);
			for($i = 0; $i < count($salaarray); $i++) {
		?>
		<div class="listitem" <? if($i == count($salaarray) - 1) { ?> style="border-bottom: none;" <? } ?> onclick="window.open('horario2.php?sala=<? echo $salaarrayvalue[$i]; ?>', '_self');">
			<? echo $salaarray[$i]; ?>
		</div>
		<? } ?>
</div>
<? include("../values/materialinit.php"); ?>
</body>
</html>