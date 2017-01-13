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

<link rel="stylesheet" href="/styles/card.css" />

<section class="margin card">

<?



$sala = mysqli_real_escape_string($dbi, $_POST['sala']);

$dia = mysqli_real_escape_string($dbi, $_POST['dia']);

$ordem = mysqli_real_escape_string($dbi, $_POST['ordem']);

$materia = mysqli_real_escape_string($dbi, $_POST['materia']);

$professor = mysqli_real_escape_string($dbi, $_POST['professor']);



$sql="INSERT INTO horarios (sala, dia, ordem, materia, professor)

VALUES ('$sala', '$dia', '$ordem', '$materia', '$professor')";

	

if (!mysqli_query($dbi,$sql)) {

	die('ERROR: ' . mysqli_error($dbi));

}



echo "Obrigado a mim mesmo!!<br><br>";

echo "<a href=\"../horarios.php\">Ver resultado</a>&nbsp;&nbsp;&nbsp;<a href=\"adicionar_horario.php\">Adicionar outro</a>";



mysqli_close($dbi);

?>

</section>

</html>