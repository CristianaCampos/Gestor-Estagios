<?php
session_start();
?>

<html>

<head>
    <title>Consultar Registos Diários</title>
    <link rel="icon" href="../../Imagens/iconEstagio.ico">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!-- titulos -->
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <!-- corpo -->
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../../Inicio/index.css?v=1.3">

    <script>
        var valorSelect;
        var idEliminar;

        function limparFiltros() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("areaTabela").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../BD/RegistosDiarios/limparFiltros.php", true);
            xhttp.send();

            document.getElementById("filtro").value = "---";
            desabilitar();
        }

        function resetTable() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("areaTabela").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../BD/RegistosDiarios/limparFiltros.php", true);
            xhttp.send();
        }

        function desabilitar() {
            document.getElementById("texto").style.visibility = "hidden";
            document.getElementById("texto").disabled = false;
            document.getElementById("botao1").style.visibility = "hidden";
            document.getElementById("botao2").style.visibility = "hidden";
        }

        function inputVisible() {
            valorSelect = document.getElementById("filtro").value;
            document.getElementById("texto").style.visibility = "visible";
            document.getElementById("botao1").style.visibility = "visible";
            document.getElementById("botao2").style.visibility = "visible";
        }

        function filtros() {
            var valorInput = document.getElementById("texto").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("areaTabela").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../BD/RegistosDiarios/filtros.php?filtro=" + valorSelect + "&valorInput=" + valorInput, true);
            xhttp.send();
        }

        function detailsAluno(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("aluno-modal").innerHTML = this.responseText;
                    detailsDia(id);
                    detailsHoras(id);
                    detailsAtividade(id);
                }
            };
            xhttp.open("GET", "../BD/RegistosDiarios/details.php?id=" + id + "&tipo=idAluno", true);
            xhttp.send();
        }

        function detailsDia(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("dia-modal").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../BD/RegistosDiarios/details.php?id=" + id + "&tipo=dia", true);
            xhttp.send();
        }

        function detailsHoras(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("horas-modal").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../BD/RegistosDiarios/details.php?id=" + id + "&tipo=horas", true);
            xhttp.send();
        }

        function detailsAtividade(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("atividade-modal").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../BD/RegistosDiarios/details.php?id=" + id + "&tipo=atividade", true);
            xhttp.send();
        }
    </script>
</head>

<body onload="limparFiltros(); verifyUser()">
    <div class="container-fluid">
        <?php
        include("Includes/menuLogadoProfessor.php");
        ?>
        <br><br><br><br>
        <div class="row">
            <h1 style="margin-left:10px">Registos Diários</h1>
        </div>
        <br>
        <div class="row">
            <b style="margin-left:10px; margin-right:10px;margin-top:5px;">Filtrar por:</b>
            <select id="filtro" class="form-control" style="width:250px" onchange="inputVisible()">
                <option disabled selected>---</option>
                <option value="idAluno">Aluno</option>
                <option value="dia">Data</option>
                <option value="horas">Horas</option>
                <option value="atividade">Atividade</option>
            </select>
            <input type="text" id="texto" class="form-control" style="width:300px; margin-left:20px;" placeholder="Escreva aqui">
            <button type="button" id="botao1" class="btn btn-info" style="margin-left:20px;" onclick="filtros()">Procurar</button>
            <input type="button" id="botao2" class="btn btn-secondary" value="Limpar Filtros" style="margin-left:20px;" onclick="limparFiltros()">
        </div>
        <br>
        <div id="areaTabela">
        </div>
        <div id="modalDetails">
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detalhes do Registo</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <b>Aluno</b>
                            <div id="aluno-modal"></div>
                            <hr>
                            <b>Data</b>
                            <div id="dia-modal"></div>
                            <hr>
                            <b>Horas</b>
                            <div id="horas-modal"></div>
                            <hr>
                            <b>Atividade</b>
                            <div id="atividade-modal"></div>
                            <hr>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
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