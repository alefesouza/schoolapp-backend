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
// Última modificação em: 08/05/2015 22:17

include('connect_db.php');
include("pode_nao_pode.php");

if($info['tipo'] == "representante" || $db_tipo == "convidado") { $evorre = "evento"; } else { $evorre = "recado"; }

if (strpos($_SERVER['HTTP_USER_AGENT'],'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'],'iPad') || strpos($_SERVER['HTTP_USER_AGENT'],'Android') || strpos($_SERVER['HTTP_USER_AGENT'],'Chrome')) {
	$inputdate = true;
	$inputtype = "date";
} else {
	$inputdate = false;
	$inputtype = "text";
}

$id = $_GET["id"];
$sala = $info["sala"];

$values = mysqli_query($dbi, "SELECT * FROM eventos WHERE id='$id'");
$infovalues = mysqli_fetch_array($values);

if(isset($_POST['enviar'])) {
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
$login = mysqli_real_escape_string($dbi, $info['nome']);
$login2 = mysqli_real_escape_string($dbi, $info['nome']." (".$info['login'].")");
if($_POST['editor'] == "true") { $tipo = "1"; } else { $tipo = "0"; }

date_default_timezone_set('America/Sao_Paulo');
$thisdate = date('d/m/Y H:i:s', time());
$currentdate = "<br><b>Editado por {$login2} em:</b> ".$thisdate;
$historico = json_decode($infovalues['historico']);
array_push($historico, $currentdate);
$historico = json_encode($historico);

mysqli_query($dbi, "UPDATE eventos SET date='$date',data='$data',tipo='$tipo',titulo='$titulo',descricao='$descricao',editadopor='$login',historico='$historico' WHERE id='$id'");
	
$userid = $info['id'];
mysqli_query($dbi, "UPDATE usuarios SET ultimaedicao='$thisdate' WHERE id='$userid'");

header("location:agenda.php");
}

mysqli_close($dbi);
?>
<html>
<head>
<? if ($sala != $infovalues["sala"]) { ?>
<title>Editar evento - Painel RebuApp</title>
<link rel="author" href="https://plus.google.com/101361157875821775334" />
<link rel="me" href="https://plus.google.com/101361157875821775334" />
<link rel="stylesheet" href="/styles/card.css" />
<? }
if ($sala == $infovalues["sala"] || $info['tipo'] == "admin") { ?>
<? 
$title = "Editar {$evorre}";
include("values/head.php");
	toTitle($title); ?>
<? if($_GET['editor'] == "true") {
	include("values/editor.php");
} else { ?>
<script src="/libs/js/autosize/autosize.js"></script>
<script>
$(function() {
	autosize(document.querySelector('textarea'));
});
</script>
<? }
if(!$inputdate) {
include("values/jquery-ui.php"); ?>
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
	$("#date").datepicker('setDate', "<? echo $infovalues['data']."/".date("Y"); ?>");
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
                <input name="date" type="<? echo $inputtype; ?>" class="form-control" id="date"<? if($inputdate) { ?> value="<? echo $infovalues['date']."\""; } ?>>
            </div>
        </div>
        <div class="form-group">
            <label for="titulo" class="col-lg-2 control-label">Título</label>
            <div class="col-lg-10">
                <input name="titulo" type="text" class="form-control" id="titulo" value="<? echo $infovalues['titulo']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="descricao" class="col-lg-2 control-label">Descrição</label>
            <div class="col-lg-10">
				<textarea name="descricao" <? if ($_GET['editor'] == "true") { ?> class="ckeditor" name="editor1" <? } else { ?> class="form-control" <? } ?>><? echo $infovalues['descricao']; ?></textarea>
            </div>
        </div>
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" name="enviar" class="btn btn-primary">Atualizar</button>
				<? echo $enviado; ?>
            </div>
        </div>
    </fieldset>
</form>
</section>
<? include("values/materialinit.php"); ?>
<? } else { ?>
<section class="margin card">
Boa tentativa, mas você não tem permissão para editar esse evento<br><br>
<a href="index.php">Voltar</a>
</section>
<? } ?>
</body>
</html>