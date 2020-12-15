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
                    <th>Nome</th>
                    <th>Turma</th>
                    <th>Código do Aluno</th>
                    <th>Data de Nascimento</th>
                    <th>Morada</th>
                    <th>Localidade</th>
                    <th>Email</th>
                    <th>Cartão de Cidadão</th>
                    <th>Contacto</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>';

$sql = "SELECT * FROM alunos";
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sql1 = "SELECT nome FROM turmas WHERE id =" . $row["idTurma"];
        $result1 = mysqli_query($conn, $sql1);
        if ($result1) {
            if ($row1 = mysqli_fetch_assoc($result1)) {
                $nomeTurma = $row1["nome"];

                echo '
                    <tr>
                        <td>' . $row["nome"] . '</td>
                        <td>' . $nomeTurma . '</td>
                        <td>' . $row["codigoAluno"] . '</td>
                        <td>' . $row["dataNascimento"] . '</td>
                        <td>' . $row["morada"] . '</td>
                        <td>' . $row["localidade"] . '</td>
                        <td>' . $row["email"] . '</td>
                        <td>' . $row["cc"] . '</td>
                        <td>' . $row["telefone"] . '</td>
                        <td><button id="' . $row["id"] . '" class="btn btn-info fas fa-list-alt" data-target="#myModal" data-toggle="modal" onclick="detailsNome(this.id)"></button> <button id="' . $row["id"] . '" class="btn btn-danger fas fa-trash-alt" data-target="#myModalDelete" data-toggle="modal" onclick="guardarID(this.id)"></button></td>
                    </tr>';
            }
        } else {
            header("Location: erro.html");
        }
    }
    echo '</tbody></table>';
} else {
    header("Location: erro.html");
}

mysqli_close($conn);
