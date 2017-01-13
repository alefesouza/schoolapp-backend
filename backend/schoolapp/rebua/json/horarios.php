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
// Última modificação em: 06/02/2015 22:23

include("../connect_db.php");
$sala = $_GET['sala'];
?>

{ segunda: [ 
<?
$count = 0;

$result = mysqli_query($dbi, "SELECT * FROM horarios WHERE sala='$sala' AND dia='segunda' ORDER BY ordem");
$max = mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result)) {
		echo "{";
		echo " \"materia\": ".json_encode($row['materia']);
		echo ", \"professor\": ".json_encode($row['professor'])." }";
	
	$count += 1;
	if($count < $max) { echo ", "; }
	
	if($count == 2 || $count == 7) {
		echo "{";
		echo " \"materia\": \"Intervalo\"";
		echo ", \"professor\": \"Intervalo\" }, ";
	}
	
	if($count == 5) {
		echo "{";
		echo " \"materia\": \"Almoço\"";
		echo ", \"professor\": \"Almoço\" }, ";
	}
}
?>
], terca: [
<?
$count = 0;

$result = mysqli_query($dbi, "SELECT * FROM horarios WHERE sala='$sala' AND dia='terca' ORDER BY ordem");
$max = mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result)) {
		echo "{";
		echo " \"materia\": ".json_encode($row['materia']);
		echo ", \"professor\": ".json_encode($row['professor'])." }";
	
	$count += 1;
	if($count < $max) { echo ", "; }
	
	if($count == 2 || $count == 7) {
		echo "{";
		echo " \"materia\": \"Intervalo\"";
		echo ", \"professor\": \"Intervalo\" }, ";
	}
	
	if($count == 5) {
		echo "{";
		echo " \"materia\": \"Almoço\"";
		echo ", \"professor\": \"Almoço\" }, ";
	}
}
?>
], quarta: [
<?
$count = 0;

$result = mysqli_query($dbi, "SELECT * FROM horarios WHERE sala='$sala' AND dia='quarta' ORDER BY ordem");
$max = mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result)) {
		echo "{";
		echo " \"materia\": ".json_encode($row['materia']);
		echo ", \"professor\": ".json_encode($row['professor'])." }";
	
	$count += 1;
	if($count < $max) { echo ", "; }
	
	if($count == 2 || $count == 7) {
		echo "{";
		echo " \"materia\": \"Intervalo\"";
		echo ", \"professor\": \"Intervalo\" }, ";
	}
	
	if($count == 5) {
		echo "{";
		echo " \"materia\": \"Almoço\"";
		echo ", \"professor\": \"Almoço\" }, ";
	}
}
?>
], quinta: [
<?
$count = 0;

$result = mysqli_query($dbi, "SELECT * FROM horarios WHERE sala='$sala' AND dia='quinta' ORDER BY ordem");
$max = mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result)) {
		echo "{";
		echo " \"materia\": ".json_encode($row['materia']);
		echo ", \"professor\": ".json_encode($row['professor'])." }";
	
	$count += 1;
	if($count < $max) { echo ", "; }
	
	if($count == 2 || $count == 7) {
		echo "{";
		echo " \"materia\": \"Intervalo\"";
		echo ", \"professor\": \"Intervalo\" }, ";
	}
	
	if($count == 5) {
		echo "{";
		echo " \"materia\": \"Almoço\"";
		echo ", \"professor\": \"Almoço\" }, ";
	}
}
?>
], sexta: [
<?
$count = 0;

$result = mysqli_query($dbi, "SELECT * FROM horarios WHERE sala='$sala' AND dia='sexta' ORDER BY ordem");
$max = mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result)) {
		echo "{";
		echo " \"materia\": ".json_encode($row['materia']);
		echo ", \"professor\": ".json_encode($row['professor'])." }";
	
	$count += 1;
	if($count < $max) { echo ", "; }
	
	if($count == 2 || $count == 7) {
		echo "{";
		echo " \"materia\": \"Intervalo\"";
		echo ", \"professor\": \"Intervalo\" }, ";
	}
	
	if($count == 5) {
		echo "{";
		echo " \"materia\": \"Almoço\"";
		echo ", \"professor\": \"Almoço\" }, ";
	}
}

mysqli_close($dbi);
?>
 ] }