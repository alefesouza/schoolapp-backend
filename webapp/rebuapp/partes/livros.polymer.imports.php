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
// Última modificação em: 06/04/2015 18:38
?>
<script src="/libs/polymer/components/webcomponentsjs/webcomponents.js"></script>
<link rel="import" href="/libs/polymer/components/font-roboto/roboto.html">
<link rel="import" href="/libs/polymer/components/core-header-panel/core-header-panel.html">
<link rel="import" href="/libs/polymer/components/core-scroll-header-panel/core-scroll-header-panel.html">
<link rel="import" href="/libs/polymer/components/core-toolbar/core-toolbar.html">
<link rel="import" href="/libs/polymer/components/paper-tabs/paper-tabs.html">
<link rel="import" href="/libs/polymer/components/paper-button/paper-button.html">
<link rel="import" href="/libs/polymer/components/core-icon-button/core-icon-button.html">
<link rel="import" href="/libs/polymer/components/core-icon/core-icon.html">
<link rel="import" href="/libs/polymer/components/core-icons/core-icons.html">
<link rel="import" href="/libs/polymer/components/core-icons/maps-icons.html">
<link rel="import" href="/libs/polymer/components/core-icons/social-icons.html">
<link rel="import" href="/libs/polymer/components/core-icons/hardware-icons.html">
<link rel="import" href="/libs/polymer/components/core-icons/image-icons.html">
<link rel="import" href="/libs/polymer/components/core-drawer-panel/core-drawer-panel.html">
<link rel="import" href="/libs/polymer/components/core-menu/core-menu.html">
<link rel="import" href="/libs/polymer/components/core-item/core-item.html">
<link rel="import" href="/libs/polymer/components/paper-fab/paper-fab.html">
<link rel="import" href="/libs/polymer/components/paper-shadow/paper-shadow.html">
<link rel="import" href="/libs/polymer/components/paper-progress/paper-progress.html">
<link rel="import" href="/libs/polymer/components/paper-input/paper-input.html">
<link rel="import" href="/libs/polymer/components/paper-spinner/paper-spinner.html">
<link rel="import" href="/libs/polymer/components/core-tooltip/core-tooltip.html">
<link rel="import" href="/libs/polymer/components/paper-dialog/paper-action-dialog.html">
<link rel="import" href="/libs/polymer/components/paper-toast/paper-toast.html">

<style shim-shadowdom>
paper-spinner::shadow .circle {
	border-color: #<? echo $color ?>;
}

paper-progress::shadow #activeProgress {
	background-color: #<? echo $color ?>;
}
</style>
