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
// Última modificação em: 12/03/2015 22:52

include('connect_db.php');
$busca = $_POST['busca'];

if(isset($busca)) {
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
foreach($sugests as $s) { ?>
	<paper-shadow z="0" class="listitem" onclick="window.open('busca.php?q=<? echo $s; ?>', '_self')">
		<? echo $s; ?>
	<paper-ripple fit class="recenteringTouch"></paper-ripple></paper-shadow>
	<?
}
}
}
?>