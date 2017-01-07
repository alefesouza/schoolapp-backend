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
// Última modificação em: 15/10/2014 19:35

	include("../connect_db.php");

	$sql = "SELECT * FROM livros";

	$result = mysql_query($sql,$connect);

?>

<html>

<head>

<link rel="author" href="https://plus.google.com/101361157875821775334" />

<link rel="me" href="https://plus.google.com/101361157875821775334" />

<link rel="stylesheet" href="/styles/card.css" />

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

<div class="barrabuscapopup"></div><form method="get" action="busca.php"><input type="text" class="text" id="q" style="float:left; width: 85%; height: 30px; -webkit-border-radius: 0px;" placeholder="Pesquisar" name="q"><input type="submit" id="ir" style="width: 15%; height: 30px; border: 1px solid rgb(0, 0, 0); float: left; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; background-image: url(https://raw.githubusercontent.com/alefesouza/descicloapp-chrome/master/DescicloApp/imagens/buscawp72.png); background-color: rgb(0, 255, 255); background-position: 50% 50%; background-repeat: no-repeat;" class="azul" value=""></form></div>

<div id="conteudo">

<section class="margin card">

Total de  <? echo "<font style=\"color: #ff0000;\">".mysql_num_rows($result)."</font>"; mysql_close($connect); ?> livros cadastrados

<p><b>Categorias</b></p>

<a href="livros.php?categoria=arte">Arte</a>

<p><a href="livros.php?categoria=atualidades">Atualidades</a><p>

<p><a href="livros.php?categoria=biologia">Biologia</a><p>

<p><a href="livros.php?categoria=dvd">DVD</a><p>

<p><a href="livros.php?categoria=educacaofisica">Educação Física</a><p>

<p><a href="livros.php?categoria=educacao">Educação</a><p>

<p><a href="livros.php?categoria=filosofia">Filosofia</a><p>

<p><a href="livros.php?categoria=fisica">Física</a><p>

<p><a href="livros.php?categoria=geografia">Geografia</a><p>

<p><a href="livros.php?categoria=historia">História</a><p>

<p><a href="livros.php?categoria=linguainglesa">Língua Inglesa</a><p>

<p><a href="livros.php?categoria=linguaportuguesa">Língua Portuguesa</a><p>

<p><a href="livros.php?categoria=literaturaacervo">Literatura Acervo</a><p>

<p><a href="livros.php?categoria=matematica">Matemática</a><p>

<p><a href="livros.php?categoria=poesia">Poesia</a><p>

<p><a href="livros.php?categoria=sociologia">Sociologia</a><p>

<a href="livros.php?categoria=teatro">Teatro</a>

</section>

</div>

</body>

</html>