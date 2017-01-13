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
// Última modificação em: 08/04/2015 19:47

if($_COOKIE['responsavel'] == "true") { $isrespon = "true"; } else { $isrespon = "false"; }
if($_COOKIE['cantinanotificacoes'] == "true") { $cantinanotif= "true"; } else { $cantinanotif = "false"; }
if($_COOKIE['painel'] == "true") { $painel = "true"; } else { $painel = "false"; }
if(isset($_COOKIE['cor'])) { $cor = $_COOKIE["cor"]; } else { $cor = "005400"; }
?>

{ "sala": "<? echo $_COOKIE['sala']; ?>", "clube": "<? echo $_COOKIE['clube']; ?>", "eletiva": "<? echo $_COOKIE['eletiva']; ?>", "painel": "<? echo $painel; ?>", "isrespon": "<? echo $isrespon; ?>", "cantinanotif": "<? echo $cantinanotif; ?>", "cor": "<? echo $cor; ?>" }