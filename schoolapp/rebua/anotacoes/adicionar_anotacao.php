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
// Última modificação em: 15/10/2014 22:42

	include("../connect_db.php");

	include("../pode_nao_pode.php");


	$room = mysql_query("SELECT * FROM usuarios WHERE login='$login_cookie'") or die("ERROR:" . mysql_error());

	$info = mysql_fetch_array($room);

?>

<html>

<link rel="author" href="https://plus.google.com/101361157875821775334" />

<link rel="me" href="https://plus.google.com/101361157875821775334" />

<link rel="stylesheet" href="/styles/card.css" />

<meta name="viewport" content="width=device-width, height=device-height,  initial-scale=1.0, user-scalable=no;user-scalable=0;"/>

<body>

<section class="margin card">

<form method="post" action="anotado.php">

<?php

echo "<input type=\"hidden\" name=\"sala\" value=\"" . $info['sala'] . "\" />\n";

echo "<input type=\"hidden\" name=\"login\" value=\"" . $login_cookie . "\" />\n";

?>

T&iacute;tulo<font class="obrigatory">*</font>&nbsp;&nbsp;<input type="text" name="titulo" /><br><br>

Descri&ccedil;&atilde;o <br><textarea name="descricao" style="width:100%" rows="10"></textarea><br><br>

<font class="explicacao">Escreva "&lt;br&gt;" para adicionar uma nova linha<br>

Personalize a descri&ccedil;&atilde;o com cores, imagens, links, tabelas, etc. fazendo um mini-curso de HTML <a href="/cursos/html/mini_curso_html.php">clicando aqui</a></font><br><br>

<input type="submit" />

</form>

</section>

</body>

</html>