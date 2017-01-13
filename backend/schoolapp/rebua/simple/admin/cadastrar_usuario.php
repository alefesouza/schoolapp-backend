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


	include("../connect_db.php");

	include("pode_nao_pode.php");

?>

<html>

<head>

<link rel="stylesheet" href="/styles/card.css" />

<meta name="viewport" content="width=device-width, height=device-height,  initial-scale=1.0, user-scalable=no;user-scalable=0;"/>

</head>

<body>

<section class="margin card" style="text-align: center;">

<form action="cadastrado.php" method="post">

<label>Sala: </label><input type="text" name="sala" id="sala"><br>

<label>Nome: </label><input type="text" name="nome" id="nome"><br>

<label>Login: </label><input type="text" name="login" id="login"><br>

<label>Senha: </label><input type="password" name="senha" id="senha"><br>

<label>Tipo: </label><select name="tipo"><option value="representante">Representate</option><option value="clubelider">Líder de clube</option><option value="eletivaprofessor">Professor de eletiva</option></select><br><br>

<input type="submit" value="Enviar" id="enviar" name="enviar">

</form>

</section>

</body>

</html>