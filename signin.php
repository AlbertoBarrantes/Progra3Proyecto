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

      <div class="rowX">

        <div class="colX">

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

        </div>

      </div>

    </form>
  </div>
  <!-- SIGN IN -->








  <br><br>






  <!-- FOOTER-->
  <footer class="bg-dark text-center text-white mt-5">
    <!-- Grid container -->
    <div class="container p-4">
      <!-- Section: Social media -->

      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com" target="_blank" role="button"><i class="bi bi-facebook"></i></a>

        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.Twitter.com" target="_blank" role="button"><i class="bi bi-twitter"></i></a>

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.Instagram.com" target="_blank" role="button"><i class="bi bi-instagram"></i></a>

      </section>
      <!-- Section: Social media -->


      <!-- Section: Text -->
      <section class="mb-4">
        <p>
          El mejor precio garantizado, planifique su viaje o haga reservas de última hora en un solo lugar.
        </p>
      </section>
      <!-- Section: Text -->

      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Contáctenos</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="tel:+50658679852" class="text-decoration-none">Teléfono: +506 5555 5555</a>
              </li>
              <li>
                <a href="https://wa.me/50655555555" class=" text-decoration-none">Whatsapp: +506 5555 5555</a>
              </li>
              <li>
                <a href="mailto:aero555@aero.com" class="text-decoration-none">Correo: aero555@aero.com</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Link 1</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 2</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 3</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Link 1</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 2</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 3</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Link 1</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 2</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 3</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->
    </div>
    <!-- Grid container -->


  </footer>
  <!-- Footer -->

</body>

</html>