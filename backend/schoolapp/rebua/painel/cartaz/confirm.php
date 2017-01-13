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
// Última modificação em: 27/03/2015 10:56

include("../connect_db.php");
include("pode_nao_pode.php");
?>
<html>
<head>
<? 
$title = "Remover cartaz";
include("../values/head.php");
	toTitle($title); ?>
</head>
<body>
<? toTitle2($title); ?>
<section class="margin card">
	<p>Tem certeza que deseja remover seu cartaz? Após isso você será deslogado e sua conta removida.</p>
<a class="btn btn-flat" onclick="window.open('apagar_cartaz.php', '_self')"><b>Sim</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-flat" onclick="window.open('index.php', '_self');"><b>Não</b></a>
</section>
<?
include("../values/materialinit.php"); ?>
</body>
</html>