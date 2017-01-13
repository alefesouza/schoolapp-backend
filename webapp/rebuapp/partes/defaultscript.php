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
// Última modificação em: 05/04/2015 16:33
?>
var navicon = document.getElementById('navicon');
var drawerPanel = document.getElementById('drawerPanel');
navicon.addEventListener('click', function() {
	drawerPanel.togglePanel();
});

var ids = ["sala", "clube", "eletiva", "comunicados", "notificacoes", "biblioteca", "cantina", "anotacoes", "dicionario", "cartazes", "facilidades", "configuracoes", "sobre"];
for(var i = 0; i < ids.length; i++) {
	$('#' + ids[i]).one("click", function() {
		window.open(this.id + '.php', '_self');
	});
}
