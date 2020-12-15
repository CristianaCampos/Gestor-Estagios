<?php
$nome = $_GET["nome"];
$morada = $_GET["morada"];
$localidade = $_GET["localidade"];
$telefone = $_GET["telefone"];
$email = $_GET["email"];
$aluno = $_GET["aluno"];

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

$sqlAluno = "SELECT id FROM alunos WHERE nome='" . $aluno . "'";
$resultAluno = mysqli_query($conn, $sqlAluno);
if ($resultAluno) {
	if ($row = mysqli_fetch_assoc($resultAluno)) {
		$idAluno = $row["id"];
		$sql = "INSERT INTO encarregadosEducacao(nome, morada, localidade, telefone, email, idAluno) VALUES ('$nome', '$morada', '$localidade', $telefone, '$email', $idAluno)";
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
?>