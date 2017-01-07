<?php
/*
 * Copyright (C) 2014 Alefe Souza <contato@alefesouza.com>
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

// Última modificação em: 24/10/2014 16:21

include("../connect_db.php");
?>
<html>
<head>
<link rel="author" href="https://plus.google.com/101361157875821775334" />
<link rel="me" href="https://plus.google.com/101361157875821775334" />
<link rel="stylesheet" href="/styles/card.css" />
</head>
<body>
<table width="100%">
<?
$result = mysqli_query($dbi, "SELECT * FROM horarios ORDER BY ordem");
while ($row = mysqli_fetch_array($result)) {
		echo "<tr><td>".$row['materia'];
		if ($row['ordem'] == "2" || $row['ordem'] == "7") {
			echo "<tr><td>Intervalo</tr></td>";
		};
		if ($row['ordem'] == "5") {
			echo "<tr><td>Almoço</tr></td>";
		};
		echo "</td></tr>\n";
}

mysql_close($dbi);
?>
</table>
</body>
</html>