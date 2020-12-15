<?php
session_start();
?>

<html>

<head>
    <title>Registo Diário</title>
    <link rel="icon" href="../../../Imagens/iconEstagio.ico">

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

    <link rel="stylesheet" type="text/css" href="../../Inicio/index.css?v=2.0">

    <script>
        var meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
        var _dataAtual = new Date();
        var mesAtual = 0;
        var mesAno = 0;
        var atividadeID;
        var dia;
        var mes;
        var ano;

        function esconderDiv() {
            document.getElementById("hasEstagio").visibility = "hidden";
            document.getElementById("hasNoEstagio").visibility = "hidden";
            document.getElementById("hasEstagio").style.display = "none";
            document.getElementById("hasNoEstagio").style.display = "none";
        }

        function hideErrorMessages() {
            document.getElementById("presencaErro").visibility = "hidden";
            document.getElementById("presencaErro").style.display = "none";
            document.getElementById("horasErro").visibility = "hidden";
            document.getElementById("horasErro").style.display = "none";
            document.getElementById("atividadeErro").visibility = "hidden";
            document.getElementById("atividadeErro").style.display = "none";
        }

        //SHOW ERROR MESSAGES

        function showPresencaMessageError() {
            document.getElementById("presencaErro").visibility = "visible";
            document.getElementById("presencaErro").style.display = "block";
        }

        function showHorasMessageError() {
            document.getElementById("horasErro").visibility = "visible";
            document.getElementById("horasErro").style.display = "block";
        }

        function showAtividadeMessageError() {
            document.getElementById("atividadeErro").visibility = "visible";
            document.getElementById("atividadeErro").style.display = "block";
        }

        //HIDE ERROR MESSAGES

        function hidePresencaMessageError() {
            document.getElementById("presencaErro").visibility = "hidden";
            document.getElementById("presencaErro").style.display = "none";
        }

        function hideHorasMessageError() {
            document.getElementById("horasErro").visibility = "hidden";
            document.getElementById("horasErro").style.display = "none";
        }

        function hideAtividadeMessageError() {
            document.getElementById("atividadeErro").visibility = "hidden";
            document.getElementById("atividadeErro").style.display = "none";
        }

        //LINE BREAK

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

        var corDiaAtual = "#007bff";

        function carregarTudo() {
            mesAtual = _dataAtual.getMonth();
            document.getElementById('missingDays').style.visibility = "hidden";
            carregarDados();
            carregarAtividadesByDay();
            esconderDiv();
            verificarAluno();
            hideErrorMessages();
        }

        function carregarAtividadesByDay() {
            var date = new Date(ano, mes);
            for (var i = 1; i <= getDiasMes(date); i++) {
                //alert(i);
                carregarAtividades(i);
            }

        }

        function carregarAtividades(diaSelecionado) {
            var dayOfWeek = getDayOfWeek(new Date(ano, mes, 1));

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("atividades" + (dayOfWeek + diaSelecionado - 1)).innerHTML = "";
                    document.getElementById("atividades" + (dayOfWeek + diaSelecionado - 1)).innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "../BD/RegistosDiarios/carregarAtividades.php?diaSelecionado=" + diaSelecionado + "&mes=" + mes + "&ano=" + ano, true);
            xhttp.send();
        }

        function verificarData() {
            document.getElementById("horas").value = "";
            document.getElementById("atividade").value = "";
            document.getElementById("horas").disabled = false;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if ((this.responseText).substring(0, 1) == 1) {
                        document.getElementById("presenca").checked = true;
                        document.getElementById("presenca").disabled = true;
                        document.getElementById("horas").disabled = true;
                        document.getElementById("horas").value = (this.responseText).substring(1);
                    } else {
                        document.getElementById("presenca").checked = false;
                        document.getElementById("presenca").disabled = false;
                    }
                    ifChecked();
                }
            };
            xhttp.open("GET", "../BD/RegistosDiarios/verificarData.php?dia=" + dia + "&mes=" + mes + "&ano=" + ano, true);
            xhttp.send();
        }

        function verifyInputs() {
            var presenca = document.getElementById("presenca");
            var atividade = document.getElementById("atividade").value;
            var horas = document.getElementById("horas").value;
            var podeInserir = true;

            if (!presenca.checked) {
                showPresencaMessageError();
                podeInserir = false;
            } else {
                hidePresencaMessageError();
                podeInserir = true;
            }

            if (horas == "") {
                showHorasMessageError();
                podeInserir = false;
            } else {
                hideHorasMessageError();
                podeInserir = true;
            }

            if (atividade == "") {
                showAtividadeMessageError();
                podeInserir = false;
            } else {
                hideAtividadeMessageError();
                podeInserir = true;
            }

            if (podeInserir == true) {
                adicionarAtividade();
            }
        }

        function adicionarAtividade() {
            var atividade = document.getElementById("atividade").value;
            var horas = document.getElementById("horas").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("presenca").checked = true;
                    document.getElementById("presenca").disabled = true;
                    document.getElementById("horas").disabled = true;
                    ifChecked();
                    carregarAtividadesByDay();
                    document.getElementById("atividade").value = "";
                    //document.getElementById(atividadeID).innerHTML += "<hr>" + atividade + " <div class='float-right'><a href=''><img src='../../Imagens/eliminarAtividade.png' class='thumbnail2' width='20px'></a></div>";
                }
            };
            xhttp.open("GET", "../BD/RegistosDiarios/adicionarAtividades.php?atividade=" + atividade + "&horas=" + horas + "&dia=" + dia + "&mes=" + mes + "&ano=" + ano, true);
            xhttp.send();
            
        }

        function mesAnterior() {
            var date1 = new Date(_dataAtual.getFullYear(), mesAtual);
            var diaInicial1 = getDayOfWeek(date1);
            resetarCalendario(diaInicial1, date1);
            mesAtual--;
            var date = new Date(_dataAtual.getFullYear(), mesAtual);
            var diaInicial = getDayOfWeek(date);
            dias(diaInicial, date);
            setMesAtual(date);
            verificarData();
            carregarAtividadesByDay();
        }

        function proximoMes() {
            var date1 = new Date(_dataAtual.getFullYear(), mesAtual);
            var diaInicial1 = getDayOfWeek(date1);
            resetarCalendario(diaInicial1, date1);
            mesAtual++;
            var date = new Date(_dataAtual.getFullYear(), mesAtual);
            var diaInicial = getDayOfWeek(date);
            dias(diaInicial, date);
            setMesAtual(date);
            verificarData();
            carregarAtividadesByDay();
        }

        function carregarDados() {
            var data = new Date();
            var date = new Date(data.getFullYear(), mesAtual);
            var diaInicial = getDayOfWeek(date);
            setMesAtual(date);
            dias(diaInicial, date);
        }

        function resetarCalendario(diaSemana, date) {
            for (var i = 1; i <= getDiasMes(date); i++) {
                document.getElementById('diaSemana' + (diaSemana + i - 1)).innerHTML = "";
                document.getElementById('atividades' + (diaSemana + i - 1)).innerHTML = "";
                document.getElementById('diaSemana' + (diaSemana + i - 1)).disabled = false;
                document.getElementById('diaSemana' + (diaSemana + i - 1)).style.backgroundColor = "none";
                document.getElementById('atividades' + (diaSemana + i - 1)).disabled = false;
                document.getElementById('atividades' + (diaSemana + i - 1)).style.backgroundColor = "none";
            }
        }

        function setMesAtual(date) {
            mes = date.getMonth();
            ano = date.getFullYear();
            document.getElementById("mes").innerHTML = meses[mes] + " " + ano;
            mesAno = meses[mes] + " " + ano;
        }

        //VER DEPOIS
        // function desabilitarDiasMaioresDoQueODiaAtual(diaSemana, i, mes, ano) {
        //     var date = new Date();
        //     var dataAtual = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        //     var dataAtualizada = new Date(ano, mes, i);
        //     alert(dataAtualizada);
        //     if (dataAtualizada > dataAtual) {
        //         //alert("entrou");
        //         document.getElementById('diaSemana' + (diaSemana + i - 1)).disabled = true;
        //         document.getElementById('diaSemana' + (diaSemana + i - 1)).style.backgroundColor = "red";
        //         document.getElementById('atividades' + (diaSemana + i - 1)).disabled = true;
        //         document.getElementById('atividades' + (diaSemana + i - 1)).style.backgroundColor = "red";
        //     }
        //     else {
        //         //alert("nao entrou");
        //     }
        // }

        function dias(diaSemana, date) {

            if (diaSemana == 7) {
                document.getElementById('missingDays').style.visibility = "visible";
                for (var i = 1; i <= 42; i++) {
                    document.getElementById("dia" + i).style.backgroundColor = "white";
                }
            } else {
                document.getElementById('missingDays').style.visibility = "hidden";
                for (var i = 1; i <= getDiasMes(date); i++) {
                    document.getElementById("dia" + i).style.backgroundColor = "white";
                }
            }

            var data = new Date();
            var diaAtual = data.getDate();
            var mesAtual = data.getMonth();
            var anoAtual = data.getFullYear();

            for (var i = 1; i <= getDiasMes(date); i++) {
                document.getElementById('diaSemana' + (diaSemana + i - 1)).innerHTML = i + '<div class="float-right"><a href="" data-toggle="modal" data-target="#modal"><img width="20px" onclick="getAtividadeId(' + diaSemana + ', ' + i + ')" class="thumbnail2" src="../../Imagens/add-icon.png"></a></div>';
                if (i == diaAtual && date.getMonth() == mesAtual && anoAtual == date.getFullYear()) {
                    document.getElementById("dia" + (diaSemana + diaAtual - 1)).style.backgroundColor = corDiaAtual;
                    document.getElementById("corButtonDiaAtual").onclick = function() {
                        getAtividadeId(diaSemana, diaAtual)()
                    };
                }
            }
        }

        function getAtividadeId(diaSemana, id) {
            //buscar dia clicado
            var mes = document.getElementById("mes").value;
            document.getElementById("titulo").innerHTML = "Adicionar atividade para o dia " + id + " de " + mesAno;
            atividadeID = "atividades" + (diaSemana + id - 1);
            dia = id;
            verificarData();
        }

        function isBissexto(ano) {
            var is = false;
            var valor = 28;

            if (ano % 4 == 0) {
                if (ano % 100 != 0) {
                    is = true;
                } else if (ano % 400 == 0) {
                    is = true;
                }
            }

            if (is) {
                valor = 29;
            }

            return valor;
        }

        function getDiasMes(date) {
            var diasMes;

            if (date.getMonth() == 0) {
                diasMes = 31;
            } else if (date.getMonth() == 1) {
                diasMes = isBissexto(date.getFullYear());
            } else if (date.getMonth() == 2) {
                diasMes = 31;
            } else if (date.getMonth() == 3) {
                diasMes = 30;
            } else if (date.getMonth() == 4) {
                diasMes = 31;
            } else if (date.getMonth() == 5) {
                diasMes = 30;
            } else if (date.getMonth() == 6) {
                diasMes = 31;
            } else if (date.getMonth() == 7) {
                diasMes = 31;
            } else if (date.getMonth() == 8) {
                diasMes = 30;
            } else if (date.getMonth() == 9) {
                diasMes = 31;
            } else if (date.getMonth() == 10) {
                diasMes = 30;
            } else if (date.getMonth() == 11) {
                diasMes = 31;
            }

            return diasMes;
        }

        function getYear() {
            return new Date().getFullYear();
        }

        function getDayOfWeek(date) {
            var diaSemana = date.getDay();
            if (diaSemana == 0) {
                diaSemana = 7;
            }

            return diaSemana;
        }

        function formatDate(date) {
            var dataCompleta = parseInt(date.getMonth() + 1) + "/" + date.getFullYear();
            return dataCompleta;
        }

        function ifChecked() {
            if (document.getElementById("presenca").checked == true) {
                document.getElementById("horasGroup").style.display = "block";
                document.getElementById("atividadesGroup").style.display = "block";
            } else {
                document.getElementById("horasGroup").style.display = "none";
                document.getElementById("atividadesGroup").style.display = "none";
            }
        }

        function eliminarAtividade(idAtividade) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 1)
                    {
                        // carregarDados();
                        // carregarTudo();
                        carregarAtividadesByDay();
                    }
                }
            };
            xhttp.open("GET", "../BD/RegistosDiarios/eliminarAtividade.php?id= " + idAtividade, true);
            xhttp.send();
        }
        
    </script>
