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


include('../connect_db.php');

include("pode_nao_pode.php");



$id = $_GET["horarioid"];



$values = mysql_query("SELECT * FROM horarios WHERE id='$id'") or die("ERROR:" . mysql_error());

$infovalues = mysql_fetch_array($values);



mysqli_close($dbi);

?>

<html>

<head>

<link rel="author" href="https://plus.google.com/101361157875821775334" />

<link rel="me" href="https://plus.google.com/101361157875821775334" />

<link rel="stylesheet" href="/styles/card.css" />

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >

<meta name="viewport" content="width=device-width, height=device-height,  initial-scale=1.0, user-scalable=no;user-scalable=0;"/>

</head>

<body>

<section class="margin card">

<form method="post" action="editado_horario.php">

<input type="hidden" name="horarioid" value="<? echo $id ?>" />

Nome&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="sala" value="<? echo $infovalues['sala'] ?>" /><br><br>

Login&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="dia" value="<? echo $infovalues['dia'] ?>" /><br><br>

Senha&nbsp;&nbsp;&nbsp;<input type="text" name="ordem" value="<? echo $infovalues['ordem'] ?>" /><br><br>

Sala&nbsp;&nbsp;&nbsp;<input type="text" name="materia" value="<? echo $infovalues['materia'] ?>" /><br><br>

Tipo&nbsp;&nbsp;&nbsp;<input type="text" name="professor" value="<? echo $infovalues['professor'] ?>" /><br><br>

<input type="submit" value="Salvar" />

<button onclick="window.open('index.php', '_self');">Cancelar</button>

</form>

</section>

</body>

</html>