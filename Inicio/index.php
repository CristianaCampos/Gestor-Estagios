<?php
session_start();
?>

<html>

<head>
    <title>Iniciar Sessão</title>
    <link rel="icon" href="../Imagens/iconEstagio.ico">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!-- titulos -->
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <!-- corpo -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="login.css?v=1.7">
    <link rel="stylesheet" type="text/css" href="index.css?v=1.6">

    <script>
        function hideError() {
            document.getElementById("error").style.visibility = "hidden";
            document.getElementById("error").style.display = "none";
            document.getElementById("error").innerHTML = "";
        }

        function showError(errorType) {

            document.getElementById("error").style.visibility = "visible";
            document.getElementById("error").style.display = "block";

            if (errorType == "username") {
                //alert(errorType);
                document.getElementById("error").innerHTML = "<i>Código de aluno não encontrado!</i>";
            } else if (errorType == "password") {
                //alert(errorType);
                document.getElementById("error").innerHTML = "<i>A password parece estar errada!</i>";
            }

        }

        function complete() {
            var utilizador = document.getElementById("utilizador").value;
            var pass = document.getElementById("pass").value;
            var butSubmit = document.getElementById("butSubmit");

            if ((utilizador != "") && (pass != ""))
                butSubmit.disabled = false;
            else
                butSubmit.disabled = true;
        }

        function login() {
            hideError();
            var utilizador = document.getElementById("utilizador").value;
            var pass = document.getElementById("pass").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == "userNameError") {
                        showError("username");
                    } else if (this.responseText == "passwordError") {
                        showError("password");
                    } else {
                        if (this.responseText == "professor") {
                            window.location = "../Professor/HTML/mostrarEstagiosRegistados.php";
                        } else {
                            window.location = "../Aluno/HTML/homeAluno.php"
                        }
                    }
                }
            };
            xhttp.open("GET", "BD/login.php?utilizador=" + utilizador + "&pass=" + pass, true);
            xhttp.send();
        }

        function verify_session() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {   
                    if (this.responseText == "professor") {
                        window.location = "../Professor/HTML/mostrarEstagiosRegistados.php";
                    } else if (this.responseText == "aluno") {
                        window.location = "../Aluno/HTML/homeAluno.php"
                    }
                }
            };
            xhttp.open("GET", "BD/verifySession.php", true);
            xhttp.send();
        }
    </script>
</head>

<body onload="verify_session(); hideError();">
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="../Imagens/user-icon-round1.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form-container">
                    <form>
                        <br><br>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" id="utilizador" name="utilizador" class="form-control input_user" placeholder="Nome de Utilizador">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" id="pass" name="pass" class="form-control input_pass" placeholder="Password" onkeyup="complete()" onchange="complete()">
                        </div>
                        <div id="error"></div>
                        <!-- <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" checked class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Lembrar-me</label>
                            </div>
                        </div> -->
                </div>
                <div class="d-flex justify-content-center mt-2 login_container">
                    <button type="button" onclick="login()" disabled id="butSubmit" class="btn login_btn">Iniciar Sessão</button>
                </div>
                </form>
                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        Não tens conta? <a href="createAccount.html" class="ml-2">Registar Conta</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>