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
// Última modificação em: 26/03/2015 22:26

include("../connect_db.php");
include("pode_nao_pode.php");
include("../values/other.php");

if(isset($_POST['enviar'])) {

$nome = mysqli_real_escape_string($dbi, $_POST['nome']);
$login = mysqli_real_escape_string($dbi, $_POST['login']);
$senha = mysqli_real_escape_string($dbi, $_POST['senha']);
$token = md5(uniqid($login, true));

switch($_POST['opcao']) {
	case "sala":
	$sala = mysqli_real_escape_string($dbi, $_POST['salatheselect']);
	$tipo = mysqli_real_escape_string($dbi, "representante");
	break;
	case "clube":
	$sala = mysqli_real_escape_string($dbi, $_POST['clubetheselect']);
	$tipo = mysqli_real_escape_string($dbi, "clubelider");
	break;
	case "eletiva":
	$sala = mysqli_real_escape_string($dbi, $_POST['eletivatheselect']);
	$tipo = mysqli_real_escape_string($dbi, "eletivaprofessor");
	break;
	case "cartaz":
	function toASCII($str) {
		return strtr(utf8_decode($str), utf8_decode('ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ'), 'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy');
	}
	$cartaznome = $_POST['cartaztheinput'];
	$sala = mysqli_real_escape_string($dbi, strtolower("cartaz".toASCII(preg_replace('/\s+/', '', $_POST['cartaztheinput']))));
	$tipo = mysqli_real_escape_string($dbi, "cartazadmin");
	mysqli_query($dbi,"INSERT INTO cartazes (titulo, valor) VALUES ('$cartaznome', '$sala')");
	mysqli_query($dbi,"INSERT INTO eventos (sala, tipo, date, data, titulo, descricao, editadopor)
VALUES ('$sala', '1', '', '', '$cartaznome', '', '$login')");
	break;
}

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
<section class="margin card" style="width: 99%;">
<form class="form-horizontal" method="post" action="">
    <fieldset>
        <div class="form-group">
            <label class="col-lg-2 control-label">Adicionar em</label>
            <div class="col-lg-10">
                <div class="radio radio-primary">
                    <label>
                        <input type="radio" name="opcao" id="salaradio" value="sala" checked="true">
                        Sala
                    </label>
                    <label>
                        <input type="radio" name="opcao" id="cluberadio" value="clube">
                        Clube
                    </label>
                    <label>
                        <input type="radio" name="opcao" id="eletivaradio" value="eletiva">
                        Eletiva
                    </label>
                    <label>
                        <input type="radio" name="opcao" id="cartazradio" value="cartaz">
                        Cartaz
                    </label>
                </div>
            </div>
        </div>
		<div class="form-group" id="salaselect">
            <label for="salaselect" class="col-lg-2 control-label">Sala</label>
            <div class="col-lg-10">
                <select class="form-control" id="salatheselect" name="salatheselect">
                    <option value=""></option>
					<?
						$salaarray = getArray("sala", false);
						$salaarrayvalue = getArray("sala", true);
						for($i = 0; $i < count($salaarray); $i++) {
					?>
                    <option value="<? echo $salaarrayvalue[$i]; ?>"><? echo $salaarray[$i]; ?></option>
					<? } ?>
                </select>
            </div>
        </div>
		<div class="form-group" id="clubeselect" style="display: none;">
            <label for="clubeselect" class="col-lg-2 control-label">Clube</label>
            <div class="col-lg-10">
                <select class="form-control" id="clubetheselect" name="clubetheselect">
                    <option value=""></option>
					<?
						$clubearray = getArray("clube", false);
						$clubearrayvalue = getArray("clube", true);
						for($i = 0; $i < count($clubearray); $i++) {
					?>
                    <option value="<? echo $clubearrayvalue[$i]; ?>"><? echo $clubearray[$i]; ?></option>
					<? } ?>
                </select>
            </div>
        </div>
		<div class="form-group" id="eletivaselect" style="display: none;">
            <label for="eletivaelect" class="col-lg-2 control-label" name="eletiva">Eletiva</label>
            <div class="col-lg-10">
                <select class="form-control" id="eletivatheselect" name="eletivatheselect">
                    <option value=""></option>
					<?
						$eletivaarray = getArray("eletiva", false);
						$eletivaarrayvalue = getArray("eletiva", true);
						for($i = 0; $i < count($eletivaarray); $i++) {
					?>
                    <option value="<? echo $eletivaarrayvalue[$i]; ?>"><? echo $eletivaarray[$i]; ?></option>
					<? } ?>
                </select>
            </div>
        </div>
        <div class="form-group" id="cartazinput" style="display: none;">
            <label for="cartaztheinput" class="col-lg-2 control-label">Título do cartaz</label>
            <div class="col-lg-10">
                <input name="cartaztheinput" type="text" class="form-control" id="cartaztheinput">
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
            <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Apagar tudo</button>
                <button type="submit" name="enviar" class="btn btn-primary">Cadastrar</button>
				<? echo $enviado; ?>
            </div>
        </div>
    </fieldset>
</form>
</section>
	
<? include("../values/materialinit.php"); ?>
	
    <script>
$(function() {
$("#salaradio").click(function () {
		$("#salaselect").show();
		$("#clubeselect").hide();
		$("#clubetheselect").val("");
		$("#eletivaselect").hide();
		$("#eletivatheselect").val("");
		$("#cartazinput").hide();
	});

$("#cluberadio").click(function () {
		$("#clubeselect").show();
		$("#salaselect").hide();
		$("#salatheselect").val("");
		$("#eletivaselect").hide();
		$("#eletivatheselect").val("");
		$("#cartazinput").hide();
	});

$("#eletivaradio").click(function () {
		$("#eletivaselect").show();
		$("#salaselect").hide();
		$("#salatheselect").val("");
		$("#clubeselect").hide();
		$("#clubetheselect").val("");
		$("#cartazinput").hide();
	});

$("#cartazradio").click(function () {
		$("#salaselect").hide();
		$("#salatheselect").val("");
		$("#salaselect").hide();
		$("#salatheselect").val("");
		$("#clubeselect").hide();
		$("#clubetheselect").val("");
		$("#cartazinput").show();
	});
});
    </script>
</body>
</html>