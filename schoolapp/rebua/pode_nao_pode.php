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
// Última modificação em: 16/10/2014 17:36

$login_cookie = $_COOKIE['login'];

$room = mysql_query("SELECT * FROM usuarios WHERE login='$login_cookie'")or die("ERROR:".mysql_error());

$info = mysql_fetch_array($room);

if ($info['tipo'] == "admin") { }

else if ($info['tipo'] == "gestao") {

	header("location:gestao/index.php");

} else if ($info['tipo'] == "representante" || $info['tipo'] == "clubelider" || $info['tipo'] == "eletivaprofessor" || $info['tipo'] == "bibliotecario") {}

else {

	header("location:login.php");

}

?>