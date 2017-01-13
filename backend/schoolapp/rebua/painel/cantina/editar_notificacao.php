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

include('../connect_db.php');
include("pode_nao_pode.php");

$id = $_GET["id"];
$sala = $info["sala"];

$values = mysqli_query($dbi, "SELECT * FROM notificacoes WHERE id='$id'");
$infovalues = mysqli_fetch_array($values);

if(isset($_POST['enviar'])) {

$data = mysqli_real_escape_string($dbi, $_POST['data']);
$titulo = mysqli_real_escape_string($dbi, $_POST['titulo']);
$descricao = mysqli_real_escape_string($dbi, $_POST['descricao']);
if($_POST['editor'] == "true") {
	$tipo = "1";
} else {
	$tipo = "0";
}

mysqli_query($dbi, "UPDATE notificacoes SET titulo='$titulo',descricao='$descricao' WHERE id='$id'");

header("location:notificacoes.php");
}

mysqli_close($dbi);
?>
<html>
<head>
<? if ($sala != $infovalues["sala"]) { ?>
<title>Editar notificação - Painel RebuApp</title>
<link rel="author" href="https://plus.google.com/101361157875821775334" />
<link rel="me" href="https://plus.google.com/101361157875821775334" />
<link rel="stylesheet" href="/styles/card.css" />
<? }
if ($sala == $infovalues["para"] || $info['tipo'] == "admin") { ?>
<? 
$title = "Editar notificação";
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
<input type="hidden" name="editor" value="<? if($_GET['editor'] == "true") { echo "true"; } else { echo "false"; } ?>" />
    <fieldset>
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
                <button type="submit" name="enviar" class="btn btn-primary">Atualizar</button>
				<? echo $enviado; ?>
            </div>
        </div>
    </fieldset>
</form>
</section>
<? include("../values/materialinit.php");
} else { ?>
<section class="margin card">
Você não tem permissão para editar essa notificação<br><br>
<a href="index.php">Voltar</a>
</section>
<? } ?>
</body>
</html>