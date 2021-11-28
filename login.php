<?php 
$page_title = 'Inicio de sesion'; 
require_once('backend/public/public_header.php');

?>
  
  </head>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center"></body>

    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 py-2">
        <div class="container-fluid">
          <a class="navbar-brand" href="../Progra3Proyecto/index.php"><img src="assets/img/icons/nav/nav.png"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <form class="d-flex px-5">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../Progra3Proyecto/signup.php">Registrarse</a>
              </li>

            </ul>

          </div>
        </div>
      </nav>
    </header>


    
    <main class="form-signin">
      <form>
        <img class="mb-4" src="../imagenes/brigade.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Porfavor ingresa tus datos</h1>
        <label for="inputEmail" class="visually-hidden">Direccion de correo electronico</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Direccion de correo electronico" required autofocus>
        <label for="inputPassword" class="visually-hidden">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Recuerda mis datos
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
      </form>
    </main>


<?php 

require_once('backend/public/public_footer.php');

?>
  </body>
</html>
