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
// Última modificação em: 19/09/2014 23:02

include('../connect_db.php');

include("../pode_nao_pode.php");


$id = $_GET["anotacaoid"];

$sala = $_GET['sala'];


$room = mysql_query("SELECT * FROM usuarios WHERE login='$login_cookie'") or die("ERROR:" . mysql_error());

$info = mysql_fetch_array($room);


$values = mysql_query("SELECT * FROM anotacoes WHERE id='$id'") or die("ERROR:" . mysql_error());

$infovalues = mysql_fetch_array($values);


mysqli_close($dbi);

?>

<html>

<head>

<link rel="author" href="https://plus.google.com/101361157875821775334" />

<link rel="me" href="https://plus.google.com/101361157875821775334" />

<link rel="stylesheet" href="/styles/card.css" />

</head>

<body>

<section class="margin card">

<?php

if ($login_cookie == $infovalues['login'] || $info['tipo'] == "admin") {

	echo "<form method=\"post\" action=\"atualizar.php\">";

	echo "<input type=\"hidden\" name=\"anotacaoid\" value=\"".$id."\" />";

	echo "<input type=\"hidden\" name=\"sala\" value=\"".$info['sala']."\" />";

	echo "T&iacute;tulo<font class=\"obrigatory\">*</font>&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"titulo\" value=\"".$infovalues['titulo']."\" /><br><br>";

	echo "Descri&ccedil;&atilde;o <br><textarea name=\"descricao\" style=\"width:100%\" rows=\"10\">".$infovalues['descricao']."</textarea><br><br>";

	echo "<input type=\"submit\" value=\"Salvar\" />";

	echo "<button onclick=\"window.open('anotacoes.php\', '_self');\">Cancelar</button>";

	echo "</form>";

} else {

	echo "Essa anotação não é sua<br><br>";

	echo "<a onclick=\"window.history.back();\" style=\"color: #0000ff; cursor: pointer;\">Voltar</a>";

}

?>

</section>

</body>

</html>