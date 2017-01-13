RebuApp
=====

Nesse reposit�rio h� o c�digo do back-end do RebuApp, aplicativo que desenvolvi no terceiro ano do ensino m�dio, visando ajudar os alunos com hor�rios e agenda de cada sala da escola.

Recomendo tamb�m ler o README.md da vers�o anterior, para isso, [clique aqui](https://github.com/alefesouza/schoolapp-backend/tree/58ed254646a9e358cb63562a8a452dd763c5b17b).

A vers�o 1.x do aplicativo para Android s� exibia p�ginas web, j� a partir da vers�o 2 do mesmo ele j� eu um aplicativo mais nativo, recebendo JSON do servidor e tratando na interface do Android, foi praticamente meu primeiro projeto desse tipo, quando tinha acabado de fazer 18 anos.

Como recebia muitas reclama��es de quem usava iOS e Windows Phone por o aplicativo s� ter suporte para Android, fiz tamb�m [uma vers�o web](http://apps.aloogle.net/web/rebuapp) id�ntica ao aplicativo para Android, utilizando o Material Design do Polymer que ainda estava em beta, voc� pode checar o c�digo na pasta webapp. Fiz dele um verdadeiro aplicativo web tentando integrar o m�ximo poss�vel que cada sistema permitia, por exemplo caso fixe uma tile dele no Windows, a tile exibir� os �ltimos eventos e notifica��es, voc� pode ver todas as integra��es [clicando aqui](http://apps.aloogle.net/web/rebuapp/facilidades.php).

Tamb�m desenvolvi uma extens�o para Google Chrome para o RebuApp, para visitar o reposit�rio dela, [clique aqui](https://github.com/alefesouza/schoolapp-chrome).

Leve em considera��o que por ser um c�digo de quando comecei a desenvolver em PHP voc� ver� muitas m�s-pr�ticas, na �poca eu nem sabia o que era isso, lembro at� que coloquei um if($string == $valor_da_coluna) porque n�o sabia do WHERE do SQL huehaheu, e tamb�m usava $_GET[""] pra tudo, usar v�rios if($string == "") {} else if ($string == "") {} ao inv�s de switch, escrever o JSON ao inv�s de usar json_encode(array("key" => "value")) e muitas outras coisas de iniciante, portanto n�o pense que hoje em dia eu continuo cometendo esse erros, s� olhar o [back-end do meu projeto pessoal mais recente](https://github.com/alefesouza/gdg-sp/tree/master/Back-end).

Na pasta SQL tem um backup do banco de dados utilizado na aplica��o.


Licen�a
-----

    Copyright (C) 2015 Alefe Souza <contato@alefesouza.com>

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
