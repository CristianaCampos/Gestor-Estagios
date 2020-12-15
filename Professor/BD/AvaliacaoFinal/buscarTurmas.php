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

$sqlIdCurso = "SELECT id FROM cursos WHERE nome = '$curso'";
$resultIdCurso = mysqli_query($conn, $sqlIdCurso);

if ($resultIdCurso) {
    if ($rowIdCurso = mysqli_fetch_assoc($resultIdCurso)) {
        $curso = $rowIdCurso["id"];

        $sql = "SELECT nome FROM turmas WHERE idCurso=$curso";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $turma = $row["nome"];
                echo '<option>' . $turma . '</option>';
            }
        } else {
            header("Location: ../../../ErrorPages/Error.html");
        }
    }
} else {
    header("Location: ../../../ErrorPages/Error.html");
}



mysqli_close($conn);
