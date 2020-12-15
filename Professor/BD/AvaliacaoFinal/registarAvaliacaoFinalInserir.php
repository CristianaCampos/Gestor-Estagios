<?php

$aluno = $_POST["aluno"];
$IEE = $_POST["IEE"];
$AC = $_POST["AC"];
$ANC = $_POST["ANC"];
$ITR = $_POST["ITR"];
$RET = $_POST["RET"];
$QTR = $_POST["QTR"];
$SR = $_POST["SR"];
$AEF = $_POST["AEF"];
$FANT = $_POST["FANT"];
$RCH = $_POST["RCH"];
$RCO = $_POST["RCO"];
$RCL = $_POST["RCL"];
$AP = $_POST["AP"];
$CI = $_POST["CI"];
$OT = $_POST["OT"];
$ANSHT = $_POST["ANSHT"];
$CF = $_POST["CF"];
$observacoes = $_POST["observacoes"];

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

$sqlIdAluno = "SELECT id FROM alunos WHERE nome = '$aluno'";
$resultIdAluno = mysqli_query($conn, $sqlIdAluno);

if ($resultIdAluno)
{
    if ($rowIdAluno = mysqli_fetch_assoc($resultIdAluno))
    {
        $idAluno = $rowIdAluno["id"];
        $sql = "INSERT INTO avaliacaoFinal(idAluno, IEE, AC, ANC, ITR, RET, QTR, SR, AEF, FANT, RCH, RCO, RCL, AP, CI, OT, ANSHT, CF, observacoes) VALUES ($idAluno, $IEE, $AC, $ANC, $ITR, $RET, $QTR, $SR, $AEF, $FANT, $RCH, $RCO, $RCL, $AP, $CI, $OT, $ANSHT, $CF, '$observacoes')";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../../HTML/mostrarAvaliacaoFinalRegistados.php");
        }
        else {
            header("Location: ../../../ErrorPages/Error.html");
        }
    }
}
else {
    header("Location: ../../../ErrorPages/Error.html");
}

mysqli_close($conn);
?>
?>