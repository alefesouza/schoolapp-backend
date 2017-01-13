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



$id = $_GET["usuarioid"];



$values = mysql_query("SELECT * FROM usuarios WHERE id='$id'") or die("ERROR:" . mysql_error());

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

<form method="post" action="editado.php">

<?php 

echo "<input type=\"hidden\" name=\"usuarioid\" value=\"" . $id . "\" />";

echo "Nome&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"nome\" value=\"" . $infovalues['nome'] . "\" /><br><br>";

echo "Login&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"login\" value=\"" . $infovalues['login'] . "\" /><br><br>";

echo "Senha&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"senha\" value=\"" . $infovalues['senha'] . "\" /><br><br>";

echo "Sala&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"sala\" value=\"" . $infovalues['sala'] . "\" /><br><br>";

echo "Tipo&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"tipo\" value=\"" . $infovalues['tipo'] . "\" /><br><br>";

echo "<input type=\"submit\" value=\"Salvar\" />";

echo "<button onclick=\"window.open('index.php', '_self');\">Cancelar</button>"; ?>

</form>

</section>

</body>

</html>