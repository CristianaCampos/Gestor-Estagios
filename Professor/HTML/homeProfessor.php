<?php
session_start();
?>

<html>

<head>
    <title>Registar Estágio</title>
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

    <link rel="stylesheet" type="text/css" href="../../Inicio/index.css?v=2.2">

    <script>
        function instanceAll() {
            divEscondido();
            disabledSelect();
            carregarAnos();
            carregarEntidades();
            carregarProfessoresOrientadores();
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

        function divEscondido() {
            document.getElementById("anoErro").style.visibility = "hidden";
            document.getElementById("cursoErro").style.visibility = "hidden";
            document.getElementById("turmaErro").style.visibility = "hidden";
            document.getElementById("entidadeErro").style.visibility = "hidden";
            document.getElementById("alunoErro").style.visibility = "hidden";
            document.getElementById("monitorErro").style.visibility = "hidden";
            document.getElementById("duracaoErro").style.visibility = "hidden";
            document.getElementById("professorErro").style.visibility = "hidden";

            document.getElementById("anoErro").style.display = "none";
            document.getElementById("cursoErro").style.display = "none";
            document.getElementById("turmaErro").style.display = "none";
            document.getElementById("entidadeErro").style.display = "none";
            document.getElementById("alunoErro").style.display = "none";
            document.getElementById("monitorErro").style.display = "none";
            document.getElementById("duracaoErro").style.display = "none";
            document.getElementById("professorErro").style.display = "none";
        }

        function verificar() {
            var ano = document.getElementById("ano").value;
            var curso = document.getElementById("curso").value;
            var turma = document.getElementById("turma").value;
            var entidade = document.getElementById("entidadesEstagio").value;
            var aluno = document.getElementById("aluno").value;
            var monitor = document.getElementById("monitor").value;
            var duracao = document.getElementById("duracao").value;
            var professor = document.getElementById("professorOrientador").value;
            var podeInserir = true;

            if (ano == "---") {
                document.getElementById("anoErro").style.display = "block";
                document.getElementById("anoErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("anoErro").style.display = "none";
                document.getElementById("anoErro").style.visibility = "hidden";
                podeInserir = true;
            }
            if (curso == "---") {
                document.getElementById("cursoErro").style.display = "block";
                document.getElementById("cursoErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("cursoErro").style.display = "none";
                document.getElementById("cursoErro").style.visibility = "hidden";
                podeInserir = true;
            }
            if (turma == "---") {
                document.getElementById("turmaErro").style.display = "block";
                document.getElementById("turmaErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("turmaErro").style.display = "none";
                document.getElementById("turmaErro").style.visibility = "hidden";
                podeInserir = true;
            }
            if (entidade == "---") {
                document.getElementById("entidadeErro").style.display = "block";
                document.getElementById("entidadeErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("entidadeErro").style.display = "none";
                document.getElementById("entidadeErro").style.visibility = "hidden";
                podeInserir = true;
            }
            if (aluno == "---") {
                document.getElementById("alunoErro").style.display = "block";
                document.getElementById("alunoErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("alunoErro").style.display = "none";
                document.getElementById("alunoErro").style.visibility = "hidden";
                podeInserir = true;
            }
            if (monitor == "---") {
                document.getElementById("monitorErro").style.display = "block";
                document.getElementById("monitorErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("monitorErro").style.display = "none";
                document.getElementById("monitorErro").style.visibility = "hidden";
                podeInserir = true;
            }
            if (duracao == "") {
                document.getElementById("duracaoErro").style.display = "block";
                document.getElementById("duracaoErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("duracaoErro").style.display = "none";
                document.getElementById("duracaoErro").style.visibility = "hidden";
                podeInserir = true;
            }
            if (professor == "---") {
                document.getElementById("professorErro").style.display = "block";
                document.getElementById("professorErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("professorErro").style.display = "none";
                document.getElementById("professorErro").style.visibility = "hidden";
                podeInserir = true;
            }

            if (podeInserir == true) {
                inserir();
            }
        }

        function carregarMonitores() {
            var entidade = document.getElementById("entidadesEstagio").value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("monitor").innerHTML = "<option disabled selected>---</option>";
                    document.getElementById("monitor").innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "../BD/Estagios/buscarMonitores.php?entidade=" + entidade, true);
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
            xhttp.open("GET", "../BD/Estagios/buscarCursos.php?ano=" + ano, true);
            xhttp.send();
        }

        function carregarTurmas() {
            var curso = document.getElementById("curso").value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("turma").innerHTML = "<option disabled selected>---</option>";
                    document.getElementById("turma").innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "../BD/Estagios/buscarTurmas.php?curso=" + curso, true);
            xhttp.send();
        }

        function carregarAlunos() {
            var turma = document.getElementById("turma").value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("aluno").innerHTML = "<option disabled selected>---</option>";
                    document.getElementById("aluno").innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "../BD/Estagios/buscarAlunos.php?turma=" + turma, true);
            xhttp.send();
        }

        function carregarProfessoresOrientadores() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("professorOrientador").innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "../BD/Estagios/buscarProfessoresOrientadores.php", true);
            xhttp.send();
        }

        function carregarEntidades() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("entidadesEstagio").innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "../BD/Estagios/buscarEntidades.php", true);
            xhttp.send();
        }

        function carregarNome() {
            var nomeAluno = document.getElementById("aluno").value;
            document.getElementById('formando').value = nomeAluno;
        }

        function disabledSelect() {
            document.getElementById("curso").disabled = true;
            document.getElementById("turma").disabled = true;
            document.getElementById("aluno").disabled = true;
            document.getElementById("monitor").disabled = true;
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

        function notDisabledMonitor() {
            document.getElementById("monitor").disabled = false;
        }

        function inserir() {
            var aluno = document.getElementById("aluno").value;
            var entidade = document.getElementById("entidadesEstagio").value;
            var professor = document.getElementById("professorOrientador").value;
            var monitor = document.getElementById("monitor").value;
            var duracao = document.getElementById("duracao").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 1) {
                        window.location = "mostrarEstagiosRegistados.php";
                    } else
                        window.location = "../../ErrorPages/Error.html";
                }
            };
            xhttp.open("GET", "../BD/Estagios/inserirDados.php?formando=" + aluno + "&entidadesEstagio=" + entidade + "&professorOrientador=" + professor + "&monitor=" + monitor + "&duracao=" + duracao, true);
            xhttp.send();
        }
    </script>

