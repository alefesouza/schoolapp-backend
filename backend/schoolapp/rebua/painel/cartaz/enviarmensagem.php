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
// Última modificação em: 26/03/2015 21:48

include("../connect_db.php");
include("pode_nao_pode.php");

$login = mysqli_real_escape_string($dbi, $login_cookie);
$sala = mysqli_real_escape_string($dbi, $info['sala']);
$mensagem = mysqli_real_escape_string($dbi, $_POST['mensagem']);

if(isset($_POST['enviar'])) {

$sql="INSERT INTO mensagens (de, sala, para, mensagem) VALUES ('$login', '$sala', 'alefe', '$mensagem')";

if(!mysqli_query($dbi,$sql)) {
	die('ERROR: ' . mysqli_error($dbi));
}

$enviado = "Mensagem enviada!";
}
?>
<html>
<head>
<?
$title = "Enviar mensagem";
include("values/head.php");
	toTitle($title); ?>
</head>
<body>
<? toTitle2($title); ?>
<section class="margin card">
<form class="form-horizontal" method="post" action="">
    <fieldset>
        <div class="form-group">
            <label for="mensagem" class="col-lg-2 control-label">Mensagem</label>
            <div class="col-lg-10">
				<textarea name="mensagem" class="form-control"></textarea>
            </div>
        </div>
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
				<? echo $enviado; ?>
            </div>
        </div>
    </fieldset>
</form>
</section>
<? include("values/materialinit.php"); ?>
</body>
</html>