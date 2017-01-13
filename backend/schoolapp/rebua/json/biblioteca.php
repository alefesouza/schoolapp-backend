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
// Última modificação em: 28/03/2015 19:38

	include("../connect_db.php");
	$sql = "SELECT * FROM livros";
	$result = mysqli_query($dbi, $sql);
	$total = "SELECT * FROM eventos WHERE sala='biblioteca'";
	$totalrecados = mysqli_query($dbi, $total);
	$num = mysqli_num_rows($totalrecados);

function categ($category, $name) {
	$count = 0;
	global $dbi;
	$linhas = mysqli_num_rows(mysqli_query($dbi, "SELECT * FROM livros WHERE categoria='$category'"));
	$random = mysqli_query($dbi, "SELECT * FROM livros WHERE categoria='$category' ORDER BY RAND() LIMIT 3");
	echo "{ \"categoria\" : ".json_encode($category).", \"nome\": ".json_encode($name).", \"quantidade\": \"<font color='#ff0000'>".$linhas."</font> livros\", \"amostras\": \"";
	while ($row = mysqli_fetch_array($random)) { $count = $count + 1; echo trim (substr(json_encode($row['obra']), 1, -1)); if($count != "3") { echo "<font color='#ff0000'>,</font> "; } else { echo "..."; }}
	echo "\" }";
} 
?>

{ "total" : "<? echo "Total de <font color='#ff0000'>".mysqli_num_rows($result)."</font> livros"; ?>", "categorias": [
<? include("../painel/values/other.php"); ?>
<?
	$livrosarray = getArray("livros", false);
	$livrosarrayvalue = getArray("livros", true);
	for($i = 0; $i < count($livrosarray); $i++) {
		categ($livrosarrayvalue[$i], $livrosarray[$i]);
		if($i < count($livrosarray) - 1) {
			echo ", ";
		}
	}
?> ], "recadosbotao": <? if($num == 0) { echo json_encode(""); } else { if($num == 1) { $rec = "recado"; } else { $rec = "recados"; } echo json_encode("<font color='#ff0000'>".$num."</font> ".$rec." da biblioteca"); } ?>, "recadostitulo": <? echo json_encode("Recados da biblioteca"); ?>, "recadosurl": <? echo json_encode("http://apps.aloogle.net/schoolapp/rebua/json/main.php?biblioteca=true"); ?>, "recadossettings": <? echo json_encode("recadosdabiblioteca"); ?> }