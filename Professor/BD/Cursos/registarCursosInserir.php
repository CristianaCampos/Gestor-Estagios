<?php

$nome = $_GET["nome"];

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

$sql = "INSERT INTO cursos(nome) VALUES ('$nome')";
if (mysqli_query($conn, $sql)) {
    echo true;
} else {
   echo false;
}

mysqli_close($conn);
?>