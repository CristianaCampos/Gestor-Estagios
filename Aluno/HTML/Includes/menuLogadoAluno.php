<!-- LINKS -->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
<!-- NAVBAR -->

<nav class="navbar fixed-top navbar-expand-md navbar-light" id="mainNav">
  <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <div class="btn drop" onclick="window.location='homeAluno.php'">
          Consultar Plano Individual de Estágio
        </div>
      </li>
      <li class="nav-item">
        <div class="btn drop" onclick="window.location='registoDiarioAluno.php'">
          Registo Diário
        </div>
      </li>
      <li class="nav-item">
        <div class="dropdown">
          <div class="btn dropdown-toggle drop" data-toggle="dropdown">
            Avaliações
          </div>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="registarAutoavaliacao.php">Registar Autoavaliação</a>
            <a class="dropdown-item" href="mostrarAvaliacaoFinal.php">Mostrar Avaliação Final</a>
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