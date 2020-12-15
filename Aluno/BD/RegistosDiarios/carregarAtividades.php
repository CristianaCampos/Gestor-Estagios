<?php

session_start();

$diaSelecionado = $_GET['diaSelecionado'];
$mes = $_GET['mes']+1;
$ano = $_GET['ano'];
$aluno = $_SESSION['nome'];

$data = $diaSelecionado . "/0" . $mes . "/" . $ano;

if ($mes > 9) {
    $data = $diaSelecionado . "/" . $mes . "/" . $ano;
}

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

$sql = "SELECT * FROM registosdiarios WHERE idAluno=$idAluno AND dia='$data'";
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row2 = mysqli_fetch_assoc($result)) {
        echo "<hr>" . $row2['atividade']  . " <div class='float-right'><a href=''><img id='" . $row2['id'] . "' onclick='eliminarAtividade(this.id)' src='../../Imagens/eliminarAtividade.png' class='thumbnail2' width='20px'></a></div>";
    }
}
mysqli_close($conn);
