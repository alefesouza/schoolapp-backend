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
// Última modificação em: 05/04/2015 16:28

	include("../connect_db.php");
	$oque = $_GET['oque'];
?>
{ "info": [
<?
if($oque == "cardapio") { $qual = "238"; } else if($oque == "promocoes") { $qual = "290"; }
$result = mysqli_query($dbi, "SELECT * FROM eventos WHERE id='$qual'");
$count = 0;
$max = mysqli_num_rows($result);
	
while ($row = mysqli_fetch_array($result)) {
		echo "{";
		echo " \"id\": ".json_encode($row['id']);
		echo ", \"tipo\": ".json_encode($row['tipo']);
		echo ", \"data\": ".json_encode($row['data']);
		echo ", \"titulo\": ".json_encode("");
		echo ", \"descricao\": ".json_encode($row['descricao']);
		echo "}";
		$count += 1;
		if($count < $max) { echo ", "; }
}
?>
 ] }