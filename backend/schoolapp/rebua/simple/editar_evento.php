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

include('connect_db.php');
include("pode_nao_pode.php");

$id = $_GET["eventoid"];
$sala = $_GET['sala'];

$room = mysql_query("SELECT * FROM usuarios WHERE login='$login_cookie'") or die("ERROR:" . mysql_error());
$info = mysql_fetch_array($room);

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
<?php
if ($info['sala'] == $infovalues['sala'] || $info['tipo'] == "admin") {
	echo "<form method=\"post\" action=\"atualizar.php?sala=".$sala."\">";
	echo "<input type=\"hidden\" name=\"eventoid\" value=\"".$id."\" />";
	echo "<input type=\"hidden\" name=\"sala\" value=\"".$info['sala']."\" />";
	echo "Data&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"data\" value=\"".$infovalues['data']."\" /><br><br>";
	echo "Tema<font class=\"obrigatory\">*</font>&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"tema\" value=\"".$infovalues['tema']."\" /><br><br>";
	echo "Descrição <br><textarea name=\"descricao\" style=\"width:100%\" rows=\"10\" class=\"ckeditor\" name=\"editor1\">".$infovalues['descricao']."</textarea><br><br>";
	echo "<input type=\"submit\" value=\"Salvar\" />&nbsp;&nbsp;&nbsp;";
	echo "<button onclick=\"window.open('agenda.php?sala=".$sala."\', '_self');\">Cancelar</button>";
	echo "</form>";
} else {
	echo "Você não tem permissão para editar esse evento<br><br>";
	echo "<a onclick=\"window.history.back();\" style=\"color: #0000ff; cursor: pointer;\">Voltar</a>";
}
?>
</section>
</body>
</html>