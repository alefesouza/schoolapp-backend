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

<link rel="stylesheet" href="/styles/card.css" />

<section class="margin card">

<?

$nome = mysqli_real_escape_string($dbi, $_POST['nome']);

$sala = mysqli_real_escape_string($dbi, $_POST['sala']);



if($nome == "" || $sala == "") {

	echo "Existem campos obrigatórios em branco<br><br>";

	echo "<a onclick=\"window.history.back();\" style=\"color: #0000ff;\">Voltar</a>";

} else {

	$sql="INSERT INTO mensagens (de, sala, para, mensagem) VALUES ('$nome', '$sala', 'alefe', 'Pedido para editar agenda do $sala')";



	if (!mysqli_query($dbi,$sql)) {

	  die('ERROR: ' . mysqli_error($dbi));

	}

	

	setcookie("avisoatualizaragenda", "avisado", strtotime('+105 days'));



	echo "Obrigado!!<br><br>";

	echo "O desenvolvedor do aplicativo ir&aacute; falar com voc&ecirc; assim que poss&iacute;vel.<br><br>";

	echo "<a href=\"agenda.php?sala=" . $_POST['sala'] . "\">Voltar</a>";

}



mysqli_close($dbi);

?>

</section>

</html>