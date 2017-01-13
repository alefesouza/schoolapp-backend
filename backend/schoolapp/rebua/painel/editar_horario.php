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
// Última modificação em: 12/03/2015 02:51

include('connect_db.php');
include("pode_nao_pode.php");
include('values/other.php');

$dia = $_GET["dia"];
$sala = $info["sala"];

if(isset($_POST['enviar'])) {

for($i = 0; $i < 9; $i++) {
	$materia[] = $_POST['mat'.strval($i)];
	$professor[] = $_POST['prof'.strval($i)];
	$value = $_POST['mat'.strval($i)];
	$profvalue = $_POST['prof'.strval($i)];
	$ordem = $i + 1;
	mysqli_query($dbi, "UPDATE horarios SET materia='$value', professor='$profvalue' WHERE ordem='$ordem' AND sala='$sala' AND dia='$dia'");
}

$enviado = "Horário atualizado";
} else {
	

$materias = mysqli_query($dbi, "SELECT * FROM horarios WHERE dia='$dia' AND sala='$sala' ORDER BY ordem");

while ($row = mysqli_fetch_array($materias)) {
	$materia[] = $row['materia'];
	$professor[] = $row['professor'];
}
}

mysqli_close($dbi);
?>
<html>
<head>
<?
$title = "Editar horário - ".getDia($dia);
include("values/head.php");
	toTitle($title);
?>
</head>
<body>
<? toTitle2($title); ?>
<section class="margin card">
<form class="form-horizontal" method="post" action="">
    <fieldset>
		<?
		$horarios = getHorarios(false);
		for($i = 0; $i < count($materia); $i++) { ?>
        <div class="form-group">
            <label for="mat<? echo $i; ?>" class="col-lg-2 control-label"><? echo $horarios[$i]; ?></label>
            <div class="col-lg-10">
                <input name="mat<? echo $i; ?>" type="text" class="form-control" id="mat<? echo $i; ?>" value="<? echo $materia[$i]; ?>">
                <input name="prof<? echo $i; ?>" type="text" class="form-control" id="prof<? echo $i; ?>" value="<? echo $professor[$i]; ?>">
            </div>
        </div>
		<? } ?>
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" name="enviar" class="btn btn-primary">Atualizar</button>
				<? echo $enviado; ?>
            </div>
        </div>
    </fieldset>
</form>
</section>
<? include("values/materialinit.php"); ?>
</body>
</html>