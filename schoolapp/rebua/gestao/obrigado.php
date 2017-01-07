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
// Última modificação em: 15/10/2014 23:26

	include("../connect_db.php");

	include("pode_nao_pode.php");

?>

<html>

<link rel="stylesheet" href="/styles/card.css" />

<section class="margin card">

<?


// escape variables for security

$sala = mysqli_real_escape_string($dbi, $_POST['sala']);

$data = mysqli_real_escape_string($dbi, $_POST['data']);

$tema = mysqli_real_escape_string($dbi, $_POST['tema']);

$descricao = mysqli_real_escape_string($dbi, $_POST['descricao']);

$login = mysqli_real_escape_string($dbi, $_POST['login']);


$sql="INSERT INTO eventos (sala, data, tema, descricao, editadopor)

VALUES ('$sala', '$data', '$tema', '$descricao', '$login')";


if (!mysqli_query($dbi,$sql)) {

  die('Error: ' . mysqli_error($dbi));

}


echo "Comunicado adicionado!!<br><br>";

if($sala == "gestao") {

echo "<a href=\"comunicados.php\">Ver resultado</a>&nbsp;&nbsp;&nbsp;<a href=\"adicionar_comunicado.php\">Adicionar outro</a>"; }

if($sala == "comunicadosclubes") {

echo "<a href=\"../clube/comunicados.php\">Ver resultado</a>&nbsp;&nbsp;&nbsp;<a href=\"adicionar_comunicado.php\">Adicionar outro</a>"; }

if($sala == "comunicadoseletivas") {

echo "<a href=\"../eletiva/comunicados.php\">Ver resultado</a>&nbsp;&nbsp;&nbsp;<a href=\"adicionar_comunicado.php\">Adicionar outro</a>"; }

	

mysqli_close($dbi);

?>

</section>

</html>