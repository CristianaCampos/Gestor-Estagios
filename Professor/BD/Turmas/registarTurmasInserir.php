<?php
$turma = $_GET["nome"];
$curso = $_GET["curso"];
$anoLetivo = $_GET["anoLetivo"];

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

$sqlCurso = "SELECT id FROM cursos WHERE nome='" . $curso . "'";
$resultCurso = mysqli_query($conn, $sqlCurso);
if ($resultCurso) {
	if ($row = mysqli_fetch_assoc($resultCurso)) {
		$sql = "INSERT INTO turmas(nome, idCurso, anoLetivo) VALUES ('$turma', " . $row['id'] . ", '$anoLetivo')";
		if (mysqli_query($conn, $sql)) {
			echo true;
		} else {
			echo false;
		}
	}
} else {
	echo false;
}

mysqli_close($conn);
