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

$sql = "SELECT $tipo FROM dados WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    if ($row = mysqli_fetch_assoc($result)) {
        if ($tipo == "idAluno")
        {
            $sql1 = "SELECT nome FROM alunos WHERE id = ".$row['idAluno'];
            $result1 = mysqli_query($conn, $sql1);
            if ($result1) {
                if ($row1 = mysqli_fetch_assoc($result1)) {
                    echo $row1["nome"];
                }
            }
        }  
        else if ($tipo == "idEntidadeEstagio")
        {
            $sql2 = "SELECT nome FROM entidades WHERE id = ".$row['idEntidadeEstagio'];
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                if ($row2 = mysqli_fetch_assoc($result2)) {
                    echo $row2["nome"];
                }
            }
        } 
        else if ($tipo == "idProfessorOrientador")
        {
            $sql3 = "SELECT nome FROM professoresorientadores WHERE id = ".$row['idProfessorOrientador'];
            $result3 = mysqli_query($conn, $sql3);
            if ($result3) {
                if ($row3 = mysqli_fetch_assoc($result3)) {
                    echo $row3["nome"];
                }
            }
        } 
        else if ($tipo == "idMonitor")
        {
            $sql4 = "SELECT nome FROM monitoresestagio WHERE id = ".$row['idMonitor'];
            $result4 = mysqli_query($conn, $sql4);
            if ($result4) {
                if ($row4 = mysqli_fetch_assoc($result4)) {
                    echo $row4["nome"];
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