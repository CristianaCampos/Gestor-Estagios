<?php
$anoDe = $_GET["anoDe"];
$anoPara = $_GET["anoPara"];
$turmaDe = $_GET["turmaDe"];
$turmaPara = $_GET["turmaPara"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "capaEstagiodb";

// Efetua a ligação
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica a ligação
if (!$conn) {
	die("Ligação falhou: " . mysqli_connect_error());
}

$sqlIdTurma = "SELECT id FROM turmas WHERE anoLetivo = '$anoDe' AND nome = '$turmaDe'";
$resultIdTurma = mysqli_query($conn, $sqlIdTurma);
if ($resultIdTurma) {
	if ($rowIdTurma = mysqli_fetch_assoc($resultIdTurma)) {
		$idTurma = $rowIdTurma["id"];
	}
	$sqlAluno = "SELECT * FROM alunos WHERE idTurma = $idTurma";
	$resultAluno = mysqli_query($conn, $sqlAluno);
	if ($resultAluno) {
		while ($rowAluno = mysqli_fetch_assoc($resultAluno)) {
			$nome = $rowAluno["nome"];
			//$idTurma = $rowAluno["idTurma"];
			$codigoAluno = $rowAluno["codigoAluno"];
			$dataNascimento = $rowAluno["dataNascimento"];
			$morada = $rowAluno["morada"];
			$localidade = $rowAluno["localidade"];
			$email = $rowAluno["email"];
			$cc = $rowAluno["cc"];
			$telefone = $rowAluno["telefone"];

			$sqlTurmaPara = "SELECT id FROM turmas WHERE anoLetivo = '$anoPara' AND nome = '$turmaPara'";
			$resultTurmaPara = mysqli_query($conn, $sqlTurmaPara);
			if ($resultTurmaPara) {
				if ($rowTurmaPara = mysqli_fetch_assoc($resultTurmaPara)) {
					$idTurmaPara = $rowTurmaPara["id"];
				}
			}

			$sqlInserir = "INSERT INTO alunos(nome, idTurma, codigoAluno, dataNascimento, morada, localidade, email, cc, telefone) VALUES ('$nome', $idTurmaPara, '$codigoAluno', '$dataNascimento', '$morada', '$localidade', '$email', '$cc', $telefone)";
			$resultInserir = mysqli_query($conn, $sqlInserir);
			
		}
		if ($resultInserir) {
			echo true;
		} else {
			echo false;
		}
	}
}

mysqli_close($conn);
