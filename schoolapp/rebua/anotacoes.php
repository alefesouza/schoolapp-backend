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
// Última modificação em: 17/09/2014 22:22
// Comentário 07/01/2017 01:17 - Acho que decidi deixar as anotações locais e deixei essa página vagando, achei estranho essa query da variável $result também.
?>
<html>

<head>

<link rel="author" href="https://plus.google.com/101361157875821775334" />

<link rel="me" href="https://plus.google.com/101361157875821775334" />

<link rel="stylesheet" href="/styles/card.css" />

</head>

<body>

<?php


include("connect_db.php");


$login_cookie = $_COOKIE['login'];

$room = mysql_query("SELECT * FROM anotacoes WHERE login='$login_cookie'")or die("ERROR:".mysql_error());

$info = mysql_fetch_array($room);


$result = mysqli_query($dbi, "SELECT * FROM eventos ORDER BY data");

while ($row = mysqli_fetch_array($result)) {

	if ($row['login'] == $login) {

		echo "<section class=\"margin card\">\n";

		echo "<p><b>".$row['data'];

		if ($row['data'] != "") {

			echo " - ";

		};

		echo $row['tema']."</b></p>\n";

		echo "<p>".$row['descricao']."</p>\n";

		if ($sala == $info['sala'] || $info['tipo'] == "admin") {

			echo "<a href=\"editar_anotacao.php?eventoid=".$row['id']."&sala=".$sala."\">Editar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"apagar_anotacao.php?eventoid=".$row['id']."&sala=".$sala."\">Apagar</a>\n";

		}

		echo "</section>\n";

	}

}


mysql_close($dbi);

?>

</body>

</html>