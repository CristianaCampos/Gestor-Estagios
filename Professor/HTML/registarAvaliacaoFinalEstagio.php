<?php
session_start();
?>

<html>

<head>
    <title>Registar Avaliações Finais</title>
    <link rel="icon" href="../../Imagens/iconEstagio.ico">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!-- titulos -->
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <!-- corpo -->
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../../Inicio/index.css?v=1.3">

    <script>
        function hideTable() {
            var tabela = document.getElementById("tabela");

            tabela.style.display = "none";
            tabela.style.visibility = "hidden";
        }

        function hideWarning() {
            var warning = document.getElementById("warning");

            warning.style.display = "none";
            warning.style.visibility = "hidden";
        }

        function showTable() {
            var tabela = document.getElementById("tabela");

            tabela.style.display = "block";
            tabela.style.visibility = "visible";
        }

        function showWarning() {
            var warning = document.getElementById("warning");

            warning.style.display = "block";
            warning.style.visibility = "visible";
        }

        function disabledSelect() {
            document.getElementById("curso").disabled = true;
            document.getElementById("turma").disabled = true;
            document.getElementById("aluno").disabled = true;
        }

        function enableCurso() {
            document.getElementById("curso").disabled = false;
        }

        function enableTurma() {
            document.getElementById("turma").disabled = false;
        }

        function enableAluno() {
            document.getElementById("aluno").disabled = false;
        }

        function cenasHidden() {
            hideTable();
            hideWarning();
            document.getElementById("tabela").style.visibility = "hidden";
            document.getElementById("observacoes").style.visibility = "hidden";
            document.getElementById("butSubmit").style.visibility = "hidden";
            document.getElementById("butSubmit").disabled = "true";

            document.getElementById("tabela").style.display = "none";
            document.getElementById("observacoes").style.display = "none";
            document.getElementById("butSubmit").style.display = "none";
        }

        function carregarCursos() {
            var ano = document.getElementById("ano").value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("curso").innerHTML = "<option disabled selected>---</option>";
                    document.getElementById("curso").innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "../BD/AvaliacaoFinal/buscarCursos.php?ano=" + ano, true);
            xhttp.send();
        }

        function carregarTurmas() {
            cenasHidden();
            var curso = document.getElementById("curso").value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("turma").innerHTML = "<option disabled selected>---</option>";
                    document.getElementById("turma").innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "../BD/AvaliacaoFinal/buscarTurmas.php?curso=" + curso, true);
            xhttp.send();
        }

        function carregarAnos() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("ano").innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "../BD/Alunos/buscarAnoLetivo.php", true);
            xhttp.send();
        }

        function carregarAlunos() {
            document.getElementById("tabela").style.visibility = "hidden";
            document.getElementById("observacoes").style.visibility = "hidden";
            document.getElementById("butSubmit").style.visibility = "hidden";
            document.getElementById("butSubmit").disabled = "true";

            document.getElementById("tabela").style.display = "none";
            document.getElementById("observacoes").style.display = "none";
            document.getElementById("butSubmit").style.display = "none";

            var turma = document.getElementById("turma").value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("aluno").innerHTML = "<option disabled selected>---</option>";
                    document.getElementById("aluno").innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "../BD/AvaliacaoFinal/buscarAlunos.php?turma=" + turma, true);
            xhttp.send();
        }

        function checkAluno() {
            var aluno = document.getElementById("aluno").value;

            if (aluno != "---") {
                document.getElementById("butSubmit").disabled = false;
            }
        }

        function carregarCoisas() {
            hideWarning();
            showTable();
            checkAluno();
            document.getElementById("observacoes").style.display = "block";
            document.getElementById("butSubmit").style.display = "block";

            document.getElementById("butSubmit").style.visibility = "visible";
            document.getElementById("observacoes").style.visibility = "visible";
        }

        function loadError() {
            hideTable();
            showWarning();
        }

        function verifyAluno() {
            var aluno = document.getElementById("aluno").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 0) {
                        carregarCoisas();
                    } else {
                        loadError();
                    }
                }
            };
            xhttp.open("GET", "../BD/AvaliacaoFinal/verifyAluno.php?aluno=" + aluno, true);
            xhttp.send();
        }
    </script>
</head>

