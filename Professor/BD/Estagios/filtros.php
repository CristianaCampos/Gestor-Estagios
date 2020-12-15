<?php

$filtro = $_GET["filtro"];
$valorInput = $_GET["valorInput"];

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

echo '
        <table id="tabela" class="table table-striped">
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Entidade de Estágio</th>
                    <th>Professor Acompanhante</th>
                    <th>Monitor de Estágio</th>
                    <th>Duração do Estágio</th>
                </tr>
            </thead>
            <tbody>';

if ($filtro == "idAluno") {

    //ALUNO
    $sqlAluno = "SELECT id FROM alunos WHERE nome='$valorInput'";
    $resultAluno = mysqli_query($conn, $sqlAluno);
    if ($resultAluno) {
        if ($rowAluno = mysqli_fetch_assoc($resultAluno)) {

            $idAluno = $rowAluno["id"];

            $sql1 = "SELECT * FROM dados WHERE idAluno=" . $idAluno;
            $result1 = mysqli_query($conn, $sql1);
            if ($result1) {
                while ($rowDados = mysqli_fetch_assoc($result1)) {

                    $entidade = getEntidade($rowDados['idEntidadeEstagio'], $conn);
                    $orientador = getOrientador($rowDados['idProfessorOrientador'], $conn);
                    $monitor = getMonitor($rowDados['idMonitor'], $conn);

                    echo '
                        <tr>
                            <td>' . $valorInput . '</td>
                            <td>' . $entidade . '</td>
                            <td>' . $orientador . '</td>
                            <td>' . $monitor . '</td>
                            <td>' . $rowDados['horas'] . '</td>
                            <td><button id="' . $rowDados["id"] . '" class="btn btn-info fas fa-list-alt" data-target="#myModal" data-toggle="modal" onclick="detailsAluno(this.id)"></button> <button id="' . $rowDados["id"] . '" class="btn btn-danger fas fa-trash-alt" data-target="#myModalDelete" data-toggle="modal" onclick="guardarID(this.id)"></button></td>
                        </tr>';
                }
            }
        }
    }
} else if ($filtro == "idEntidadeEstagio") {

    //ENTIDADE
    $sqlEntidade = "SELECT id FROM entidades WHERE nome='$valorInput'";
    $resultEntidade = mysqli_query($conn, $sqlEntidade);
    if ($resultEntidade) {
        if ($rowEntidade = mysqli_fetch_assoc($resultEntidade)) {

            $idEntidadeEstagio = $rowEntidade["id"];

            $sql1 = "SELECT * FROM dados WHERE idEntidadeEstagio=" . $idEntidadeEstagio;
            $result1 = mysqli_query($conn, $sql1);
            if ($result1) {
                while ($rowDados = mysqli_fetch_assoc($result1)) {

                    $nomeAluno = getNomeAluno($rowDados['idAluno'], $conn);
                    $orientador = getOrientador($rowDados['idProfessorOrientador'], $conn);
                    $monitor = getMonitor($rowDados['idMonitor'], $conn);

                    echo '
                        <tr>
                            <td>' . $nomeAluno . '</td>
                            <td>' . $valorInput . '</td>
                            <td>' . $orientador . '</td>
                            <td>' . $monitor . '</td>
                            <td>' . $rowDados['horas'] . '</td>
                            <td><button id="' . $rowDados["id"] . '" class="btn btn-info fas fa-list-alt" data-target="#myModal" data-toggle="modal" onclick="detailsAluno(this.id)"></button> <button id="' . $rowDados["id"] . '" class="btn btn-danger fas fa-trash-alt" data-target="#myModalDelete" data-toggle="modal" onclick="guardarID(this.id)"></button></td>
                        </tr>';
                }
            }
        }
    }
} else if ($filtro == "idProfessorOrientador") {

    //PROFESSOR
    $sqlProfessor = "SELECT id FROM professoresorientadores WHERE nome='$valorInput'";
    $resultProfessor = mysqli_query($conn, $sqlProfessor);
    if ($resultProfessor) {
        if ($rowProfessor = mysqli_fetch_assoc($resultProfessor)) {

            $idProfessor = $rowProfessor["id"];

            $sql1 = "SELECT * FROM dados WHERE idProfessorOrientador=" . $idProfessor;
            $result1 = mysqli_query($conn, $sql1);
            if ($result1) {
                while ($rowDados = mysqli_fetch_assoc($result1)) {

                    $nomeAluno = getNomeAluno($rowDados['idAluno'], $conn);
                    $entidade = getEntidade($rowDados['idEntidadeEstagio'], $conn);
                    $monitor = getMonitor($rowDados['idMonitor'], $conn);

                    echo '
                        <tr>
                            <td>' . $nomeAluno . '</td>
                            <td>' . $entidade . '</td>
                            <td>' . $valorInput . '</td>
                            <td>' . $monitor . '</td>
                            <td>' . $rowDados['horas'] . '</td>
                            <td><button id="' . $rowDados["id"] . '" class="btn btn-info fas fa-list-alt" data-target="#myModal" data-toggle="modal" onclick="detailsAluno(this.id)"></button> <button id="' . $rowDados["id"] . '" class="btn btn-danger fas fa-trash-alt" data-target="#myModalDelete" data-toggle="modal" onclick="guardarID(this.id)"></button></td>
                        </tr>';
                }
            }
        }
    }
} else if ($filtro == "idMonitor") {

    //MONITOR
    $sqlMonitor = "SELECT id FROM monitoresestagio WHERE nome='$valorInput'";
    $resultMonitor = mysqli_query($conn, $sqlMonitor);
    if ($resultMonitor) {
        if ($rowMonitor = mysqli_fetch_assoc($resultMonitor)) {

            $idMonitor = $rowMonitor["id"];

            $sql1 = "SELECT * FROM dados WHERE idMonitor=" . $idMonitor;
            $result1 = mysqli_query($conn, $sql1);
            if ($result1) {
                while ($rowDados = mysqli_fetch_assoc($result1)) {

                    $nomeAluno = getNomeAluno($rowDados['idAluno'], $conn);
                    $entidade = getEntidade($rowDados['idEntidadeEstagio'], $conn);
                    $orientador = getOrientador($rowDados['idProfessorOrientador'], $conn);

                    echo '
                        <tr>
                            <td>' . $nomeAluno . '</td>
                            <td>' . $entidade . '</td>
                            <td>' . $orientador . '</td>
                            <td>' . $valorInput . '</td>
                            <td>' . $rowDados['horas'] . '</td>
                            <td><button id="' . $rowDados["id"] . '" class="btn btn-info fas fa-list-alt" data-target="#myModal" data-toggle="modal" onclick="detailsAluno(this.id)"></button> <button id="' . $rowDados["id"] . '" class="btn btn-danger fas fa-trash-alt" data-target="#myModalDelete" data-toggle="modal" onclick="guardarID(this.id)"></button></td>
                        </tr>';
                }
            }
        }
    }
} else {
    $sql = "SELECT * FROM dados WHERE $filtro = $valorInput";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {

            $nomeAluno = getNomeAluno($row['idAluno'], $conn);
            $entidade = getEntidade($row['idEntidadeEstagio'], $conn);
            $orientador = getOrientador($row['idProfessorOrientador'], $conn);
            $monitor = getMonitor($row['idMonitor'], $conn);

            echo '
                <tr>
                    <td>' . $nomeAluno . '</td>
                    <td>' . $entidade . '</td>
                    <td>' . $orientador . '</td>
                    <td>' . $monitor . '</td>
                    <td>' . $row['horas'] . '</td>
                    <td><button id="' . $row["id"] . '" class="btn btn-info fas fa-list-alt" data-target="#myModal" data-toggle="modal" onclick="detailsNome(this.id)"></button> <button id="' . $row["id"] . '" class="btn btn-danger fas fa-trash-alt" data-target="#myModalDelete" data-toggle="modal" onclick="guardarID(this.id)"></button></td>
                </tr>';
        }
    }
}




