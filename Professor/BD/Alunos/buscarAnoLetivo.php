<?php

$ano = "";

$anosInseridos = array("0000/0000");

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

$sql = "SELECT anoLetivo FROM turmas";
$result = mysqli_query($conn, $sql);

if ($result)
    {
        while ($row = mysqli_fetch_assoc($result)) 
		{
            $ano = $row["anoLetivo"];
            if (!(in_array($ano, $anosInseridos)))
            {
                echo '<option>' . $ano . '</option>';
                array_push($anosInseridos,$ano);
            }
        }
    }

mysqli_close($conn);
?>