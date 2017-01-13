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
// Última modificação em: 27/05/2016 03:45, devo ter pego algum código aqui e dado CTRL+S sem querer, é aumático isso em mim...

if(isset($_COOKIE['cor'])) { 
		$color = $_COOKIE["cor"];
	} else {
		$color = "005400";
}

$sala = $_COOKIE['sala'];
$clube = $_COOKIE['clube'];
$eletiva = $_COOKIE['eletiva'];
if($_COOKIE['responsavel'] == "true") { $isrespon = "responsaveis"; } else { $isrespon = ""; }
if($_COOKIE['cantinanotificacoes'] == "true") { $cantina = "cantina"; } else { $cantina = ""; }
include('devices.php');

$descriptiontag = "RebuApp é o aplicativo da E. E. Profº Willian Rodrigues Rebuá, com acesso a agenda, horários, biblioteca, notificações e mais.";
?>
<link rel="author" href="https://plus.google.com/101361157875821775334" />
<link rel="me" href="https://plus.google.com/101361157875821775334" />
<link rel="stylesheet" href="styles/styles.css" shim-shadowdom />
<link rel="shorcut icon" href="imagens/favicon.png" />
<link rel="canonical" href="http://apps.aloogle.net/web/rebuapp/configuracoes.php" />

<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="language" content="pt-br" />
<meta http-equiv="Content-Language" content="pt-br" />
<meta name="title" content="RebuApp" />
<meta name="description" content="<? echo $descriptiontag; ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<meta name="keywords" content="school, escola, webapp, aplicativo, aplicativo de escola, rebua, willian rodrigues rebua" />
<meta name="author" content="Alefe Souza" />

<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@alefesouza5">
<meta name="twitter:title" content="RebuApp">
<meta name="twitter:description" content="<? echo $descriptiontag; ?>">
<meta name="twitter:creator" content="@alefesouza5">
<meta name="twitter:image" content="http://apps.aloogle.net/web/rebuapp/imagens/metatags/twitter.png">
<meta name="twitter:app:name:googleplay" content="RebuApp" />
<meta name="twitter:app:id:googleplay" content="aloogle.rebuapp" />

<meta property="og:title" content="RebuApp" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://apps.aloogle.net/web/rebuapp/configuracoes.php" />
<meta property="og:image" content="http://apps.aloogle.net/web/rebuapp/imagens/metatags/og.png" />
<meta property="og:description" content="<? echo $descriptiontag; ?>" /> 
<meta property="og:site_name" content="RebuApp" />
<meta property="fb:admins" content="100000073302574" />

<meta name="application-name" content="RebuApp" />
<meta name="mobile-web-app-capable" content="yes" />
<meta name="theme-color" content="#<? echo $color; ?>" />

