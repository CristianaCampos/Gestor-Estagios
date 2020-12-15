<?php

$nome = $_GET["nome"];
$email = $_GET["email"];
$contacto = $_GET["contacto"];
$curso = $_GET["curso"];

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

$sqlIdCurso = "SELECT id FROM cursos WHERE nome = '" . $curso . "'";
$resultIdCurso = mysqli_query($conn, $sqlIdCurso);

if ($resultIdCurso) {
    if ($rowIdCurso = mysqli_fetch_assoc($resultIdCurso)) {
        $idCurso = $rowIdCurso["id"];

        $sql = "INSERT INTO professoresOrientadores(nome, email, telefone, idCurso) VALUES ('$nome', '$email', $contacto, $idCurso)";
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