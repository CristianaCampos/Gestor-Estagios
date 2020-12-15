<?php
$formando = $_GET['formando'];
$entidade = $_GET['entidadesEstagio'];
$orientador = $_GET['professorOrientador'];
$monitor = $_GET['monitor'];
$duracao = $_GET['duracao'];

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

//aluno
$sqlIdAluno = "SELECT id FROM alunos WHERE nome='" . $formando . "'";
$resultAluno = mysqli_query($conn, $sqlIdAluno);

if ($resultAluno) {
    if ($row = mysqli_fetch_assoc($resultAluno)) {
        $idAluno = $row['id'];

        //entidade
        $sqlIdEntidade = "SELECT id FROM entidades WHERE nome='" . $entidade . "'";
        $resultEntidade = mysqli_query($conn, $sqlIdEntidade);
        if ($resultEntidade) {
            if ($row1 = mysqli_fetch_assoc($resultEntidade)) {
                $idEntidade = $row1['id'];

                //professor orientador
                $sqlIdProfessor = "SELECT id FROM professoresorientadores WHERE nome='$orientador'";
                $resultProfessor = mysqli_query($conn, $sqlIdProfessor);
                if ($resultProfessor) {
                    if ($row2 = mysqli_fetch_assoc($resultProfessor)) {
                        $idProfessor = $row2['id'];

                        //monitor de estagio
                        $sqlIdMonitor = "SELECT id FROM monitoresestagio WHERE nome='$monitor'";
                        $resultMonitor = mysqli_query($conn, $sqlIdMonitor);
                        if ($resultMonitor) {
                            if ($row3 = mysqli_fetch_assoc($resultMonitor)) {
                                $idMonitor = $row3['id'];

                                //inserir
                                $sql = "INSERT INTO dados (idAluno, idEntidadeEstagio, idProfessorOrientador, idMonitor, horas) VALUES ($idAluno, $idEntidade, $idProfessor, $idMonitor, $duracao)";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    echo true;
                                } else {
                                    echo false;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

mysqli_close($conn);
