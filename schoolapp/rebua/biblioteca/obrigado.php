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
// Última modificação em: 16/10/2014 01:05

	include("../connect_db.php");

	include("pode_nao_pode.php");

?>

<html>

<link rel="stylesheet" href="/styles/card.css" />

<section class="margin card">

<?


$categoria = mysqli_real_escape_string($dbi, $_POST['categoria']);

$obra = mysqli_real_escape_string($dbi, $_POST['obra']);

$autor = mysqli_real_escape_string($dbi, $_POST['autor']);

$editora = mysqli_real_escape_string($dbi, $_POST['editora']);

$quantidade = mysqli_real_escape_string($dbi, $_POST['quantidade']);




$sql="INSERT INTO livros (categoria, obra, autor, editora, quantidade)

VALUES ('$categoria', '$obra', '$autor', '$editora', '$quantidade')";


if (!mysqli_query($dbi,$sql)) {

  die('ERROR: ' . mysqli_error($dbi));

}


echo "Evento adicionado!!<br><br>";

echo "<a href=\"todososlivros.php\">Ver resultado</a>&nbsp;&nbsp;&nbsp;<a href=\"adicionar_evento.php\">Adicionar outro</a>";


mysqli_close($dbi);

?>

</section>

</html>