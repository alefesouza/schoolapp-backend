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
// Última modificação em: 28/03/2015 21:17

function getSala($sala) {
	$thesalav = getArray("sala", true);
	$index = array_search($sala, $thesalav);
	if($index !== false) {
		$thesala = getArray("sala", false);
		$salaname = $thesala[$index];
	} else {
		$salaname = "Escolha sua sala";
	}
	return $salaname;
}

function getClube($clube) {
	$theclubev = getArray("clube", true);
	$index = array_search($clube, $theclubev);
	if($index !== false) {
		$theclube = getArray("clube", false);
		$salaname = $theclube[$index];
	} else {
		$salaname = "Escolha seu clube";
	}
	return $salaname;
}

function getEletiva($eletiva) {
	$theeletivav = getArray("eletiva", true);
	$index = array_search($eletiva, $theeletivav);
	if($index !== false) {
		$theeletiva = getArray("eletiva", false);
		$salaname = $theeletiva[$index];
	} else {
		$salaname = "Escolha sua eletiva";
	}
	return $salaname;
}

function getGrupoID($oque) {
	global $dbi;
	$values = mysqli_query($dbi, "SELECT * FROM outros WHERE sala='$oque' AND oque='grupoid'");
	$infovalues = mysqli_fetch_array($values);
	return $infovalues['valor'];
}

function getHorarios($withinterval) {
	if($withinterval == true) {
		$horario[0] = "07:30";
		$horario[1] = "08:20";
		$horario[2] = "09:10";
		$horario[3] = "09:25";
		$horario[4] = "10:15";
		$horario[5] = "11:05";
		$horario[6] = "11:55";
		$horario[7] = "12:55";
		$horario[8] = "13:45";
		$horario[9] = "14:35";
		$horario[10] = "14:50";
		$horario[11] = "15:40";
	} else {
		$horario[0] = "07:30";
		$horario[1] = "08:20";
		$horario[2] = "09:10";
		$horario[3] = "10:15";
		$horario[4] = "11:05";
		$horario[5] = "12:55";
		$horario[6] = "13:45";
		$horario[7] = "14:50";
		$horario[8] = "15:40";
	}
	return $horario;
}

function getArray($oque, $isvalue) {
	if($oque == "sala") {
		if($isvalue == true) {
			$array = array("1a", "1b", "1c", "2a", "2b", "2c", "2d", "3a", "3b", "3c");
		} else {
			$array = array("1ºA", "1ºB", "1ºC", "2ºA", "2ºB", "2ºC", "2ºD", "3ºA", "3ºB", "3ºC");
		}
	} else if($oque == "clube") {
		if($isvalue == true) {
			$array = array("clubeacademia", "clubeartesanatohippie", "clubeboxe", "clubedanca", "clubeestetica", "clubefotografia", "clubefutsal", "clubejornal", "clubemusica", "clubeorganizacaofestas", "clubeorigame", "clubesaber", "clubeteatro", "clubevolei");
		} else {
			$array = array("Acadêmia", "Artesanato Hippie", "Boxe", "Dança", "Estética", "Fotografia", "Futsal", "Jornal", "Música", "Organização de Festas", "Origame", "Saber", "Teatro", "Vôlei");
		}
	} else if($oque == "eletiva") {
		if($isvalue == true) {
			$array = array("eletivacomunicacao", "eletivaengenharia", "eletivafisiologia", "eletivafutsalfeminino", "eletivalegislacao", "eletivamedicina", "eletivaquimica", "eletivateatro");
		} else {
			$array = array("Comunicação", "Engenharia", "Fisiologia", "Futsal Feminino", "Legislação", "Medicina", "Química", "Teatro");
		}
	} else if($oque == "livros") {
		if($isvalue == true) {
			$array = array("arte", "atualidades", "biologia", "dvd", "educacaofisica", "educacao", "filosofia", "ficcao", "fisica", "geografia", "historia", "historiaemquadrinhos", "linguainglesa", "linguaportuguesa", "literaturaacervo", "matematica", "novela", "poesia", "romance", "sociologia", "teatro");
		} else {
			$array = array("Arte", "Atualidades", "Biologia", "DVD", "Educação Física", "Educação", "Filosofia", "Ficção", "Física", "Geografia", "História", "História em quadrinhos", "Língua Inglesa", "Língua Portuguesa", "Literatura Acervo", "Matemática", "Novela", "Poesia", "Romance", "Sociologia", "Teatro");
		}
	}
	return $array;
}
?>