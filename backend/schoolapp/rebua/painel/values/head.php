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
// Última modificação em: 03/04/2015 14:15

$isios = (strpos($_SERVER['HTTP_USER_AGENT'],'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'],'iPad') || strpos($_SERVER['HTTP_USER_AGENT'],'iPod')) && !(strpos($_SERVER['HTTP_USER_AGENT'],'like iPhone') || strpos($_SERVER['HTTP_USER_AGENT'],'like iPad') || strpos($_SERVER['HTTP_USER_AGENT'],'like iPod'));
$isie = strpos($_SERVER['HTTP_USER_AGENT'],'Trident');
$iswindows = strpos($_SERVER['HTTP_USER_AGENT'],'Windows NT');
$iswp = strpos($_SERVER['HTTP_USER_AGENT'],'Windows Phone');
$descriptiontag = "Edite as informações do que você administra no RebuApp";

function toTitle($title) {
global $isios;
global $isie;
global $iswindows;
global $iswp;
global $descriptiontag;
?>
<title><? echo $title ?> - Painel RebuApp</title>
<link rel="shorcut icon" href="http://apps.aloogle.net/web/rebuapp/imagens/favicon.png" />
<link rel="author" href="https://plus.google.com/101361157875821775334" />
<link rel="me" href="https://plus.google.com/101361157875821775334" />
<? include("http://apps.aloogle.net/schoolapp/rebua/painel/values/jquery.php") ?>
<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/ripples.min.css" rel="stylesheet">
<link rel="stylesheet" href="/styles/card.css" />
<link rel="canonical" href="http://apps.aloogle.net/schoolapp/rebua/painel" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="language" content="pt-br" />
<meta http-equiv="Content-Language" content="pt-br" />
<meta name="title" content="Painel RebuApp" />
<meta name="description" content="<? echo $descriptiontag; ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<meta name="keywords" content="school, escola, webapp, aplicativo, aplicativo de escola, rebua, willian rodrigues rebua" />
<meta name="author" content="Alefe Souza" />

<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@alefesouza5">
<meta name="twitter:title" content="Painel RebuApp">
<meta name="twitter:description" content="<? echo $descriptiontag; ?>">
<meta name="twitter:creator" content="@alefesouza5">
<meta name="twitter:image" content="http://apps.aloogle.net/web/rebuapp/imagens/metatags/twitter.png">
<meta name="twitter:app:name:googleplay" content="RebuApp" />
<meta name="twitter:app:id:googleplay" content="aloogle.rebuapp" />

<meta property="og:title" content="Painel RebuApp" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://apps.aloogle.net/schoolapp/rebua/painel" />
<meta property="og:image" content="http://apps.aloogle.net/schoolapp/rebua/painel" />
<meta property="og:description" content="<? echo $descriptiontag; ?>" /> 
<meta property="og:site_name" content="Painel RebuApp" />
<meta property="fb:admins" content="100000073302574" />

<meta name="application-name" content="Painel RebuApp" />
<meta name="mobile-web-app-capable" content="yes" />
<meta name="theme-color" content="#005400" />

<link rel="icon" sizes="128x128" href="/web/rebuapp/imagens/android/icon-128x-128.png" />
<link rel="icon" sizes="192×192" href="/web/rebuapp/imagens/android/icon-192x-192.png" />
<link rel="icon" sizes="228x228" href="/web/rebuapp/imagens/android/icon-228x-228.png" />
<link rel="icon" sizes="512x512" href="/web/rebuapp/imagens/android/icon-512x-512.png" />
<? if ($isios) { ?>

<meta name="apple-mobile-web-app-title" content="Painel RebuApp" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="default" />
<link rel="apple-touch-icon-precomposed" href="/web/rebuapp/imagens/apple/icon-60x-60-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="/web/rebuapp/imagens/apple/icon-76x-76-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/web/rebuapp/imagens/apple/icon-120x-120-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/web/rebuapp/imagens/apple/icon-152x-152-precomposed.png" />

    <!-- iOS 6 & 7 iPad (retina, portrait) -->
    <link rel="apple-touch-startup-image" href="/web/rebuapp/imagens/apple/apple-touch-startup-image-1536x2008.png"
         media="(device-width: 768px) and (device-height: 1024px)
            and (orientation: portrait)
            and (-webkit-device-pixel-ratio: 2)" />

    <!-- iOS 6 & 7 iPad (retina, landscape) -->
    <link rel="apple-touch-startup-image" href="/web/rebuapp/imagens/apple/apple-touch-startup-image-1496x2048.png"
         media="(device-width: 768px) and (device-height: 1024px)
            and (orientation: landscape)
            and (-webkit-device-pixel-ratio: 2)" />

    <!-- iOS 6 iPad (portrait) -->
    <link rel="apple-touch-startup-image" href="/web/rebuapp/imagens/apple/apple-touch-startup-image-768x1004.png"
         media="(device-width: 768px) and (device-height: 1024px)
            and (orientation: portrait)
            and (-webkit-device-pixel-ratio: 1)" />

    <!-- iOS 6 iPad (landscape) -->
    <link rel="apple-touch-startup-image" href="/web/rebuapp/imagens/apple/apple-touch-startup-image-748x1024.png"
         media="(device-width: 768px) and (device-height: 1024px)
            and (orientation: landscape)
            and (-webkit-device-pixel-ratio: 1)" />

    <!-- iOS 6 & 7 iPhone 5 -->
    <link rel="apple-touch-startup-image" href="/web/rebuapp/imagens/apple/apple-touch-startup-image-640x1096.png"
         media="(device-width: 320px) and (device-height: 568px)
            and (-webkit-device-pixel-ratio: 2)" />

    <!-- iOS 6 & 7 iPhone (retina) -->
    <link rel="apple-touch-startup-image" href="/web/rebuapp/imagens/apple/apple-touch-startup-image-640x920.png"
         media="(device-width: 320px) and (device-height: 480px)
            and (-webkit-device-pixel-ratio: 2)" />

    <!-- iOS 6 iPhone -->
    <link rel="apple-touch-startup-image" href="/web/rebuapp/imagens/apple/apple-touch-startup-image-320x460.png"
         media="(device-width: 320px) and (device-height: 480px)
            and (-webkit-device-pixel-ratio: 1)" />
<? }
if (($iswindows && $isie) || $iswp) { ?>

<meta name="msapplication-square70x70logo" content="/web/rebuapp/imagens/ms/smalltile.png" />
<meta name="msapplication-square150x150logo" content="/web/rebuapp/imagens/ms/mediumtile.png" />
<meta name="msapplication-wide310x150logo" content="/web/rebuapp/imagens/ms/widetile.png" />
<meta name="msapplication-square310x310logo" content="/web/rebuapp/imagens/ms/largetile.png" />
<meta name="msapplication-allowDomainApiCall" content="true" />
<meta name="msapplication-allowDomainMetaTags" content="true" />
<meta name="msapplication-TileImage" content="/web/rebuapp/imagens/ms/tileimage.png" />
<meta name="msapplication-TileColor" content="#005400" />
<meta name="msapplication-tooltip" content="Iniciar o Painel do RebuApp" />
<meta name="msapplication-starturl" content="http://apps.aloogle.net/schoolapp/rebua/painel" />
<meta name="msapplication-navbutton-color" content="#005400" />
<? } ?>
<style>
.card {
	width: 99%;
}
</style>
<? }

