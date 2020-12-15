<?php
session_start();
?>

<html>

<head>
    <title>Consultar Estágios</title>
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

    <link rel="stylesheet" type="text/css" href="../../Inicio/index.css?v=1.5">

    <script>
        function limparFiltros() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //alert(this.responseText);
                    document.getElementById("areaTabela").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../BD/Estagios/limparFiltros.php", true);
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
            xhttp.open("GET", "../BD/Estagios/limparFiltros.php", true);
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
                    //alert(this.responseText);
                }
            };
            xhttp.open("GET", "../BD/Estagios/filtros.php?filtro=" + valorSelect + "&valorInput=" + valorInput, true);
            xhttp.send();
        }

        function detailsAluno(id) {
            //aluno
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("aluno-modal").innerHTML = this.responseText;
                    detailsEntidade(id);
                    detailsProfessor(id);
                    detailsMonitor(id);
                    detailsHoras(id);
                }
            };
            xhttp.open("GET", "../BD/Estagios/details.php?id=" + id + "&tipo=idAluno", true);
            xhttp.send();
        }

        function detailsEntidade(id) {
            //entidade
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("entidade-modal").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../BD/Estagios/details.php?id=" + id + "&tipo=idEntidadeEstagio", true);
            xhttp.send();
        }

        function detailsProfessor(id) {
            //professor
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("orientador-modal").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../BD/Estagios/details.php?id=" + id + "&tipo=idProfessorOrientador", true);
            xhttp.send();
        }

        function detailsMonitor(id) {
            //monitor
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("monitor-modal").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../BD/Estagios/details.php?id=" + id + "&tipo=idMonitor", true);
            xhttp.send();
        }

        function detailsHoras(id) {
            //horas
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("horas-modal").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../BD/Estagios/details.php?id=" + id + "&tipo=horas", true);
            xhttp.send();
        }

        function deleteId() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    this.responseText;
                    resetTable();
                }
            };
            xhttp.open("GET", "../BD/Estagios/delete.php?id=" + idEliminar, true);
            xhttp.send();
        }

        function guardarID(id) {
            idEliminar = id;
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
            <h1 style="margin-left:10px">Estágio</h1>
            <div class="col">
                <div class="float-right">
                    <button type="button" class="btn btn-success" onclick="window.location='homeProfessor.php'">Adicionar Novo &#10010</button>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <b style="margin-left:10px; margin-right:10px;margin-top:5px;">Filtrar por:</b>
            <select id="filtro" class="form-control" style="width:260px" onchange="inputVisible()">
                <option disabled selected>---</option>
                <option value="idAluno">Aluno</option>
                <option value="idEntidadeEstagio">Entidade de Estágio</option>
                <option value="idProfessorOrientador">Professor Acompanhante</option>
                <option value="idMonitor">Monitor de Estágio</option>
                <option value="horas">Duração do Estágio</option>
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
                            <b>Entidade de Estágio</b>
                            <div id="entidade-modal"></div>
                            <hr>
                            <b>Professor Acompanhante</b>
                            <div id="orientador-modal"></div>
                            <hr>
                            <b>Monitor de Estágio</b>
                            <div id="monitor-modal"></div>
                            <hr>
                            <b>Duração do Estágio</b>
                            <div id="horas-modal"></div>
                            <hr>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div id="modalDelete">
            <div class="modal fade" id="myModalDelete">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Confirmar</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <p>Tem a certeza que pretende eliminar este registo?</p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="deleteId()">Sim</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
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