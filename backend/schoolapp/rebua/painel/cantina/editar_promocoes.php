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
// Última modificação em: 05/04/2015 16:27

include('../connect_db.php');
include("pode_nao_pode.php");

if (strpos($_SERVER['HTTP_USER_AGENT'],'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'],'iPad') || strpos($_SERVER['HTTP_USER_AGENT'],'Android') || strpos($_SERVER['HTTP_USER_AGENT'],'Chrome')) {
	$inputdate = true;
	$inputtype = "date";
} else {
	$inputdate = false;
	$inputtype = "text";
}

$sala = $info["sala"];

$values = mysqli_query($dbi, "SELECT * FROM eventos WHERE id='290'");
$infovalues = mysqli_fetch_array($values);

if(isset($_POST['enviar'])) {
$descricao = mysqli_real_escape_string($dbi, $_POST['descricao']);
$login = mysqli_real_escape_string($dbi, $info['login']);
$tipo = "1";

mysqli_query($dbi, "UPDATE eventos SET tipo='$tipo',descricao='$descricao',editadopor='$login' WHERE id='290'");

$values = mysqli_query($dbi, "SELECT * FROM eventos WHERE id='290'");
$infovalues = mysqli_fetch_array($values);

$enviado = "Cartaz atualizado";
}

mysqli_close($dbi);
?>
<html>
<head>
<?
$title = "Editar promoções";
include("../values/head.php");
	toTitle($title);
include("../values/editor.php"); ?>
</head>
<body>
<? toTitle2($title); ?>
<section class="margin card">
<form class="form-horizontal" method="post" action="">
    <fieldset>
        <div class="form-group">
            <label for="descricao" class="col-lg-2 control-label">Descrição</label>
            <div class="col-lg-10">
				<textarea name="descricao" class="ckeditor" name="editor1"><? echo $infovalues['descricao']; ?></textarea>
            </div>
        </div>
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" name="enviar" class="btn btn-primary">Atualizar</button>
				<? echo $enviado; ?>
            </div>
        </div>
    </fieldset>
</form>
</section>
<? include("../values/materialinit.php"); ?>
</body>
</html>