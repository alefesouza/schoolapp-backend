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
// Última modificação em: 18/02/2015 23:38

	include("../connect_db.php");
	$busca = $_GET['q'];
	$alfabetica = $_GET['alfabetica'];
?>
{ livros: [
<?
if($alfabetica == "true") {
$result = mysqli_query($dbi, "SELECT * FROM livros WHERE trim(obra) like('%$busca%') OR trim(autor) like('%$busca%') OR trim(editora) like('%$busca%') order by trim(obra)");
$count = 0;
$max = mysqli_num_rows($result);
$limite = "true";
	
while ($row = mysqli_fetch_array($result)) {
		echo "{";
		echo "\"id\": ".json_encode($row['id']);
		echo ", \"obra\": ".json_encode($row['obra']);
		echo ", \"autor\": ".json_encode($row['autor']);
		echo ", \"categoria\": ";
		include("categoria.php");
		echo ", \"editora\": ".json_encode($row['editora']);
		echo ", \"quantidade\": ".json_encode($row['quantidade']);
		echo "}";
		$count += 1;
		if($count < $max) { echo ", "; }
}
} else {
$result = mysqli_query($dbi, "SELECT * FROM livros WHERE trim(obra) like('%$busca%') OR trim(autor) like('%$busca%') OR trim(editora) like('%$busca%') ORDER BY id DESC");
$count = 0;
$max = mysqli_num_rows($result);
$limite = "true";

while ($row = mysqli_fetch_array($result)) {
		echo "{";
		echo "\"id\": ".json_encode($row['id']);
		echo ", \"obra\": ".json_encode($row['obra']);
		echo ", \"autor\": ".json_encode($row['autor']);
		echo ", \"categoria\": ";
		include("categoria.php");
		echo ", \"editora\": ".json_encode($row['editora']);
		echo ", \"quantidade\": ".json_encode($row['quantidade']);
		echo "}";
		$count += 1;
		if($count < $max) { echo ", "; }
	}
}
?>
 ], "limite": <? echo $limite; ?> }