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
?>
<html>
<head>
<link rel="author" href="https://plus.google.com/101361157875821775334" />
<link rel="me" href="https://plus.google.com/101361157875821775334" />
<link rel="stylesheet" href="/styles/card.css" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no;user-scalable=0;"/>
<meta charset="utf-8">
<script>
window.onload = function() {
document.getElementById('avisar').onchange = function(){
    if(this.checked){
        document.getElementById('enviar').disabled = false;
    } else {
        document.getElementById('enviar').disabled = true;
    }

} }
</script>
</head>
<body>
<section class="margin card">
Colocando seu clube no aplicativo você pode deixar recados para os integrantes dele, não coloquei todos os clubes porque com certeza vai ter muitos inativos, então só toque em "Enviar" se você quiser mesmo usar esse espaço.
<form method="post" action="solicitar2.php">
<p>Seu nome<font class="obrigatory">*</font>&nbsp;&nbsp;<input type="text" name="nome" /></p>
<p>Sua sala (de estudos, não do clube)<font class="obrigatory">*</font><br><input type="text" name="sala" /></p>
<p>Sou líder do clube de<font class="obrigatory">*</font><br><input type="text" name="clube" /></p>
<p><label><input type="checkbox" id="avisar"> Vou avisar para os integrantes do meu clube baixarem o aplicativo e que meu clube estará nele em uma nova atualização</label></p>
<input type="submit" id="enviar" value="Enviar" disabled="true" />
</form>
</section>
</body>
</html>