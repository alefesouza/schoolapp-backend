<?php
/*
 * Copyright (C) 2014 Alefe Souza <contato@alefesouza.com>
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
// Última modificação em: 16/10/2014 12:05

include('connect_db.php');

include("pode_nao_pode.php");


$id = $_GET["eventoid"];

$sala = $_GET['sala'];


$room = mysql_query("SELECT * FROM usuarios WHERE login='$login_cookie'") or die("ERROR:" . mysql_error());

$info = mysql_fetch_array($room);


$values = mysql_query("SELECT * FROM eventos WHERE id='$id'") or die("ERROR:" . mysql_error());

$infovalues = mysql_fetch_array($values);

?>

<html>

<head>

<link rel="author" href="https://plus.google.com/101361157875821775334" />

<link rel="me" href="https://plus.google.com/101361157875821775334" />

<link rel="stylesheet" href="/styles/card.css" />

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >

</head>

<body>

<section class="margin card">

<?php

if ($info['sala'] == $infovalues['sala'] || $info['tipo'] == "admin") {

	mysqli_query($dbi, "DELETE FROM eventos WHERE id='$id'");

	if($info['tipo'] == "representante") {

	header("location:agenda.php?sala=".$sala); }

	else if($info['tipo'] == "clubelider") {

	header("location:clube/recados.php?cluberoom=".$sala);

	} else if($info['tipo'] == "eletivaprofessor") {

	header("location:eletiva/recados.php?eletivaroom=".$sala);

	}

	mysqli_close($dbi);

} else {

	echo "Você não tem permissão para fazer isso se não for representante dessa sala<br><br>";

	echo "<a onclick=\"window.history.back();\" style=\"color: #0000ff; cursor: pointer;\">Voltar</a>";

}

?>

</section>

</body>

</html>