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

	include("../connect_db.php");
	include("pode_nao_pode.php");

if(isset($_POST['enviar'])) {
$sala = mysqli_real_escape_string($dbi, $_POST['sala']);
$tipo = mysqli_real_escape_string($dbi, $_POST['tipo']);
$data = mysqli_real_escape_string($dbi, $_POST['data']);
$titulo = mysqli_real_escape_string($dbi, $_POST['titulo']);
$descricao = mysqli_real_escape_string($dbi, $_POST['descricao']);
$login = mysqli_real_escape_string($dbi, $info['login']);

	$sql="INSERT INTO eventos (sala, tipo, data, titulo, descricao, editadopor)
VALUES ('$sala', '$tipo', '$data', '$titulo', '$descricao', '$login')";

	if (!mysqli_query($dbi,$sql)) {
	  die('ERROR: ' . mysqli_error($dbi));
	}
	
	$enviado = "Evento adicionado - <a href=\"index.php\">Voltar</a>";
}
?>
<html>
<head>
<?
$title = "Adicionar evento";
include("../values/head.php");
	toTitle($title); ?>
</head>
<body>
<? toTitle2($title); ?>
<section class="margin card">
<form class="form-horizontal" method="post" action="">
    <fieldset>
        <div class="form-group">
            <label for="sala" class="col-lg-2 control-label">Sala</label>
            <div class="col-lg-10">
                <input name="sala" type="text" class="form-control" id="sala">
            </div>
        </div>
        <div class="form-group">
            <label for="tipo" class="col-lg-2 control-label">Tipo</label>
            <div class="col-lg-10">
                <input name="tipo" type="text" class="form-control" id="tipo">
            </div>
        </div>
        <div class="form-group">
            <label for="titulo" class="col-lg-2 control-label">Data</label>
            <div class="col-lg-10">
                <input name="data" type="text" class="form-control" id="data">
            </div>
        </div>
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