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
// Última modificação em: 16/10/2014 17:09

	include("../connect_db.php");

?>

<html>

<link rel="stylesheet" href="/styles/card.css" />

<section class="margin card">

<?

$nome = mysqli_real_escape_string($dbi, $_POST['nome']);

$sala = mysqli_real_escape_string($dbi, $_POST['sala']);

$clube = mysqli_real_escape_string($dbi, $_POST['clube']);


if($nome == "" || $sala == "" || $clube == "") {

	echo "Existem campos obrigatórios em branco<br><br>";

	echo "<a onclick=\"window.history.back();\" style=\"color: #0000ff;\">Voltar</a>";

} else {

	$sql="INSERT INTO mensagens (de, sala, para, mensagem) VALUES ('$nome', '$sala do clube de $clube', 'alefe', 'Pedido colocar o clube de $clube, da sala $sala')";


	if (!mysqli_query($dbi,$sql)) {

	  die('ERROR: ' . mysqli_error($dbi));

	}


	echo "Mensagem enviada!!<br><br>";

	echo "O desenvolvedor do aplicativo ir&aacute; falar com voc&ecirc; assim que poss&iacute;vel.<br><br>";

}


mysqli_close($dbi);

?>

</section>

</html>