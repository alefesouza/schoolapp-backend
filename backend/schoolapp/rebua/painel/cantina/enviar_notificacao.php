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
// Última modificação em: 01/04/2015 14:00

	include("../connect_db.php");
	include("pode_nao_pode.php");
if(isset($_POST['enviar'])) { ?>
<div style="display:none;">
<?
$sql = "SELECT * FROM notificacoes";

$titulo = mysqli_real_escape_string($dbi, $_POST['titulo']);
$descricao = str_replace("\r", " ", str_replace("\n", " ", $_POST['descricao']));
$descricao = mysqli_real_escape_string($dbi, $descricao);
$de = mysqli_real_escape_string($dbi, $info['login']);
$para = mysqli_real_escape_string($dbi, $info['sala']);
$sumario = "Notificação da cantina";

$sql="INSERT INTO notificacoes (titulo, descricao, sumario, de, para)
VALUES ('$titulo', '$descricao', '$sumario', '$de', '$para')";
	
if (!mysqli_query($dbi,$sql)) {
	die('ERROR: ' . mysqli_error($dbi));
}
	
$room = mysqli_query($dbi, "SELECT * FROM notificacoes WHERE titulo='$titulo' AND descricao='$descricao'");
$info = mysqli_fetch_array($room);

$APPLICATION_ID = "t8NUClMitIwzZPZbpdEf9FlLHT5EccFxbP9RTAAM";
$REST_API_KEY = "1gaIbbQU6cyON6mTmsYRwzmiDTPpe3XfHVTZcSba";

$data = array(
	'where' => '{}',
	'data' => array(
		'action' => 'aloogle.rebuapp.UPDATE_STATUS',
        'id' => $info['id'],
		'to' => $para,
		'barra' => $titulo.' - RebuApp',
		'titulo' => 'RebuApp',
		'texto' => $titulo,
		'titulogrande' => $titulo,
		'textogrande' => $descricao,
		'sumario' => $sumario,
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

$enviado = "Notificação enviada!"; ?>
</div>
<? } ?>
<html>
<head>
<?
$title = "Enviar notificação";
include("../values/head.php");
	toTitle($title); ?>
<script src="/libs/js/autosize/autosize.js"></script>
<script>
$(function() {
	autosize(document.querySelector('textarea'));
});
</script>
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
				<textarea name="descricao" class="form-control"></textarea>
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