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
// Última modificação em: 30/01/2015 07:55

	include("../connect_db.php");
	$categoria = $_GET['categoria'];
	$page = $_GET['page'];
	$to = $page * 15;
	$alfabetica = $_GET['alfabetica'];
?>
{ livros: [
<?
if($alfabetica == "true") {
if($categoria != "all") {
$result = mysqli_query($dbi, "SELECT * FROM livros WHERE categoria='$categoria' ORDER BY trim(obra) LIMIT $to, 15");
$count = 0;
$max = mysqli_num_rows($result);
if($max < 15) {
	$limite = "true";
} else {
	$limite = "false";
}
while ($row = mysqli_fetch_array($result)) {
		echo "{";
		echo "\"id\": ".json_encode($row['id']);
		echo ", \"obra\": ".json_encode($row['obra']);
		echo ", \"autor\": ".json_encode($row['autor']);
		echo ", \"editora\": ".json_encode($row['editora']);
		echo ", \"quantidade\": ".json_encode($row['quantidade']);
		echo "}";
		$count += 1;
		if($count < $max) { echo ", "; }
}
} else {
$result = mysqli_query($dbi, "SELECT * FROM livros ORDER BY trim(obra) LIMIT $to, 15");
$count = 0;
$max = mysqli_num_rows($result);
if($max < 15) {
	$limite = "true";
} else {
	$limite = "false";
}
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
} else {
if($categoria != "all") {
if(isset($page)) {
	$result = mysqli_query($dbi, "SELECT * FROM livros WHERE categoria='$categoria' ORDER BY id DESC LIMIT $to, 15");
} else {
	$result = mysqli_query($dbi, "SELECT * FROM livros WHERE categoria='$categoria' ORDER BY id DESC LIMIT 15");
}
$count = 0;
$max = mysqli_num_rows($result);
if($max < 15) {
	$limite = "true";
} else {
	$limite = "false";
}
while ($row = mysqli_fetch_array($result)) {
		echo "{";
		echo "\"id\": ".json_encode($row['id']);
		echo ", \"obra\": ".json_encode($row['obra']);
		echo ", \"autor\": ".json_encode($row['autor']);
		echo ", \"editora\": ".json_encode($row['editora']);
		echo ", \"quantidade\": ".json_encode($row['quantidade']);
		echo "}";
		$count += 1;
		if($count < $max) { echo ", "; }
}
} else {
if(isset($page)) {
	$result = mysqli_query($dbi, "SELECT * FROM livros ORDER BY id DESC LIMIT $to, 15");
} else {
	$result = mysqli_query($dbi, "SELECT * FROM livros ORDER BY id DESC LIMIT 15");
}
$count = 0;
$max = mysqli_num_rows($result);
if($max < 15) {
	$limite = "true";
} else {
	$limite = "false";
}
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
}
?>
 ], "limite": <? echo $limite; ?> }