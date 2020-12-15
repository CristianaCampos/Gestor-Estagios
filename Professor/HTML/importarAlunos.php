<?php
session_start();
?>

<html>

<head>
    <title>Importar Alunos</title>
    <link rel="icon" href="../../Imagens/iconEstagio.ico">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!-- titulos -->
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <!-- corpo -->
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../../Inicio/index.css?v=1.2">

    <script>
        function disabledDe() {
            document.getElementById("turmaDe").disabled = false;
        }

        function disabledPara() {
            document.getElementById("turmaPara").disabled = false;
        }

        function carregarAnos() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("anoDe").innerHTML += this.responseText;
                    document.getElementById("anoPara").innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "../BD/Alunos/buscarAnoLetivo.php", true);
            xhttp.send();
        }

        function carregarTurmasDe() {
            var anoLetivo = document.getElementById("anoDe").value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("turmaDe").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../BD/Alunos/buscarTurmas.php?ano=" + anoLetivo, true);
            xhttp.send();
        }

        function carregarTurmasPara() {
            var anoLetivo = document.getElementById("anoPara").value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("turmaPara").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../BD/Alunos/buscarTurmas.php?ano=" + anoLetivo, true);
            xhttp.send();
        }

        function divEscondido() {
            document.getElementById("anoDeErro").style.visibility = "hidden";
            document.getElementById("anoParaErro").style.visibility = "hidden";
            document.getElementById("turmaDeErro").style.visibility = "hidden";
            document.getElementById("turmaParaErro").style.visibility = "hidden";

            document.getElementById("anoDeErro").style.display = "none";
            document.getElementById("anoParaErro").style.display = "none";
            document.getElementById("turmaDeErro").style.display = "none";
            document.getElementById("turmaParaErro").style.display = "none";
        }

        function verificar() {
            var anoDe = document.getElementById("anoDe").value;
            var anoPara = document.getElementById("anoPara").value;
            var turmaDe = document.getElementById("turmaDe").value;
            var turmaPara = document.getElementById("turmaPara").value;

            var podeInserir = true;

            if (anoDe == "---") {
                document.getElementById("anoDeErro").style.display = "block";
                document.getElementById("anoDeErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("anoDeErro").style.display = "none";
                document.getElementById("anoDeErro").style.visibility = "hidden";
                podeInserir = true;
            }
            if (anoPara == "---") {
                document.getElementById("anoParaErro").style.display = "block";
                document.getElementById("anoParaErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("anoParaErro").style.display = "none";
                document.getElementById("anoParaErro").style.visibility = "hidden";
                podeInserir = true;
            }
            if (turmaDe == "---") {
                document.getElementById("turmaDeErro").style.display = "block";
                document.getElementById("turmaDeErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("turmaDeErro").style.display = "none";
                document.getElementById("turmaDeErro").style.visibility = "hidden";
                podeInserir = true;
            }
            if (turmaPara == "---") {
                document.getElementById("turmaParaErro").style.display = "block";
                document.getElementById("turmaParaErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("turmaParaErro").style.display = "none";
                document.getElementById("turmaParaErro").style.visibility = "hidden";
                podeInserir = true;
            }

            if (podeInserir == true) {
                inserir();
            }
        }

        function inserir() {
            var anoDe = document.getElementById("anoDe").value;
            var anoPara = document.getElementById("anoPara").value;
            var turmaDe = document.getElementById("turmaDe").value;
            var turmaPara = document.getElementById("turmaPara").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 1)
                        window.location = "mostrarAlunosRegistados.php";
                    else if (this.responseText == 0)
                        window.location = "../../ErrorPages/Error.html";

                }
            };
            xhttp.open("GET", "../BD/Turmas/importarAlunosInserir.php?anoDe=" + anoDe + "&anoPara=" + anoPara + "&turmaDe=" + turmaDe + "&turmaPara=" + turmaPara, true);
            xhttp.send();
        }
    </script>
</head>

<body onload="carregarAnos(); divEscondido(); verifyUser()">
    <div class="container">
        <?php
        include("Includes/menuLogadoProfessor.php");
        ?>

        <br><br><br><br>

        <h1>Importar Alunos</h1>

        <hr>
        <br>
        <div class="row mt-2">
            <div class="col-md-6 mt-2">
                <div class="d-flex justify-content-center">
                    <div class="card shadow w-75">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Importar de: </h4>
                            </div>
                            <hr style="background-color: white">
                            <div class="row">
                                <div class="col-xl-4">
                                    <p class="d-flex justify-content-start mt-2">Ano Letivo:</p>
                                </div>
                                <div class="col-xl">
                                    <select id="anoDe" name="anoDe" class="form-control" onchange="disabledDe(); carregarTurmasDe()">
                                        <option disabled selected>---</option>
                                    </select>
                                    <div id="anoDeErro"><i>Este campo é obrigatório.</i></div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xl-4">
                                    <p class="d-flex justify-content-start mt-2">Turma:</p>
                                </div>
                                <div class="col-xl">
                                    <select disabled id="turmaDe" name="turmaDe" class="form-control">
                                        <option disabled selected>---</option>
                                    </select>
                                    <div id="turmaDeErro"><i>Este campo é obrigatório.</i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="d-flex justify-content-center">
                    <div class="card shadow w-75">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Importar para: </h4>
                            </div>
                            <hr style="background-color: white">
                            <div class="row">
                                <div class="col-xl-4">
                                    <p class="d-flex justify-content-start mt-2">Ano Letivo:</p>
                                </div>
                                <div class="col-xl">
                                    <select id="anoPara" name="anoPara" class="form-control" onchange="disabledPara(); carregarTurmasPara()">
                                        <option disabled selected>---</option>
                                    </select>
                                    <div id="anoParaErro"><i>Este campo é obrigatório.</i></div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xl-4">
                                    <p class="d-flex justify-content-start mt-2">Turma:</p>
                                </div>
                                <div class="col-xl">
                                    <select disabled id="turmaPara" name="turmaPara" class="form-control">
                                        <option disabled selected>---</option>
                                    </select>
                                    <div id="turmaParaErro"><i>Este campo é obrigatório.</i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <div class="float-right">
                    <input type="submit" value="Guardar" id="butSubmit" class="btn btn-block btn-primary" onclick="verificar()" />
                </div>
            </div>
        </div>
    </div>
    <?php
        include("Includes/footer.php");
    ?>
</body>

</html>