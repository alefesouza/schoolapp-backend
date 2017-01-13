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
// Última modificação em: 27/07/2015 00:47

$isandroid = strpos($_SERVER['HTTP_USER_AGENT'],'Android');
$iswp = strpos($_SERVER['HTTP_USER_AGENT'],'Windows Phone');
if(($isandroid && !$iswp) !== false) {
	header("location:http://play.google.com/store/apps/details?id=aloogle.rebuapp");
}

$isios = (strpos($_SERVER['HTTP_USER_AGENT'],'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'],'iPad') || strpos($_SERVER['HTTP_USER_AGENT'],'iPod')) && !(strpos($_SERVER['HTTP_USER_AGENT'],'like iPhone') || strpos($_SERVER['HTTP_USER_AGENT'],'like iPad') || strpos($_SERVER['HTTP_USER_AGENT'],'like iPod'));

if ($isios) {
	if(!isset($_COOKIE['iosstandalone'])) { header("location:checkios.php?url=".urlencode($_SERVER[REQUEST_URI])); }
}

header('Content-Type: text/html; charset=utf-8');

$dbi = mysqli_connect("$host","$login","$pass","$db");
$dbi -> set_charset("utf8");

if (mysqli_connect_errno()) {
  echo "Não foi possível conectar a base de dados: " . mysqli_connect_error();
}
?>