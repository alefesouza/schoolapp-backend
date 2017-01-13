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
header('Content-type: text/html; charset=UTF-8');

$login_cookie = $_COOKIE['login'];
$room = mysql_query("SELECT * FROM usuarios WHERE login='$login_cookie'")or die("ERROR:".mysql_error());
$info = mysql_fetch_array($room);
?><html>
<head>
<link rel="author" href="https://plus.google.com/101361157875821775334" />
<link rel="me" href="https://plus.google.com/101361157875821775334" />
<link rel="stylesheet" href="/styles/card.css" />
<style>
body {
	margin-top: 130px;
}

.button {
	top: 0;
	position:absolute;
	z-index:2;
	padding:1rem;
	box-shadow:0 1px 2px #aaa;
}
</style>
<script>
function Click(value) {
	if(value == "1") {
		document.getElementById('nome').innerHTML='<? echo $info['nome'] ?>';
		document.body.style.marginTop='130px';
		document.getElementById('minhas').style.display='';
		document.getElementById('sala').style.display='none';
		document.getElementById('minhasbutton').style.background = '#d3d3d3';
		document.getElementById('salabutton').style.background='#ffffff';
	}
	else {
		document.getElementById('nome').innerHTML='<? include('../sala.php'); ?>';
		document.body.style.marginTop='65px';
		document.getElementById('sala').style.display='';
		document.getElementById('minhas').style.display='none';
		document.getElementById('salabutton').style.background = '#d3d3d3';
		document.getElementById('minhasbutton').style.background='#ffffff';
	}
}
</script>
</head>
<body>
<div id="minhasbutton" class="button" style="left: 0; background:#d3d3d3;" onclick="Click(1)">Minhas</div><? echo "<div style=\"position: absolute; top: 1rem; right: 0; left: 0; text-align: center;\" id=\"nome\">".$info['nome']."</div>";?>
<div id="salabutton" class="button" style="right: 0; background: white;" onclick="Click(2)">Sala</div>
<div id="minhas">
<div id="addbutton" class="button" style="right: 0; left: 0; top: 65px; background: white; text-align: center;" onclick="window.open('adicionar_anotacao.php?aloogleapp=needinternet','_self');">Adicionar anotação</div>
<?

$result = mysqli_query($dbi, "SELECT * FROM anotacoes");
while ($row = mysqli_fetch_array($result)) {
	if ($row['login'] == $login_cookie) {
		echo "<section class=\"margin card\">\n";
		echo "<p><b>".$row['data'];
		if ($row['data'] != "") {
			echo " - ";
		};
		echo $row['titulo']."</b></p>\n";
		echo "<p>".$row['descricao']."</p>\n";
		if ($sala == $info['sala'] || $info['tipo'] == "admin") {
			echo "<a href=\"editar_anotacao.php?anotacaoid=".$row['id']."&aloogleapp=needinternet\">Editar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"apagar_anotacao.php?anotacaoid=".$row['id']."&aloogleapp=needinternet\">Apagar</a>\n";
		}
		echo "</section>\n";
	}
}
mysql_close($dbi);
?>
</div>
<div id="sala" style="display:none;">
<section class="margin card">
aaaaa
</section>
</div>
</body>
</html>