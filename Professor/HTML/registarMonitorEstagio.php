<?php
session_start();
?>

<html>

<head>
    <title>Registar Monitor de Estágio</title>
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
        function carregarEntidades() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("entidadesEstagio").innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "../BD/MonitoresEstagio/buscarEntidades.php", true);
            xhttp.send();
        }

        function divEscondido() {
            document.getElementById("nomeErro").style.visibility = "hidden";
            document.getElementById("contactoErro").style.visibility = "hidden";
            document.getElementById("emailErro").style.visibility = "hidden";
            document.getElementById("funcaoErro").style.visibility = "hidden";
            document.getElementById("entidadeErro").style.visibility = "hidden";

            document.getElementById("nomeErro").style.display = "none";
            document.getElementById("contactoErro").style.display = "none";
            document.getElementById("emailErro").style.display = "none";
            document.getElementById("funcaoErro").style.display = "none";
            document.getElementById("entidadeErro").style.display = "none";
        }

        function verificar() {
            var nome = document.getElementById("nome").value;
            var contacto = document.getElementById("contacto").value;
            var email = document.getElementById("email").value;
            var funcao = document.getElementById("funcao").value;
            var entidade = document.getElementById("entidadesEstagio").value;
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
            if (contacto == "") {
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
            if (funcao == "") {
                document.getElementById("funcaoErro").style.display = "block";
                document.getElementById("funcaoErro").style.visibility = "visible";
                podeInserir = false;
            } else {
                document.getElementById("funcaoErro").style.display = "none";
                document.getElementById("funcaoErro").style.visibility = "hidden";
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

            if (podeInserir == true) {
                inserir();
            }
        }

        function inserir() {
            var nome = document.getElementById("nome").value;
            var contacto = document.getElementById("contacto").value;
            var email = document.getElementById("email").value;
            var funcao = document.getElementById("funcao").value;
            var entidade = document.getElementById("entidadesEstagio").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 1)
                        window.location = "mostrarMonitorEstagioRegistados.php";
                    else
                        window.location = "../../ErrorPages/Error.html";
                }
            };
            xhttp.open("GET", "../BD/MonitoresEstagio/registarMonitoresEstagioInserir.php?nome=" + nome + "&contacto=" + contacto + "&email=" + email + "&funcao=" + funcao + "&entidade=" + entidade, true);
            xhttp.send();
        }
    </script>
    <!-- <style>
        #butSubmit {
            position: relative;
            -webkit-animation: myfirst 5s linear 2s infinite alternate;
            /* Safari 4.0 - 8.0 */
            animation: myfirst 5s linear 2s infinite alternate;
        }

        /* Safari 4.0 - 8.0 */
        @-webkit-keyframes myfirst {
            0% {
                background-color: red;
                left: 0px;
                top: 0px;
            }

            25% {
                background-color: yellow;
                left: 200px;
                top: 0px;
            }

            50% {
                background-color: blue;
                left: 200px;
                top: 200px;
            }

            75% {
                background-color: green;
                left: 0px;
                top: 200px;
            }

            100% {
                background-color: red;
                left: 0px;
                top: 0px;
            }
        }

        /* Standard syntax */
        @keyframes myfirst {
            0% {
                background-color: red;
                left: 0px;
                top: 0px;
            }

            25% {
                background-color: yellow;
                left: 200px;
                top: 0px;
            }

            50% {
                background-color: blue;
                left: 200px;
                top: 200px;
            }

            75% {
                background-color: green;
                left: 0px;
                top: 200px;
            }

            100% {
                background-color: red;
                left: 0px;
                top: 0px;
            }
        }
    </style> -->
</head>

<body onload="carregarEntidades(); divEscondido(); verifyUser()">
    <div class="container">
        <?php
        include("Includes/menuLogadoProfessor.php");
        ?>

        <br><br><br><br>
        <h1>Adicionar Monitor de Estágio</h1>
        <hr>
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-1">
                        <b class="mb-2">Nome: </b>
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
                        <b>Contacto: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <input type="text" maxlength="9" name="contacto" id="contacto" class="form-control" placeholder="Contacto">
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
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        <div id="emailErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-1">
                        <b>Função: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <input type="text" name="funcao" id="funcao" class="form-control" placeholder="Função">
                        <div id="funcaoErro"><i>Este campo é obrigatório.</i></div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <b>Entidade de Estágio: </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <select class="form-control" name="entidadesEstagio" id="entidadesEstagio">
                            <option disabled selected>---</option>
                        </select>
                        <div id="entidadeErro"><i>Este campo é obrigatório.</i></div>
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