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
                    <th>Email</th>
                    <th>Contacto</th>
                    <th>NIF</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>';

$sql = "SELECT * FROM entidades WHERE $filtro = '$valorInput'";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) != 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
                <tr>
                <td>' . $row["nome"] . '</td>
                <td>' . $row["morada"] . '</td>
                <td>' . $row["localidade"] . '</td>
                <td>' . $row["email"] . '</td>
                <td>' . $row["contacto"] . '</td>
                <td>' . $row["nif"] . '</td>
                <td><button id="'.$row["id"].'" class="btn btn-info fas fa-list-alt" data-target="#myModal" data-toggle="modal" onclick="detailsNome(this.id)"></button> <button id="'.$row["id"].'" class="btn btn-danger fas fa-trash-alt" data-target="#myModalDelete" data-toggle="modal" onclick="guardarID(this.id)"></button></td>
                </tr>';
        }
    }

    echo '</tbody></table>';
} else {
    header("Location: erro.html");
}

mysqli_close($conn);
