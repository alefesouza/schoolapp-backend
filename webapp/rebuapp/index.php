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
// Última modificação em: 29/05/2015 09:39

header('Content-Type: text/html; charset=utf-8');
$descriptiontag = "RebuApp é o aplicativo da E. E. Profº Willian Rodrigues Rebuá, com acesso a agenda, horários, biblioteca, notificações e mais.";
?>
<html itemscope itemtype="http://schema.org/Other">
<head>
<title>RebuApp</title>
<link rel="shorcut icon" href="imagens/favicon.png" />
<link rel="canonical" href="http://apps.aloogle.net/web/rebuapp/configuracoes.php" />

<meta itemprop="name" content="RebuApp">
<meta itemprop="description" content="<? echo $descriptiontag; ?>">
<meta itemprop="image" content="http://apps.aloogle.net/web/rebuapp/imagens/metatags/og.png">

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

<? include('partes/jquery.php'); ?>
<script type="text/javascript" src="/libs/jquery/plugins/jquery.cookie.js"></script>
<script>
	var isAndroid = navigator.userAgent.toLowerCase().indexOf("android") > -1;
	var isWP = navigator.userAgent.toLowerCase().indexOf("windows phone") > -1;
	
	if(top!=self) {
	    top.location.replace(window.location.href);
	} else {
		if(isAndroid && !isWP) {
			alert(<? echo json_encode("Olá! Caso não apareça opção de abrir o Play Store, abra o aplicativo do Play Store e pesquise \"RebuApp\""); ?>);
			window.open('http://play.google.com/store/apps/details?id=aloogle.rebuapp', '_self');
		} else {
		if($.cookie('sala') == undefined) {
	    	location.replace('configuracoes.php');
		} else {
	    	location.replace('sala.php');
		}
		}
	}
</script>
<? include("partes/analyticstracking.php") ?>
</head>
</html>