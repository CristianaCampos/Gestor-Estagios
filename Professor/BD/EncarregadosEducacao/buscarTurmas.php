<?php

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

$sqlIdCurso = "SELECT id FROM cursos WHERE nome='$curso'";
$resultdCurso = mysqli_query($conn, $sqlIdCurso);

if ($resultdCurso) {
    if ($rowIdCurso = mysqli_fetch_assoc($resultdCurso)) {
        $idCurso = $rowIdCurso["id"];

        $sql = "SELECT nome FROM turmas WHERE idCurso = $idCurso";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option>' . $row['nome'] . '</option>';
            }
        } else {
            header("Location: ../../../ErrorPages/Error.html");
        }
    }
} else {
    header("Location: ../../../ErrorPages/Error.html");
}

mysqli_close($conn);
