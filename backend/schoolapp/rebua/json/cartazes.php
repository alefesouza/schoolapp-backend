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
// Última modificação em: 27/03/2015 01:05

	include("../connect_db.php");
?>
{ "cartazes": [
<?
$result = mysqli_query($dbi, "SELECT * FROM cartazes ORDER BY id DESC");
$count = 0;
$max = mysqli_num_rows($result);
	
while ($row = mysqli_fetch_array($result)) {
		echo "{";
		echo "\"titulo\": ".json_encode($row['titulo']);
		echo ", \"settings\": ".json_encode($row['valor']);
		echo ", \"url\": ".json_encode("http://apps.aloogle.net/schoolapp/rebua/json/cartaz.php?cartaz=".$row['valor']);
		echo "}";
		$count += 1;
		if($count < $max) { echo ", "; }
}
?>
 ] }