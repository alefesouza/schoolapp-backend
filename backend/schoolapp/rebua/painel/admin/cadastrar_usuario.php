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
$nome = mysqli_real_escape_string($dbi, $_POST['nome']);
$login = mysqli_real_escape_string($dbi, $_POST['login']);
$token = md5(uniqid($login, true));
$senha = mysqli_real_escape_string($dbi, $_POST['senha']);
$tipo = mysqli_real_escape_string($dbi, $_POST['tipo']);

mysqli_query($dbi,"INSERT INTO usuarios (nome, login, senha, token, sala, tipo) VALUES ('$nome', '$login', '$senha', '$token', '$sala', '$tipo')");

$enviado = "Usuário cadastrado";

mysqli_close($dbi);
}
?>
<html>
<head>
<?
$title = "Cadastrar usuário";
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
            <label for="nome" class="col-lg-2 control-label">Nome</label>
            <div class="col-lg-10">
                <input name="nome" type="text" class="form-control" id="nome">
            </div>
        </div>
        <div class="form-group">
            <label for="login" class="col-lg-2 control-label">Login</label>
            <div class="col-lg-10">
                <input name="login" type="text" class="form-control" id="login">
            </div>
        </div>
        <div class="form-group">
            <label for="senha" class="col-lg-2 control-label">Senha</label>
            <div class="col-lg-10">
                <input name="senha" type="password" class="form-control" id="senha">
            </div>
        </div>
        <div class="form-group">
            <label for="tipo" class="col-lg-2 control-label">Tipo</label>
			<div class="col-lg-10">
                <input name="tipo" type="text" class="form-control" id="tipo">
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