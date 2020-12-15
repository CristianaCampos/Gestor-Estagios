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
                    <th>Contacto</th>
                    <th>Email</th>
                    <th>Função</th>
                    <th>Entidade de Estágio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>';

$sql = "SELECT * FROM monitoresEstagio";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) != 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sql1 = "SELECT nome FROM entidades WHERE id =".$row["idEntidadeEstagio"];
        $result1 = mysqli_query($conn, $sql1);
        if ($result1) {
            if ($row1 = mysqli_fetch_assoc($result1)) {
                $nomeEntidade = $row1["nome"];

                echo '
                <tr>
                    <td>' . $row["nome"] . '</td>
                    <td>' . $row["telefone"] . '</td>
                    <td>' . $row["email"] . '</td>
                    <td>' . $row["funcao"] . '</td>
                    <td>' . $nomeEntidade . '</td>
                    <td><button id="' . $row["id"] . '" class="btn btn-info fas fa-list-alt" data-target="#myModal" data-toggle="modal" onclick="detailsNome(this.id)"></button> <button id="' . $row["id"] . '" class="btn btn-danger fas fa-trash-alt" data-target="#myModalDelete" data-toggle="modal" onclick="guardarID(this.id)"></button></td>
                </tr>';
            }
        }
    }
    echo '</tbody></table>';
} else {
    header("Location: erro.html");
}

mysqli_close($conn);
?>