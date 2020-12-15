<?php

session_start();

$aluno = $_SESSION["nome"];

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
$PP = $_POST['PP'];
$PN = $_POST['PN'];
$COF = $_POST['COF'];

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

$sqlIdAluno = "SELECT id FROM alunos WHERE codigoAluno='$aluno'";
$resultIdAluno = mysqli_query($conn, $sqlIdAluno);

if ($resultIdAluno) {
    if ($rowIdAluno = mysqli_fetch_assoc($resultIdAluno)) {
        $idAluno = $rowIdAluno["id"];

        $sqlHasResults = "SELECT * FROM autoavaliacao WHERE idAluno=" . $idAluno;
        $resultHasResults = mysqli_query($conn, $sqlHasResults);
        if (mysqli_num_rows($resultHasResults) > 0) {
            //UPDATE
            $sqlUpdate = "UPDATE autoavaliacao SET IEE=$IEE, AC=$AC, ANC=$ANC, ITR=$ITR, RET=$RET, QTR=$QTR, SR=$SR, AEF=$AEF, FANT=$FANT, RCH=$RCH, RCO=$RCO, RCL=$RCL, AP=$AP, CI=$CI, OT=$OT, ANSHT=$ANSHT, CF=$CF, PP='$PP', PN='$PN', COF='$COF' WHERE idAluno=$idAluno";
            $resultUpdate = mysqli_query($conn, $sqlUpdate);
            if ($resultUpdate) {
                header("Location: ../../HTML/homeAluno.php");
            } else {
                header("Location: ../../../ErrorPages/Error.html");
            }
        } else {
            //INSERT
            $sqlInsert = "INSERT INTO autoavaliacao(idAluno, IEE, AC, ANC, ITR, RET, QTR, SR, AEF, FANT, RCH, RCO, RCL, AP, CI, OT, ANSHT, CF, PP, PN, COF) VALUES (" . $idAluno . ", $IEE, $AC, $ANC, $ITR, $RET, $QTR, $SR, $AEF, $FANT, $RCH, $RCO, $RCL, $AP, $CI, $OT, $ANSHT, $CF, '$PP', '$PN', '$COF')";
            $resultInsert = mysqli_query($conn, $sqlInsert);
            if ($resultInsert) {
                header("Location: ../../HTML/registoDiarioAluno.php");
            } else {
                header("Location: ../../../ErrorPages/Error.html");
            }
        }
    }
} else {
    header("Location: ../../../ErrorPages/Error.html");
}

mysqli_close($conn);
