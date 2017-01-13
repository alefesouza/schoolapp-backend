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
// Última modificação em: 27/03/2015 11:04

include('../connect_db.php');
include("pode_nao_pode.php");

$id = $_GET["id"];
$rooms = mysqli_query($dbi, "SELECT * FROM usuarios WHERE id='$id'");
$infos = mysqli_fetch_array($rooms);
if($infos['tipo'] == "cartazadmin") {
	$sala = $infos['sala'];
	mysqli_query($dbi,"DELETE FROM cartazes WHERE valor='$sala'");
	mysqli_query($dbi,"DELETE FROM eventos WHERE sala='$sala'");
}

mysqli_query($dbi, "DELETE FROM usuarios WHERE id='$id'");
header("location:remover_usuario.php");
mysqli_close($dbi);
?>