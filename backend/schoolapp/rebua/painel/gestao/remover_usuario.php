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
// Última modificação em: 20/05/2015 22:27

	include("../connect_db.php");
	include("pode_nao_pode.php");
	include('../values/other.php');
?>
<html>
<head>
<?
$title = "Gerenciar usuários";
include("../values/head.php");
	toTitle($title); ?>
</head>
<body>
<? toTitle2($title);

$result = mysqli_query($dbi, "SELECT * FROM usuarios WHERE tipo NOT IN ('admin','gestao','bibliotecario','pasquale') ORDER BY id DESC");
while ($row = mysqli_fetch_array($result)) {
	if($row['tipo'] == "clubelider") { $tipo = "Líder de clube"; } else if($row['tipo'] == "eletivaprofessor") { $tipo = "Professor de eletiva"; } else if($row['tipo'] == "cartazadmin") { $tipo = "Administrador de cartaz (".$row['sala'].")"; } else if($row['tipo'] == "convidado") { $tipo = "Convidado pelo representante"; } else { $tipo = "Representate de sala"; }
	if(getAll($row['sala']) != "") { $sala = getAll($row['sala']);  } else { $sala = $row['sala']; } ?>
<section class="margin card" style="width: 99%;">
<p><b>Nome:</b> <? echo $row['nome']; ?></p>
<p><b>Login:</b> <? echo $row['login']; ?></p>
<p><b>Sala:</b> <? echo $sala; ?></p>
<p><b>Tipo:</b> <? echo $tipo; ?></p>
<? if($row['ultimaedicao'] != "") { $ultima = $row['ultimaedicao']; } else { $ultima = "Nunca"; } ?>
<p><b>Última edição:</b> <? echo $ultima; ?></p>
<b><a class="btn btn-flat" href="editar_usuario.php?id=<? echo $row['id']; ?>">Editar</a></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a class="btn btn-flat"  href="removido.php?id=<? echo $row['id']; ?>">Apagar</a></b>
</section>
<? }
include("../values/materialinit.php"); ?>
</body>
</html>