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
// Última modificação em: 07/04/2015 20:39

$palavra = $_GET['q'];

$json = @file_get_contents('http://dicionario-aberto.net/search-json?prefix='.$palavra);
if($json === FALSE) {} else {
$site = json_decode($json);
$sugestao = $site -> {'list'};

echo "[ ";

for($i = 0; $i < count($sugestao); $i++) {
	echo "{ \"content\": ".json_encode($sugestao[$i]).", \"description\": ".json_encode($sugestao[$i])." }";
	if($i < count($sugestao) - 1) {
		echo ", ";
	}
}

echo " ]"; }
?>