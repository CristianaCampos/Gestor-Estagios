<?php
    session_start();

    $sessao = $_SESSION["nome"];
	$dado = $_GET["dado"];
    
	$servername = "localhost";
	$username = "root";
	$password = "";
    $dbname = "capaEstagiodb";
    $port = "3306";
	 
	// Efetua a ligação
	$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
	
	// Verifica a ligação
	if (!$conn) {
		die("Ligação falhou: " . mysqli_connect_error());
    }

    $sql = "SELECT id FROM alunos WHERE codigoAluno = '" . $sessao . "'";
    $result = mysqli_query($conn, $sql);

    if ($result) 
	{
		if ($row = mysqli_fetch_assoc($result)) 
		{
            if ($dado == "formando")
            {
                $sql3 = "SELECT nome FROM alunos WHERE codigoAluno = '" . $sessao . "'";
                
                $result3 = mysqli_query($conn, $sql3);

                if ($result3)
                {
                    if ($row3 = mysqli_fetch_assoc($result3)) 
                    {
                        echo $row3["nome"];
                    }             
                }
            }
            else
            {
                $sql2 = "SELECT * FROM dados WHERE idAluno = " . $row['id'];
                $result2 = mysqli_query($conn, $sql2);
                
                if ($result2) 
                {
                    if ($row2 = mysqli_fetch_assoc($result2)) 
                    {
                        $entidadeEstagio = getEntidadeEstagioById($conn, $row2["idEntidadeEstagio"]);
                        $professorOrientador = getProfessorOrientadorById($conn, $row2["idProfessorOrientador"]);

                        if ($dado == "entidadeEstagio")
                            echo $entidadeEstagio;
                        else if ($dado == "horas")
                            echo $row2["horas"] . " horas";
                        else if ($dado == "professorAcompanhante")
                            echo $professorOrientador;
                    }
                }
            }
        }
    }
    
    mysqli_close($conn);


    function getEntidadeEstagioById($conn, $idEntidade) {
        $entidadeEstagio = "Entidade Enquadradora";

        $sql = "SELECT nome FROM entidades WHERE id=" . $idEntidade;
        $sqlResult = mysqli_query($conn, $sql);

        if ($sqlResult) {
            if ($row = mysqli_fetch_assoc($sqlResult)) {
                $entidadeEstagio = $row['nome'];
            }
        }

        return $entidadeEstagio;
    }

    function getProfessorOrientadorById($conn, $idProfessor) {
        $professorAcompanhante = "Professor Acompanhante";

        $sql = "SELECT nome FROM professoresorientadores WHERE id=" . $idProfessor;
        $sqlResult = mysqli_query($conn, $sql);

        if ($sqlResult) {
            if ($row = mysqli_fetch_assoc($sqlResult)) {
                $professorAcompanhante = $row['nome'];
            }
        }

        return $professorAcompanhante;
    }
?>