<body onload="carregarAnos(); cenasHidden(); verifyUser(); disabledSelect()">
    <div class="container">
        <?php
        include("Includes/menuLogadoProfessor.php");
        ?>

        <br><br><br><br>
        <div class="row">
            <div class="col">
                <h1>Adicionar Avaliação Final de Estágio</h1>
                <hr>
            </div>
        </div>
        <form action="../BD/AvaliacaoFinal/registarAvaliacaoFinalInserir.php" method="POST">
            <div class="row">
                <div class="col-md-4">
                    <div class="float-left">
                        <b>Ano Letivo: </b>
                        <br>
                    </div>
                    <select id="ano" name="ano" class="form-control" onchange="carregarCursos(); enableCurso()">
                        <option disabled selected>---</option>
                    </select>
                    <br>
                    <div class="float-left">
                        <b>Curso do Aluno: </b>
                        <br>
                    </div>
                    <select id="curso" name="curso" class="form-control" onchange="carregarTurmas(); enableTurma()">
                        <option disabled selected>---</option>
                    </select>
                    <br>
                    <div id="turmaTexto" class="float-left">
                        <b>Turma do Aluno: </b>
                        <br>
                    </div>
                    <select id="turma" name="turma" class="form-control" onchange="carregarAlunos(); enableAluno()">
                        <option disabled selected>---</option>
                    </select>
                    <br>
                    <div id="alunoTexto" class="float-left">
                        <b>Aluno: </b>
                        <br>
                    </div>
                    <select id="aluno" name="aluno" class="form-control" onchange="verifyAluno();">
                        <option disabled selected>---</option>
                    </select>
                    <p><i>(apenas os alunos com estágios associados estão a ser carregados)</i></p>
                    <br>
                </div>
                <div class="col-lg-8">
                    <div id="warning">
                        <br>
                        <div class="card mx-auto w-75" style="background-color: tomato;">
                            <div class="card-body">
                                <h3><i class="fas fa-exclamation-triangle"></i> A avaliação final deste aluno já se encontra realizada.</h3>
                            </div>
                        </div>
                    </div>
                    <div id="tabela">
                        <table class="table table-bordered" id="tabela">
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
                                        <input required class="text-center" maxlength="2" id="IEE" name="IEE" style="border:0;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Apreensão dos conhecimentos
                                    </td>
                                    <td>
                                        <input required class="text-center" maxlength="2" id="AC" name="AC" style="border:0;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Aprendizagem de novos conhecimentos
                                    </td>
                                    <td>
                                        <input required class="text-center" maxlength="2" id="ANC" name="ANC" style="border:0;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Interesse pelo trabalho que realiza
                                    </td>
                                    <td>
                                        <input required class="text-center" maxlength="2" id="ITR" name="ITR" style="border:0;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Rapidez na execução do trabalho
                                    </td>
                                    <td>
                                        <input required class="text-center" maxlength="2" id="RET" name="RET" style="border:0;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Qualidade do trabalho realizado
                                    </td>
                                    <td>
                                        <input required class="text-center" maxlength="2" id="QTR" name="QTR" style="border:0;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Sentido de responsabilidade
                                    </td>
                                    <td>
                                        <input required class="text-center" maxlength="2" id="SR" name="SR" style="border:0;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Autonomia no exercício das suas funções
                                    </td>
                                    <td>
                                        <input required class="text-center" maxlength="2" id="AEF" name="AEF" style="border:0;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Facilidade de adaptação a novas tarefas
                                    </td>
                                    <td>
                                        <input required class="text-center" maxlength="2" id="FANT" name="FANT" style="border:0;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Relacionamento com a chefia
                                    </td>
                                    <td>
                                        <input required class="text-center" maxlength="2" id="RCH" name="RCH" style="border:0;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Relacionamento com os colegas
                                    </td>
                                    <td>
                                        <input required class="text-center" maxlength="2" id="RCO" name="RCO" style="border:0;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Relacionamento com os clientes
                                    </td>
                                    <td>
                                        <input required class="text-center" maxlength="2" id="RCL" name="RCL" style="border:0;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Assiduidade e pontualidade
                                    </td>
                                    <td>
                                        <input required class="text-center" maxlength="2" id="AP" name="AP" style="border:0;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Capacidade de Iniciativa
                                    </td>
                                    <td>
                                        <input required class="text-center" maxlength="2" id="CI" name="CI" style="border:0;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Organização do trabalho
                                    </td>
                                    <td>
                                        <input required class="text-center" maxlength="2" id="OT" name="OT" style="border:0;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Aplicação das normas de segurança e higiene no trabalho
                                    </td>
                                    <td>
                                        <input required class="text-center" maxlength="2" id="ANSHT" name="ANSHT" style="border:0;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Classificação Final</b>
                                        <div class="float-right"><i>(média das classificações)</i></div>
                                    </td>
                                    <td>
                                        <input required class="text-center" maxlength="2" id="CF" name="CF" style="border:0;">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <textarea required class="form-control" rows="3" id="observacoes" name="observacoes" placeholder="Observações (avaliação global)"></textarea>
                        <br>
                        <input type="submit" value="Guardar" id="butSubmit" class="btn btn-block btn-primary" />
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
        include("Includes/footer.php");
    ?>
</body>

</html>