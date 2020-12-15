<?php
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
                    <th>Data</th>
                    <th>Horas</th>
                    <th>Atividade</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>';

$sql = "SELECT * FROM registosdiarios";
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sql1 = "SELECT nome FROM alunos WHERE id =" . $row["idAluno"];
        $result1 = mysqli_query($conn, $sql1);
        if ($result1) {
            if ($row1 = mysqli_fetch_assoc($result1)) {
                $nomeAluno = $row1["nome"];
                echo '
                    <tr>
                        <td>' . $nomeAluno . '</td>
                        <td>' . $row["dia"] . '</td>
                        <td>' . $row["horas"] . '</td>
                        <td>' . $row["atividade"] . '</td>
                        <td><button id="' . $row["id"] . '" class="btn btn-info fas fa-list-alt" data-target="#myModal" data-toggle="modal" onclick="detailsAluno(this.id)"></button></td>
                    </tr>';
            }
        }
    }
    echo '</tbody></table>';
} else {
    header("Location: ../../../ErrorPages/Error.html");
}

mysqli_close($conn);
