<?php

$nome = $_GET["nome"];
$contacto = $_GET["contacto"];
$email = $_GET["email"];
$funcao = $_GET["funcao"];
$entidade = $_GET["entidade"];

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

$sqlIdEntidade = "SELECT id FROM entidades WHERE nome = '$entidade'";
$result = mysqli_query($conn, $sqlIdEntidade);

if ($result)
{
    if ($row = mysqli_fetch_assoc($result))
    {
        $idEntidade = $row["id"];
        $sql = "INSERT INTO monitoresEstagio(nome, telefone, email, funcao, idEntidadeEstagio) VALUES ('$nome', $contacto, '$email', '$funcao', $idEntidade)";
        if (mysqli_query($conn, $sql)) {
            echo true;
        }
        else {
            echo false;
        }
    }
}
else {
    echo false;
}

mysqli_close($conn);
?>