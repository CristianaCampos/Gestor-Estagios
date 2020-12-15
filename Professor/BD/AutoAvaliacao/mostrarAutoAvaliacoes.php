<?php

$aluno = $_GET["aluno"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "capaEstagiodb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica a ligação
if (!$conn) {
    die("Ligação falhou: " . mysqli_connect_error());
}

$idAluno = getAlunoIdByName($conn, $aluno);

$sql = "SELECT * FROM autoavaliacao WHERE idAluno=" . $idAluno;
$result = mysqli_query($conn, $sql);

if ($result) {
    if ($row = mysqli_fetch_assoc($result)) {
        echo '
        <table class="table table-bordered">
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
                            <input disabled class="text-center" maxlength="2" value="' . $row['IEE'] . '" id="IEE" name="IEE" style="border:0; background-color: white">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Apreensão dos conhecimentos
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <input disabled class="text-center" maxlength="2" value="' . $row['AC'] . '" id="AC" name="AC" style="border:0; background-color: white">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Aprendizagem de novos conhecimentos
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <input disabled class="text-center" maxlength="2" value="' . $row['ANC'] . '" id="ANC" name="ANC" style="border:0; background-color: white">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Interesse pelo trabalho que realiza
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <input disabled class="text-center" maxlength="2" value="' . $row['ITR'] . '" id="ITR" name="ITR" style="border:0; background-color: white">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Rapidez na execução do trabalho
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <input disabled class="text-center" maxlength="2" value="' . $row['RET'] . '" id="RET" name="RET" style="border:0; background-color: white">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Qualidade do trabalho realizado
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <input disabled class="text-center" maxlength="2" value="' . $row['QTR'] . '" id="QTR" name="QTR" style="border:0; background-color: white">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Sentido de responsabilidade
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <input disabled class="text-center" maxlength="2" value="' . $row['SR'] . '" id="SR" name="SR" style="border:0; background-color: white">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Autonomia no exercício das suas funções
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <input disabled class="text-center" maxlength="2" value="' . $row['AEF'] . '" id="AEF" name="AEF" style="border:0; background-color: white">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Facilidade de adaptação a novas tarefas
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <input disabled class="text-center" maxlength="2" value="' . $row['FANT'] . '" id="FANT" name="FANT" style="border:0; background-color: white">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Relacionamento com a chefia
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <input disabled class="text-center" maxlength="2" value="' . $row['RCH'] . '" id="RCH" name="RCH" style="border:0; background-color: white">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Relacionamento com os colegas
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <input disabled class="text-center" maxlength="2" value="' . $row['RCO'] . '" id="RCO" name="RCO" style="border:0; background-color: white">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Relacionamento com os clientes
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <input disabled class="text-center" maxlength="2" value="' . $row['RCL'] . '" id="RCL" name="RCL" style="border:0; background-color: white">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Assiduidade e pontualidade
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <input disabled class="text-center" maxlength="2" value="' . $row['AP'] . '" id="AP" name="AP" style="border:0; background-color: white">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Capacidade de Iniciativa
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <input disabled class="text-center" maxlength="2" value="' . $row['CI'] . '" id="CI" name="CI" style="border:0; background-color: white">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Organização do trabalho
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <input disabled class="text-center" maxlength="2" value="' . $row['OT'] . '" id="OT" name="OT" style="border:0; background-color: white">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Aplicação das normas de segurança e higiene no trabalho
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <input disabled class="text-center" maxlength="2" value="' . $row['ANSHT'] . '" id="ANSHT" name="ANSHT" style="border:0; background-color: white">
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
                            <input disabled class="text-center" maxlength="2" value="' . $row['CF'] . '" id="CF" name="CF" style="border:0; background-color: white">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center">
                    Pontos Negativos
                </div>
            </div>
            <div class="col">
                <div class="d-flex justify-content-center">
                    Pontos Positivos
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="text" disabled class="form-control text-center" rows="3" id="PN" name="PN" value="' . $row['PN'] . '" placeholder="Pontos Negativos"></textarea>
            </div>
            <div class="col">
                <input type="text" disabled class="form-control text-center" rows="3" id="PP" name="PP" value="' . $row['PP'] . '" placeholder="Pontos Positivos"></textarea>
                <br>
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    Conclusões Finais
                </div>
            </div>
            <div class="col-12">
                <input type="text" disabled class="form-control text-center" rows="3" id="COF" name="COF" value="' . $row['COF'] . '" placeholder="Conclusões Finais"></textarea>
            </div>
        </div><br>';
    }
// } else {
//     echo '
//             <table class="table table-bordered">
//                 <thead class="thead" style="background-color:black; color: white;">
//                     <tr>
//                         <th style="width: 75%" class="text-left">Parâmetros de avaliação</th>
//                         <th style="width: 25%" class="text-center">Classificação (0 a 20 valores)</th>
//                     </tr>
//                 </thead>
//                 <tbody>
//                     <tr>
//                         <td>
//                             Integração na Entidade de Estágio
//                         </td>
//                         <td>
//                             <div class="d-flex flex-column">
//                                 <input disabled class="text-center" maxlength="2" id="IEE" name="IEE" style="border:0; background-color: white">
//                             </div>
//                         </td>
//                     </tr>
//                     <tr>
//                         <td>
//                             Apreensão dos conhecimentos
//                         </td>
//                         <td>
//                             <div class="d-flex flex-column">
//                                 <input disabled class="text-center" maxlength="2" id="AC" name="AC" style="border:0; background-color: white">
//                             </div>
//                         </td>
//                     </tr>
//                     <tr>
//                         <td>
//                             Aprendizagem de novos conhecimentos
//                         </td>
//                         <td>
//                             <div class="d-flex flex-column">
//                                 <input disabled class="text-center" maxlength="2" id="ANC" name="ANC" style="border:0; background-color: white">
//                             </div>
//                         </td>
//                     </tr>
//                     <tr>
//                         <td>
//                             Interesse pelo trabalho que realiza
//                         </td>
//                         <td>
//                             <div class="d-flex flex-column">
//                                 <input disabled class="text-center" maxlength="2" id="ITR" name="ITR" style="border:0; background-color: white">
//                             </div>
//                         </td>
//                     </tr>
//                     <tr>
//                         <td>
//                             Rapidez na execução do trabalho
//                         </td>
//                         <td>
//                             <div class="d-flex flex-column">
//                                 <input disabled class="text-center" maxlength="2" id="RET" name="RET" style="border:0; background-color: white">
//                             </div>
//                         </td>
//                     </tr>
//                     <tr>
//                         <td>
//                             Qualidade do trabalho realizado
//                         </td>
//                         <td>
//                             <div class="d-flex flex-column">
//                                 <input disabled class="text-center" maxlength="2" id="QTR" name="QTR" style="border:0; background-color: white">
//                             </div>
//                         </td>
//                     </tr>
//                     <tr>
//                         <td>
//                             Sentido de responsabilidade
//                         </td>
//                         <td>
//                             <div class="d-flex flex-column">
//                                 <input disabled class="text-center" maxlength="2" id="SR" name="SR" style="border:0; background-color: white">
//                             </div>
//                         </td>
//                     </tr>
//                     <tr>
//                         <td>
//                             Autonomia no exercício das suas funções
//                         </td>
//                         <td>
//                             <div class="d-flex flex-column">
//                                 <input disabled class="text-center" maxlength="2" id="AEF" name="AEF" style="border:0; background-color: white">
//                             </div>
//                         </td>
//                     </tr>
//                     <tr>
//                         <td>
//                             Facilidade de adaptação a novas tarefas
//                         </td>
//                         <td>
//                             <div class="d-flex flex-column">
//                                 <input disabled class="text-center" maxlength="2" id="FANT" name="FANT" style="border:0; background-color: white">
//                             </div>
//                         </td>
//                     </tr>
//                     <tr>
//                         <td>
//                             Relacionamento com a chefia
//                         </td>
//                         <td>
//                             <div class="d-flex flex-column">
//                                 <input disabled class="text-center" maxlength="2" id="RCH" name="RCH" style="border:0; background-color: white">
//                             </div>
//                         </td>
//                     </tr>
//                     <tr>
//                         <td>
//                             Relacionamento com os colegas
//                         </td>
//                         <td>
//                             <div class="d-flex flex-column">
//                                 <input disabled class="text-center" maxlength="2" id="RCO" name="RCO" style="border:0; background-color: white">
//                             </div>
//                         </td>
//                     </tr>
//                     <tr>
//                         <td>
//                             Relacionamento com os clientes
//                         </td>
//                         <td>
//                             <div class="d-flex flex-column">
//                                 <input disabled class="text-center" maxlength="2" id="RCL" name="RCL" style="border:0; background-color: white">
//                             </div>
//                         </td>
//                     </tr>
//                     <tr>
//                         <td>
//                             Assiduidade e pontualidade
//                         </td>
//                         <td>
//                             <div class="d-flex flex-column">
//                                 <input disabled class="text-center" maxlength="2" id="AP" name="AP" style="border:0; background-color: white">
//                             </div>
//                         </td>
//                     </tr>
//                     <tr>
//                         <td>
//                             Capacidade de Iniciativa
//                         </td>
//                         <td>
//                             <div class="d-flex flex-column">
//                                 <input disabled class="text-center" maxlength="2" id="CI" name="CI" style="border:0; background-color: white">
//                             </div>
//                         </td>
//                     </tr>
//                     <tr>
//                         <td>
//                             Organização do trabalho
//                         </td>
//                         <td>
//                             <div class="d-flex flex-column">
//                                 <input disabled class="text-center" maxlength="2" id="OT" name="OT" style="border:0; background-color: white">
//                             </div>
//                         </td>
//                     </tr>
//                     <tr>
//                         <td>
//                             Aplicação das normas de segurança e higiene no trabalho
//                         </td>
//                         <td>
//                             <div class="d-flex flex-column">
//                                 <input disabled class="text-center" maxlength="2" id="ANSHT" name="ANSHT" style="border:0; background-color: white">
//                             </div>
//                         </td>
//                     </tr>
//                     <tr>
//                         <td>
//                             <b>Classificação Final</b>
//                             <div class="float-right"><i>(média das classificações)</i></div>
//                         </td>
//                         <td>
//                             <div class="d-flex flex-column">
//                                 <input disabled class="text-center" maxlength="2" id="CF" name="CF" style="border:0; background-color: white">
//                             </div>
//                         </td>
//                     </tr>
//                 </tbody>
//             </table>
//             <div class="row">
//                 <div class="col">
//                     <div class="d-flex justify-content-center">
//                         Pontos Negativos
//                     </div>
//                 </div>
//                 <div class="col">
//                     <div class="d-flex justify-content-center">
//                         Pontos Positivos
//                     </div>
//                 </div>
//             </div>
//             <div class="row">
//                 <div class="col">
//                     <input type="text" disabled class="form-control text-center" rows="3" id="PN" name="PN" placeholder="Pontos Negativos"></textarea>
//                 </div>
//                 <div class="col">
//                     <input type="text" disabled class="form-control text-center" rows="3" id="PP" name="PP" placeholder="Pontos Positivos"></textarea>
//                     <br>
//                 </div>
//                 <div class="col-12">
//                     Conclusões Finais
//                 </div>
//                 <div class="col-12">
//                     <input type="text" disabled class="form-control text-center" rows="3" id="COF" name="COF" placeholder="Conclusões Finais"></textarea>
//                 </div>
//             </div><br>';
// }
}


function getAlunoIdByName($conn, $nome)
{
    $id = 0;
    $sqlAluno = "SELECT id FROM alunos WHERE nome='$nome'";
    $resultAluno = mysqli_query($conn, $sqlAluno);

    if ($resultAluno) {
        if ($row = mysqli_fetch_assoc($resultAluno)) {
            $id = $row['id'];
        }
    }

    return $id;
}
