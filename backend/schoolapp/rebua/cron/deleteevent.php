<?
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
// Última modificação em: 18/04/2015 22:26
// Comentário 07/01/2017 20:31 - Esse cron job executa todo dia apagando eventos da agenda anteriores a esse dia

include("../painel/connect_db.php");

date_default_timezone_set('America/Sao_Paulo');
$thisdate = date('Y-m-d', time());

mysqli_query($dbi, "DELETE FROM eventos WHERE date < '$thisdate' AND date != ''"); ?>