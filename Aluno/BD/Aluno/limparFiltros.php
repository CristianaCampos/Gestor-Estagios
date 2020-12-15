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
                    <th>Classificação Final</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>';

$sql = "SELECT id, idAluno, CF FROM avaliacaoFinal";
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sql1 = "SELECT nome FROM alunos WHERE id =".$row["idAluno"];
        $result1 = mysqli_query($conn, $sql1);
        if ($result1) {
            if ($row1 = mysqli_fetch_assoc($result1)) {
                $nomeAluno = $row1["nome"];

                echo '
                    <tr>
                        <td>' . $nomeAluno . '</td>
                        <td>' . $row["CF"] . '</td>
                        <td><button id="' . $row["id"] . '" class="btn btn-info fas fa-list-alt" data-target="#myModal" data-toggle="modal" onclick="detailsNome(this.id)"></button> <button id="' . $row["id"] . '" class="btn btn-danger fas fa-trash-alt" data-target="#myModalDelete" data-toggle="modal" onclick="guardarID(this.id)"></button></td>
                    </tr>';
            }
        }
        else {
            header("Location: ../../../ErrorPages/Error.html");
        }
    }
    echo '</tbody></table>';
} else {
    header("Location: ../../../ErrorPages/Error.html");
}

mysqli_close($conn);
?>