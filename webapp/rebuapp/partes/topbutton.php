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
// Última modificação em: 18/02/2015 21:47
?>
<script>
	if(window.innerWidth > 600) {
		document.write("<core-tooltip label=\"Voltar ao topo\" position=\"top\" class=\"fancy fabtooltip\"><paper-fab icon=\"hardware:keyboard-arrow-up\" id=\"topbutton\"></paper-fab></core-tooltip>");
	} else {
		document.write("<paper-fab icon=\"hardware:keyboard-arrow-up\" class=\"fabtooltip\" id=\"topbutton\"></paper-fab>");	
	}
</script>