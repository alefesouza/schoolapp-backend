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

include('../connect_db.php');
include("pode_nao_pode.php");

$id = $_GET["id"];
$sala = $info["sala"];

$values = mysqli_query($dbi, "SELECT * FROM eventos WHERE id='$id'");
$infovalues = mysqli_fetch_array($values);

if ($info['sala'] == $infovalues['sala'] || $info['tipo'] == "admin") {
	mysqli_query($dbi, "DELETE FROM eventos WHERE id='$id'");
	header("location:recados.php");
} else { ?>
<html>
<head>
<link rel="author" href="https://plus.google.com/101361157875821775334" />
<link rel="me" href="https://plus.google.com/101361157875821775334" />
<link rel="stylesheet" href="/styles/card.css" />
</head>
<body>
<section class="margin card">Você não tem permissão para fazer isso.<br><br>
<a href="recados.php">Voltar</a></section>
</body>
</html>
<? }
mysqli_close($dbi);
?>