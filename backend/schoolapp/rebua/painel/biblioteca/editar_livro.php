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
// Última modificação em: 28/03/2015 19:31

include('../connect_db.php');
include("pode_nao_pode.php");

$id = $_GET["id"];

$values = mysqli_query($dbi, "SELECT * FROM livros WHERE id='$id'");
$infovalues = mysqli_fetch_array($values);

if(isset($_POST['enviar'])) {
$categoria = mysqli_real_escape_string($dbi, $_POST['categoria']);
$obra = mysqli_real_escape_string($dbi, $_POST['obra']);
$autor = mysqli_real_escape_string($dbi, $_POST['autor']);
$editora = mysqli_real_escape_string($dbi, $_POST['editora']);
$quantidade = mysqli_real_escape_string($dbi, $_POST['quantidade']);

mysqli_query($dbi,"UPDATE livros SET categoria='$categoria',obra='$obra',autor='$autor',editora='$editora',quantidade='$quantidade' WHERE id='$id'");

header("location:http://apps.aloogle.net".urldecode($_GET['url']));
}
?>
<html>
<head>
<?
$title = "Editar livro";
include("../values/head.php");
	toTitle($title); ?>
<script>
function restaurar() {
	var categoria = "<? echo $infovalues['categoria'] ?>";
	if (!categoria) {
		return;
	}
	var select = document.getElementById("categoria");
	for (var i = 0; i < select.children.length; i++) {
		var child = select.children[i];
		if (child.value == categoria) {
			child.selected = "true";
			break;
		}
	}
}

window.onload = function() {
	restaurar();
}
</script>
</head>
<body>
<? toTitle2($title); ?>
<section class="margin card">
<form class="form-horizontal" method="post" action="">
    <fieldset>
        <div class="form-group">
            <label for="categoria" class="col-lg-2 control-label">Categoria</label>
            <div class="col-lg-10">
				<select name="categoria" class="form-control" id="categoria">
<? include("../values/other.php"); ?>
<?
	$livrosarray = getArray("livros", false);
	$livrosarrayvalue = getArray("livros", true);
	for($i = 0; $i < count($livrosarray); $i++) { ?>
		<option value="<? echo $livrosarrayvalue[$i]; ?>"><? echo $livrosarray[$i]; ?></option>
<? } ?>
			</select>
            </div>
        </div>
        <div class="form-group">
            <label for="obra" class="col-lg-2 control-label">Obra</label>
            <div class="col-lg-10">
                <input name="obra" type="text" class="form-control" id="obra" value="<? echo $infovalues['obra'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="autor" class="col-lg-2 control-label">Autor</label>
            <div class="col-lg-10">
                <input name="autor" type="text" class="form-control" id="autor" value="<? echo $infovalues['autor'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="editora" class="col-lg-2 control-label">Editora</label>
            <div class="col-lg-10">
                <input name="editora" type="text" class="form-control" id="editora" value="<? echo $infovalues['editora'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="quantidade" class="col-lg-2 control-label">Quantidade</label>
            <div class="col-lg-10">
                <input name="quantidade" type="number" class="form-control" id="quantidade" value="<? echo $infovalues['quantidade'] ?>">
            </div>
        </div>
            <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Apagar tudo</button>
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