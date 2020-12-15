<?php
    session_start();

    $atividade = $_GET['atividade'];
    $horas = $_GET['horas'];
    $aluno = $_SESSION['nome'];
    $dia = $_GET['dia'];
    $mes = $_GET['mes']+1;
    $ano = $_GET['ano'];

    $data = $dia . "/0" . $mes . "/" . $ano;

    if ($mes > 9) {
        $data = $dia . "/" . $mes . "/" . $ano;
    }


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

    $sqlIdAluno = "SELECT id FROM alunos WHERE codigoAluno='$aluno'";
    $resultIdAluno = mysqli_query($conn, $sqlIdAluno); 
    
    if ($resultIdAluno)
    {
        if ($row = mysqli_fetch_assoc($resultIdAluno)) 
		{
            $idAluno = $row['id'];
        }
    }

    $sql = "INSERT INTO registosDiarios(idAluno, dia, horas, atividade) VALUES ($idAluno, '$data', $horas, '$atividade')";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);
?>