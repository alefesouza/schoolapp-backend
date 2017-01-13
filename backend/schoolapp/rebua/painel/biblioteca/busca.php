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
// Última modificação em: 13/03/2015 00:38

	include("../connect_db.php");
	$busca = $_GET['q'];
?>
<html>
<head>
<title>Busca: <? echo $busca; ?> - Painel RebuApp</title>
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
<div class="barrabuscapopup"></div><form method="get" action="busca.php"><input type="search" class="text" id="q" placeholder="Pesquisar" name="q" value="<? echo $busca; ?>"><input type="submit" id="ir" value=""></form></div>
<div id="conteudo">
<?
$result = mysqli_query($dbi, "SELECT * FROM livros WHERE trim(obra) like('%$busca%') OR trim(autor) like('%$busca%') OR trim(editora) like('%$busca%') order by trim(obra)");
while ($row = mysqli_fetch_array($result)) { ?>
<section class="margin card">
<h3><? echo $row['obra']; ?></h3>
<p><b>Autor:</b> <? echo $row['autor']; ?></p>
<p><b>Categoria:</b> <? include('categoria.php'); ?>
</p><p><b>Editora:</b> <? echo $row['editora']; ?></p>
<p><b>Quantidade:</b> <? echo $row['quantidade']; ?></p>
<a href="editar_livro.php?id=<? echo $row['id']; ?>&url=<? echo urlencode($_SERVER[REQUEST_URI]); ?>">Editar</a>&nbsp;&nbsp;<a href="apagar_livro.php?id=<? echo $row['id']; ?>&url=<? echo urlencode($_SERVER[REQUEST_URI]); ?>">Apagar</a>
</section>
<? } ?>
</div>
</body>
</html>