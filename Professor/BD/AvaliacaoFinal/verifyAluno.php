<?php include('../../../Database/Connection/DBServices.php') ?>
<?php

$aluno = $_GET["aluno"];

$connection = new DBConnection();
$connection->open();
$services = new DBServices($connection);

$idAluno = getAlunoIdByName($services, $aluno);
$hasAvaliacaoFinal = verify($services, $idAluno);

echo $hasAvaliacaoFinal;

function getAlunoIdByName($services, $aluno)
{
    $querySelect = "SELECT id FROM alunos WHERE nome='$aluno'";
    $queryResult = $services->selectCommand($querySelect);

    $id = 0;
    if ($queryResult) {
        if ($row = mysqli_fetch_assoc($queryResult)) {
            $id = $row['id'];
        }
    }

    return $id;
}

function verify($services, $idAluno)
{
    $querySelect = "SELECT idAluno FROM avaliacaofinal WHERE idAluno=$idAluno";
    $queryResult = $services->selectCommand($querySelect);

    $hasAvaliacaoFinal = 0;

    if ($queryResult) {
        if (mysqli_num_rows($queryResult) > 0) {
            $hasAvaliacaoFinal = 1;
        }
    }

    return $hasAvaliacaoFinal;
}
?>