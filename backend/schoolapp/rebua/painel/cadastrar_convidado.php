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
// Última modificação em: 08/05/2015 22:10

include("connect_db.php");
include("pode_nao_pode.php");
include("values/other.php");

if ($db_tipo != "representante") {
	header("location:index.php");
}

if(isset($_POST['enviar'])) {
$nome = mysqli_real_escape_string($dbi, $_POST['nome']);
$login = mysqli_real_escape_string($dbi, $_POST['login']);
$senha = mysqli_real_escape_string($dbi, $_POST['senha']);
$check = mysqli_num_rows(mysqli_query($dbi, "SELECT login FROM usuarios WHERE login='$login'"));
if($nome == "" || $login == "" || $senha == "") {
	$enviado = "Por favor, preecha todos os campos";
} else if($check > 0) {
	$enviado = "Login já existente, por favor escolha outro";
} else {
$sala = mysqli_real_escape_string($dbi, $info['sala']);
$cadastradopor = mysqli_real_escape_string($dbi, $info['nome']);
$token = md5(uniqid($login, true));

mysqli_query($dbi,"INSERT INTO usuarios (nome, login, senha, token, sala, tipo, cadastradopor) VALUES ('$nome', '$login', '$senha', '$token', '$sala', 'convidado', '$cadastradopor')");

$enviado = "Convidado cadastrado";
$nome = "";
$login = "";
}
mysqli_close($dbi);
}
?>
<html>
<head>
<?
$title = "Cadastrar convidado - ".getAll($info['sala']);
include("values/head.php");
	toTitle($title); ?>
</head>
<body>
<? toTitle2($title); ?>
<section class="margin card" style="width: 99%;">
<form class="form-horizontal" method="post" action="">
    <fieldset>
        <div class="form-group">
            <label for="nome" class="col-lg-2 control-label">Nome</label>
            <div class="col-lg-10">
                <input name="nome" type="text" class="form-control" id="nome" value="<? echo $nome; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="login" class="col-lg-2 control-label">Login</label>
            <div class="col-lg-10">
                <input name="login" type="text" class="form-control" id="login" value="<? echo $login; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="senha" class="col-lg-2 control-label">Senha</label>
            <div class="col-lg-10">
                <input name="senha" type="password" class="form-control" id="senha">
            </div>
        </div>
            <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Apagar tudo</button>
                <button type="submit" name="enviar" class="btn btn-primary">Cadastrar</button>
				<? echo $enviado; ?>
            </div>
        </div>
		<br><br><br>
		<div class="col-lg-10 col-lg-offset-2">
			<p><b>O que são convidados?</b></p>
			<p>Convidados são contas que podem fazer as mesmas coisas que você, como editar a agenda e horários, com exceção de cadastrar outros convidados, isso é ótimo caso você (representante) não possa editar direto as coisas da sua sala.</p>
		</div>
    </fieldset>
</form>
</section>
<? include("values/materialinit.php"); ?>
</body>
</html>