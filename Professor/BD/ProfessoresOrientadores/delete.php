<?php

$id = $_GET["id"];
$erro = false;

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

$sqlDados = "SELECT * FROM dados WHERE idProfessorOrientador = $id";
$resultDados = mysqli_query($conn, $sqlDados);

if (mysqli_num_rows($resultDados) > 0) {
    $erro = true;
}

if ($erro == false) {
    $sql = "DELETE FROM professoresOrientadores WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) { } else {
        header("Location: ../../../ErrorPages/Error.html");
    }
} else if ($erro == true) { 
    echo "erro";
}

mysqli_close($conn);
?>