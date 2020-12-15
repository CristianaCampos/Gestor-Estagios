<?php
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
$resultIdEntidade = mysqli_query($conn, $sqlIdEntidade);

if ($resultIdEntidade) {
    if ($rowIdEntidade = mysqli_fetch_assoc($resultIdEntidade)) {
        $entidade = $rowIdEntidade["id"];
        $sql = "SELECT nome FROM monitoresestagio WHERE idEntidadeEstagio= $entidade";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) != 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option>' . $row['nome'] . '</option>';
            }
        } else {
            header("Location: ../../../ErrorPages/Error.html");
        }
    }
} else {
    header("Location: ../../../ErrorPages/Error.html");
}

mysqli_close($conn);
?>