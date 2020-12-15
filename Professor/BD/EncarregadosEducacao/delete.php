<?php

$id = $_GET["id"];

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

$sql = "DELETE FROM encarregadosEducacao WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) { } else {
    header("Location: ../../../ErrorPages/Error.html");
}

mysqli_close($conn);
