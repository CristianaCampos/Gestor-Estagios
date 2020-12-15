<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registar Alunos</title>
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

    <link rel="stylesheet" type="text/css" href="../../Inicio/index.css?v=1.1">

    <script>
        function carregarTurmas() {
            var anoLetivo = document.getElementById("ano").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("turma").innerHTML = "<option disabled selected>---</option>";
                    document.getElementById("turma").innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "../BD/Alunos/buscarTurmas.php?ano=" + anoLetivo, true);
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

        function divEscondido() {
            document.getElementById("nomeErro").style.visibility = "hidden";
            document.getElementById("turmaErro").style.visibility = "hidden";
            document.getElementById("codigoErro").style.visibility = "hidden";
            document.getElementById("dataErro").style.visibility = "hidden";
            document.getElementById("moradaErro").style.visibility = "hidden";
            document.getElementById("localidadeErro").style.visibility = "hidden";
            document.getElementById("emailErro").style.visibility = "hidden";
            document.getElementById("ccErro").style.visibility = "hidden";
            document.getElementById("contactoErro").style.visibility = "hidden";

            document.getElementById("nomeErro").style.display = "none";
            document.getElementById("turmaErro").style.display = "none";
            document.getElementById("codigoErro").style.display = "none";
            document.getElementById("dataErro").style.display = "none";
            document.getElementById("moradaErro").style.display = "none";
            document.getElementById("localidadeErro").style.display = "none";
            document.getElementById("emailErro").style.display = "none";
            document.getElementById("ccErro").style.display = "none";
            document.getElementById("contactoErro").style.display = "none";
        }

        function verificar() {
            var nome = document.getElementById("nome").value;
            var turma = document.getElementById("turma").value;
            var codigo = document.getElementById("codigo").value;
            var data = document.getElementById("dataNascimento").value;
            var morada = document.getElementById("morada").value;
            var localidade = document.getElementById("localidade").value;
            var email = document.getElementById("email").value;
            var cc = document.getElementById("cc").value;
            var contacto = document.getElementById("telefone").value;
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
            if (turma == "---") {
                document.getElementById("turmaErro").style.display = "block";
                document.getElementById("turmaErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("turmaErro").style.display = "none";
                document.getElementById("turmaErro").style.visibility = "hidden";
                podeInserir = true;
            }
            if (codigo == "a") {
                document.getElementById("codigoErro").style.display = "block";
                document.getElementById("codigoErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("codigoErro").style.display = "none";
                document.getElementById("codigoErro").style.visibility = "hidden";
                podeInserir = true;
            }
            if (data == "") {
                document.getElementById("dataErro").style.display = "block";
                document.getElementById("dataErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("dataErro").style.display = "none";
                document.getElementById("dataErro").style.visibility = "hidden";
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
            if (email == "") {
                document.getElementById("emailErro").style.display = "block";
                document.getElementById("emailErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("emailErro").style.display = "none";
                document.getElementById("emailErro").style.visibility = "hidden";
                podeInserir = true;
            }
            if (cc == "") {
                document.getElementById("ccErro").style.display = "block";
                document.getElementById("ccErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("ccErro").style.display = "none";
                document.getElementById("ccErro").style.visibility = "hidden";
                podeInserir = true;
            }
            if (contacto == "") {
                document.getElementById("contactoErro").style.display = "block";
                document.getElementById("contactoErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("contactoErro").style.display = "none";
                document.getElementById("contactoErro").style.visibility = "hidden";
                podeInserir = true;
            }

            if (podeInserir == true) {
                inserir();
            }
        }

        function inserir() {
            var nome = document.getElementById("nome").value;
            var turma = document.getElementById("turma").value;
            var codigo = document.getElementById("codigo").value;
            var data = document.getElementById("dataNascimento").value;
            var morada = document.getElementById("morada").value;
            var localidade = document.getElementById("localidade").value;
            var email = document.getElementById("email").value;
            var cc = document.getElementById("cc").value;
            var contacto = document.getElementById("telefone").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 1)
                        window.location = "mostrarAlunosRegistados.php";
                    else
                        window.location = "../../ErrorPages/Error.html";
                }
            };
            xhttp.open("GET", "../BD/Alunos/registarAlunosInserir.php?nome=" + nome + "&turma=" + turma + "&codigo=" + codigo + "&data=" + data + "&morada=" + morada + "&localidade=" + localidade + "&email=" + email + "&cc=" + cc + "&contacto=" + contacto, true);
            xhttp.send();
        }

        function disabledInputs() {
            document.getElementById("nome").disabled = true;
            document.getElementById("turma").disabled = true;
            document.getElementById("codigo").disabled = true;
            document.getElementById("dataNascimento").disabled = true;
            document.getElementById("morada").disabled = true;
            document.getElementById("localidade").disabled = true;
            document.getElementById("email").disabled = true;
            document.getElementById("cc").disabled = true;
            document.getElementById("telefone").disabled = true;
        }

        function notDisabledInputs() {
            document.getElementById("nome").disabled = false;
            document.getElementById("turma").disabled = false;
            document.getElementById("codigo").disabled = false;
            document.getElementById("dataNascimento").disabled = false;
            document.getElementById("morada").disabled = false;
            document.getElementById("localidade").disabled = false;
            document.getElementById("email").disabled = false;
            document.getElementById("cc").disabled = false;
            document.getElementById("telefone").disabled = false;
        }
    </script>
</head>

<body onload="disabledInputs(); carregarAnos(); divEscondido(); verifyUser()">
    <div class="container">
        <?php
        include("Includes/menuLogadoProfessor.php");
        ?>

        <br><br><br><br>

        <h1>Adicionar Aluno</h1>
        <hr>
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-2">
                        <b>Ano Letivo: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <select id="ano" name="ano" class="form-control" onchange="carregarTurmas(); notDisabledInputs()">
                            <option disabled selected>---</option>
                        </select>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-1">
                        <b>Nome: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
                        <div id="nomeErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-1">
                        <b>Turma: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <select id="turma" name="turma" class="form-control">
                            <option disabled selected>---</option>
                        </select>
                        <div id="turmaErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-2">
                        <b>Código do Aluno: </b>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <input type="text" maxlength="10" name="codigo" value="a" id="codigo" class="form-control" placeholder="Código do Aluno">
                        <div id="codigoErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-2">
                        <b>Data de Nascimento: </b>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <input class="form-control" name="dataNascimento" style="padding-right: 0;" type="date" id="dataNascimento">
                        <div id="dataErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-1">
                        <b>Morada: </b>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <input type="text" name="morada" id="morada" class="form-control" placeholder="Morada">
                        <div id="moradaErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-1">
                        <b>Localidade: </b>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <input type="text" name="localidade" id="localidade" class="form-control" placeholder="Localidade">
                        <div id="localidadeErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-1">
                        <b>Email: </b>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        <div id="emailErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-2">
                        <b>Cartão de Cidadão: </b>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <input type="text" maxlength="13" name="cc" id="cc" class="form-control" placeholder="Cartão de Cidadão">
                        <div id="ccErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-1">
                        <b>Contacto: </b>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <input type="text" maxlength="9" name="telefone" id="telefone" class="form-control" placeholder="Contacto">
                        <div id="contactoErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <div class="d-flex justify-content-end">
                            <input type="submit" value="Guardar" id="butSubmit" class="btn btn-block w-25 btn-primary" onclick="verificar()" />
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