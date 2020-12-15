<?php

$turma = $_GET["turma"];

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

$sqlIdTurma = "SELECT id FROM turmas WHERE nome = '$turma'";
$resultIdTurma = mysqli_query($conn, $sqlIdTurma);

if ($resultIdTurma) {
    if ($rowIdTurma = mysqli_fetch_assoc($resultIdTurma)) {
        $turma = $rowIdTurma["id"];

        $sqlAluno = "SELECT id FROM alunos WHERE idTurma= $turma";
        $resultAluno = mysqli_query($conn, $sqlAluno);
        if ($resultAluno) {
            while ($rowAluno = mysqli_fetch_assoc($resultAluno)) {
                $alunoId = $rowAluno["id"];

                $sqlEstagio = "SELECT id FROM dados WHERE idAluno = $alunoId";
                $resultEstagio = mysqli_query($conn, $sqlEstagio);
                if (mysqli_num_rows($resultEstagio) > 0) {   
                    $sql = "SELECT nome FROM alunos WHERE id= $alunoId";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $aluno = $row["nome"];
                            echo '<option>' . $aluno . '</option>';
                        }
                    } else {
                        header("Location: ../../../ErrorPages/Error.html");
                    }
                }
            }
        }
    }
} else {
    header("Location: ../../../ErrorPages/Error.html");
}

mysqli_close($conn);
