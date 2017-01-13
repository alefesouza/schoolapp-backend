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
// Última modificação em: 20/05/2015 23:26

if ($info['tipo'] == "admin") { 
	header("location:../admin/index.php");
} else if ($info['tipo'] == "gestao") {
	header("location:../gestao/index.php");
} else if ($info['tipo'] == "representante" || $info['tipo'] == "clubelider" || $info['tipo'] == "eletivaprofessor") {
	header("location:../index.php");
} else if ($info['tipo'] == "bibliotecario") {
	header("location:../biblioteca/index.php");
} else if ($info['tipo'] == "cartazadmin") {
	header("location:../cartaz/index.php");
} else if($info['tipo'] == "cantinaadmin") {
} else {
	header("location:../login.php");
}
?>