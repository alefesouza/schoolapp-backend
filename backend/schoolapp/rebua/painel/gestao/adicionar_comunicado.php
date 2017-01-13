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
// Última modificação em: 07/04/2015 16:22

	include("../connect_db.php");
	include("pode_nao_pode.php");

if (strpos($_SERVER['HTTP_USER_AGENT'],'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'],'iPad') || strpos($_SERVER['HTTP_USER_AGENT'],'Android') || strpos($_SERVER['HTTP_USER_AGENT'],'Chrome')) {
	$inputdate = true;
	$inputtype = "date";
} else {
	$inputdate = false;
	$inputtype = "text";
}

if(isset($_POST['enviar'])) {
$sala = mysqli_real_escape_string($dbi, $info['sala']);
$date = mysqli_real_escape_string($dbi, $_POST['date']);
if($date == "") {
	$data = "";
} else {
	if($inputdate) {
		$date = DateTime::createFromFormat('Y-m-d', $date);
	} else {
		$date = DateTime::createFromFormat('d/m/Y', $date);
	}
	$data = $date->format("d/m");
	$date = $date->format("Y-m-d");
}
$titulo = mysqli_real_escape_string($dbi, $_POST['titulo']);
$descricao = mysqli_real_escape_string($dbi, $_POST['descricao']);
$login = mysqli_real_escape_string($dbi, $info['login']);
if($_POST['editor'] == "true") {
	$tipo = "1";
} else {
	$tipo = "0";
}

	$sql="INSERT INTO eventos (sala, tipo, date, data, titulo, descricao, editadopor)
VALUES ('$sala', '$tipo', '$date', '$data', '$titulo', '$descricao', '$login')";

	if (!mysqli_query($dbi,$sql)) {
	  die('ERROR: ' . mysqli_error($dbi));
	}
	
	$enviado = "Comunicado adicionado";
}
?>
<html>
<head>
<?
$title = "Adicionar comunicado";
include("../values/head.php");
	toTitle($title); ?>
<? if($_GET['editor'] == "true") {
	include("../values/editor.php");
} else { ?>
<script src="/libs/js/autosize/autosize.js"></script>
<script>
$(function() {
	autosize(document.querySelector('textarea'));
});
</script>
<? }
if(!$inputdate) {
include("../values/jquery-ui.php"); ?>
<script>
$(function() {
    $("#date").datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
    });
});
</script>
<? } ?>
</head>
<body>
<? toTitle2($title); ?>
<section class="margin card">
<form class="form-horizontal" method="post" action="">
<input type="hidden" name="editor" value="<? if($_GET['editor'] == "true") { echo "true"; } else { echo "false"; } ?>" />
    <fieldset>
        <div class="form-group">
            <label for="date" class="col-lg-2 control-label">Data</label>
            <div class="col-lg-10">
                <input name="date" type="<? echo $inputtype; ?>" class="form-control" id="date">
            </div>
        </div>
        <div class="form-group">
            <label for="titulo" class="col-lg-2 control-label">Título</label>
            <div class="col-lg-10">
                <input name="titulo" type="text" class="form-control" id="titulo">
            </div>
        </div>
        <div class="form-group">
            <label for="descricao" class="col-lg-2 control-label">Descrição</label>
            <div class="col-lg-10">
				<textarea name="descricao" <? if ($_GET['editor'] == "true") { ?> class="ckeditor" name="editor1" <? } else { ?> class="form-control" <? } ?>></textarea>
            </div>
        </div>
            <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Apagar tudo</button>
                <button type="submit" name="enviar" class="btn btn-primary">Adicionar</button>
				<? echo $enviado; ?>
            </div>
        </div>
    </fieldset>
</form>
</section>

<? include("../values/materialinit.php"); ?>
</body>
</html>