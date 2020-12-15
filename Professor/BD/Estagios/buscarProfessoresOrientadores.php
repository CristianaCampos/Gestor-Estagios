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

$sql = "SELECT nome FROM professoresOrientadores";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) != 0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
		{
            echo '<option>'.$row['nome'].'</option>';
        }
    }

mysqli_close($conn);
?>