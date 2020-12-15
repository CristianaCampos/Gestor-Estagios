<?php

$anoLetivo = $_GET["ano"];

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

$sql = "SELECT nome FROM turmas WHERE anoLetivo = '$anoLetivo'";
$result = mysqli_query($conn, $sql);

if ($result)
    {
        while ($row = mysqli_fetch_assoc($result)) 
		{
            echo '<option>'.$row['nome'].'</option>';
        }
    }

mysqli_close($conn);
?>