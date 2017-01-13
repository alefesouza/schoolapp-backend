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



	$room = mysql_query("SELECT * FROM usuarios WHERE login='$login_cookie'") or die("ERROR:" . mysql_error());

	$info = mysql_fetch_array($room);

?>

<html>

<head>

<link rel="author" href="https://plus.google.com/101361157875821775334" />

<link rel="me" href="https://plus.google.com/101361157875821775334" />

<link rel="stylesheet" href="/styles/card.css" />

<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no;user-scalable=0;"/>

<style>

table {

	border: none;

}



td {

	text-align: left;

	width: 100;

	border: none;

}

</style>

</head>

<body>

<section class="margin card">

<form method="post" action="obrigado.php">

<table>

<tr>

<td>Categoria</td><td><select name="categoria"><option value="arte">Arte</option><option value="atualidades">Atualidades</option><option value="biologia">Biologia</option><option value="dvd">DVD</option><option value="atualidades">Atualidades</option><option value="educacaofisica">Educa&ccedil;&atilde;o F&iacute;sica</option><option value="educacao">Educa&ccedil;&atilde;o</option><option value="filosofia">Filosofia</option><option value="fisica">F&iacute;sica</option><option value="geografia">Geografia</option><option value="historia">Hist&oacute;ria</option><option value="linguainglesa">L&iacute;ngua Inglesa</option><option value="linguaportuguesa">L&iacute;ngua Portuguesa</option><option value="literaturaacervo">Literatura Acervo</option><option value="matematica">Matem&aacute;tica</option><option value="poesia">Poesia</option><option value="sociologia">Sociologia</option><option value="teatro">Teatro</option></select></td>

<tr>

<td>Obra</td><td><input type="text" name="obra" /></td>

<tr>

<td>Autor</td><td><input type="text" name="autor" /></td>

<tr>

<td>Editora</td><td><input type="text" name="editora" /></td>

<tr>

<td>Quantidade</td><td><input type="text" name="quantidade" /></td>

<tr>

</table>

<input type="submit" />

</form>

</section>

</body>

</html>