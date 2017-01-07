<?php
/*
 * Copyright (C) 2014 Alefe Souza <contato@alefesouza.com>
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
// Última modificação em: 16/10/2014 01:11

	include("connect_db.php");

	$login_cookie = $_COOKIE['login'];

	$room = mysql_query("SELECT * FROM usuarios WHERE login='$login_cookie'")or die("ERROR: ".mysql_error());

	$info = mysql_fetch_array($room);

	if ($info['tipo'] == "admin") {

		header("location:admin/index.php");

	} else if ($info['tipo'] == "gestao") {

		header("location:gestao/index.php");

	} else if ($info['tipo'] == "representante" || $info['tipo'] == "clubelider" || $info['tipo'] == "eletivaprofessor" || $info['tipo'] == "bibliotecario") {

		header("location:index.php");

	} else {}

	$login = $_POST['login'];

	$entrar = $_POST['entrar'];

	$senha = $_POST['senha'];

	if (isset($entrar)) {

		$verifica = mysql_query("SELECT * FROM usuarios WHERE login = '".strtolower($login)."' AND senha = '$senha'")or die("erro ao selecionar");

		if (mysql_num_rows($verifica) <= 0) {

			$error = "Seu login ou senha esta incorreto";

		} else {

			setcookie("login", strtolower($login), strtotime('+30 days'));

			setcookie("apilevel", $_GET['apilevel'], strtotime('+30 days'), '/');

			header("location:index.php");

		}

	}

?>

<html>

<head>

<link rel="author" href="https://plus.google.com/101361157875821775334" />

<link rel="me" href="https://plus.google.com/101361157875821775334" />

<link rel="stylesheet" href="/styles/card.css" />

<meta name="viewport" content="width=device-width, height=device-height,  initial-scale=1.0, user-scalable=no;user-scalable=0;"/>

</head>

<body>

<section class="margin card" style="text-align: center;">

<form action="" method="post">

<label>Login: </label><input type="text" name="login" id="login" value="<?php echo $login ?>"><br>

<label>Senha: </label><input type="password" name="senha" id="senha"><br><br>

<input type="submit" value="Entrar" id="entrar" name="entrar">

</form>

<div><? echo $error; ?></div>

</section>

</body>

</html>

