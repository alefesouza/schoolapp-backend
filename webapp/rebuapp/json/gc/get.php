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
// Última modificação em: 08/05/2015 23:09

	include("../../connect_db.php");

if($_GET['oque'] == "comunicados") {
	$oque = "gestao";
} else {
	$oque = $_GET['oque'];
}

include("../../partes/other.php");

if(strpos($oque, 'clube') !== false) {
	$nome = getClube($oque);
} else if(strpos($oque, 'eletiva') !== false) {
	$nome = getEletiva($oque);
} else {
	$nome = getSala($oque);
}
?>
{ "nome": "<? echo $nome; ?>", "grupoid": "<? echo getGrupoID($oque); ?>", "dados":  [
<?
if($oque == "notificacoes") {
$sala = $_GET['sala'];
$clube = $_GET['clube'];
$eletiva = $_GET['eletiva'];
if($_GET['isrespon'] == "true") { $isrespon = "responsaveis"; } else { $isrespon = ""; }
$result = mysqli_query($dbi, "SELECT * FROM notificacoes WHERE para IN ('$sala','$clube','$eletiva','todos','$isrespon') ORDER BY id DESC");
} else if(strpos($oque, 'cantina') !== false) {
	if($oque == "cantinacardapio") {
		$result = mysqli_query($dbi, "SELECT id, descricao FROM eventos WHERE sala='cantina' AND id='238'");
	} else {
		$result = mysqli_query($dbi, "SELECT id, descricao FROM eventos WHERE sala='cantina' AND id='290'");
	}
} else {
if($oque != "undefined") {
	$result = mysqli_query($dbi, "SELECT * FROM eventos WHERE sala='$oque' ORDER BY date");
}
}

if($oque != "undefined") {
$count = 0;
$max = mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result)) {
	if($oque != "notificacoes") { if($row['data'] != "") { $data = $row['data']." - "; } }
		echo "{";
		echo " \"id\": ".json_encode($row['id']);
		echo ", \"title\": ".json_encode($data.$row['titulo']);
		echo ", \"description\": ";
	if($row['tipo'] == "0") {
		echo json_encode("<p>".str_replace("\n", "<br>", $row['descricao'])."</p>");
	} else {
		echo json_encode("<p>".$row['descricao']."</p>");
	}
	if($oque == "notificacoes") {
		echo ", \"summary\": ".json_encode($row['sumario']);
	}
		echo " }";
		$count += 1;
		if($count < $max) { echo ", "; }
	}

if($max == 0) {
	if(strpos($oque, 'clube') !== false) {
		echo "{";
		echo "\"id\": \"\"";
		echo ", \"title\": ".json_encode("Não há recados do seu clube");
		echo ", \"description\": \"\" }";
	} else if(strpos($oque, 'eletiva') !== false) {
		echo "{";
		echo "\"id\": \"\"";
		echo ", \"title\": ".json_encode("Não há recados da sua eletiva");
		echo ", \"description\": \"\" }";
	} else if($oque == "gestao") {
		echo "{";
		echo "\"id\": \"\"";
		echo ", \"title\": ".json_encode("Não há comunicados");
		echo ", \"description\": \"\" }";
	} else if($oque == "notificacoes") {
		echo "{";
		echo "\"id\": \"\"";
		echo ", \"title\": ".json_encode("Não há notificações");
		echo ", \"description\": \"\"";
		echo ", \"summary\":  \"\" }";
	} else {
		echo "{";
		echo "\"id\": \"\"";
		echo ", \"title\": ".json_encode("Não há eventos na agenda da sua sala");
		echo ", \"description\": ".json_encode("Caso você tenha interesse em adicionar eventos na agenda desta sala, você pode pedir uma conta de convidado para o representante ou na sala da coordenação.")." }";
	}
}
}
?>
 ] }