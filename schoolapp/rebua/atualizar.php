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
// Última modificação em: 16/10/2014 17:42

include('connect_db.php');

include("pode_nao_pode.php");


$room = mysql_query("SELECT * FROM usuarios WHERE login='$login_cookie'")or die("ERROR:".mysql_error());

$info = mysql_fetch_array($room);

$sala = $_GET['sala'];


$id = $_POST["eventoid"];

$data = mysqli_real_escape_string($dbi, $_POST['data']);

$tema = mysqli_real_escape_string($dbi, $_POST['tema']);

$descricao = mysqli_real_escape_string($dbi, $_POST['descricao']);


mysqli_query($dbi, "UPDATE eventos SET data='$data',tema='$tema',descricao='$descricao' WHERE id='$id'");

if ($info['tipo'] == "representante") {

	header("location:agenda.php?sala=".$sala);

} else if ($info['tipo'] == "clubelider") {

	header("location:clube/recados.php?cluberoom=".$sala);

} else if ($info['tipo'] == "eletivaprofessor") {

	header("location:eletiva/recados.php?eletivaroom=".$sala);

} else if ($info['tipo'] == "admin") {

	header("location:admin/remover_eventos.php");

}

mysqli_close($dbi);

?>