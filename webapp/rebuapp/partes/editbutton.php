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
// Última modificação em: 06/03/2015 01:05

?>
<core-tooltip label="Painel" position="top" class="fancy fabtooltip" id="painelbutton"><paper-fab icon="create" id="panelbutton" onclick="window.open('http://apps.aloogle.net/web/rebuapp/painel.php');"></paper-fab></core-tooltip>
<script>
$(function() {
$painelbutton=$("#painelbutton");
document.getElementById('main').onscroll = function() { var st = document.querySelector('#main').scroller.scrollTop; if(st > 0) { $painelbutton.fadeOut("fast"); } else { $painelbutton.fadeIn("fast"); } };
});
</script>