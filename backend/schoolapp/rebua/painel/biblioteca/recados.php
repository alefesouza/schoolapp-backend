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
// Última modificação em: 26/03/2015 18:33

include("../connect_db.php");
include("pode_nao_pode.php");

$sala = $info['sala'];
?>
<html>
<head>
<? 
$title = "Gerenciar recados";
include("../values/head.php");
	toTitle($title); ?>
</head>
<body>
<? toTitle2($title); ?>
<?
$result = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala='$sala' ORDER BY data");
while ($row = mysqli_fetch_array($result)) { ?>
<section class="margin card">
<p><b><? echo $row['data'];
if ($row['data'] != "") {
	echo " - ";
};
echo $row['titulo']; ?></b></p>
<p><? if($row['tipo'] == "1") { $tipo = "true"; echo $row['descricao']; } else { $tipo = "false"; echo str_replace("\n", "<br>", $row['descricao']); } ?></p>
<a class="btn btn-flat" onclick="window.open('editar_recado.php?id=<? echo $row['id']; ?>&aloogleapp=needinternet&editor=<? echo $tipo; ?>', '_self')"><b>Editar</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-flat" onclick="window.open('apagar_recado.php?id=<? echo $row['id']; ?>&aloogleapp=needinternet', '_self');"><b>Apagar</b></a>
</section>
<? }

if(mysqli_num_rows($result) == 0) { ?>
<section class="margin card">
	Não há recados
</section>
<? }

include("../values/materialinit.php"); ?>
</body>
</html>