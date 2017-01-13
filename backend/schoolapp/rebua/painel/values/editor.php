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
// Última modificação em: 07/04/2015 16:22

if (strpos($_SERVER['HTTP_USER_AGENT'],'Android') || strpos($_SERVER['HTTP_USER_AGENT'],'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'],'iPad') || strpos($_SERVER['HTTP_USER_AGENT'],'Windows Phone')) { ?>
<script src="//cdn.ckeditor.com/4.4.5/standard/ckeditor.js"></script>
<? } else { ?>
<script src="/libs/js/ckeditor/ckeditor.js"></script>
<? } ?>

<script>
CKEDITOR.env.isCompatible = true;

CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName == 'table') {
        var info = dialogDefinition.getContents( 'info' );

        info.get('txtWidth')['default'] = '100%';
        info.get('txtBorder')['default'] = '1';
    }
});

CKEDITOR.replace('editor1');
</script>