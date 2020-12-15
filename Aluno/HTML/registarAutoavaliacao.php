<?php
session_start();
?>

<html>

<head>
    <title>Autoavaliação</title>
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
        function carregarTudo() {
            fillAutoAvaliacaoInputs();
            esconderDiv();
            verificarAluno();
        }

        function esconderDiv() {
            document.getElementById("hasEstagio").visibility = "hidden";
            document.getElementById("hasNoEstagio").visibility = "hidden";
            document.getElementById("hasEstagio").style.display = "none";
            document.getElementById("hasNoEstagio").style.display = "none";
        }

        function mostrarHasAluno() {
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

        function fillAutoAvaliacaoInputs() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //alert(this.responseText);
                    document.getElementById("tabela").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../BD/AutoAvaliacao/carregarAutoAvaliacoes.php", true);
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
        <div id="hasEstagio">
            <div class="row">
                <div class="col-md">
                    <h1>Registar Autoavaliação do Estágio</h1>
                </div>
            </div>
            <hr>
            <div id="tabela">
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