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
// Última modificação em: 08/05/2015 21:57

	include("connect_db.php");
	include("pode_nao_pode.php");
	include('values/other.php');

if ($db_tipo != "representante") {
	header("location:index.php");
}
?>
<html>
<head>
<?
$title = "Gerenciar convidados - ".getAll($info['sala']);
include("values/head.php");
	toTitle($title); ?>
</head>
<body>
<? toTitle2($title);

$result = mysqli_query($dbi, "SELECT * FROM usuarios WHERE tipo='convidado' AND sala='$db_sala' ORDER BY id DESC");
while ($row = mysqli_fetch_array($result)) {
	if(getAll($row['sala']) != "") { $sala = getAll($row['sala']);  } else { $sala = $row['sala']; } ?>
<section class="margin card" style="width: 99%;" id="usuario<? echo $row['id']; ?>">
<p><b>Nome:</b> <? echo $row['nome']; ?></p>
<p><b>Login:</b> <? echo $row['login']; ?></p>
<? if($row['ultimaedicao'] != "") { $ultima = $row['ultimaedicao']; } else { $ultima = "Nunca"; } ?>
<p><b>Última edição:</b> <? echo $ultima; ?></p>
<b><a class="btn btn-flat" href="editar_convidado2.php?id=<? echo $row['id']; ?>">Editar</a></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a class="btn btn-flat" onclick="del('<? echo $row['id']; ?>')">Apagar</a></b>
</section>
<? }

if(mysqli_num_rows($result) == 0) { ?>
<section class="margin card">
	Não há convidados
</section>
<? }

include("values/materialinit.php"); ?>
<script>
function del(id) {
	$.ajax('apagar_convidado.php?id=' + id)
	.done(function (json) {
		$("#usuario" + id).remove();
	})
	.fail(function () {
		alert('Falha ao apagar usu\u00e1rio');
	});
}
</script>
</body>
</html>