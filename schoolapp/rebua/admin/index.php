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
// Última modificação em: 26/10/2014 23:04

	include("../connect_db.php");

	include("pode_nao_pode.php");

?>

<html>

<link rel="author" href="https://plus.google.com/101361157875821775334" />

<link rel="me" href="https://plus.google.com/101361157875821775334" />

<link rel="stylesheet" href="/styles/card.css" />

<body>

<section class="margin card">

<a href="adicionar_evento.php">Adicionar evento</a><br><br>

<a href="remover_eventos.php">Editar/remover eventos</a>&nbsp;

<?

	$sqle = "SELECT * FROM eventos";

	$result = mysql_query($sqle,$connect);

	echo "<sup style=\"color: #ff0000;\">".mysql_num_rows($result)."</sup>";

?>

<br><br>

<a href="mensagens.php">Mensagens</a>&nbsp;

<?

	$sql = "SELECT * FROM mensagens";

	$result = mysql_query($sql,$connect);

	echo "<sup style=\"color: #ff0000;\">".mysql_num_rows($result)."</sup>";

	mysql_close($connect);

?>

<br><br>

<a href="adicionar_horario.php">Adicionar horario</a><br><br>

<a href="editar_horario.php">Editar horario</a><br><br>

<a href="../horarios.php">Ver horario</a><br><br>

<a href="cadastrar_usuario.php">Cadastrar usuário</a><br><br>

<a href="remover_usuario.php">Editar/remover usuário</a><br><br>

<a href="../logout.php">Sair</a>

</section>

</body>

</html>