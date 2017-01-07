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
// Última modificação em: 26/10/2014 23:02

include('../connect_db.php');

include("pode_nao_pode.php");


$id = $_POST["horarioid"];

$sala = mysqli_real_escape_string($dbi, $_POST['sala']);

$dia = mysqli_real_escape_string($dbi, $_POST['dia']);

$ordem = mysqli_real_escape_string($dbi, $_POST['ordem']);

$materia = mysqli_real_escape_string($dbi, $_POST['materia']);

$professor = mysqli_real_escape_string($dbi, $_POST['professor']);


mysqli_query($dbi,"UPDATE horarios SET sala='$sala',dia='$dia',ordem='$ordem',materia='$materia',professor='$professor' WHERE id='$id'");

header("location:editar_horario.php");

mysqli_close($dbi);

?>