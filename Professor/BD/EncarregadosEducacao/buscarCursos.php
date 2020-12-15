<?php

$anoLetivo = $_GET["ano"];

$curso = "";

$cursosInseridos = array("w");

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

$sqlCurso = "SELECT idCurso FROM turmas WHERE anoLetivo = '$anoLetivo'";
$resultCurso = mysqli_query($conn, $sqlCurso);

if ($resultCurso) {
    while ($rowCurso = mysqli_fetch_assoc($resultCurso)) {
        $sql = "SELECT nome FROM cursos WHERE id = " . $rowCurso['idCurso'];
        $result = mysqli_query($conn, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $curso = $row["nome"];
                if (!(in_array($curso, $cursosInseridos))) {
                    echo '<option>' . $curso . '</option>';
                    array_push($cursosInseridos, $curso);
                }
            }
        }
    }
}

mysqli_close($conn);
