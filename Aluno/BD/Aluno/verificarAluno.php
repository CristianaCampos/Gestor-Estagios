<?php
session_start();

$aluno = $_SESSION["nome"];

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

$sqlIdAluno = "SELECT id FROM alunos WHERE codigoAluno='$aluno'";
$resultIdAluno = mysqli_query($conn, $sqlIdAluno);

if ($resultIdAluno) {
    if ($row = mysqli_fetch_assoc($resultIdAluno)) {
        $idAluno = $row['id'];

        $sql = "SELECT * FROM dados WHERE idAluno=" . $idAluno;
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo true;
        }
        else{
            echo false;
        }
    }
}



mysqli_close($conn);
