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

	include("../connect_db.php");
	include("pode_nao_pode.php");
?>
<html>
<head>
<link rel="author" href="https://plus.google.com/101361157875821775334" />
<link rel="me" href="https://plus.google.com/101361157875821775334" />
<link rel="stylesheet" href="/styles/card.css" />
</head>
<body>
<?php
$result = mysqli_query($dbi, "SELECT * FROM mensagens ORDER BY id DESC");
while ($row = mysqli_fetch_array($result)) {
		echo "<section class=\"margin card\">";
		echo "<p><b>De:</b> ".$row['de']."</p>";
		echo "<p><b>Sala:</b> ".$row['sala']."</p>";
		echo "<p><b>Para:</b> ".$row['para']."</p>";
		echo "<p><b>Mensagem:</b> ".$row['mensagem']."</p>";
		echo "<a href=\"apagar_mensagem.php?mensagemid=".$row['id']."\">Apagar</a>";
		echo "</section>";
}

mysql_close($dbi);
?>
</body>
</html>