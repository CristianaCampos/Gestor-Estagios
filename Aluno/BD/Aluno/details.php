<?php

$id = $_GET["id"];
// $tipo = $_GET["tipo"];

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

$sql = "SELECT * FROM avaliacaoFinal WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    if ($row = mysqli_fetch_assoc($result)) {

        $sqlAluno = "SELECT nome FROM alunos WHERE id= " . $row['idAluno'];
        $resultAluno = mysqli_query($conn, $sqlAluno);
        if ($resultAluno) {
            if ($rowAluno = mysqli_fetch_assoc($resultAluno)) {
                $nome = $rowAluno["nome"];

                echo '<b>Aluno</b>
                        <div id="aluno-modal">
                            ' . $nome . '
                        </div>
                        <hr>
                        <b>Integração na Entidade de Estágio</b>
                        <div id="IEE-modal">
                            ' . $row["IEE"] . '
                        </div>
                        <hr>
                        <b>Apreensão dos conhecimentos</b>
                        <div id="AC-modal">
                            ' . $row["AC"] . '
                        </div>
                        <hr>
                        <b>Aprendizagem de novos conhecimentos</b>
                        <div id="ANC-modal">
                            ' . $row["ANC"] . '
                        </div>
                        <hr>
                        <b>Interesse pelo trabalho que realiza</b>
                        <div id="ITR-modal">
                            ' . $row["ITR"] . '
                        </div>
                        <hr>
                        <b>Rapidez na execução do trabalho</b>
                        <div id="RET-modal">
                            ' . $row["RET"] . '
                        </div>
                        <hr>
                        <b>Qualidade do trabalho realizado</b>
                        <div id="QTR-modal">
                            ' . $row["QTR"] . '
                        </div>
                        <hr>
                        <b>Sentido de responsabilidade</b>
                        <div id="SR-modal">
                            ' . $row["SR"] . '
                        </div>
                        <hr>
                        <b>Autonomia no exercício das suas funções</b>
                        <div id="AEF-modal">
                            ' . $row["AEF"] . '
                        </div>
                        <hr>
                        <b>Facilidade de adaptação a novas tarefas</b>
                        <div id="FANT-modal">
                            ' . $row["FANT"] . '
                        </div>
                        <hr>
                        <b>Relacionamento com a chefia</b>
                        <div id="RCH-modal">
                            ' . $row["RCH"] . '
                        </div>
                        <hr>
                        <b>Relacionamento com os colegas</b>
                        <div id="RCO-modal">
                            ' . $row["RCO"] . '
                        </div>
                        <hr>
                        <b>Relacionamento com os clientes</b>
                        <div id="RCL-modal">
                            ' . $row["RCL"] . '
                        </div>
                        <hr>
                        <b>Assiduidade e pontualidade</b>
                        <div id="AP-modal">
                            ' . $row["AP"] . '
                        </div>
                        <hr>
                        <b>Capacidade de Iniciativa</b>
                        <div id="CI-modal">
                            ' . $row["CI"] . '
                        </div>
                        <hr>
                        <b>Organização do trabalho</b>
                        <div id="OT-modal">
                            ' . $row["OT"] . '
                        </div>
                        <hr>
                        <b>Aplicação das normas de segurança e higiene no trabalho</b>
                        <div id="ANSHT-modal">
                            ' . $row["ANSHT"] . '
                        </div>
                        <hr>
                        <b>Classificação Final</b>
                        <div id="CF-modal">
                            ' . $row["CF"] . '
                        </div>
                        <hr>
                        <b>Observações</b>
                        <div id="observacoes-modal">
                            ' . $row["observacoes"] . '
                        </div>
                        <hr>';
            }
        }
    }
}

mysqli_close($conn);
?>