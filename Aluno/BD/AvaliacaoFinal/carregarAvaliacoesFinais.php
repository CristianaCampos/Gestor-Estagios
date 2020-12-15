<?php

session_start();

$aluno = $_SESSION["nome"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "capaEstagiodb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica a ligação
if (!$conn) {
    die("Ligação falhou: " . mysqli_connect_error());
}

$idAluno = getAlunoIdByCodigo($conn, $aluno);

$sql = "SELECT * FROM avaliacaofinal WHERE idAluno=" . $idAluno;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    if ($row = mysqli_fetch_assoc($result)) {
        echo '<table class="table table-bordered">
                <thead class="thead" style="background-color:black; color: white;">
                    <tr>
                        <th style="width: 75%" class="text-left">Parâmetros de avaliação</th>
                        <th style="width: 25%" class="text-center">Classificação (0 a 20 valores)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            Integração na Entidade de Estágio
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <input disabled class="text-center" maxlength="2" id="IEE" name="IEE" value="' . $row['IEE'] . '" style="border:0; background-color: white">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Apreensão dos conhecimentos
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <input disabled class="text-center" maxlength="2" id="AC" name="AC" value="' . $row['AC'] . '" style="border:0; background-color: white">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>                           
                            Aprendizagem de novos conhecimentos
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <input disabled class="text-center" maxlength="2" id="ANC" name="ANC" value="' . $row['ANC'] . '" style="border:0; background-color: white">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Interesse pelo trabalho que realiza
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <input disabled class="text-center" maxlength="2" id="ITR" name="ITR" value="' . $row['ITR'] . '" style="border:0; background-color: white">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Rapidez na execução do trabalho
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <input disabled class="text-center" maxlength="2" id="RET" name="RET" value="' . $row['RET'] . '" style="border:0; background-color: white">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Qualidade do trabalho realizado
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <input disabled class="text-center" maxlength="2" id="QTR" name="QTR" value="' . $row['QTR'] . '" style="border:0; background-color: white">
                            </div>       
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Sentido de responsabilidade
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <input disabled class="text-center" maxlength="2" id="SR" name="SR" value="' . $row['SR'] . '" style="border:0; background-color: white">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Autonomia no exercício das suas funções
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <input disabled class="text-center" maxlength="2" id="AEF" name="AEF" value="' . $row['AEF'] . '" style="border:0; background-color: white">
                            </div>    
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Facilidade de adaptação a novas tarefas
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <input disabled class="text-center" maxlength="2" id="FANT" name="FANT" value="' . $row['FANT'] . '" style="border:0; background-color: white">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Relacionamento com a chefia
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <input disabled class="text-center" maxlength="2" id="RCH" name="RCH" value="' . $row['RCH'] . '" style="border:0; background-color: white">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Relacionamento com os colegas
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <input disabled class="text-center" maxlength="2" id="RCO" name="RCO" value="' . $row['RCO'] . '" style="border:0; background-color: white">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Relacionamento com os clientes
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <input disabled class="text-center" maxlength="2" id="RCL" name="RCL" value="' . $row['RCL'] . '" style="border:0; background-color: white">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Assiduidade e pontualidade
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <input disabled class="text-center" maxlength="2" id="AP" name="AP" value="' . $row['AP'] . '" style="border:0; background-color: white">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Capacidade de Iniciativa
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <input disabled class="text-center" maxlength="2" id="CI" name="CI" value="' . $row['CI'] . '" style="border:0; background-color: white">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Organização do trabalho
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <input disabled class="text-center" maxlength="2" id="OT" name="OT" value="' . $row['OT'] . '" style="border:0; background-color: white">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Aplicação das normas de segurança e higiene no trabalho
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <input disabled class="text-center" maxlength="2" id="ANSHT" name="ANSHT" value="' . $row['ANSHT'] . '" style="border:0; background-color: white">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Classificação Final</b>
                            <div class="float-right"><i>(média das classificações)</i></div>
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <input disabled class="text-center" maxlength="2" id="CF" name="CF" value="' . $row['CF'] . '" style="border:0; background-color: white">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-12">
                    <input type="text" disabled class="form-control text-center" rows="3" id="observacoes" name="observacoes" value="' . $row['observacoes'] . '" placeholder="Observações (avaliação global)">
                </div>
            </div>
            <br>
        </div>';
    }
}


function getAlunoIdByCodigo($conn, $codigo)
{
    $id = 0;
    $sqlAluno = "SELECT id FROM alunos WHERE codigoAluno='$codigo'";
    $resultAluno = mysqli_query($conn, $sqlAluno);

    if ($resultAluno) {
        if ($row = mysqli_fetch_assoc($resultAluno)) {
            $id = $row['id'];
        }
    }

    return $id;
}
