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
// Última modificação em: 12/03/2015 21:53

include('connect_db.php');
$categoria=$_POST['categoria'];

if($categoria == "") {
if(isset($_POST['lastid']) && is_numeric($_POST['lastid'])) {
$lastid=$_POST['lastid'];
$query="SELECT * FROM livros WHERE id<'$lastid' ORDER BY id DESC limit 15";
$result = mysqli_query($dbi,$query);

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
<paper-shadow z="0" class="card clickable cardlivro" onclick="window.open('https://google.com.br/search?q=<? echo $row['obra']; ?> <? echo $row['autor']; ?>')">
<h3><? echo $row['obra']; ?></h3>
<p><b>Autor:</b> <? echo $row['autor']; ?></p>
<p><b>Categoria:</b> <? include('partes/categoria.php'); ?>
</p><p><b>Editora:</b> <? echo $row['editora']; ?></p>
<p><b>Quantidade:</b> <? echo $row['quantidade']; ?></p>
<paper-ripple fit class="recenteringTouch"></paper-ripple>
</paper-shadow>
<?
}

if(mysqli_num_rows($result) < 15) { ?>
<script>$(".load_more").remove();</script>
<paper-shadow z="0" class="littlecard">Não há mais resultados</paper-shadow>
<?
	   }}
} else {
if(isset($_POST['lastid']) && is_numeric($_POST['lastid'])) {
$lastid=$_POST['lastid'];
$query="SELECT * FROM livros WHERE id<'$lastid' AND categoria='$categoria' ORDER BY id DESC limit 15";
$result = mysqli_query($dbi,$query);

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {?>
<paper-shadow z="0" class="card clickable cardlivro" onclick="window.open('https://google.com.br/search?q=<? echo $row['obra']; ?> <? echo $row['autor']; ?>')">
<h3><? echo $row['obra']; ?></h3>
<p><b>Autor:</b> <? echo $row['autor']; ?></p>
</p><p><b>Editora:</b> <? echo $row['editora']; ?></p>
<p><b>Quantidade:</b> <? echo $row['quantidade']; ?></p>
<paper-ripple fit class="recenteringTouch"></paper-ripple>
</paper-shadow>
<?
}

if(mysqli_num_rows($result) < 15) { ?>
<script>$(".load_more").remove();</script>
<paper-shadow z="0" class="littlecard">Não há mais resultados</paper-shadow>
<? }
}
}

if(isset($_POST['alfabetica'])) {
if($categoria == "") {
$query="SELECT * FROM livros ORDER BY trim(obra)";
$result = mysqli_query($dbi,$query);

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
<paper-shadow z="0" class="card clickable cardlivro" onclick="window.open('https://google.com.br/search?q=<? echo $row['obra']; ?> <? echo $row['autor']; ?>')">
<h3><? echo $row['obra']; ?></h3>
<p><b>Autor:</b> <? echo $row['autor']; ?></p>
<p><b>Categoria:</b> <? include('partes/categoria.php'); ?>
</p><p><b>Editora:</b> <? echo $row['editora']; ?></p>
<p><b>Quantidade:</b> <? echo $row['quantidade']; ?></p>
<paper-ripple fit class="recenteringTouch"></paper-ripple>
</paper-shadow>
<?
}
} else {
$query="SELECT * FROM livros WHERE categoria='$categoria' ORDER BY trim(obra)";
$result = mysqli_query($dbi,$query);
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {?>
<paper-shadow z="0" class="card clickable cardlivro" onclick="window.open('https://google.com.br/search?q=<? echo $row['obra']; ?> <? echo $row['autor']; ?>')">
<h3><? echo $row['obra']; ?></h3>
<p><b>Autor:</b> <? echo $row['autor']; ?></p>
</p><p><b>Editora:</b> <? echo $row['editora']; ?></p>
<p><b>Quantidade:</b> <? echo $row['quantidade']; ?></p>
<paper-ripple fit class="recenteringTouch"></paper-ripple>
</paper-shadow>
<?
}
}}
?>