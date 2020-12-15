<?php
session_start();
?>

<html>

<head>
    <title>Plano Individual de Estágio</title>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../Inicio/index.css?v=1.3">

    <script>
        //Carrega todos as funções para carregar os dados do plano individual do aluno
        function carregarTudo() {
            esconderDiv();
            verificarAluno();
        }

        //Esconde os divs que mostram se o aluno tem ou não estágio atribuido
        function esconderDiv() {
            document.getElementById("hasEstagio").visibility = "hidden";
            document.getElementById("hasNoEstagio").visibility = "hidden";
            document.getElementById("hasEstagio").style.display = "none";
            document.getElementById("hasNoEstagio").style.display = "none";
        }

        //Carrega o card com o plano individual de estágio do aluno
        function mostrarHasAluno() {
            dadoFormando();
            dadoEntidade();
            dadoDuracao();
            dadoProfessor();
            document.getElementById("hasEstagio").visibility = "visible";
            document.getElementById("hasEstagio").style.display = "block";
        }

        //Mostra a mensagem a avisar que o aluno não tem estágio atribuido
        function mostrarHasNoAluno() {
            document.getElementById("hasNoEstagio").visibility = "visible";
            document.getElementById("hasNoEstagio").style.display = "block";
        }

        function verificarAluno() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 1) {
                        mostrarHasAluno();
                    } else {
                        mostrarHasNoAluno();
                    }
                }
            };
            xhttp.open("GET", "../BD/Aluno/verificarAluno.php", true);
            xhttp.send();
        }

        function dadoFormando() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("formando").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../BD/dadosEstagioAluno.php?dado=formando", true);
            xhttp.send();
        }

        function dadoEntidade() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("entidade").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../BD/dadosEstagioAluno.php?dado=entidadeEstagio", true);
            xhttp.send();
        }

        function dadoDuracao() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("duracao").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../BD/dadosEstagioAluno.php?dado=horas", true);
            xhttp.send();
        }

        function dadoProfessor() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("professor").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../BD/dadosEstagioAluno.php?dado=professorAcompanhante", true);
            xhttp.send();
        }
    </script>
</head>

<body onload="carregarTudo()">
    <div class="container">
        <?php
        include("Includes/menuLogadoAluno.php");
        ?>
        <br><br><br><br>
        <!-- <h2 class="text-center"></h2> -->

        <div id="hasEstagio">
            <div class="card mx-auto w-50" style="color: black; background-color: #E6E6FA">
                <br>
                <h3 class="card-head text-center">Plano Individual de Estágio</h3>
                <hr class="mx-auto w-75">
                <div style="margin-top: -2px;" class="card-body">
                    <p class="text-center"><b>FORMANDO:</b>
                        <i id="formando">Formando</i></p>
                    <p class="text-center"><b>ENTIDADE ENQUADRADORA:</b>
                        <i id="entidade">Entidade Enquadradora</i></p>
                    <hr class="mx-auto w-50">
                    <p class="text-center"><b>Duração do Estágio:</b>
                        <i id="duracao">Duração do Estágio</i></p>
                    <p class="text-center"><b>Período de Estágio:</b>
                        <i>Mês de <b>Junho</b> e <b>Julho</b></i></p>
                    <hr class="mx-auto w-50">
                    <p class="text-center"><b>PROFESSOR ACOMPANHANTE:</b>
                        <i id="professor">Professor Acompanhante</i></p>
                </div>
            </div>
        </div>
        <div id="hasNoEstagio">
            <br>
            <div class="card mx-auto w-75" style="background-color: tomato;">
                <div style="margin-top: -2px;" class="card-body">
                    <h3><i class="fas fa-exclamation-triangle"></i> Ainda não tens estágio associado, aguarda até que sejas registado no Sistema.</h3>
                </div>
            </div>
        </div>
    </div>
    <?php
        include("../../Professor/HTML/Includes/footer.php");
    ?>
</body>

</html>