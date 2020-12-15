<?php
session_start();
?>

<html>

<head>
    <title>Consultar Autoavaliação</title>
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

    <link rel="stylesheet" type="text/css" href="../../Inicio/index.css?v=1.4">
    <script>
        function disabledSelect() {
            document.getElementById("curso").disabled = true;
            document.getElementById("turma").disabled = true;
            document.getElementById("aluno").disabled = true;
        }

        function notDisabledCurso() {
            document.getElementById("curso").disabled = false;
        }

        function notDisabledTurma() {
            document.getElementById("turma").disabled = false;
        }

        function notDisabledAluno() {
            document.getElementById("aluno").disabled = false;
        }

        function cenasHidden() {
            hideTable();
        }

        function hideTable() {
            document.getElementById("tabela").style.display = "none";
            document.getElementById("tabela").style.visibility = "hidden";
        }

        function showTable() {
            document.getElementById("tabela").style.display = "block";
            document.getElementById("tabela").style.visibility = "visible";
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

        function carregarCursos() {
            var ano = document.getElementById("ano").value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("curso").innerHTML = "<option disabled selected>---</option>";
                    document.getElementById("curso").innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "../BD/EncarregadosEducacao/buscarCursos.php?ano=" + ano, true);
            xhttp.send();
            hideTable();
        }

        function carregarTurmas() {
            cenasHidden();
            var curso = document.getElementById("curso").value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("turma").innerHTML = "<option disabled selected>---</option>";
                    document.getElementById("turma").innerHTML += this.responseText;
                    document.getElementById("turmaTexto").style.visibility = "visible";
                    document.getElementById("turma").style.visibility = "visible";
                    document.getElementById("aluno").innerHTML = "<option disabled selected>---</option>";
                }
            };
            xhttp.open("GET", "../BD/AvaliacaoFinal/buscarTurmas.php?curso=" + curso, true);
            xhttp.send();
            hideTable();
        }

        function carregarAlunos() {
            hideTable();
            document.getElementById("aluno").innerHTML = "<option disabled selected>---</option>";
            var turma = document.getElementById("turma").value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("aluno").innerHTML += this.responseText;
                    document.getElementById("alunoTexto").style.visibility = "visible";
                    document.getElementById("aluno").style.visibility = "visible";
                }
            };
            xhttp.open("GET", "../BD/AvaliacaoFinal/buscarAlunos.php?turma=" + turma, true);
            xhttp.send();
        }

        function carregarCoisas() {
            fillAutoAvaliacaoInputs();
        }

        function hideWarningMessage() {
            document.getElementById("hasNoAutoAvaliacao").style.display = "none";
            document.getElementById("hasNoAutoAvaliacao").style.visibility = "hidden";
        }

        function showWarningMessage() {
            document.getElementById("hasNoAutoAvaliacao").style.display = "block";
            document.getElementById("hasNoAutoAvaliacao").style.visibility = "visible";
        }

        function fillAutoAvaliacaoInputs() {
            var aluno = document.getElementById("aluno").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText != "") {
                        hideWarningMessage();
                        showTable();
                        document.getElementById("tabela").innerHTML = this.responseText;
                    } else {
                        hideTable();
                        showWarningMessage();
                    }
                }
            };
            xhttp.open("GET", "../BD/AutoAvaliacao/mostrarAutoAvaliacoes.php?aluno=" + aluno, true);
            xhttp.send();
        }
    </script>
</head>

<body onload="carregarAnos(); cenasHidden(); verifyUser(); disabledSelect(); hideWarningMessage()">
    <div class="container">
        <?php
        include("Includes/menuLogadoProfessor.php");
        ?>

        <br><br><br><br>
        <div class="row">
            <div class="col">
                <h1>Consultar Autoavaliações dos Alunos</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="float-left">
                    <b>Ano Letivo: </b>
                    <br>
                </div>
                <select id="ano" name="ano" class="form-control" onchange="carregarCursos(); notDisabledCurso()">
                    <option disabled selected>---</option>
                </select>
                <br>
                <div class="float-left">
                    <b>Curso do Aluno: </b>
                    <br>
                </div>
                <select id="curso" name="curso" class="form-control" onchange="carregarTurmas(); notDisabledTurma()">
                    <option disabled selected>---</option>
                </select>
                <br>
                <div id="turmaTexto" class="float-left">
                    <b>Turma do Aluno: </b>
                    <br>
                </div>
                <select id="turma" name="turma" class="form-control" onchange="carregarAlunos(); notDisabledAluno()">
                    <option disabled selected>---</option>
                </select>
                <br>
                <div id="alunoTexto" class="float-left">
                    <b>Aluno: </b>
                    <br>
                </div>
                <select id="aluno" name="aluno" class="form-control" onchange="carregarCoisas()">
                    <option disabled selected>---</option>
                </select>
                <p><i>(apenas os alunos com estágios associados estão a ser carregados)</i></p>
                <br>
            </div>
            <div class="col-lg-8">
                <div id="tabela">
                </div>
                <div id="hasNoAutoAvaliacao">
                    <br>
                    <div class="card mx-auto w-75" style="background-color: tomato;">
                        <div style="margin-top: -2px;" class="card-body">
                            <h3><i class="fas fa-exclamation-triangle"></i> Este aluno ainda não efetuou a sua Autoavaliação.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include("Includes/footer.php");
    ?>
</body>

</html>