<link rel="icon" sizes="128x128" href="imagens/android/icon-128x-128.png" />
<link rel="icon" sizes="192×192" href="imagens/android/icon-192x-192.png" />
<link rel="icon" sizes="228x228" href="imagens/android/icon-228x-228.png" />
<link rel="icon" sizes="512x512" href="imagens/android/icon-512x-512.png">
<link rel="manifest" href="json/manifest.json">
<? if ($isios) { ?>

<meta name="apple-mobile-web-app-title" content="RebuApp" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="default" />
<link rel="apple-touch-icon-precomposed" href="imagens/apple/icon-60x-60-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="imagens/apple/icon-76x-76-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="imagens/apple/icon-120x-120-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="imagens/apple/icon-152x-152-precomposed.png" />

    <!-- iOS 6 & 7 iPad (retina, portrait) -->
    <link rel="apple-touch-startup-image" href="imagens/apple/apple-touch-startup-image-1536x2008.png"
         media="(device-width: 768px) and (device-height: 1024px)
            and (orientation: portrait)
            and (-webkit-device-pixel-ratio: 2)" />

    <!-- iOS 6 & 7 iPad (retina, landscape) -->
    <link rel="apple-touch-startup-image" href="imagens/apple/apple-touch-startup-image-1496x2048.png"
         media="(device-width: 768px) and (device-height: 1024px)
            and (orientation: landscape)
            and (-webkit-device-pixel-ratio: 2)" />

    <!-- iOS 6 iPad (portrait) -->
    <link rel="apple-touch-startup-image" href="imagens/apple/apple-touch-startup-image-768x1004.png"
         media="(device-width: 768px) and (device-height: 1024px)
            and (orientation: portrait)
            and (-webkit-device-pixel-ratio: 1)" />

    <!-- iOS 6 iPad (landscape) -->
    <link rel="apple-touch-startup-image" href="imagens/apple/apple-touch-startup-image-748x1024.png"
         media="(device-width: 768px) and (device-height: 1024px)
            and (orientation: landscape)
            and (-webkit-device-pixel-ratio: 1)" />

    <!-- iOS 6 & 7 iPhone 5 -->
    <link rel="apple-touch-startup-image" href="imagens/apple/apple-touch-startup-image-640x1096.png"
         media="(device-width: 320px) and (device-height: 568px)
            and (-webkit-device-pixel-ratio: 2)" />

    <!-- iOS 6 & 7 iPhone (retina) -->
    <link rel="apple-touch-startup-image" href="imagens/apple/apple-touch-startup-image-640x920.png"
         media="(device-width: 320px) and (device-height: 480px)
            and (-webkit-device-pixel-ratio: 2)" />

    <!-- iOS 6 iPhone -->
    <link rel="apple-touch-startup-image" href="imagens/apple/apple-touch-startup-image-320x460.png"
         media="(device-width: 320px) and (device-height: 480px)
            and (-webkit-device-pixel-ratio: 1)" />
<? }
if (($iswindows && $isie) || $iswp) { ?>

<meta name="msapplication-square70x70logo" content="imagens/ms/smalltile.png" />
<meta name="msapplication-square150x150logo" content="imagens/ms/mediumtile.png" />
<meta name="msapplication-wide310x150logo" content="imagens/ms/widetile.png" />
<meta name="msapplication-square310x310logo" content="imagens/ms/largetile.png" />
<meta name="msapplication-allowDomainApiCall" content="true" />
<meta name="msapplication-allowDomainMetaTags" content="true" />
<meta name="msapplication-TileImage" content="imagens/ms/tileimage.png" />
<meta name="msapplication-TileColor" content="#<? echo $color; ?>" />
<meta name="msapplication-tooltip" content="Iniciar o RebuApp" />
<meta name="msapplication-starturl" content="http://apps.aloogle.net/web/rebuapp/" />
<meta name="msapplication-navbutton-color" content="#<? echo $color; ?>" />
<? if ($iswp) { $isw8 = ""; } else { $isw8 = "&isw8=true"; } ?>
<meta name="msapplication-notification" content="frequency=60;polling-uri=http://apps.aloogle.net/web/rebuapp/content/notifications/notification1.php<? echo "?sala={$sala}&clube={$clube}&eletiva={$eletiva}&isrespon={$isrespon}{$isw8}"; ?>; polling-uri2=http://apps.aloogle.net/web/rebuapp/content/notifications/notification2.php<? echo "?sala={$sala}&clube={$clube}&eletiva={$eletiva}&isrespon={$isrespon}{$isw8}"; ?>; polling-uri3=http://apps.aloogle.net/web/rebuapp/content/notifications/notification3.php<? echo "?sala={$sala}&clube={$clube}&eletiva={$eletiva}{$isw8}"; ?>; polling-uri4=http://apps.aloogle.net/web/rebuapp/content/notifications/notification4.php<? echo "?sala={$sala}&clube={$clube}&eletiva={$eletiva}{$isw8}"; ?>" />
<? } ?>
<? if ($iswindows && $isie) { ?>

<meta name="msapplication-task" 
      content="name=Clube;
      action-uri=clube.php;
      icon-uri=imagens/material/ic_clube.ico" />
<meta name="msapplication-task" 
      content="name=Eletiva;
      action-uri=eletiva.php;
      icon-uri=imagens/material/ic_eletiva.ico" />
<meta name="msapplication-task" 
      content="name=Comunicados;
      action-uri=comunicados.php;
      icon-uri=imagens/material/ic_comunicados.ico" />
<meta name="msapplication-task" 
      content="name=Anotações;
      action-uri=anotacoes.php;
      icon-uri=imagens/material/ic_anotacoes.ico" />
<meta name="msapplication-task" 
      content="name=Biblioteca;
      action-uri=biblioteca.php;
      icon-uri=imagens/material/ic_biblioteca.ico" />

<script type='text/javascript'>
window.onload = function() {   
try {
        if (window.external.msIsSiteMode()) {
	window.external.msSiteModeClearJumpList();
    window.external.msSiteModeCreateJumpList("Últimas notificações");
	<?
if($_COOKIE['responsavel'] == "true") { $isrespon = "responsaveis"; } else { $isrespon = ""; }

$result = mysqli_query($dbi, "SELECT * FROM notificacoes WHERE para IN ('$sala','$clube','$eletiva','todos','$isrespon') ORDER BY id DESC LIMIT 5");
while ($row = mysqli_fetch_array($result)) {
	$data[] = $row['titulo'];
}
if(count($data) > 0) {
$data = array_reverse($data);

foreach($data as $item){ ?>
	window.external.msSiteModeAddJumpListItem('<? echo $item; ?>', 'notificacoes.php', 'imagens/material/ic_notificacoes.ico');
<? }
}

if(mysqli_num_rows($result) > 0) { ?>
	window.external.msSiteModeShowJumpList();
<? } ?>
		}
}
    catch (ex) {
    }
}
</script>
<? } ?>

<style>
core-toolbar {
	background: #<? echo $color; ?>;
	color: white;
}

paper-fab {
    color: #fff;
	background: #<? echo $color; ?>;
}
</style>
