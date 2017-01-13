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
// Última modificação em: 28/03/2015 19:29

	include("../connect_db.php");
	$sql = "SELECT * FROM livros";
	$result = mysqli_query($dbi, $sql);

function makeCategory($value, $name) {
	global $dbi; ?>
<p><a href="livros.php?categoria=<? echo $value; ?>"><? echo "{$name} <sup style=\"color: #ff0000;\">".mysqli_num_rows(mysqli_query($dbi, "SELECT * FROM livros WHERE categoria='$value'"))."</sup>"; ?></a></p>
<? } ?>
<html>
<head>
<title>Livros - Painel RebuApp</title>
<link rel="shorcut icon" href="http://apps.aloogle.net/web/rebuapp/imagens/favicon.png" />
<link rel="author" href="https://plus.google.com/101361157875821775334" />
<link rel="me" href="https://plus.google.com/101361157875821775334" />
<link rel="stylesheet" href="/styles/card.css" />
<link rel="stylesheet" href="style/style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
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
<div class="barrabuscapopup"></div><form method="get" action="busca.php"><input type="text" class="text" id="q" placeholder="Pesquisar" name="q"><input type="submit" id="ir" value=""></form></div>
<div id="conteudo">
<section class="margin card">
Total de  <? echo "<font style=\"color: #ff0000;\">".mysqli_num_rows($result)."</font>"; ?> livros cadastrados
<p><b>Categorias</b></p>
<? include("../values/other.php"); ?>
<?
	$livrosarray = getArray("livros", false);
	$livrosarrayvalue = getArray("livros", true);
	for($i = 0; $i < count($livrosarray); $i++) {
		makeCategory($livrosarrayvalue[$i], $livrosarray[$i]);
	}
?>
</section>
</div>
</body>
</html>