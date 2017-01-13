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

include("../pode_nao_pode.php");



$id = $_POST["anotacaoid"];

$titulo = mysqli_real_escape_string($dbi, $_POST['titulo']);

$descricao = mysqli_real_escape_string($dbi, $_POST['descricao']);



mysqli_query($dbi,"UPDATE anotacoes SET titulo='$titulo',descricao='$descricao' WHERE id='$id'");

header("location:anotacoes.php");

mysqli_close($dbi);

?>