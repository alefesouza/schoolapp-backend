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
// Última modificação em: 05/04/2015 17:07
?>
<script>
document.addEventListener('polymer-ready', function() {
	<? include("partes/defaultscript.php");
	parte2DaNotificacao(); ?>
<? if(!isset($_COOKIE['avisolivros'])) { ?>
if(getCookie("avisolivros") != "true") {
	document.getElementById('avisolivros').toggle();
}
<? } ?>
});

$(function() {
$topbutton=$("#topbutton");
$topbutton.click(function() {document.querySelector('#main').scroller.scrollTop = 0;});
document.getElementById('main').onscroll = function() { if(document.querySelector('#main').scroller.scrollTop<=0){$topbutton.fadeOut("fast")}else{$topbutton.fadeIn("fast")} };

$('.load_more').click(function() {
var last_id_id = $(this).attr("id");
if(last_id_id!='end'){

$.ajax({
	type: "POST",
	url: "ajax_more.php",
	data: {"lastid" : last_id_id, "categoria" : "<? echo $_GET['categoria'] ?>" }, 
	beforeSend: function() {
		$("#loadtext").hide();
		$('#load').show();
	},
	success: function(html){
		$("#load").hide();
		$('#loadtext').show();
		$("div#conteudo").append(html);
	}
});
	$(this).attr("id",parseInt($(this).attr("id")) - 15);
}
	return false;
});

$('#guiaalfabetica').one("click", function() {
$.ajax({
	type: "POST",
	url: "ajax_more.php",
	data: {"alfabetica" : "alfabetica", "categoria" : "<? echo $_GET['categoria'] ?>" }, 
	beforeSend: function() {
		$("#loadalfabetica").show();
	},
	success: function(html){
		$("#loadalfabetica").hide();
		$("#alfabetica").append(html);
	}
});
});

$('#guiarecentes').click(function() {
	$("#conteudo").show();
	$("#loadalfabetica").hide();
	$(".load_more").show();
	$('#alfabetica').hide();
	if($('#nomore') != null) {
		$('#nomore').show();
	}
});

$('#guiaalfabetica').click(function() {
		$("#conteudo").hide();
		$(".load_more").hide();
		$('#alfabetica').show();
		if($('#nomore') != null) {
			$('#nomore').hide();
		}
});
});
</script>