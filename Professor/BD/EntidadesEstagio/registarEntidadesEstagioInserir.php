<?php

$nome = $_GET["nome"];
$morada = $_GET["morada"];
$localidade = $_GET["localidade"];
$email = $_GET["email"];
$contacto = $_GET["contacto"];
$nif = $_GET["nif"];

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

$sql = "INSERT INTO entidades(nome, morada, localidade, email, contacto, nif) VALUES ('$nome', '$morada', '$localidade', '$email', $contacto, $nif)";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo true;
} else {
    echo false;
}

mysqli_close($conn);
?>