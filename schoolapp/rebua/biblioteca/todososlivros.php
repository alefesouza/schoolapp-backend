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
// Última modificação em: 16/10/2014 01:35

	include("../connect_db.php");

?>

<html>

<head>

<link rel="author" href="https://plus.google.com/101361157875821775334" />

<link rel="me" href="https://plus.google.com/101361157875821775334" />

<link rel="stylesheet" href="/styles/card.css" />

<style>

#conteudo {

	margin-top: 70px;

}


.button {

	top: 0;

	position:absolute;

	z-index:2;

	padding:1rem;

	box-shadow:0 1px 2px #aaa;right: 0;

	left: 0;

	background: white;

	text-align: center;

}

</style>

</head>

<body>

<div id="addbutton" class="button">

<div class="barrabuscapopup"></div><form method="get" action="busca.php"><input type="text" class="text" id="q" style="float:left; width: 85%; height: 30px; -webkit-border-radius: 0px;" placeholder="Pesquisar" name="q" value="<? echo $busca ?>"><input type="submit" id="ir" style="width: 15%; height: 30px; border: 1px solid rgb(0, 0, 0); float: left; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; background-image: url(http://aloogle.is-best.net/styles/media/buscawp72.png); background-color: rgb(0, 255, 255); background-position: 50% 50%; background-repeat: no-repeat;" class="azul" value=""></form></div>

<div id="conteudo">

<?php

$login_cookie = $_COOKIE['login'];

$room = mysql_query("SELECT * FROM usuarios WHERE login='$login_cookie'")or die("ERROR:".mysql_error());

$info = mysql_fetch_array($room);


$result = mysqli_query($dbi, "SELECT * FROM livros order by id desc");

while ($row = mysqli_fetch_array($result)) {

		echo "<section class=\"margin card\">\n";

		echo "<p><b>ID:</b> ".$row['id']."</p>";

		echo "<p><b>Obra:</b> ".$row['obra']."</p>";

		echo "<p><b>Autor:</b> ".$row['autor']."</p>";

		echo "<p><b>Categoria:</b> ";

		include('categoria.php');

		echo "</p><p><b>Editora:</b> ".$row['editora']."</p>";

		echo "<p><b>Quantidade:</b> ".$row['quantidade']."</p>";

		if ($info['tipo'] == "bibliotecario" || $info['tipo'] == "admin") {

			echo "<a href=\"editar_livro.php?id=".$row['id']."&aloogleapp=needinternet\">Editar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"apagar_livro.php?id=".$row['id']."&aloogleapp=needinternet\">Apagar</a>\n";

		}

		echo "</section>\n";

}


mysql_close($dbi);

?>

</div>

</body>

</html>