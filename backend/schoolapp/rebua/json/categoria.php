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
// Última modificação em: 28/03/2014 19:08

if($row['categoria'] == "arte") { echo json_encode("Arte"); }
else if($row['categoria'] == "atualidades") { echo json_encode("Atualidades"); }
else if($row['categoria'] == "biologia") { echo json_encode("Biologia"); }
else if($row['categoria'] == "dvd") { echo json_encode("DVD"); }
else if($row['categoria'] == "educacaofisica") { echo json_encode("Educaçãoo Física"); }
else if($row['categoria'] == "educacao") { echo json_encode("Educação"); }
else if($row['categoria'] == "ficcao") { echo json_encode("Ficção"); }
else if($row['categoria'] == "filosofia") { echo json_encode("Filosofia"); }
else if($row['categoria'] == "fisica") { echo json_encode("Física"); }
else if($row['categoria'] == "geografia") { echo json_encode("Geografia"); }
else if($row['categoria'] == "historia") { echo json_encode("História"); }
else if($row['categoria'] == "historiaemquadrinhos") { echo json_encode("História em quadrinhos"); }
else if($row['categoria'] == "linguainglesa") { echo json_encode("Língua Inglesa"); }
else if($row['categoria'] == "linguaportuguesa") { echo json_encode("Língua Portuguesa"); }
else if($row['categoria'] == "literaturaacervo") { echo json_encode("Literatura Acervo"); }
else if($row['categoria'] == "matematica") { echo json_encode("Matemática"); }
else if($row['categoria'] == "poesia") { echo json_encode("Poesia"); }
else if($row['categoria'] == "romance") { echo json_encode("Romance"); }
else if($row['categoria'] == "sociologia") { echo json_encode("Sociologia"); }
else if($row['categoria'] == "teatro") { echo json_encode("Teatro"); }
?>