function toTitle2($title) { ?>
<section class="margin card center" style="padding: 0; margin-top: 0;"><span style="line-height: 50px;"><? echo $title; ?></span><div class="backbutton" onclick="window.open('index.php', '_self');">Voltar</div></section>
<? }

function configHeader($title) {
global $isios;
global $isie;
global $iswindows;
global $iswp;
global $descriptiontag; ?>

<link rel="shorcut icon" href="http://apps.aloogle.net/web/rebuapp/imagens/favicon.png" />
<link rel="author" href="https://plus.google.com/101361157875821775334" />
<link rel="stylesheet" href="/styles/card.css" />
<link rel="canonical" href="http://apps.aloogle.net/schoolapp/rebua/painel" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="language" content="pt-br" />
<meta http-equiv="Content-Language" content="pt-br" />
<meta name="title" content="Painel RebuApp" />
<meta name="description" content="<? echo $descriptiontag; ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<meta name="keywords" content="school, escola, webapp, aplicativo, aplicativo de escola, rebua, willian rodrigues rebua" />
<meta name="author" content="Alefe Souza" />

<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@alefesouza5">
<meta name="twitter:title" content="Painel RebuApp">
<meta name="twitter:description" content="<? echo $descriptiontag; ?>">
<meta name="twitter:creator" content="@alefesouza5">
<meta name="twitter:image" content="http://apps.aloogle.net/web/rebuapp/imagens/metatags/twitter.png">
<meta name="twitter:app:name:googleplay" content="RebuApp" />
<meta name="twitter:app:id:googleplay" content="aloogle.rebuapp" />

<meta property="og:title" content="Painel RebuApp" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://apps.aloogle.net/schoolapp/rebua/painel" />
<meta property="og:image" content="http://apps.aloogle.net/schoolapp/rebua/painel" />
<meta property="og:description" content="<? echo $descriptiontag; ?>" /> 
<meta property="og:site_name" content="Painel RebuApp" />
<meta property="fb:admins" content="100000073302574" />

<meta name="application-name" content="Painel RebuApp" />
<meta name="mobile-web-app-capable" content="yes" />
<meta name="theme-color" content="#005400" />

<link rel="icon" sizes="128x128" href="/web/rebuapp/imagens/android/icon-128x-128.png" />
<link rel="icon" sizes="192×192" href="/web/rebuapp/imagens/android/icon-192x-192.png" />
<link rel="icon" sizes="228x228" href="/web/rebuapp/imagens/android/icon-228x-228.png" />
<link rel="icon" sizes="512x512" href="/web/rebuapp/imagens/android/icon-512x-512.png" />
<? if ($isios) { ?>

<meta name="apple-mobile-web-app-title" content="Painel RebuApp" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="default" />
<link rel="apple-touch-icon-precomposed" href="/web/rebuapp/imagens/apple/icon-60x-60-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="/web/rebuapp/imagens/apple/icon-76x-76-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/web/rebuapp/imagens/apple/icon-120x-120-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/web/rebuapp/imagens/apple/icon-152x-152-precomposed.png" />

    <!-- iOS 6 & 7 iPad (retina, portrait) -->
    <link rel="apple-touch-startup-image" href="/web/rebuapp/imagens/apple/apple-touch-startup-image-1536x2008.png"
         media="(device-width: 768px) and (device-height: 1024px)
            and (orientation: portrait)
            and (-webkit-device-pixel-ratio: 2)" />

    <!-- iOS 6 & 7 iPad (retina, landscape) -->
    <link rel="apple-touch-startup-image" href="/web/rebuapp/imagens/apple/apple-touch-startup-image-1496x2048.png"
         media="(device-width: 768px) and (device-height: 1024px)
            and (orientation: landscape)
            and (-webkit-device-pixel-ratio: 2)" />

    <!-- iOS 6 iPad (portrait) -->
    <link rel="apple-touch-startup-image" href="/web/rebuapp/imagens/apple/apple-touch-startup-image-768x1004.png"
         media="(device-width: 768px) and (device-height: 1024px)
            and (orientation: portrait)
            and (-webkit-device-pixel-ratio: 1)" />

    <!-- iOS 6 iPad (landscape) -->
    <link rel="apple-touch-startup-image" href="/web/rebuapp/imagens/apple/apple-touch-startup-image-748x1024.png"
         media="(device-width: 768px) and (device-height: 1024px)
            and (orientation: landscape)
            and (-webkit-device-pixel-ratio: 1)" />

    <!-- iOS 6 & 7 iPhone 5 -->
    <link rel="apple-touch-startup-image" href="/web/rebuapp/imagens/apple/apple-touch-startup-image-640x1096.png"
         media="(device-width: 320px) and (device-height: 568px)
            and (-webkit-device-pixel-ratio: 2)" />

    <!-- iOS 6 & 7 iPhone (retina) -->
    <link rel="apple-touch-startup-image" href="/web/rebuapp/imagens/apple/apple-touch-startup-image-640x920.png"
         media="(device-width: 320px) and (device-height: 480px)
            and (-webkit-device-pixel-ratio: 2)" />

    <!-- iOS 6 iPhone -->
    <link rel="apple-touch-startup-image" href="/web/rebuapp/imagens/apple/apple-touch-startup-image-320x460.png"
         media="(device-width: 320px) and (device-height: 480px)
            and (-webkit-device-pixel-ratio: 1)" />
<? }
if (($iswindows && $isie) || $iswp) { ?>
<meta name="msapplication-square70x70logo" content="/web/rebuapp/imagens/ms/smalltile.png" />
<meta name="msapplication-square150x150logo" content="/web/rebuapp/imagens/ms/mediumtile.png" />
<meta name="msapplication-wide310x150logo" content="/web/rebuapp/imagens/ms/widetile.png" />
<meta name="msapplication-square310x310logo" content="/web/rebuapp/imagens/ms/largetile.png" />
<meta name="msapplication-allowDomainApiCall" content="true" />
<meta name="msapplication-allowDomainMetaTags" content="true" />
<meta name="msapplication-TileImage" content="/web/rebuapp/imagens/ms/tileimage.png" />
<meta name="msapplication-TileColor" content="#005400" />
<meta name="msapplication-tooltip" content="Iniciar o Painel do RebuApp" />
<meta name="msapplication-starturl" content="http://apps.aloogle.net/schoolapp/rebua/painel" />
<meta name="msapplication-navbutton-color" content="#005400" />
<? } } ?>