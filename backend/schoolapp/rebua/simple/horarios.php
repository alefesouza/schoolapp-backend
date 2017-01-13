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

include("connect_db.php");
?>
<html>
<head>
<link rel="author" href="https://plus.google.com/101361157875821775334" />
<link rel="me" href="https://plus.google.com/101361157875821775334" />
<link rel="stylesheet" href="/styles/card.css" />
<style>
body {
	background: #ffffff;
}
</style>
</head>
<body>
<table id="week" width="100%">
<tr><td colspan='6'>3ºC</td></tr>
<tr><td></td><td>Segunda</td><td>Terça</td><td>Quarta</td><td>Quinta</td><td>Sexta</td></tr>
<?
$result = mysqli_query($dbi, "SELECT * FROM horarios ORDER BY ordem");
while ($row = mysqli_fetch_array($result)) {
	if($row['dia'] == "horario") {
		echo "<td>".$row['materia'];
		echo "</td>\n";
	}
	
	if($row['dia'] == "segunda") {
		echo "<td>".$row['materia'];
		echo "</td>\n";
	}
	
	if($row['dia'] == "terca") {
		echo "<td>".$row['materia'];
		echo "</td></tr>\n";
	}
}

mysqli_close($dbi);
?>
</table>
</body>
</html>