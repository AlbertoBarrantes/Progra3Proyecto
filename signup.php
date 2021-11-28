<?php 
$page_title = 'Registro'; 
require_once('backend/public/public_header.php');

?>
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlJDp1mNCpUj8Yn2L-wfuNysxxZ_pmeKA&callback=initMap&v=weekly"
    async></script>

</head>

<body>





  <!-- NAVBAR -->
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
              <a class="nav-link active" aria-current="page" href="../Progra3Proyecto/login.php">Ingresar</a>
            </li>
          </ul>

        </div>
      </div>
    </nav>
  </header>
  <!-- NAVBAR -->





  <!-- SIGN UP -->
  <div class="my-5 signup-form2 shadow">
    <form action="backend\controller\usersController.php" method="post">
      <h2>Registro</h2>
      <p>Por favor llene el formulario para crear una cuenta!</p>
      <hr>

      <div class="row">
        <div class="col-md-6 col-xs-12">
          <!-- usuario -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"> </i></span>
              <input id="username" name="username" type="text" class="form-control" placeholder="Usuario" required="required">
            </div>
          </div>
          <!-- nombre -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input id="name" name="name" type="text" class="form-control"  placeholder="Nombre" required="required">
            </div>
          </div>
          <!-- primer apellido -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input id="last_name1" name="last_name1" type="text" class="form-control"  placeholder="Primer apellido"
                required="required">
            </div>
          </div>
          <!-- segundo apellido -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input id="lastname2" name="last_name2" type="text" class="form-control" placeholder="Segundo apellido"
                required="required">
            </div>
          </div>
          <!-- fecha de nacimiento -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input id="birth_date" name="birth_date" type="date" class="form-control" required="required" />
              <span id="startDateSelected"></span>
            </div>
          </div>
          <!-- email -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
              <input id="email" name="email" type="email" class="form-control" placeholder="Email" required="required">
            </div>
          </div>
          <!-- teléfono de trabajo -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-phone-square-alt"> </i></span>
              <input id="work_phone" name="work_phone" type="text" class="form-control" placeholder="Teléfono de trabajo"
                required="required">
            </div>
          </div>
          <!-- teléfono celular -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-mobile-alt"> </i></span>
              <input id="personal_phone" name="personal_phone" type="text" class="form-control" placeholder="Teléfono celular"
                required="required">
            </div>
          </div> 
          <!-- contraseña -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input id="password" name="password" type="text" class="form-control" placeholder="Contraseña" required="required">
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xs-12">
          <!-- dirección -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-marked-alt"> </i></span>
              <input id="address" name="address" type="text" class="form-control" placeholder="Dirección"
                required="required">
            </div>
          </div>
          <!-- mapa -->
          <div class="form-group">
            <div class="input-group">
              <div id="map" class="shadow border"></div>
            </div>
          </div>
        </div>
        <!-- 'action' POST -->
        <input id="action" name="action" value="add_users" style="visibility: hidden;"></input>
        <!-- botón registrarse -->
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-lg">Registrarse</button>
        </div>
      </div>
    </form>
  </div>
  <!-- SIGN UP -->


  <br><br>




<?php 

require_once('backend/public/public_footer.php');

?>

</body>

</html>