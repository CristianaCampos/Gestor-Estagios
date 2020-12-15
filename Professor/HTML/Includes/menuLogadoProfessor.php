<script>
  function verifyUser() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //alert(this.responseText);
        if (this.responseText == "orientador") {
          //alert("entrou");
          hideNavItems();
        }
      }
    };
    xhttp.open("GET", "../BD/User/UserVerifier.php", true);
    xhttp.send();
  }

  function hideNavItems() {
    //alert("entrou");
    var adminElements = document.getElementById('admin');
    var adminElements1 = document.getElementById('admin1');
    var adminElements2 = document.getElementById('admin2');
    var adminElements3 = document.getElementById('admin3');
    var adminElements4 = document.getElementById('admin4');
    var adminElements6 = document.getElementById('admin6');
    var adminElements7 = document.getElementById('admin7');
    var adminElements8 = document.getElementById('admin8');
    var adminElements9 = document.getElementById('admin9');

    adminElements.style.visibility = "hidden";
    adminElements.style.display = "none";
    adminElements1.style.visibility = "hidden";
    adminElements1.style.display = "none";
    adminElements2.style.visibility = "hidden";
    adminElements2.style.display = "none";
    adminElements3.style.visibility = "hidden";
    adminElements3.style.display = "none";
    adminElements4.style.visibility = "hidden";
    adminElements4.style.display = "none";
    adminElements6.style.visibility = "hidden";
    adminElements6.style.display = "none";
    adminElements7.style.visibility = "hidden";
    adminElements7.style.display = "none";
    adminElements8.style.visibility = "hidden";
    adminElements8.style.display = "none";
    adminElements9.style.visibility = "hidden";
    adminElements9.style.display = "none";
  }
</script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

<nav class="navbar fixed-top navbar-expand-xl navbar-light" id="mainNav">
  <!-- <ul class="nav navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="mostrarEstagiosRegistados.php">
        <img width="40px" src="../../Imagens/esg.png" />
      </a>
    </li>
  </ul> -->
  <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <div class="dropdown">
          <div id="admin" class="btn dropdown-toggle drop" data-toggle="dropdown">
            Entidades de Estágio
          </div>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="registarEntidadeEstagio.php">Registar Entidade de Estágio</a>
            <a class="dropdown-item" href="mostrarEntidadeEstagioRegistadas.php">Mostrar Entidades de Estágio</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="registarMonitorEstagio.php">Registar Monitor de Estágio</a>
            <a class="dropdown-item" href="mostrarMonitorEstagioRegistados.php">Mostrar Monitores de Estágio</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <div class="dropdown">
          <div class="btn dropdown-toggle drop" data-toggle="dropdown">
            Estágios
          </div>
          <div class="dropdown-menu">
            <a id="admin1" class="dropdown-item" href="registarProfessorOrientador.php">Registar Professor Orientador</a>
            <a id="admin2" class="dropdown-item" href="mostrarProfessorOrientadorRegistados.php">Mostrar Professor Orientador</a>
            <div id="admin3" class="dropdown-divider"></div>
            <a id="admin4" class="dropdown-item" href="homeProfessor.php">Registar Estágios</a>
            <a id="admin4" class="dropdown-item" href="mostrarEstagiosRegistados.php">Mostrar Estágios</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="registarAvaliacaoFinalEstagio.php">Registar Avaliação Final de Estágio</a>
            <a class="dropdown-item" href="mostrarAvaliacaoFinalRegistados.php">Mostrar Avaliação Final de Estágio</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="mostrarAutoAvaliacaoAluno.php">Mostrar Autoavaliação do Aluno</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="mostrarRegistosDiariosAluno.php">Mostrar Registos Diários do Aluno</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <div class="dropdown">
          <div id="admin6" class="btn dropdown-toggle drop" data-toggle="dropdown">
            Cursos
          </div>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="registarCursos.php">Registar Cursos</a>
            <a class="dropdown-item" href="mostrarCursosRegistados.php">Mostrar Cursos</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <div class="dropdown">
          <div id="admin7" class="btn dropdown-toggle drop" data-toggle="dropdown">
            Turmas
          </div>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="registarTurmas.php">Registar Turmas</a>
            <a class="dropdown-item" href="mostrarTurmasRegistadas.php">Mostrar Turmas</a>
            <a class="dropdown-item" href="importarAlunos.php">Importar alunos para turma</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <div class="dropdown">
          <div id="admin8" class="btn dropdown-toggle drop" data-toggle="dropdown">
            Alunos
          </div>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="registarAlunos.php">Registar Alunos</a>
            <a class="dropdown-item" href="mostrarAlunosRegistados.php">Mostrar Alunos</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <div class="dropdown">
          <div id="admin9" class="btn dropdown-toggle drop" data-toggle="dropdown">
            Encarregados de Educação
          </div>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="registarEncarregadosEducacao.php">Registar Encarregados de Educação</a>
            <a class="dropdown-item" href="mostrarEERegistados.php">Mostrar Encarregados de Educação</a>
          </div>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <div class="dropdown">
          <div class="btn dropdown-toggle drop" data-toggle="dropdown">
            <i class="fas fa-user-alt" style="margin-right: 1px"></i>
            <b><?php echo $_SESSION["nome"]; ?></b>
          </div>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="../../Inicio/BD/logout.php">Logout</a>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>