<?php
/*
 * Copyright (C) 2014 Alefe Souza <contato@alefesouza.com>
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
// Última modificação em: 13/09/2014 17:05

include("../../default.php");

?>

<html>

<link rel="author" href="https://plus.google.com/101361157875821775334" />

<link rel="me" href="https://plus.google.com/101361157875821775334" />

<link rel="stylesheet" href="/styles/card.css" />

<body>

<section class="margin card">

<p><h3>Tabelas</h3></p>

<p>Você criar tabelas no seu evento usando:</p>


<p>&lt;table align="left OU center OU right (ALINHAR TABELA A ESQUERDA OU CENTRO OU DIREITA)"&gt; <font class="explicacao"><- abre a tabela</font><br>

&lt;tr&gt; <font class="explicacao"><- cria uma linha</font><br>

&lt;td colspan="NÚMERO DE COLUNAS MESCLADAS NESSA LINHA"&gt;Título (opcional)&lt;/td&gt; <font class="explicacao"><-cria uma cédula mesclada</font><br>

&lt;/tr&gt; <font class="explicacao"><- fecha a linha</font><br>

&lt;tr&gt; <font class="explicacao"><- abre uma nova linha</font><br>

&lt;td&gt;Conteúdo da primeira célula&lt;/td&gt; <font class="explicacao"><- criar uma nova célula</font><br>

&lt;td&gt;Conteúdo da segunda célula&lt;/td&gt; <font class="explicacao"><- cria outra célula</font><br>

&lt;/tr&gt; <font class="explicacao"><- fecha a nova linha</font><br>

&lt;/table&gt; <font class="explicacao"><- fecha a tabela</font><p>


<p><b>Exemplo:</b></p>


<p>&lt;table align="center"&gt;<br>

&lt;tr&gt;<br>

&lt;td colspan="2"&gt;Seminário&lt;/td&gt;<br>

&lt;/tr&gt;<br>

&lt;tr&gt;<br>

&lt;td&gt;Data&lt;/td&gt;<br>

&lt;td&gt;Sobre&lt;/td&gt;<br>

&lt;/tr&gt;<br>

&lt;tr&gt;<br>

&lt;td&gt;00/00/0000&lt;/td&gt;<br>

&lt;td&gt;Primeira apresentação&lt;/td&gt;<br>

&lt;/tr&gt;<br>

&lt;tr&gt;<br>

&lt;td&gt;01/00/0000&lt;/td&gt;<br>

&lt;td&gt;Segunda apresentação&lt;/td&gt;<br>

&lt;/tr&gt;<br>

&lt;tr&gt;<br>

&lt;td&gt;02/00/0000&lt;/td&gt;<br>

&lt;td&gt;Terceira apresentação&lt;/td&gt;<br>

&lt;/tr&gt;<br>

&lt;/table&gt;</p>


<p><b>Resultado:</b></p>


<table align="center">

<tr>

	<td colspan="2">Seminário</td>

</tr>

<tr>

	<td>Data</td>

	<td>Sobre</td>

</tr>

<tr>

	<td>00/00/0000</td>

	<td>Primeira apresentação</td>

</tr>

<tr>

	<td>01/00/0000</td>

	<td>Segunda apresentação</td>

</tr>

<tr>

	<td>02/00/0000</td>

	<td>Terceira apresentação</td>

</tr>

</table>


<p>Você pode adicionar quantas colunas quiser, só colocar mais &lt;td&gt;&lt;/td&gt; antes do &lt;/tr&gt;</p>


<p><b>Exemplo:</b></p>


<p>&lt;table align="center"&gt;<br>

&lt;tr&gt;<br>

&lt;td colspan="5"&gt;Super tabela&lt;/td&gt;<br>

&lt;/tr&gt;<br>

&lt;tr&gt;<br>

&lt;td&gt;1&lt;/td&gt;<br>

&lt;td&gt;2&lt;/td&gt;<br>

&lt;td&gt;3&lt;/td&gt;<br>

&lt;td&gt;4&lt;/td&gt;<br>

&lt;td&gt;5&lt;/td&gt;<br>

&lt;/tr&gt;<br>

&lt;tr&gt;<br>

&lt;td colspan="2"&gt;2 colunas mescladas&lt;/td&gt;<br>

&lt;td colspan="3"&gt;3 colunas mescladas&lt;/td&gt;<br>

&lt;/tr&gt;<br>

&lt;/table&gt;</p>


<p><b>Resultado:</b></p>


<table align="center">

<tr>

	<td colspan="5">Super tabela</td>

</tr>

<tr>

	<td>1</td>

	<td>2</td>

	<td>3</td>

	<td>4</td>

	<td>5</td>

</tr>

<tr>

	<td colspan="2">2 colunas mescladas</td>

	<td colspan="3">3 colunas mescladas</td>

</tr>

</table>

</section>

</body>

</html>