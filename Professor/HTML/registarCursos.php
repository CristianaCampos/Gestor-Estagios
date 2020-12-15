<?php
session_start();
?>
<html>

<head>
    <title>Registar Cursos</title>
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

    <script type="text/javascript" src="../../Utils/CssClassManager.js"></script>

    <script>
        function divEscondido() {
            document.getElementById("nomeErro").style.visibility = "hidden";

            document.getElementById("nomeErro").style.display = "none";
        }

        function verificar() {
            var nome = document.getElementById("nome").value;
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

            if (podeInserir == true) {
                inserir();
            }
        }

        function inserir() {
            var nome = document.getElementById("nome").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 1)
                        window.location = "mostrarCursosRegistados.php";
                    else
                        window.location = "../../ErrorPages/Error.html";
                }
            };
            xhttp.open("GET", "../BD/Cursos/registarCursosInserir.php?nome=" + nome, true);
            xhttp.send();
        }

        function changeTopText(x) {
            var topText = document.getElementById("cursoText");
            var nameInput = document.getElementById("nome");
            var topTextManager = new CssClassManager(topText);

            if (x.matches) {
                manager.addClassToElementId("d-flex");
                manager.addClassToElementId("justify-content-center");
            }

            if (!x.matches) {
                manager.removeClassFromElementId("justify-content-center");
                manager.addClassToElementId("justify-content-start");
            }
        }

        function loadThings() {
            var x = window.matchMedia("(max-width: 700px)")
            changeTopText(x) // Call listener function at run time
            x.addListener(changeTopText) // Attach listener function on state changes
        }
    </script>

</head>

<body onload="divEscondido(); verifyUser(); loadThings();">
    <div class="container">
        <?php
        include("Includes/menuLogadoProfessor.php");
        ?>

        <br><br><br><br>
        <h1>Adicionar Curso</h1>
        <hr>
        <!-- <form action="../BD/Cursos/registarCursosInserir.php" method="POST"> -->
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-7">
                        <div id="cursoText" class="d-flex justify-content-start">
                            <b class="mb-2">Curso profissional: </b>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7">
                        <input type="text" name="nome" required id="nome" class="form-control" placeholder="Nome">
                        <div id="nomeErro"><i>Este campo é obrigatório.</i></div>
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