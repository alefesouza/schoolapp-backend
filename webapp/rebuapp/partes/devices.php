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
// Última modificação em: 03/04/2015 17:35

$isandroid = strpos($_SERVER['HTTP_USER_AGENT'],'Android');
$isgc = strpos($_SERVER['HTTP_USER_AGENT'],'Chrome') && !strpos($_SERVER['HTTP_USER_AGENT'],'Android');

$isios = (strpos($_SERVER['HTTP_USER_AGENT'],'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'],'iPad') || strpos($_SERVER['HTTP_USER_AGENT'],'iPod')) && !(strpos($_SERVER['HTTP_USER_AGENT'],'like iPhone') || strpos($_SERVER['HTTP_USER_AGENT'],'like iPad') || strpos($_SERVER['HTTP_USER_AGENT'],'like iPod'));
$isiphone = strpos($_SERVER['HTTP_USER_AGENT'],'iPhone') && !strpos($_SERVER['HTTP_USER_AGENT'],'like iPhone');
$isipad = strpos($_SERVER['HTTP_USER_AGENT'],'iPad') && !strpos($_SERVER['HTTP_USER_AGENT'],'like iPad');
$isipod = strpos($_SERVER['HTTP_USER_AGENT'],'iPod') && !strpos($_SERVER['HTTP_USER_AGENT'],'like iPod');

$isie = strpos($_SERVER['HTTP_USER_AGENT'],'Trident');
$iswindows = strpos($_SERVER['HTTP_USER_AGENT'],'Windows NT');
$isw8 = (strpos($_SERVER['HTTP_USER_AGENT'],'Windows NT 6.2') || strpos($_SERVER['HTTP_USER_AGENT'],'Windows NT 6.3'));
$iswp = strpos($_SERVER['HTTP_USER_AGENT'],'Windows Phone');

$isff = strpos($_SERVER['HTTP_USER_AGENT'],'Firefox');
?>