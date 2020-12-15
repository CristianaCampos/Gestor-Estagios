<?php
session_start();

$aluno = $_SESSION['nome'];
$dia = $_GET['dia'];
$mes = $_GET['mes'] + 1;
$ano = $_GET['ano'];

$data = $dia . "-" . $mes . "/" . $ano;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "capaEstagioDB";
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
    }
}

$sql = "SELECT horas FROM registosdiarios WHERE idAluno=" . $idAluno . " AND dia='" . $data . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)) {
    if ($row = mysqli_fetch_assoc($result)) {
        $horas = $row['horas'];
    }
    echo true . $horas;
} else {
    echo false;
}

mysqli_close($conn);
