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
// Última modificação em: 18/09/2014 22:57

	include("../connect_db.php");

	include("../pode_nao_pode.php");

?>

<html>

<link rel="stylesheet" href="/styles/card.css" />

<section class="margin card">

<?


$sala = mysqli_real_escape_string($dbi, $_POST['sala']);

$titulo = mysqli_real_escape_string($dbi, $_POST['titulo']);

$descricao = mysqli_real_escape_string($dbi, $_POST['descricao']);

$login = mysqli_real_escape_string($dbi, $_POST['login']);


	$sql="INSERT INTO anotacoes (sala, login, titulo, descricao)

	VALUES ('$sala', '$login', '$titulo', '$descricao')";


	if (!mysqli_query($dbi,$sql)) {

	  die('ERROR: ' . mysqli_error($dbi));

	}


	$room = mysql_query("SELECT * FROM usuarios WHERE login='$login_cookie'") or die("ERROR:" . mysql_error());

	$info = mysql_fetch_array($room);


	header("location:anotacoes.php");


mysqli_close($dbi);

?>

</section>

</html>