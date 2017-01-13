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
// Última modificação em: 15/10/2014 22:40
?>
<div style="display:none;"><?php
	include("../connect_db.php");
	include("pode_nao_pode.php");

if(isset($_POST['enviar'])) {
$sql = "SELECT * FROM notificacoes";
		
$titulo = mysqli_real_escape_string($dbi, $_POST['titulo']);
$descricao = mysqli_real_escape_string($dbi, $_POST['descricao']);
$sumario = mysqli_real_escape_string($dbi, $_POST['sumario']);
$de = mysqli_real_escape_string($dbi, $_POST['login']);
$para = mysqli_real_escape_string($dbi, $_POST['para']);

$sql="INSERT INTO notificacoes (titulo, descricao, sumario, de, para)
VALUES ('$titulo', '$descricao', '$sumario', '$login_cookie', '$para')";
	
if (!mysqli_query($dbi,$sql)) {
	die('ERROR: ' . mysqli_error($dbi));
}
	
$room = mysqli_query($dbi, "SELECT * FROM notificacoes WHERE titulo='$titulo' AND descricao='$descricao'");
$info = mysqli_fetch_array($room);

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

$enviado = "Notificação enviada! - <a href=\"index.php\">Voltar</a>";
}
?></div>
<html>
<head>
<?
$title = "Enviar notificação";
include("../values/head.php");
	toTitle($title); ?>
</head>
<body>
<? toTitle2($title); ?>
<section class="margin card">
<form class="form-horizontal" method="post" action="">
    <fieldset>
        <div class="form-group">
            <label for="titulo" class="col-lg-2 control-label">Título</label>
            <div class="col-lg-10">
                <input name="titulo" type="text" class="form-control" id="titulo">
            </div>
        </div>
        <div class="form-group">
            <label for="descricao" class="col-lg-2 control-label">Descrição</label>
            <div class="col-lg-10">
                <input name="descricao" type="text" class="form-control" id="descricao">
            </div>
        </div>
        <div class="form-group">
            <label for="sumario" class="col-lg-2 control-label">Sumário</label>
            <div class="col-lg-10">
                <input name="sumario" type="text" class="form-control" id="sumario">
            </div>
        </div>
        <div class="form-group">
            <label for="para" class="col-lg-2 control-label">Para</label>
            <div class="col-lg-10">
                <input name="para" type="text" class="form-control" id="para">
            </div>
        </div>
            <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Apagar tudo</button>
                <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
				<? echo $enviado; ?>
            </div>
        </div>
    </fieldset>
</form>
</section>
<? include("../values/materialinit.php"); ?>
</body>
</html>