</head>

<body onload="carregarTudo();">
    <div class="container">
        <?php
        include("Includes/menuLogadoAluno.php");
        ?>
        <br><br><br><br>
        <div id="hasEstagio">
            <h2 class="text-center">Calendário de Estágio</h2>
            <br>
            <table class="table" style="margin-bottom: 0px;">
                <thead class="thead">
                    <tr>
                        <th style="width: 14%" class="text-left"><a href="#"><img width="25px" class="thumbnail" src="../../Imagens/setaEsquerda.png" onclick="mesAnterior()"></a></th>
                        <th style="width: 14%" class="text-center"></th>
                        <th style="width: 42%; font-size: 25px;" class="text-center" id="mes"><b>Mês</b></th>
                        <th style="width: 14%" class="text-center"></th>
                        <th style="width: 14%" class="text-right"><a href="#"><img width="25px" class="thumbnail" src="../../Imagens/setaDireita.png" onclick="proximoMes()"></a></th>
                    </tr>
                </thead>
            </table>

            <table class="table table-bordered" style="margin-top: 0px;">
                <thead class="thead" style="background-color:black; color: white;">
                    <tr>
                        <th style="width: 14%" class="text-center">Segunda</th>
                        <th style="width: 14%" class="text-center">Terça</th>
                        <th style="width: 14%" class="text-center">Quarta</th>
                        <th style="width: 14%" class="text-center">Quinta</th>
                        <th style="width: 14%" class="text-center">Sexta</th>
                        <th style="width: 14%" class="text-center">Sábado</th>
                        <th style="width: 14%" class="text-center">Domingo</th>
                    </tr>
                </thead>
                <tbody id="calendario">
                    <tr>
                        <td id="dia1">
                            <div id="diaSemana1"></div>
                            <div id="atividades1"></div>
                        </td>
                        <td id="dia2">
                            <div id="diaSemana2"></div>
                            <div id="atividades2"></div>
                        </td>
                        <td id="dia3">
                            <div id="diaSemana3"></div>
                            <div id="atividades3"></div>
                        </td>
                        <td id="dia4">
                            <div id="diaSemana4"></div>
                            <div id="atividades4"></div>
                        </td>
                        <td id="dia5">
                            <div id="diaSemana5"></div>
                            <div id="atividades5"></div>
                        </td>
                        <td id="dia6">
                            <div id="diaSemana6"></div>
                            <div id="atividades6"></div>
                        </td>
                        <td id="dia7">
                            <div id="diaSemana7"></div>
                            <div id="atividades7"></div>
                        </td>
                    </tr>
                    <tr>
                        <td id="dia8">
                            <div id="diaSemana8"></div>
                            <div id="atividades8"></div>
                        </td>
                        <td id="dia9">
                            <div id="diaSemana9"></div>
                            <div id="atividades9"></div>
                        </td>
                        <td id="dia10">
                            <div id="diaSemana10"></div>
                            <div id="atividades10"></div>
                        </td>
                        <td id="dia11">
                            <div id="diaSemana11"></div>
                            <div id="atividades11"></div>
                        </td>
                        <td id="dia12">
                            <div id="diaSemana12"></div>
                            <div id="atividades12"></div>
                        </td>
                        <td id="dia13">
                            <div id="diaSemana13"></div>
                            <div id="atividades13"></div>
                        </td>
                        <td id="dia14">
                            <div id="diaSemana14"></div>
                            <div id="atividades14"></div>
                        </td>
                    </tr>
                    <tr>
                        <td id="dia15">
                            <div id="diaSemana15"></div>
                            <div id="atividades15"></div>
                        </td>
                        <td id="dia16">
                            <div id="diaSemana16"></div>
                            <div id="atividades16"></div>
                        </td>
                        <td id="dia17">
                            <div id="diaSemana17"></div>
                            <div id="atividades17"></div>
                        </td>
                        <td id="dia18">
                            <div id="diaSemana18"></div>
                            <div id="atividades18"></div>
                        </td>
                        <td id="dia19">
                            <div id="diaSemana19"></div>
                            <div id="atividades19"></div>
                        </td>
                        <td id="dia20">
                            <div id="diaSemana20"></div>
                            <div id="atividades20"></div>
                        </td>
                        <td id="dia21">
                            <div id="diaSemana21"></div>
                            <div id="atividades21"></div>
                        </td>
                    </tr>
                    <tr>
                        <td id="dia22">
                            <div id="diaSemana22"></div>
                            <div id="atividades22"></div>
                        </td>
                        <td id="dia23">
                            <div id="diaSemana23"></div>
                            <div id="atividades23"></div>
                        </td>
                        <td id="dia24">
                            <div id="diaSemana24"></div>
                            <div id="atividades24"></div>
                        </td>
                        <td id="dia25">
                            <div id="diaSemana25"></div>
                            <div id="atividades25"></div>
                        </td>
                        <td id="dia26">
                            <div id="diaSemana26"></div>
                            <div id="atividades26"></div>
                        </td>
                        <td id="dia27">
                            <div id="diaSemana27"></div>
                            <div id="atividades27"></div>
                        </td>
                        <td id="dia28">
                            <div id="diaSemana28"></div>
                            <div id="atividades28"></div>
                        </td>
                    </tr>
                    <tr>
                        <td id="dia29">
                            <div id="diaSemana29"></div>
                            <div id="atividades29"></div>
                        </td>
                        <td id="dia30">
                            <div id="diaSemana30"></div>
                            <div id="atividades30"></div>
                        </td>
                        <td id="dia31">
                            <div id="diaSemana31"></div>
                            <div id="atividades31"></div>
                        </td>
                        <td id="dia32">
                            <div id="diaSemana32"></div>
                            <div id="atividades32"></div>
                        </td>
                        <td id="dia33">
                            <div id="diaSemana33"></div>
                            <div id="atividades33"></div>
                        </td>
                        <td id="dia34">
                            <div id="diaSemana34"></div>
                            <div id="atividades34"></div>
                        </td>
                        <td id="dia35">
                            <div id="diaSemana35"></div>
                            <div id="atividades35"></div>
                        </td>
                    </tr>
                    <tr id="missingDays">
                        <td id="dia36">
                            <div id="diaSemana36"></div>
                            <div id="atividades36"></div>
                        </td>
                        <td id="dia37">
                            <div id="diaSemana37"></div>
                            <div id="atividades37"></div>
                        </td>
                        <td id="dia38">
                            <div id="diaSemana38"></div>
                            <div id="atividades38"></div>
                        </td>
                        <td id="dia39">
                            <div id="diaSemana39"></div>
                            <div id="atividades39"></div>
                        </td>
                        <td id="dia40">
                            <div id="diaSemana40"></div>
                            <div id="atividades40"></div>
                        </td>
                        <td id="dia41">
                            <div id="diaSemana41"></div>
                            <div id="atividades41"></div>
                        </td>
                        <td id="dia42">
                            <div id="diaSemana42"></div>
                            <div id="atividades42"></div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="float-right">
                <h3>Legenda</h3>
                <p style="font-size: 20px;">Dia Atual: <button class="btn" type="button" style="background-color: #007bff; height: 20px; width: 20px;" id="corButtonDiaAtual" data-toggle="modal" data-target="#modal"></button></p>
                <p></p>
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
        <div class="modal" id="modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titulo"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="checkbox">
                            <label><input type="checkbox" id="presenca" name="presenca" onclick="ifChecked()"> Presença</label>
                        </div>
                        <div id="presencaErro"><i>Este campo é obrigatório.</i></div>
                        <div class="form-group" style="display:none" id="horasGroup">
                            <label>Horas</label>
                            <input type="text" class="form-control" name="horas" id="horas" placeholder="Horas">
                            <div id="horasErro"><i>Este campo é obrigatório.</i></div>
                        </div>
                        <div class="form-group" style="display:none" id="atividadesGroup">
                            <label>Atividades</label>
                            <input type="text" class="form-control" name="atividade" id="atividade" placeholder="Atividade">
                            <div id="atividadeErro"><i>Este campo é obrigatório.</i></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" onclick="verifyInputs()">Adicionar Atividade</button>
                        <button type="button" class="btn btn-secondary  " data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include("../../Professor/HTML/Includes/footer.php");
    ?>
</body>

</html>