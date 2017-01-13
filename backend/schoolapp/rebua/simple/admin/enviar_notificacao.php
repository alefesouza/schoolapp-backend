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
?>
<div style="display:none;"><?php
	include("../connect_db.php");
	include("pode_nao_pode.php");
?>
<?
if(isset($_POST['enviar'])) {
include("../connect_db.php");
$sql = "SELECT * FROM notificacoes";
		
$titulo = mysqli_real_escape_string($dbi, $_POST['titulo']);
$descricao = mysqli_real_escape_string($dbi, $_POST['descricao']);
$sumario = mysqli_real_escape_string($dbi, $_POST['sumario']);
$de = mysqli_real_escape_string($dbi, $_POST['login']);
$para = mysqli_real_escape_string($dbi, $_POST['para']);

$sql="INSERT INTO notificacoes (titulo, descricao, sumario, de, para)
VALUES ('$titulo', '$descricao', '$sumario', '$de', '$para')";
	
if (!mysqli_query($dbi,$sql)) {
	die('ERROR: ' . mysqli_error($dbi));
}
	
$room = mysql_query("SELECT * FROM notificacoes WHERE titulo='$titulo' AND descricao='$descricao'") or die("ERROR:" . mysql_error());
$info = mysql_fetch_array($room);

$APPLICATION_ID = "tQBaeLCmRUcw44npedskuuudzh1KVWoRFlnBJEvU";
$REST_API_KEY = "0FNQ0YYkPPN4DWR2U8sc2fXArHCpZfhrlIspg8dm";

$data = array(
	'where' => '{}',
	'data' => array(
		'action' => 'aloogle.rebuapp.UPDATE_STATUS',
        'id' => $info['id'],
		'to' => $_POST['para'],
		'barra' => $_POST['titulo'].' - RebuApp',
		'titulo' => 'RebuApp',
		'texto' => $_POST['titulo'],
		'titulogrande' => $_POST['titulo'],
		'textogrande' => $_POST['descricao'],
		'sumario' => $_POST['sumario'],
	),
);

$_data = json_encode($data);

$ch = curl_init();

$arr = array();
array_push($arr, "X-Parse-Application-Id: " . $APPLICATION_ID);
array_push($arr, "X-Parse-REST-API-Key: " . $REST_API_KEY);
array_push($arr, "Content-Type: application/json");

curl_setopt($ch, CURLOPT_HTTPHEADER, $arr);
curl_setopt($ch, CURLOPT_URL, 'https://api.parse.com/1/push');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $_data);

curl_exec($ch);

mysqli_close($dbi);

$enviado = "Notificação enviada!";
}
?></div>
<html>
<head>
<link rel="author" href="https://plus.google.com/101361157875821775334" />
<link rel="me" href="https://plus.google.com/101361157875821775334" />
<link rel="stylesheet" href="/styles/card.css" />
<meta name="viewport" content="width=device-width, height=device-height,  initial-scale=1.0, user-scalable=no;user-scalable=0;"/>
</head>
<body>
<section class="margin card">
<form method="post" action="">
<?php
echo "<input type=\"hidden\" name=\"login\" value=\"" . $login_cookie . "\" />\n";
?>
Título&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="titulo" /><br><br>
Descrição<br><textarea name="descricao" style="width:100%" rows="10"></textarea><br><br>
Sumário&nbsp;&nbsp;&nbsp;<input type="text" name="sumario" /><br><br>
Para&nbsp;&nbsp;&nbsp;<input type="text" name="para" /><br><br>
<input type="submit" name="enviar" /><br><br><? echo $enviado; ?>
</form>
</section>
</body>
</html>