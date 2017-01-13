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

include('../connect_db.php');
include("pode_nao_pode.php");

$id = $_GET["id"];

$values = mysqli_query($dbi, "SELECT * FROM eventos WHERE id='$id'");
$infovalues = mysqli_fetch_array($values);

if(isset($_POST['enviar'])) {

$sala = mysqli_real_escape_string($dbi, $_POST['sala']);
$tipo = mysqli_real_escape_string($dbi, $_POST['tipo']);
$data = mysqli_real_escape_string($dbi, $_POST['data']);
$titulo = mysqli_real_escape_string($dbi, $_POST['titulo']);
$descricao = mysqli_real_escape_string($dbi, $_POST['descricao']);
$historico = mysqli_real_escape_string($dbi, $_POST['historico']);

mysqli_query($dbi, "UPDATE eventos SET sala='$sala',tipo='$tipo',data='$data',tipo='$tipo',titulo='$titulo',descricao='$descricao',historico='$historico' WHERE id='$id'");

header("location:remover_eventos.php");
}
?>
<html>
<head>
<?
$title = "Editar evento";
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
                <input name="sala" type="text" class="form-control" id="sala" value="<? echo $infovalues['sala']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="tipo" class="col-lg-2 control-label">Tipo</label>
            <div class="col-lg-10">
                <input name="tipo" type="text" class="form-control" id="tipo" value="<? echo $infovalues['tipo']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="data" class="col-lg-2 control-label">Data</label>
            <div class="col-lg-10">
                <input name="data" type="text" class="form-control" id="data" value="<? echo $infovalues['data']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="titulo" class="col-lg-2 control-label">Título</label>
            <div class="col-lg-10">
                <input name="titulo" type="text" class="form-control" id="titulo" value="<? echo $infovalues['titulo']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="descricao" class="col-lg-2 control-label">Descrição</label>
            <div class="col-lg-10">
				<textarea name="descricao" class="form-control"><? echo $infovalues['descricao']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="historico" class="col-lg-2 control-label">Histórico</label>
            <div class="col-lg-10">
                <input name="historico" type="text" class="form-control" id="historico" value="<? echo $infovalues['historico']; ?>">
            </div>
        </div>
            <div class="col-lg-10 col-lg-offset-2">
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