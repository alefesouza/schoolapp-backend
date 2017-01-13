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
// Última modificação em: 20/05/2015 22:03

include('connect_db.php');
include("pode_nao_pode.php");

if ($db_tipo != "representante") {
	header("location:index.php");
}

$id = $_GET["id"];

$values = mysqli_query($dbi, "SELECT * FROM usuarios WHERE id='$id' AND tipo='convidado' AND sala='$db_sala'");
if(mysqli_num_rows($values) > 0) {
$infovalues = mysqli_fetch_array($values);

if(isset($_POST['enviar'])) {
$nome = mysqli_real_escape_string($dbi, $_POST['nome']);
$login = mysqli_real_escape_string($dbi, $_POST['login']);
$senha = mysqli_real_escape_string($dbi, $_POST['senha']);

mysqli_query($dbi, "UPDATE usuarios SET nome='$nome',login='$login',senha='$senha' WHERE id='$id'");

header("location:editar_convidado.php");
}
?>
<html>
<head>
<?
$title = "Editar convidado";
include("values/head.php");
	toTitle($title); ?>
</head>
<body>
<? toTitle2($title); ?>
<section class="margin card">
<form class="form-horizontal" method="post" action="">
<input type="hidden" name="usuarioid" value="<? echo $id; ?>" />
    <fieldset>
        <div class="form-group">
            <label for="nome" class="col-lg-2 control-label">Nome</label>
            <div class="col-lg-10">
                <input name="nome" type="text" class="form-control" id="nome" value="<? echo $infovalues['nome']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="login" class="col-lg-2 control-label">Login</label>
            <div class="col-lg-10">
                <input name="login" type="text" class="form-control" id="tipo" value="<? echo $infovalues['login']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="senha" class="col-lg-2 control-label">Senha</label>
            <div class="col-lg-10">
                <input name="senha" type="password" class="form-control" id="senha" value="">
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
<? include("values/materialinit.php"); ?>
</body>
</html>
<? } else { header("location:index.php"); }?>