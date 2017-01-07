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
// Última modificação em: 11/11/2014 03:38
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

$room = mysql_query("SELECT * FROM usuarios WHERE login='$login_cookie'") or die ("ERROR:".mysql_error());

$info = mysql_fetch_array($room);

$sala = $_GET['sala'];

// Comentário 07/01/2017 01/07/2017 - Tentei participar da Maratona de Aplicativos da FIAP em 2014 com esse app huehaheu.
if ($_COOKIE['avisofiap'] != "avisado") {

if ($_GET['sala'] == "fiap") {

	echo "<section class=\"margin card\"><p>Oi FIAP, quer testar como essa &aacute;rea funciona? V&aacute; no Painel e coloque como login e senha \"testefiap\", de prefer&ecirc;ncia use dois celulares para ver que quando adiciona o evento em um, na hora aparece no outro :)</p><a onclick=\"document.cookie='avisofiap=avisado; expires=Thu, 01 Jan 2015 12:00:00 UTC'; location.reload();\" style=\"color: #0000ff; cursor:pointer;\">Dispensar</a>

	</section>";

}}


$result = mysqli_query($dbi, "SELECT * FROM eventos ORDER BY data");

while ($row = mysqli_fetch_array($result)) {

	if ($row['sala'] == $sala) {

		echo "<section class=\"margin card\">\n";

		echo "<p><b>".$row['data'];

		if ($row['data'] != "") {

			echo " - ";

		};

		echo $row['tema']."</b></p>\n";

		echo "<p>".$row['descricao']."</p>\n";

		if ($sala == $info['sala'] || $info['tipo'] == "admin") {

			echo "<a href=\"editar_evento.php?eventoid=".$row['id']."&sala=".$sala."&aloogleapp=needinternet\">Editar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"apagar_evento.php?eventoid=".$row['id']."&sala=".$sala."&aloogleapp=needinternet\">Apagar</a>\n";

		}

		echo "</section>\n";

	}

}


mysql_close($dbi);

?>

</body>

</html>