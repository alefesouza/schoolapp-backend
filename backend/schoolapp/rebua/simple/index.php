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

	include("connect_db.php");
	include("pode_nao_pode.php");
	
	$room = mysql_query("SELECT * FROM usuarios WHERE login='$login_cookie'") or die("ERROR:" . mysql_error());
	$info = mysql_fetch_array($room);

	if ($info['tipo'] == "admin") {
		header("location:admin/index.php");
	}
?>
<html>
<link rel="author" href="https://plus.google.com/101361157875821775334" />
<link rel="me" href="https://plus.google.com/101361157875821775334" />
<link rel="stylesheet" href="/styles/card.css" />
<body>
<section class="margin card"><div style="float: right"><?php echo "Ol&aacute;, " . $info['nome'] . " - <a href=\"http://aloogle.is-best.net/schoolapp/rebua/logout.php\">Sair</a><br>";
include("sala.php");
echo "</div>";
if ($info['tipo'] == "representante") {
	echo "<br><br><a href=\"adicionar_evento.php\">Adicionar evento</a><br><br>";
	echo "<a href=\"agenda.php?sala=".$info['sala']."\">Editar/remover evento</a>";
} else if ($info['tipo'] == "clubelider") {
	echo "<br><br><a href=\"clube/adicionar_evento.php\">Adicionar evento</a><br><br>";
	echo "<a href=\"clube/recados.php?cluberoom=".$info['sala']."\">Editar/remover evento</a>";
} else if ($info['tipo'] == "eletivaprofessor") {
	echo "<br><br><a href=\"eletiva/adicionar_evento.php\">Adicionar evento</a><br><br>";
	echo "<a href=\"eletiva/recados.php?eletivaroom=".$info['sala']."\">Editar/remover evento</a>";
} else if ($info['tipo'] == "bibliotecario") {
	echo "<br><br><a href=\"biblioteca/adicionar_livro.php\">Adicionar livro</a><br><br>";
	echo "<a href=\"biblioteca/todososlivros.php\">Editar/remover livro</a>";
}
?>
</section>
</body>
</html>