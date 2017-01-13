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
// Última modificação em: 08/04/2015 23:20

	include("../../connect_db.php");

$sala = $_GET['sala'];
$clube = $_GET['clube'];
$eletiva = $_GET['eletiva'];
if($_GET['isrespon'] == "true") { $isrespon = "responsaveis"; } else { $isrespon = ""; }
if($_GET['cantina'] == "true") { $cantina= "cantina"; } else { $cantina = ""; }

if(isset($_GET['all'])) {
	echo "[";
$result = mysqli_query($dbi, "SELECT * FROM notificacoes WHERE para IN ('$sala','$clube','$eletiva','todos','$isrespon','$cantina') ORDER BY id DESC limit 5");
$count = 0;
$max = mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result)) {
		echo "{";
		echo "\"title\": \"\"";
		echo ", \"message\": ".json_encode($row['titulo']);
		echo "}";
		$count += 1;
		if($count < $max) { echo ", "; }
	}
	echo "]";
} else {
$result = mysqli_query($dbi, "SELECT * FROM notificacoes WHERE para IN ('$sala','$clube','$eletiva','todos','$isrespon','$cantina') ORDER BY id DESC limit 1");
while ($row = mysqli_fetch_array($result)) {
		echo "{";
		echo "\"id\": ".json_encode($row['id']);
		echo ", \"titulo\": ".json_encode($row['titulo']);
		echo ", \"descricao\": ".json_encode($row['descricao']);
		echo "}";
	}
}
?>