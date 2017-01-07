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
// Última modificação em: 07/09/2014 20:39

	include("../connect_db.php");

	include("pode_nao_pode.php");

?>

<html>

<head>

<link rel="author" href="https://plus.google.com/101361157875821775334" />

<link rel="me" href="https://plus.google.com/101361157875821775334" />

<link rel="stylesheet" href="/styles/card.css" />

</head>

<body>

<?php


$result = mysqli_query($dbi, "SELECT * FROM eventos ORDER BY id DESC");


while ($row = mysqli_fetch_array($result)) {

		echo "<section class=\"margin card\">\n";

		echo "<p><b>Sala:</b> ".$row['sala']."</p>\n";

		echo "<p><b>Data:</b> ".$row['data']."</p>\n";

		echo "<p><b>Tema:</b> ".$row['tema']."</p>\n";

		echo "<p><b>Descrição:<br></b> ".$row['descricao']."</p>\n";

		echo "<p><b>Editado por:</b> ".$row['editadopor']."</p>\n";

		echo "<a href=\"http://aloogle.is-best.net/schoolapp/rebua/admin/editar_evento.php?eventoid=".$row['id']."\">Editar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"http://aloogle.is-best.net/schoolapp/rebua/admin/apagar_evento.php?eventoid=".$row['id']."\">Apagar</a>";

		echo "</section>";

}


mysql_close($dbi);

?>

</body>

</html>