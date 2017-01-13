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
?>
<html>
<head>
<?
$title = "Gerenciar notificações";
include("../values/head.php");
	toTitle($title); ?>
</head>
<body>
<? toTitle2($title);

$result = mysqli_query($dbi, "SELECT * FROM notificacoes ORDER BY id DESC");

while ($row = mysqli_fetch_array($result)) { ?>
<section class="margin card">
<p><b>De:</b> <? echo $row['de']; ?></p>
<p><b>Para:</b> <? echo $row['para']; ?></p>
<p><b>Título:</b> <? echo $row['titulo']; ?></p>
<p><b>Descrição:<br></b> <? echo $row['descricao']; ?></p>
<a class="btn btn-flat" href="editar_notificacao.php?id=<? echo $row['id']; ?>">Editar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-flat" href="apagar_notificacao.php?id=<? echo $row['id']?>">Apagar</a>
</section>
<? } ?>
</body>
</html>