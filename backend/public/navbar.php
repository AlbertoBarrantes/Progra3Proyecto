
<!-- NAVBAR -->
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark px-4 py-2">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="assets/img/icons/nav/nav.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div style="min-height:50px; min-width:25px;">
          </div>
          <form class="d-flex ps-2 my-auto" style="min-width:200px;">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
          <div class="navbar-nav ms-auto mb-2 mb-lg-0">
          <?php
            error_reporting(0);
            // No hay sesión
            if ( ($_SESSION['username'] == null || $_SESSION['username'] == "") ) {
              echo '
                <script>console.log("No hay sesión");</script>
                <div id="registrarse" class="nav-item my-auto">
                  <a class="nav-link active" aria-current="page" href="../Progra3Proyecto/signup.php">Registrarse</a>
                </div>
                <div class="nav-item my-auto">
                  <a class="nav-link active" aria-current="page" href="../Progra3Proyecto/signin.php">Acceder a mi cuenta</a>
                </div>
              ';
            // Si hay sesión
            } else {
              $arreglo = $_SESSION['username'];
              echo '
              <script>console.log("Si hay sesión");</script>
              <li class="nav-item dropdown">
                <div id="accountDIV" class="dropdown my-3">
                  <input id="btn_MiCuenta" value="Hola '.$arreglo['name'].' ▾" name="btn_MiCuenta" class="btn btn-secondary dropdown-toggle bg-dark shadow-none border-0 " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="btn_MiCuenta">
                    <li><a class="dropdown-item" href="profile.php">Ver mi perfil</a></li>
                    <li><a class="dropdown-item" href="backend/controller/destroySession.php">Salir</a></li>
                  </ul>
                </div>
              </li>
              ';
            }
            ?>

          </div>
        </div>
      </div>
    </nav>
  </header>
  <!-- NAVBAR -->
