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
// Última modificação em: 07/04/2015 16:12

include('connect_db.php');
include("pode_nao_pode.php");

$sala = $info["sala"];

$values = mysqli_query($dbi, "SELECT * FROM outros WHERE sala='$sala' AND oque='grupoid'");
$infovalues = mysqli_fetch_array($values);

if(isset($_POST['enviar'])) {

$valor = mysqli_real_escape_string($dbi, $_POST['valor']);

mysqli_query($dbi, "UPDATE outros SET valor='$valor' WHERE sala='$sala' AND oque='grupoid'");

$enviado = "ID atualizada - <a href=\"index.php\">Voltar</a>";
} else {
	$valor = $infovalues['valor'];
}

mysqli_close($dbi);
?>
<html>
<head>
<?
$title = "Editar ID do Facebook";
include("values/head.php");
	toTitle($title); ?>
</head>
<body>
<? toTitle2($title); ?>
<section class="margin card">
<form class="form-horizontal" method="post" action="">
    <fieldset>
        <div class="form-group">
            <label for="valor" class="col-lg-2 control-label">ID</label>
            <div class="col-lg-10">
                <input name="valor" type="text" class="form-control" id="valor" value="<? echo $valor; ?>">
            </div>
        </div>
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
				<? echo $enviado; ?>
            </div>
		<br><br><br>
		<div class="col-lg-10 col-lg-offset-2">
			<p><b>Por que adicionar a ID do grupo no Facebook?</b></p>
			<p>Adicionando a ID do grupo no Facebook o título da sua sala/clube/eletiva na página inicial do aplicativo pode virar um link para o grupo dela no Facebook.</p>
			<p><b>Como consigo a ID do grupo no Facebook?</b></p>
			<p>Essa ID fica no próprio link do grupo, por exemplo o link do grupo do 3ºC é https://www.facebook.com/groups/1546498112282278 , então a ID do grupo é 1546498112282278.</p>
			Caso não consiga achar sua ID, use o "Enviar mensagem ao administrador" com o nome do seu grupo.
		</div>
    </fieldset>
</form>
</section>
<? include("values/materialinit.php"); ?>
</body>
</html>