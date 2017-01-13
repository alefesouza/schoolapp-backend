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
// Última modificação em: 08/04/2015 00:17

	include("../../connect_db.php");

$sala = $_GET['sala'];
$clube = $_GET['clube'];
$eletiva = $_GET['eletiva'];
if($_GET['isrespon'] == "true") { $isrespon = "responsaveis"; } else { $isrespon = ""; }

$consulteventos = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala IN ('$sala','$clube','$eletiva','gestao')");
$eventos = mysqli_num_rows($consulteventos);
if(mysqli_num_rows($consulteventos) == 0) { $eventos = ""; } else { $eventos = mysqli_num_rows($consulteventos); }
$consultsala = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala='$sala' ORDER BY date");
$baeven = mysqli_fetch_array($consultsala);

$consultnotificacoes = mysqli_query($dbi, "SELECT * FROM notificacoes WHERE para IN ('$sala','$clube','$eletiva','todos','$isrespon')");
if(mysqli_num_rows($consultnotificacoes) == 0) { $notificacoes = ""; } else { $notificacoes = mysqli_num_rows($consultnotificacoes); }
$banotif = mysqli_fetch_array($consultnotificacoes);

$consultsala = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala='$sala'");
$salacount = mysqli_num_rows($consultsala);

$consultclube = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala='$clube'");
$clubecount = mysqli_num_rows($consultclube);

$consulteletiva = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala='$eletiva'");
$eletivacount = mysqli_num_rows($consulteletiva);

$consultcomunicados = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala='gestao'");
$comunicadoscount = mysqli_num_rows($consultcomunicados);
if($baeven['data'] != "") { $batitleeven = $baeven['data']." - ".$baeven['titulo']; } else { $batitleeven = $baeven['titulo']; }
?>
{ "eventos": "<? echo $eventos; ?>", "notificacoes": "<? echo $notificacoes; ?>", "sala": "<? echo $salacount; ?>", "clube": "<? echo $clubecount; ?>", "eletiva": "<? echo $eletivacount; ?>", "comunicados": "<? echo $comunicadoscount; ?>", "batitleeven": "<? echo $batitleeven; ?>", "batitlenotif": "<? echo $banotif['titulo']; ?>" }