echo '</tbody></table>';
mysqli_close($conn);

function getNomeAluno($id, $conn)
{
    //ALUNO
    $sqlNomeAluno = "SELECT nome FROM alunos WHERE id =" . $id;
    $resultNomeAluno = mysqli_query($conn, $sqlNomeAluno);

    if ($resultNomeAluno) {
        if ($rowAluno = mysqli_fetch_assoc($resultNomeAluno)) {
            $alunoName = $rowAluno['nome'];
        }
    }
    return $alunoName;
}

function getEntidade($id, $conn)
{
    //ENTIDADE
    $sqlNomeEntidade = "SELECT nome FROM entidades WHERE id =" . $id;
    $resultEntidade = mysqli_query($conn, $sqlNomeEntidade);

    if ($resultEntidade) {
        if ($rowEntidade = mysqli_fetch_assoc($resultEntidade)) {
            $entidadeName = $rowEntidade['nome'];
        }
    }
    return $entidadeName;
}

function getOrientador($id, $conn)
{
    //ORIENTADOR
    $sqlNomeOrientador = "SELECT nome FROM professoresOrientadores WHERE id =" . $id;
    $resultOrientador = mysqli_query($conn, $sqlNomeOrientador);

    if ($resultOrientador) {
        if ($rowOrientador = mysqli_fetch_assoc($resultOrientador)) {
            $orientadorName = $rowOrientador['nome'];
        }
    }
    return $orientadorName;
}

function getMonitor($id, $conn)
{
    //MONITOR
    $sqlMonitor = "SELECT nome FROM monitoresestagio WHERE id =" . $id;
    $resultMonitor = mysqli_query($conn, $sqlMonitor);

    if ($resultMonitor) {
        if ($rowMonitor = mysqli_fetch_assoc($resultMonitor)) {
            $monitorName = $rowMonitor['nome'];
        }
    }
    return $monitorName;
}
