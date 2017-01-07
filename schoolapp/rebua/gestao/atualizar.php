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
// Última modificação em: 14/09/2014 00:06

include('../connect_db.php');

include("pode_nao_pode.php");


$room = mysql_query("SELECT * FROM usuarios WHERE login='$login_cookie'") or die("ERROR:" . mysql_error());

$info = mysql_fetch_array($room);


$id = $_POST["eventoid"];

$sala = mysqli_real_escape_string($dbi, $_POST['sala']);

$data = mysqli_real_escape_string($dbi, $_POST['data']);

$tema = mysqli_real_escape_string($dbi, $_POST['tema']);

$descricao = mysqli_real_escape_string($dbi, $_POST['descricao']);


mysqli_query($dbi,"UPDATE eventos SET sala='$sala',data='$data',tema='$tema',descricao='$descricao' WHERE id='$id'");

header("location:comunicados.php");

mysqli_close($dbi);

?>