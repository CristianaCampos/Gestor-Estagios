<?php
session_start();

$nome = $_GET["nome"];
$turma = $_GET["turma"];
$codigo = $_GET["codigo"];
$data = $_GET["data"];
$morada = $_GET["morada"];
$localidade = $_GET["localidade"];
$email = $_GET["email"];
$cc = $_GET["cc"];
$contacto = $_GET["contacto"];

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

$sqlTurma = "SELECT id FROM turmas WHERE nome='" . $turma . "'";
$resultTurma = mysqli_query($conn, $sqlTurma);
if ($resultTurma) {
	if ($rowTurma = mysqli_fetch_assoc($resultTurma)) {
		$idTurma = $rowTurma['id'];
	}
	$sql = "INSERT INTO alunos(nome, idTurma, codigoAluno, dataNascimento, morada, localidade, email, cc, telefone) VALUES ('$nome', $idTurma, '$codigo', '$data', '$morada', '$localidade', '$email', '$cc', $contacto)";
	if (mysqli_query($conn, $sql)) {
		echo true;
	} else {
		echo false;
	}
} else {
	echo false;
}

mysqli_close($conn);
?>