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


include('../connect_db.php');

include("pode_nao_pode.php");



$id = $_GET["id"];

$categoria = mysqli_real_escape_string($dbi, $_POST['categoria']);

$obra = mysqli_real_escape_string($dbi, $_POST['obra']);

$autor = mysqli_real_escape_string($dbi, $_POST['autor']);

$editora = mysqli_real_escape_string($dbi, $_POST['editora']);

$quantidade = mysqli_real_escape_string($dbi, $_POST['quantidade']);



mysqli_query($dbi,"UPDATE livros SET categoria='$categoria',obra='$obra',autor='$autor',editora='$editora',quantidade='$quantidade' WHERE id='$id'");

header("location:todososlivros.php");

mysqli_close($dbi);

?>