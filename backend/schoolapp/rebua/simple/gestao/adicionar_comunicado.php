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

	include("../connect_db.php");
	include("pode_nao_pode.php");

	$room = mysql_query("SELECT * FROM usuarios WHERE login='$login_cookie'") or die("ERROR:" . mysql_error());
	$info = mysql_fetch_array($room);
?>
<html>
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
<body>
<section class="margin card">
<form method="post" action="obrigado.php">
<?php
echo "<input type=\"hidden\" name=\"login\" value=\"" . $login_cookie . "\" />\n";
?>
Data (opcional)&nbsp;<input type="text" name="data" /><br><br>
Título&nbsp;&nbsp;&nbsp;<input type="text" name="tema" /><br><br>
Descrição <br><textarea name="descricao" style="width:100%" rows="10" class="ckeditor" name="editor1"></textarea><br><br>
Adicionar em: <select name="sala"><option value="gestao">Sala</option><option value="comunicadosclubes">Clube</option><option value="comunicadoseletivas">Eletiva</option></select><br><br>
<input type="submit" />
</form>
</section>
</body>
</html>