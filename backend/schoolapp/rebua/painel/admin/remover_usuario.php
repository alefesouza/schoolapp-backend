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
	include('../values/other.php');
		if($_GET['data'] == "true") {
			$data = "active"; $recente = "backbutton";
			$result = mysqli_query($dbi, "SELECT * FROM usuarios WHERE tipo != 'admin' ORDER BY STR_TO_DATE(ultimoacesso, '%d/%m/%Y %T:%f') DESC");
		} else {
			$data = "backbutton"; $recente = "active";
			$result = mysqli_query($dbi, "SELECT * FROM usuarios WHERE tipo != 'admin' ORDER BY id DESC");
		}
?>
<html>
<head>
<?
$title = "Gerenciar usuários";
include("../values/head.php");
	toTitle($title); ?>
</head>
<body>
<? toTitle2($title); ?><section class="margin card center" style="padding: 0; margin-top: 10px;"><div class="<? echo $recente; ?>" style="width: 50%; float: left; border-left: none;" onclick="window.open('remover_usuario.php?oque=eventos', '_self');">Mais recentes</div><div class="<? echo $data; ?>" style="width: 50%;" onclick="window.open('remover_usuario.php?oque=eventos&data=true', '_self');">Último acesso</div></section>
<?
while ($row = mysqli_fetch_array($result)) { ?>
<section class="margin card" style="width: 99%;">
<p><b>ID:</b> <? echo $row['id']; ?></p>
<p><b>Nome:</b> <? echo $row['nome']; ?></p>
<p><b>Login:</b> <? echo $row['login']; ?></p>
<p><b>Senha:</b> <? echo $row['senha']; ?></p>
<p><b>Token:</b> <? echo $row['token']; ?></p>
<p><b>Sala:</b> <? echo $row['sala']; ?></p>
<p><b>Tipo:</b> <? echo $row['tipo']; ?></p>
<? if($row['ultimaedicao'] != "") { $ultima = $row['ultimaedicao']; } else { $ultima = "Nunca"; } ?>
<p><b>Última edição:</b> <? echo $ultima; ?></p>
<? if($row['ultimoacesso'] != "") { $ultimo = $row['ultimoacesso']; } else { $ultimo = "Nunca"; } ?>
<p><b>Último acesso:</b> <? echo $ultimo; ?></p>
<b><a class="btn btn-flat" href="editar_usuario.php?id=<? echo $row['id']; ?>">Editar</a></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a class="btn btn-flat"  href="removido.php?id=<? echo $row['id']; ?>">Apagar</a></b>
</section>
<? }
include("../values/materialinit.php"); ?>
</body>
</html>