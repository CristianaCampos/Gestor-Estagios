<?php
    session_start();

    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "capaEstagioDB";
    $port = "3306";

    // Efetua a ligação
    $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

    // Verifica a ligação
    if (!$conn) {
        die("Ligação falhou: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM registosdiarios WHERE id = $id";
    $result = mysqli_query($conn, $sql); 

    if ($result)
    {
        echo true;
    }

    mysqli_close($conn);
?>