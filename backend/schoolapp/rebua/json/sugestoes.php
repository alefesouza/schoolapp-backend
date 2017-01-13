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
// Última modificação em: 13/03/2015 16:20

	include("../connect_db.php");
	$busca = $_GET['q'];
?>
{ sugestoes: [
<?
$result = mysqli_query($dbi, "SELECT * FROM livros WHERE trim(obra) like('%$busca%') OR trim(autor) like('%$busca%') OR trim(editora) like('%$busca%') order by trim(obra) LIMIT 15");
while ($row = mysqli_fetch_array($result)) {
		if(stripos($row['obra'],$busca) !== false) {
			$sugest = trim($row['obra']);
		} else if(stripos($row['autor'],$busca) !== false) {
			$sugest = trim($row['autor']);
		} else if(stripos($row['editora'],$busca) !== false) {
			$sugest = trim($row['editora']);
		}
		$sugests[] = $sugest;
}

if(count($sugests) > 0) {
$sugests = array_unique($sugests);
$count = 0;
$max = count($sugests);
foreach($sugests as $s) {
	if($s == "") { $s = "\"\""; } else {
		if(json_encode($s) == "null") { $s = ""; } else { $s = json_encode($s); }}
	echo "{ \"sugestao\": ".$s."}";
	$count += 1;
		if($count < $max) { echo ", "; }
}
}
?>
 ] }