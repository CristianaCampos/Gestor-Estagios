<?php

session_start();

$utilizador = $_POST["utilizador"];
$email = $_POST["email"];
$passwordUser = $_POST["pass2"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "capaEstagiodb";
$port = "3306";

// Efetua a ligação
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

// Verifica a ligação
if (!$conn) {
	die("Ligação falhou: " . mysqli_connect_error());
}

$sql2 = "SELECT utilizador FROM users WHERE email='" . $email . "'";
$result = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result) == 0) {
	$sql = "INSERT INTO users(utilizador, email, pass) VALUES ('" . $utilizador . "', '" . $email . "', '" . $passwordUser . "')";
	$result1 = mysqli_query($conn, $sql);

	if (substr($utilizador, 0, 1) == "F" || substr($utilizador, 0, 1) == "f") {
		header("Location: ../../Professor/HTML/Estagios/mostrarEstagiosRegistados.php");
	} else {
		header("Location: ../../Aluno/HTML/homeAluno.php");
	}
} else {
	header("Location: erro.html");
}

mysqli_close($conn);
