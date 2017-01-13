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

$values = mysqli_query($dbi, "SELECT * FROM notificacoes WHERE id='$id'");
$infovalues = mysqli_fetch_array($values);

if(isset($_POST['enviar'])) {

$de = mysqli_real_escape_string($dbi, $_POST['de']);
$para = mysqli_real_escape_string($dbi, $_POST['para']);
$titulo = mysqli_real_escape_string($dbi, $_POST['titulo']);
$descricao = mysqli_real_escape_string($dbi, $_POST['descricao']);

mysqli_query($dbi, "UPDATE notificacoes SET de='$de',para='$para',titulo='$titulo',descricao='$descricao' WHERE id='$id'");

header("location:remover_notificacoes.php");
}
?>
<html>
<head>
<?
$title = "Editar notificação";
include("../values/head.php");
	toTitle($title); ?>
</head>
<body>
<? toTitle2($title); ?>
<section class="margin card">
<form class="form-horizontal" method="post" action="">
    <fieldset>
        <div class="form-group">
            <label for="de" class="col-lg-2 control-label">De</label>
            <div class="col-lg-10">
                <input name="de" type="text" class="form-control" id="de" value="<? echo $infovalues['de']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="para" class="col-lg-2 control-label">Para</label>
            <div class="col-lg-10">
                <input name="para" type="text" class="form-control" id="para" value="<? echo $infovalues['para']; ?>">
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