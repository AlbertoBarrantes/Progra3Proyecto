<?php 
$page_title = 'Registro'; 
require_once('backend/public/public_header.php');
require_once('backend/public/navbar.php');

?>

  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlJDp1mNCpUj8Yn2L-wfuNysxxZ_pmeKA&callback=initMap&v=weekly"
    async></script>

<html>
<body>




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