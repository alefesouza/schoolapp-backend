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
// Última modificação em: 20/05/2015 23:25

	include("connect_db.php");
	if ($info['tipo'] == "admin") {
		header("location:admin/index.php");
	} else if ($info['tipo'] == "gestao") {
		header("location:gestao/index.php");
	} else if ($info['tipo'] == "representante" || $info['tipo'] == "clubelider" || $info['tipo'] == "eletivaprofessor") {
		header("location:index.php");
	} else if ($info['tipo'] == "bibliotecario") {
		header("location:biblioteca/index.php");
	} else if ($info['tipo'] == "cartazadmin") {
		header("location:cartaz/index.php");
	} else if($info['tipo'] == "cantinaadmin") {
		header("location:cantina/index.php");
	} else if($info['tipo'] == "pasquale") {
		header("location:corrigir/index.php");
	} else {}
	$login = $_POST['login'];
	$entrar = $_POST['entrar'];
	$senha = $_POST['senha'];
	if (isset($entrar)) {
		$verifica = mysqli_query($dbi, "SELECT * FROM usuarios WHERE login = '".strtolower($login)."' AND senha = '$senha'");
		if (mysqli_num_rows($verifica) <= 0) {
			$error = "Seu login ou senha esta incorreto";
		} else {
			$login = mysqli_fetch_array($verifica);
			setcookie("login", $login['token'], strtotime('+365 days'));
			header("location:index.php");
		}
	}
?>
<html>
<head>
<? include("values/head.php");
	toTitle("Login"); ?>
</head>
<body>
<section class="card" style="text-align: center; width: 98%; margin: 10px; margin-left: 1%;">
	<div style="width: 182px; margin-left: auto; margin-right: auto;">
	<form method="post" action="">
	<br><br>
	<input type="text" name="login" class="form-control" placeholder="Login" value="<?php echo $login ?>">
	<input type="password" name="senha" class="form-control" placeholder="Senha">
	<button type="submit" name="entrar" class="btn btn-success btn-ripple">Entrar</button>
	</form>
<div><? echo $error; ?></div>
	</div>
</section>
<? if (strpos($_SERVER['HTTP_USER_AGENT'],'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'],'iPad')) {
if($_COOKIE['iosstandalone'] == "true") { ?>
<div class="list">
	<div class="listitem" onclick="window.open('/web/rebuapp/sala.php', '_self');">
		Voltar ao RebuApp
	</div>
</div>
<? }} ?>
<? include("values/materialinit.php"); ?>
</body>
</html>