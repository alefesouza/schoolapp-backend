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

include('../connect_db.php');
include("pode_nao_pode.php");

$id = $_GET["eventoid"];

$values = mysql_query("SELECT * FROM eventos WHERE id='$id'") or die("ERROR:" . mysql_error());
$infovalues = mysql_fetch_array($values);

mysqli_close($dbi);
?>
<html>
<head>
<link rel="author" href="https://plus.google.com/101361157875821775334" />
<link rel="me" href="https://plus.google.com/101361157875821775334" />
<script src="//cdn.ckeditor.com/4.4.5/standard/ckeditor.js"></script>
<link rel="stylesheet" href="/styles/card.css" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<meta name="viewport" content="width=device-width, height=device-height,  initial-scale=1.0, user-scalable=no;user-scalable=0;"/>
<script>
CKEDITOR.env.isCompatible = true;
	
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName == 'table') {
        var info = dialogDefinition.getContents( 'info' );

        info.get('txtWidth')['default'] = '100%';
        info.get('txtBorder')['default'] = '1';
    }
});

CKEDITOR.replace('editor1');
</script>
</head>
<body>
<section class="margin card">
<form method="post" action="atualizar.php">
<input type="hidden" name="eventoid" value="<? echo $id ?>" />
<input type="hidden" name="sala" value="gestao" />
Data&nbsp;&nbsp;&nbsp;<input type="text" name="data" value="<? echo $infovalues['data'] ?>" /><br><br>
Título&nbsp;&nbsp;&nbsp;<input type="text" name="tema" value="<? echo $infovalues['tema'] ?>" /><br><br>
Descrição <br><textarea name="descricao" style="width:100%" rows="10" class="ckeditor" name="editor1"><? echo $infovalues['descricao'] ?></textarea><br><br>
<input type="submit" value="Salvar" />
<button onclick="window.open('comunicados.php', '_self');">Cancelar</button>
</form>
</section>
</body>
</html>