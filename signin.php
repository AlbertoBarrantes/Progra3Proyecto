<?php
$page_title = 'Ingreso';

session_start();

require_once('backend/public/public_header.php');
require_once('backend/public/navbar.php');


error_reporting(0);
?>






</html>


<body>

  <br><br>


  <!-- SIGN IN -->
  <div class="my-5 signup-form2 shadow text-center" style="max-width:350px !important;">
    <form action="backend/controller/loginValidation_startSession.php" method="post">
      <h2>Ingreso</h2>
      <p>Por favor llene los datos para ingresar</p>
      <hr>

      <!-- usuario -->
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"> </i></span>
          <input id="username" name="username" type="text" class="form-control" placeholder="Usuario" required="required">
        </div>
      </div>

      <!-- contraseña -->
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña" required="required">
        </div>
      </div>

      <!-- 'action' POST -->
      <input id="action" name="action" value="add_users" style="visibility: hidden;"></input>

      <!-- botón registrarse -->
      <div class="form-group col-6 mx-auto">
        <button type="submit" class="btn btn-primary btn-lg">Ingresar</button>
      </div>

    </form>
  </div>
  <!-- SIGN IN -->








  <br><br>






  <?php

  require_once('backend/public/public_footer.php');

  ?>

</body>

</html>