</head>

<body onload="instanceAll(); verifyUser()">
    <div class="container">
        <?php
        include("Includes/menuLogadoProfessor.php");
        ?>

        <br><br><br><br>
        <h1>Adicionar Estágio do Aluno</h1>
        <hr>
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-2">
                        <b class="mb-2">Ano Letivo: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <select id="ano" name="ano" class="form-control" onchange="carregarCursos(); notDisabledCurso()">
                            <option disabled selected>---</option>
                        </select>
                        <div id="anoErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-1">
                        <b class="mb-2">Formando: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <input type="text" name="formando" readonly id="formando" class="form-control" placeholder="Formando">
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-2">
                        <b>Curso do Aluno: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <select id="curso" name="curso" onchange="carregarTurmas(); notDisabledTurma()" class="form-control">
                            <option disabled selected>---</option>
                        </select>
                        <div id="cursoErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-2">
                        <b class="mb-2">Entidade de Estágio: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <select id="entidadesEstagio" onchange="notDisabledMonitor(); carregarMonitores()" name="entidadesEstagio" class="form-control">
                            <option disabled selected>---</option>
                        </select>
                        <div id="entidadeErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-2">
                        <b class="mb-2">Turma do Aluno: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <select id="turma" name="turma" onchange="carregarAlunos(); notDisabledAluno()" class="form-control">
                            <option disabled selected>---</option>
                        </select>
                        <div id="turmaErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-2">
                        <b class="mb-2">Monitor de Estágio: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <select id="monitor" name="monitor" class="form-control">
                            <option disabled selected>---</option>
                        </select>
                        <div id="monitorErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-1">
                        <b class="mb-2">Aluno: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <select id="aluno" name="aluno" onchange="carregarNome()" class="form-control">
                            <option disabled selected>---</option>
                        </select>
                        <div id="alunoErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-2">
                        <b class="mb-2">Professor Orientador: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <select id="professorOrientador" name="professorOrientador" class="form-control">
                            <option disabled selected>---</option>
                        </select>
                        <div id="professorErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-2">
                        <b class="mb-2">Duração do Estágio: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <input type="text" name="duracao" id="duracao" class="form-control" placeholder="Duração do Estágio">
                        <div id="duracaoErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <div class="d-flex justify-content-end">
                            <input type="submit" value="Guardar" id="butSubmit" class="btn btn-block w-25 btn-primary" onclick="verificar()" />
                        </div>
                        <br>
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