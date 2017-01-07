RebuApp
=====

Nesse repositório há o código do back-end do RebuApp, aplicativo para Android que desenvolvi no terceiro ano do ensino médio, visando ajudar os alunos com o  horários e agenda de cada sala da escola.

Esse foi meu primeiro projeto de back-end, quando eu tinha 17 anos e estava fazendo um curso de PHP, antes disso eu usava páginas HTML do Tumblr para funcionamento do aplicativo e fazia tudo manualmente, com os representantes de sala me enviando o que deveria ser adicionado na agenda e eu editava a página do Tumblr diretamente, com os conhecimentos que fui adquirindo de PHP com MySQL eu fiz tudo funcionar automaticamente, com cada representante possuindo um login e senha e podendo adicionar eventos diretamente na sala dele, você pode ver esse código mais antigo na pasta tumblr.

Leve em consideração que por ser um código de quando comecei a desenvolver em PHP você vai ver muitas más-práticas (na época eu nem sabia o que era isso, lembro até que coloquei um if($string == $valor_da_coluna) porque não sabia do WHERE do SQL huehaheu, e também usava $_GET[""] pra tudo, e muitas outras coisas de iniciante).

Eu consegui recentemente acesso a minha antiga conta do Byethost (onde eu hospedava PHP e MySQL gratuitamente antes de passar a pagar por uma hospedagem melhor, em outubro de 2014) e achei esse meu código inicial, na época eu não queria publicar ele, mas agora para mim tanto faz, vou deixar aqui de recordação.

Coloquei em cada arquivo a data da última modificação do mesmo, elas ficaram salvas no servidor e pude ver pelo cliente de FTP, e aparentemente o Byethost na época fazia cada linha pular uma linha de código ao fazer upload, por isso os arquivos estão assim.

Na pasta SQL tem um backup do banco de dados utilizado na aplicação.

Licença
-----

    Copyright (C) 2014 Alefe Souza <contato@alefesouza.com>

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
