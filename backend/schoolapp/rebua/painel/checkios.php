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
// Última modificação em: 16/03/2015 23:26

?>
<script>
if(window.navigator.standalone) {
	document.cookie='iosstandalone=true; expires=Fri,01 Jan 2016 12:00:00 UTC';
} else {
	document.cookie='iosstandalone=false; expires=Fri,01 Jan 2016 12:00:00 UTC';
}
window.location = "http://apps.aloogle.net<? echo urldecode($_GET['url']); ?>";
</script>