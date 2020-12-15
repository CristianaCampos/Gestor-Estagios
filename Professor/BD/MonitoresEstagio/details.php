<?php

$id = $_GET["id"];
$tipo = $_GET["tipo"];

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

$sql = "SELECT $tipo FROM monitoresEstagio WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    if ($row = mysqli_fetch_assoc($result)) {
        if ($tipo == "idEntidadeEstagio")
        {
            $sql1 = "SELECT nome FROM entidades WHERE id = ".$row['idEntidadeEstagio'];
            $result1 = mysqli_query($conn, $sql1);
            if ($result1) {
                if ($row1 = mysqli_fetch_assoc($result1)) {
                    echo $row1["nome"];
                }
            }
        }   
        else {
            echo $row[$tipo];
        }
    }
}

mysqli_close($conn);
?>