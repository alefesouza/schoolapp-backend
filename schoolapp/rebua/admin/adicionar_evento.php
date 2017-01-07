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

	include("pode_nao_pode.php");

?>

<html>

<head>

<link rel="author" href="https://plus.google.com/101361157875821775334" />

<link rel="me" href="https://plus.google.com/101361157875821775334" />

<link rel="stylesheet" href="/styles/card.css" />

<meta name="viewport" content="width=device-width, height=device-height,  initial-scale=1.0, user-scalable=no;user-scalable=0;"/>

</head>

<body>

<section class="margin card">

<form method="post" action="obrigado.php">

<?php

echo "<input type=\"hidden\" name=\"login\" value=\"" . $login_cookie . "\" />\n";

?>

Sala&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="sala" /><br><br>

Data&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="data" /><br><br>

Tema&nbsp;&nbsp;&nbsp;<input type="text" name="tema" /><br><br>

Descrição<br><textarea name="descricao" style="width:100%" rows="10"></textarea><br>

<a href="/cursos/html/mini_curso_html.php">Mini-curso</a><br><br>

<input type="submit" />

</form>

</section>

</body>

</html>