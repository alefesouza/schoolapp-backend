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

<form method="post" action="adicionado_horario.php">

Sala&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="sala" /><br><br>

Dia&nbsp;&nbsp;&nbsp;&nbsp;<select name="dia"><option value="segunda">Segunda</option><option value="terca">Terça</option><option value="quarta">Quarta</option><option value="quinta">Quinta</option><option value="sexta">Sexta</option></select><br><br>

Ordem&nbsp;&nbsp;&nbsp;<select name="ordem"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select><br><br>

Matéria&nbsp;&nbsp;<input type="text" name="materia" /><br><br>

Professor&nbsp;&nbsp;<input type="text" name="professor" /><br><br>

<input type="submit" />

</form>

</section>

</body>

</html>