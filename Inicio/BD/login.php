<?php
session_start();

$utilizador = $_GET["utilizador"];
$passwordUser = $_GET["pass"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "capaestagiodb";

//echo $utilizador . " " . $passwordUser;

// Efetua a ligação
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica a ligação
if (!$conn) {
	die("Ligação falhou: " . mysqli_connect_error());
}

$sql = "SELECT pass FROM users WHERE utilizador='" . $utilizador . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	if ($row = mysqli_fetch_assoc($result)) {
		$passwordDB = $row['pass'];

		if ($passwordUser == $passwordDB) {
			$_SESSION["nome"] = $utilizador;

			if (substr($utilizador, 0, 1) == "F" || substr($utilizador, 0, 1) == "f") {
				echo "professor";
			} else {
				echo "aluno";
			}
		} else {
			echo "passwordError";
		}
	}
} else {
	echo "userNameError";
}

mysqli_close($conn);
