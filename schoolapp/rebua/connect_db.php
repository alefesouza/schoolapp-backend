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
// Última modificação em: 07/09/2014 21:31

header('Content-type: text/html; charset=UTF-8');


$connect = mysql_connect("$host","$login","$pass");

$db = mysql_select_db("$db");

mysql_set_charset('utf8', $connect);

// Comentário 07/01/2017 01:24 - Aprendi mysql_ no curso e mysqli_ nos StackOverflow da vida, como vi que mudar um pelo outro podia dar erros decidi declarar logo duas variáveis na época...

$dbi = mysqli_connect("$host","$login","$pass","$db");

$dbi -> set_charset("utf8");


if (mysqli_connect_errno()) {

  echo "Não foi possível conectar a base de dados: " . mysqli_connect_error();

}

?>