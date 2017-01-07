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
// Última modificação em: 15/09/2014 17:36

	include("connect_db.php");

	include("pode_nao_pode.php");

?>

<html>

<link rel="stylesheet" href="/styles/card.css" />

<section class="margin card">

<?


$sala = mysqli_real_escape_string($dbi, $_POST['sala']);

$data = mysqli_real_escape_string($dbi, $_POST['data']);

$tema = mysqli_real_escape_string($dbi, $_POST['tema']);

$descricao = mysqli_real_escape_string($dbi, $_POST['descricao']);

$login = mysqli_real_escape_string($dbi, $_POST['login']);


if($data == "" || $tema == "") {

	echo "Existem campos obrigatórios em branco<br><br>";

	echo "<a onclick=\"window.history.back();\" style=\"color: #0000ff;\">Voltar</a>";

} else {

	$sql="INSERT INTO eventos (sala, data, tema, descricao, editadopor)

VALUES ('$sala', '$data', '$tema', '$descricao', '$login')";


	if (!mysqli_query($dbi,$sql)) {

	  die('ERROR: ' . mysqli_error($dbi));

	}


	$room = mysql_query("SELECT * FROM usuarios WHERE login='$login_cookie'") or die("ERROR:" . mysql_error());

	$info = mysql_fetch_array($room);


	echo "Evento adicionado!!<br><br>";

	echo "<a href=\"agenda.php?sala=" . $info['sala'] . "\">Ver resultado</a>&nbsp;&nbsp;&nbsp;<a href=\"adicionar_evento.php\">Adicionar outro</a>";

}


mysqli_close($dbi);

?>

</section>

</html>