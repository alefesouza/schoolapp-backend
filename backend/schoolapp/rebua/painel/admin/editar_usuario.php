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

$values = mysqli_query($dbi, "SELECT * FROM usuarios WHERE id='$id'");
$infovalues = mysqli_fetch_array($values);

if(isset($_POST['enviar'])) {
$nome = mysqli_real_escape_string($dbi, $_POST['nome']);
$login = mysqli_real_escape_string($dbi, $_POST['login']);
$senha = mysqli_real_escape_string($dbi, $_POST['senha']);
$sala = mysqli_real_escape_string($dbi, $_POST['sala']);
$tipo = mysqli_real_escape_string($dbi, $_POST['tipo']);
$ultimaedicao = mysqli_real_escape_string($dbi, $_POST['ultimaedicao']);
$ultimoacesso = mysqli_real_escape_string($dbi, $_POST['ultimoacesso']);

mysqli_query($dbi, "UPDATE usuarios SET nome='$nome',login='$login',senha='$senha',sala='$sala',tipo='$tipo',ultimaedicao='$ultimaedicao',ultimoacesso='$ultimoacesso' WHERE id='$id'");

header("location:remover_usuario.php");
}
?>
<html>
<head>
<?
$title = "Editar usuário";
include("../values/head.php");
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
                <input name="login" type="text" class="form-control" id="login" value="<? echo $infovalues['login']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="senha" class="col-lg-2 control-label">Senha</label>
            <div class="col-lg-10">
                <input name="senha" type="text" class="form-control" id="senha" value="<? echo $infovalues['senha']; ?>">
            </div>
        </div>
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
            <label for="ultimaedicao" class="col-lg-2 control-label">Última edição</label>
            <div class="col-lg-10">
				<input name="ultimaedicao" type="text" class="form-control" id="ultimaedicao" value="<? echo $infovalues['ultimaedicao']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="ultimoacesso" class="col-lg-2 control-label">Último acesso</label>
            <div class="col-lg-10">
				<input name="ultimoacesso" type="text" class="form-control" id="ultimoacesso" value="<? echo $infovalues['ultimoacesso']; ?>">
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