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
// Última modificação em: 06/04/2015 18:34

function parte1DaNotificacao() {
global $dbi; global $sala; global $clube; global $eletiva; global $isrespon; global $cantina;
if(isset($_COOKIE['lastnotif'])) { $lastnotif = $_COOKIE['lastnotif']; } else { $lastnotif = 0; }
$notifresult = mysqli_query($dbi, "SELECT * FROM notificacoes WHERE para IN ('$sala','$clube','$eletiva','todos','$isrespon','$cantina') AND id > $lastnotif ORDER BY id DESC");
while ($row = mysqli_fetch_array($notifresult)) { ?>
  <paper-toast id="toast<? echo $row['id']; ?>" autoCloseDisabled text="<? echo $row['titulo']; ?>"><paper-ripple fit class="recenteringTouch"></paper-ripple></paper-toast>
<? }
}

function parte2DaNotificacao() {
global $dbi; global $sala; global $clube; global $eletiva; global $isrespon; global $cantina;
if(isset($_COOKIE['lastnotif'])) { $lastnotif = $_COOKIE['lastnotif']; } else { $lastnotif = 0; }
$time = 0;
$notifresult = mysqli_query($dbi, "SELECT * FROM notificacoes WHERE para IN ('$sala','$clube','$eletiva','todos','$isrespon','$cantina') AND id > $lastnotif ORDER BY id DESC");
$count = 0;
$max = mysqli_num_rows($notifresult);
while ($row = mysqli_fetch_array($notifresult)) {
	$count += 1;
	if($count == 1) { ?>
if(getCookie("lastnotif") != <? echo $row['id']; ?>) {
	$('paper-toast').click(function() { window.open('notificacoes.php', '_self'); })
	document.cookie='lastnotif=<? echo $row['id']; ?>; expires=Fri,01 Jan 2016 12:00:00 UTC';
	<? } ?>
setTimeout(function() {
	document.querySelector('#toast<? echo $row['id']; ?>').show(); }, <? echo $time; ?>);
<? $time += 3500;
	if($count == $max) { ?> } <? }
}
?>

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}
<? } ?>