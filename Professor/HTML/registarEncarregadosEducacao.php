<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registar Encarregados de Educação</title>
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

    <link rel="stylesheet" type="text/css" href="../../Inicio/index.css?v=1.2">

    <script>
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
            xhttp.open("GET", "../BD/EncarregadosEducacao/buscarTurmas.php?curso=" + curso, true);
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
            xhttp.open("GET", "../BD/EncarregadosEducacao/buscarAlunos.php?turma=" + turma, true);
            xhttp.send();
        }

        function divEscondido() {
            document.getElementById("nomeErro").style.visibility = "hidden";
            document.getElementById("moradaErro").style.visibility = "hidden";
            document.getElementById("localidadeErro").style.visibility = "hidden";
            document.getElementById("contactoErro").style.visibility = "hidden";
            document.getElementById("emailErro").style.visibility = "hidden";
            document.getElementById("anoErro").style.visibility = "hidden";
            document.getElementById("cursoErro").style.visibility = "hidden";
            document.getElementById("turmaErro").style.visibility = "hidden";
            document.getElementById("alunoErro").style.visibility = "hidden";

            document.getElementById("nomeErro").style.display = "none";
            document.getElementById("moradaErro").style.display = "none";
            document.getElementById("localidadeErro").style.display = "none";
            document.getElementById("contactoErro").style.display = "none";
            document.getElementById("emailErro").style.display = "none";
            document.getElementById("anoErro").style.display = "none";
            document.getElementById("cursoErro").style.display = "none";
            document.getElementById("turmaErro").style.display = "none";
            document.getElementById("alunoErro").style.display = "none";
        }

        function verificar() {
            var nome = document.getElementById("nome").value;
            var morada = document.getElementById("morada").value;
            var localidade = document.getElementById("localidade").value;
            var telefone = document.getElementById("telefone").value;
            var email = document.getElementById("email").value;
            var ano = document.getElementById("ano").value;
            var curso = document.getElementById("curso").value;
            var turma = document.getElementById("turma").value;
            var aluno = document.getElementById("aluno").value;
            var podeInserir = true;

            if (nome == "") {
                document.getElementById("nomeErro").style.display = "block";
                document.getElementById("nomeErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("nomeErro").style.display = "none";
                document.getElementById("nomeErro").style.visibility = "hidden";
                podeInserir = true;
            }
            if (morada == "") {
                document.getElementById("moradaErro").style.display = "block";
                document.getElementById("moradaErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("moradaErro").style.display = "none";
                document.getElementById("moradaErro").style.visibility = "hidden";
                podeInserir = true;
            }
            if (localidade == "") {
                document.getElementById("localidadeErro").style.display = "block";
                document.getElementById("localidadeErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("localidadeErro").style.display = "none";
                document.getElementById("localidadeErro").style.visibility = "hidden";
                podeInserir = true;
            }
            if (telefone == "") {
                document.getElementById("contactoErro").style.display = "block";
                document.getElementById("contactoErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("contactoErro").style.display = "none";
                document.getElementById("contactoErro").style.visibility = "hidden";
                podeInserir = true;
            }
            if (email == "") {
                document.getElementById("emailErro").style.display = "block";
                document.getElementById("emailErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("emailErro").style.display = "none";
                document.getElementById("emailErro").style.visibility = "hidden";
                podeInserir = true;
            }
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
            if (aluno == "---") {
                document.getElementById("alunoErro").style.display = "block";
                document.getElementById("alunoErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("alunoErro").style.display = "none";
                document.getElementById("alunoErro").style.visibility = "hidden";
                podeInserir = true;
            }

            if (podeInserir == true) {
                inserir();
            }
        }

        function inserir() {
            var nome = document.getElementById("nome").value;
            var morada = document.getElementById("morada").value;
            var localidade = document.getElementById("localidade").value;
            var telefone = document.getElementById("telefone").value;
            var email = document.getElementById("email").value;
            var aluno = document.getElementById("aluno").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 1) {
                        window.location = "mostrarEERegistados.php";
                    } else
                        window.location = "../../ErrorPages/Error.html";
                }
            };
            xhttp.open("GET", "../BD/EncarregadosEducacao/registarEEInserir.php?nome=" + nome + "&morada=" + morada + "&localidade=" + localidade + "&telefone=" + telefone + "&email=" + email + "&aluno=" + aluno, true);
            xhttp.send();
        }

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
    </script>
</head>

<body onload="disabledSelect(); carregarAnos(); divEscondido(); verifyUser()">
    <div class="container-fluid">
        <?php
        include("Includes/menuLogadoProfessor.php");
        ?>
    </div>
    <div class="container">
        <br><br><br><br>
        <h1>Adicionar Encarregado de Educação</h1>
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
                        <select id="ano" class="form-control" onchange="carregarCursos(); notDisabledCurso()">
                            <option disabled selected>---</option>
                        </select>
                        <div id="anoErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-1">
                        <b class="mb-2">Nome: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <input type="text" id="nome" class="form-control" placeholder="Nome">
                        <div id="nomeErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-2">
                        <b class="mb-2">Curso do Aluno: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <select id="curso" class="form-control" onchange="carregarTurmas(); notDisabledTurma()">
                            <option disabled selected>---</option>
                        </select>
                        <div id="cursoErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-1">
                        <b class="mb-2">Morada: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <input type="text" id="morada" class="form-control" placeholder="Morada">
                        <div id="moradaErro"><i>Este campo é obrigatório.</i></div>
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
                        <select id="turma" class="form-control" onchange="carregarAlunos(); notDisabledAluno()">
                            <option disabled selected>---</option>
                        </select>
                        <div id="turmaErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-2">
                        <b class="mb-2">Localidade: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <input type="text" id="localidade" class="form-control" placeholder="Localidade">
                        <div id="localidadeErro"><i>Este campo é obrigatório.</i></div>
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
                        <select id="aluno" class="form-control">
                            <option disabled selected>---</option>
                        </select>
                        <div id="alunoErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-1">
                        <b>Contacto: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <input type="text" maxlength="9" id="telefone" class="form-control" placeholder="Contacto">
                        <div id="contactoErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-1">
                        <b>Email: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <input class="form-control" id="email" type="email" placeholder="Email">
                        <div id="emailErro"><i>Este campo é obrigatório.</i></div>
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