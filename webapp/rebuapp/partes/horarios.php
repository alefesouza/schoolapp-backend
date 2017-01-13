<?
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
// Última modificação em: 11/02/2015 18:21

$count = 0;
$result = mysqli_query($dbi, "SELECT * FROM horarios WHERE sala='$sala' AND dia='segunda' ORDER BY ordem");

while ($row = mysqli_fetch_array($result)) {
	$segunda[] = $row['materia'];
	$segundap[] = $row['professor'];
	
	$count += 1;
	
	if($count == 2 || $count == 7) {
		$segunda[] = "Intervalo";
		$segundap[] = "Intervalo";
	}
	
	if($count == 5) {
		$segunda[] = "Almoço";
		$segundap[] = "Almoço";
	}
}
?>
<?
$count = 0;
$result = mysqli_query($dbi, "SELECT * FROM horarios WHERE sala='$sala' AND dia='terca' ORDER BY ordem");

while ($row = mysqli_fetch_array($result)) {
	$terca[] = $row['materia'];
	$tercap[] = $row['professor'];
	
	$count += 1;
	
	if($count == 2 || $count == 7) {
		$terca[] = "Intervalo";
		$tercap[] = "Intervalo";
	}
	
	if($count == 5) {
		$terca[] = "Almoço";
		$tercap[] = "Almoço";
	}
}
?>
<?
$count = 0;
$result = mysqli_query($dbi, "SELECT * FROM horarios WHERE sala='$sala' AND dia='quarta' ORDER BY ordem");

while ($row = mysqli_fetch_array($result)) {
	$quarta[] = $row['materia'];
	$quartap[] = $row['professor'];
	
	$count += 1;
	
	if($count == 2 || $count == 7) {
		$quarta[] = "Intervalo";
		$quartap[] = "Intervalo";
	}
	
	if($count == 5) {
		$quarta[] = "Almoço";
		$quartap[] = "Almoço";
	}
}
?>
<?
$count = 0;
$result = mysqli_query($dbi, "SELECT * FROM horarios WHERE sala='$sala' AND dia='quinta' ORDER BY ordem");

while ($row = mysqli_fetch_array($result)) {
	$quinta[] = $row['materia'];
	$quintap[] = $row['professor'];
	
	$count += 1;
	
	if($count == 2 || $count == 7) {
		$quinta[] = "Intervalo";
		$quintap[] = "Intervalo";
	}
	
	if($count == 5) {
		$quinta[] = "Almoço";
		$quintap[] = "Almoço";
	}
}
?>
<?
$count = 0;
$result = mysqli_query($dbi, "SELECT * FROM horarios WHERE sala='$sala' AND dia='sexta' ORDER BY ordem");

while ($row = mysqli_fetch_array($result)) {
	$sexta[] = $row['materia'];
	$sextap[] = $row['professor'];
	
	$count += 1;
	
	if($count == 2 || $count == 7) {
		$sexta[] = "Intervalo";
		$sextap[] = "Intervalo";
	}
	
	if($count == 5) {
		$sexta[] = "Almoço";
		$sextap[] = "Almoço";
	}
}
?>