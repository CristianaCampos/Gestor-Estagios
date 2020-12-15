<?php
    $id = $_GET['id'];

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
    
    echo '
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Aluno</th>
                <th>Entidade de Estágio</th>
                <th>Horas</th>
                <th>Professor Acompanhante</th>
            </tr>
        </thead>
        <tbody>';

    $sql = "SELECT idAluno, entidadeEstagio, horas, professorAcompanhante FROM dados WHERE id = ". $id;

    if (mysqli_query($conn, $sql))
    {
        if ($row = mysqli_fetch_assoc(mysqli_query($conn, $sql))) 
		{
            $sqlNomeAluno = "SELECT nome FROM alunos WHERE id=". $row['idAluno'];

            if (mysqli_query($conn, $sqlNomeAluno))
            {
                if ($rowAluno = mysqli_fetch_assoc(mysqli_query($conn, $sqlNomeAluno))) 
                {
                    $nomeAluno = $rowAluno['nome'];

                    echo '<tr>
                        <td>'.$nomeAluno.'</td>
                        <td>'.$row["entidadeEstagio"].'</td>
                        <td>'.$row["horas"].'</td>
                        <td>'.$row["professorAcompanhante"].'</td>
                    </tr>';
                }
            }
        }
    }
   
    echo '</tbody></table>';
    
    mysqli_close($conn);
?>