<?php
/*
 * Copyright (C) 2014 Alefe Souza <contato@alefesouza.com>
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
// Última modificação em: 16/10/2014 16:20
?>
<html>

<link rel="author" href="https://plus.google.com/101361157875821775334" />

<link rel="me" href="https://plus.google.com/101361157875821775334" />

<link rel="stylesheet" href="/styles/card.css" />

<meta http-equiv="content-type" content="text/html; charset=utf-8">

<meta charset="UTF-8">

<body>

<section class="margin card">

<form method="post" action="solicitar2.php">

Seu nome<font class="obrigatory">*</font>:&nbsp;&nbsp;<input type="text" name="nome" /><br><br>

Sala:&nbsp;&nbsp;&nbsp;<? if($_GET['sala'] == "1a") { echo "1ºA"; }

else if($_GET['sala'] == "1b") { echo "1ºB"; }

else if($_GET['sala'] == "1c") { echo "1ºC"; }

else if($_GET['sala'] == "1d") { echo "1ºD"; }

else if($_GET['sala'] == "2a") { echo "2ºA"; }

else if($_GET['sala'] == "2b") { echo "2ºB"; }

else if($_GET['sala'] == "2c") { echo "2ºC"; }

else if($_GET['sala'] == "3a") { echo "3ºA"; }

else if($_GET['sala'] == "3b") { echo "3ºB"; }

else if($_GET['sala'] == "3c") { echo "3ºC"; } else { echo "Ué"; } ?><br><br>

<input type="hidden" name="sala" value="<? echo $_GET['sala'] ?>" />

<input type="submit" />

</form>

</section>

</body>

</html>