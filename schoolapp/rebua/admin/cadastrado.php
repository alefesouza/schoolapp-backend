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
// Última modificação em: 08/09/2014 22:02

	include("../connect_db.php");

	include("pode_nao_pode.php");

?>

<html>

<link rel="stylesheet" href="/styles/card.css" />

<section class="margin card">

<?


$sala = mysqli_real_escape_string($dbi, $_POST['sala']);

$nome = mysqli_real_escape_string($dbi, $_POST['nome']);

$login = mysqli_real_escape_string($dbi, $_POST['login']);

$senha = mysqli_real_escape_string($dbi, $_POST['senha']);

$tipo = mysqli_real_escape_string($dbi, $_POST['tipo']);


if($sala == "" || $nome == "" || $login == "" || $senha == "") {

	echo "Existem campos obrigatórios em branco<br><br>";

	echo "<a onclick=\"window.history.back();\" style=\"color: #0000ff;\">Voltar</a>";

} else {

	mysqli_query($dbi,"INSERT INTO usuarios (nome, login, senha, sala, tipo) VALUES ('$nome', '$login', '$senha', '$sala', '$tipo')");


	echo "Usuário cadastrado com sucesso!!<br><br>";

	echo "<a href=\"cadastrar_usuario.php\">Cadastrar outro</a>&nbsp;&nbsp;&nbsp;<a href=\"index.php\">Voltar</a>";

}


mysqli_close($dbi);

?>

</section>

</html>