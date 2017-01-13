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
// Última modificação em: 08/05/2015 11:09

include("../connect_db.php");

if (isset($_GET['sala'])) $sala = $_GET['sala'];
if (isset($_GET['clube'])) $sala = $_GET['clube'];
if (isset($_GET['eletiva'])) $sala = $_GET['eletiva'];
if (isset($_GET['comunicados'])) $sala = "gestao";
if (isset($_GET['biblioteca'])) $sala = "biblioteca";

$outros = mysqli_query($dbi, "SELECT * FROM outros WHERE sala='$sala' AND oque='grupoid'");
$outro = mysqli_fetch_array($outros);
$grupo = $outro['valor'];
$itsok = $outro['itsok'];
?>

{ <? if(isset($_GET['sala'])) { ?>"grupo": "<? echo $grupo; ?>", <? } ?>info: [
<?

$count = 0;

$result = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala='$sala' ORDER BY date");
$max = mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result)) {
		echo "{";
		echo "\"id\": ".json_encode($row['id']);
		echo ", \"tipo\": ".json_encode($row['tipo']);
		echo ", \"data\": ".json_encode($row['data']);
		echo ", \"titulo\": ".json_encode($row['titulo']);
		echo ", \"descricao\": ".json_encode($row['descricao'])." }";
		$count += 1;
		if($count < $max) { echo ", "; }
}

if($max == 0) {
	if(isset($_GET['sala']) && $_GET['sala'] != "none") {
		echo "{";
		echo "\"id\": \"0\"";
		echo ", \"tipo\": \"0\"";
		echo ", \"data\": \"\"";
		echo ", \"titulo\": ".json_encode("Não há eventos na agenda da sua sala");
		echo ", \"descricao\": ".json_encode("Caso você tenha interesse em adicionar eventos na agenda desta sala, você pode pedir uma conta de convidado para o representante ou na sala da coordenação.")." }";
	} else if(isset($_GET['clube']) && $_GET['clube'] != "none") {
		echo "{";
		echo "\"id\": \"0\"";
		echo ", \"tipo\": \"0\"";
		echo ", \"data\": \"\"";
		echo ", \"titulo\": ".json_encode("Não há recados do seu clube");
		echo ", \"descricao\": \"\" }";
	} else if(isset($_GET['eletiva']) && $_GET['eletiva'] != "none") {
		echo "{";
		echo "\"id\": \"0\"";
		echo ", \"tipo\": \"0\"";
		echo ", \"data\": \"\"";
		echo ", \"titulo\": ".json_encode("Não há recados da sua eletiva");
		echo ", \"descricao\": \"\" }";
	} else if(isset($_GET['comunicados'])) {
		echo "{";
		echo "\"id\": \"0\"";
		echo ", \"tipo\": \"0\"";
		echo ", \"data\": \"\"";
		echo ", \"titulo\": ".json_encode("Não há comunicados");
		echo ", \"descricao\": \"\" }";
	} else if(isset($_GET['biblioteca'])) {
		echo "{";
		echo "\"id\": \"0\"";
		echo ", \"tipo\": \"0\"";
		echo ", \"data\": \"\"";
		echo ", \"titulo\": ".json_encode("Não há recados da biblioteca");
		echo ", \"descricao\": \"\" }";
	}
}

mysqli_close($dbi);
?>
] }