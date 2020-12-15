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
                    <th>Nome</th>
                    <th>Morada</th>
                    <th>Localidade</th>
                    <th>Contacto</th>
                    <th>Email</th>
                    <th>Aluno</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>';


if ($filtro == "idAluno") {

    $sql3 = "SELECT id FROM alunos WHERE nome='$valorInput'";
    $result3 = mysqli_query($conn, $sql3);
    if ($result3) {
        if ($row3 = mysqli_fetch_assoc($result3)) {
            $sql1 = "SELECT * FROM encarregadosEducacao WHERE idAluno=" . $row3['id'];
            $result1 = mysqli_query($conn, $sql1);
            if ($result1) {
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    echo '
                        <tr>
                            <td>' . $row1["nome"] . '</td>
                            <td>' . $row1["morada"] . '</td>
                            <td>' . $row1["localidade"] . '</td>
                            <td>' . $row1["telefone"] . '</td>
                            <td>' . $row1["email"] . '</td>
                            <td>' . $valorInput . '</td>
                            <td><button id="' . $row1["id"] . '" class="btn btn-info fas fa-list-alt" data-target="#myModal" data-toggle="modal" onclick="detailsNome(this.id)"></button> <button id="' . $row1["id"] . '" class="btn btn-danger fas fa-trash-alt" data-target="#myModalDelete" data-toggle="modal" onclick="guardarID(this.id)"></button></td>
                        </tr>';
                }
            } else {
                header("Location: ../../../ErrorPages/Error.html");
            }
        }
    } else {
        header("Location: ../../../ErrorPages/Error.html");
    }
} else {
    $sql = "SELECT * FROM encarregadosEducacao WHERE $filtro = '$valorInput'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $sql2 = "SELECT nome FROM alunos WHERE id = " . $row['idAluno'];
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                if ($row2 = mysqli_fetch_assoc($result2)) {
                    $nomeAluno = $row2['nome'];
                    echo '
                            <tr>
                                <td>' . $row["nome"] . '</td>
                                <td>' . $row["morada"] . '</td>
                                <td>' . $row["localidade"] . '</td>
                                <td>' . $row["telefone"] . '</td>
                                <td>' . $row["email"] . '</td>
                                <td>' . $nomeAluno . '</td>
                                <td><button id="' . $row["id"] . '" class="btn btn-info fas fa-list-alt" data-target="#myModal" data-toggle="modal" onclick="detailsNome(this.id)"></button> <button id="' . $row["id"] . '" class="btn btn-danger fas fa-trash-alt" data-target="#myModalDelete" data-toggle="modal" onclick="guardarID(this.id)"></button></td>
                            </tr>';
                }
            } else {
                header("Location: ../../../ErrorPages/Error.html");
            }
        }
    } else {
        header("Location: ../../../ErrorPages/Error.html");
    }
}

echo '</tbody></table>';
mysqli_close($conn);
