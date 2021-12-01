<?php
$page_title = 'Inicio';

session_start();

require_once('backend/public/public_header.php');
require_once('backend/public/navbar.php');

//error_reporting(0); 

?>

<html>

<body>





  <!-- CAROUSEL -->
  <div id="carouselExampleCaptions" class="carousel carousel-dark slide my-5 w-75 mx-auto" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/carousel/car1.jpg" class="d-block w-100 mx-auto" alt="..." style="max-width:800px; max-height:450px;">
        <div class="carousel-caption d-none d-md-block">
          <h5></h5>
          <p></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/carousel/car2.jpg" class="d-block w-100 mx-auto" alt="..." style="max-width:800px; max-height:450px;">
        <div class="carousel-caption d-none d-md-block">
          <h5></h5>
          <p></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/carousel/car3.jpg" class="d-block w-100 mx-auto" alt="..." style="max-width:800px; max-height:450px;">
        <div class="carousel-caption d-none d-md-block">
          <h5></h5>
          <p></p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- CAROUSEL -->










  <!-- BUSCADOR DE VUELOS -->
  <div class="wrapper">
    <form action="#">

      <!-- Radio Buttons -->
      <div class="form-group d-flex align-items-center justify-content-start flex-wrap">
        <label class="option my-sm-0 my-2 pe-3">
          <input type="radio" id="radio1" name="radio" checked onclick="Check1()">Ida y Vuelta<span class="checkmark"></span> </label>
        <label class="option my-sm-0 my-2">
          <input type="radio" id="radio2" name="radio" onclick="Check1()">Solo ida <span class="checkmark"></span>
        </label>
      </div>
      <!-- Origen -->
      <div class="form-group d-sm-flex margin">
        <div class="d-flex align-items-center flex-fill me-sm-1 my-sm-0 my-4 position-relative"> <input type="text" required placeholder="Origen" class="form-control">
          <div class="label" id="from"></div>
        </div>
        <div class="d-flex align-items-center flex-fill ms-sm-1 my-sm-0 my-4 position-relative"> <input type="text" required placeholder="Destino" class="form-control">
          <div class="label" id="to"></div>
        </div>
      </div>
      <!-- Destino -->
      <div class="form-group d-sm-flex margin">
        <!-- Fecha salida -->
        <div class="col-sm-12 d-flex align-items-center flex-fill me-sm1X my-sm-0 position-relative">
          <input id="departDate" required placeholder="Fecha de salida" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" type="text">
          <div class="label" id="depart"></div>
        </div>
        <!-- Fecha regreso -->
        <div id="divRD" class="col-sm-12 d-flex align-items-center flex-fill ms-sm-1 my-sm-0 my-4 position-relative">
          <input id="returnDate" type="text" required placeholder="Fecha de regreso" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')">
          <div class="label" id="return"></div>
        </div>
      </div>
      <!-- Pasajeros -->
      <div class="form-group d-flex align-items-center position-relative col-6">
        <input id="psngr" type="number" min="1" max="10" required placeholder="Pasajeros" class="form-control">
      </div>
      <!-- Boton buscar -->
      <div class="form-group my-3">
        <div class="btn btn-primary rounded-0 d-flex justify-content-center text-center p-3">Buscar Vuelos </div>
      </div>
    </form>
  </div>
  <!-- BUSCADOR DE VUELOS -->







  <!-- CARDS -->
  <div class="card-group w-75 mx-auto my-5">
    <div class="card mx-3" style="border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px;">
      <img class="card-img-top" src="assets/img/cards/card1.jpg" alt="Card image cap" style="border-radius: 10px 10px 0px 0px; -webkit-border-radius: 10px 10px 0px 0px; -moz-border-radius: 10px 10px 0px 0px;">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.
          This content is a little bit longer.</p>
      </div>
      <a href="#" class="btn btn-primary w-75 mx-auto mt-1 mb-4">Ver descuento</a>
    </div>
    <div class="card mx-3" style="border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px;">
      <img class="card-img-top" src="assets/img/cards/card1.jpg" alt="Card image cap" style="border-radius: 10px 10px 0px 0px; -webkit-border-radius: 10px 10px 0px 0px; -moz-border-radius: 10px 10px 0px 0px;">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      </div>
      <a href="#" class="btn btn-primary w-75 mx-auto mt-1 mb-4">Ver descuento</a>
    </div>
    <div class="card mx-3" style="border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px;">
      <img class="card-img-top" src="assets/img/cards/card1.jpg" alt="Card image cap" style="border-radius: 10px 10px 0px 0px; -webkit-border-radius: 10px 10px 0px 0px; -moz-border-radius: 10px 10px 0px 0px;">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.
          This card has even longer content than the first to show that equal height action.</p>
      </div>
      <a href="#" class="btn btn-primary w-75 mx-auto mt-1 mb-4">Ver descuento</a>
    </div>
  </div>


  <br>


  <div class="card-group w-75 mx-auto my-5">
    <div class="card mx-3" style="border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px;">
      <img class="card-img-top" src="assets/img/cards/card1.jpg" alt="Card image cap" style="border-radius: 10px 10px 0px 0px; -webkit-border-radius: 10px 10px 0px 0px; -moz-border-radius: 10px 10px 0px 0px;">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.
          This content is a little bit longer.</p>
      </div>
      <a href="#" class="btn btn-primary w-75 mx-auto mt-1 mb-4">Ver descuento</a>
    </div>
    <div class="card mx-3" style="border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px;">
      <img class="card-img-top" src="assets/img/cards/card1.jpg" alt="Card image cap" style="border-radius: 10px 10px 0px 0px; -webkit-border-radius: 10px 10px 0px 0px; -moz-border-radius: 10px 10px 0px 0px;">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      </div>
      <a href="#" class="btn btn-primary w-75 mx-auto mt-1 mb-4">Ver descuento</a>
    </div>
    <div class="card mx-3" style="border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px;">
      <img class="card-img-top" src="assets/img/cards/card1.jpg" alt="Card image cap" style="border-radius: 10px 10px 0px 0px; -webkit-border-radius: 10px 10px 0px 0px; -moz-border-radius: 10px 10px 0px 0px;">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.
          This card has even longer content than the first to show that equal height action.</p>
      </div>
      <a href="#" class="btn btn-primary w-75 mx-auto mt-1 mb-4">Ver descuento</a>
    </div>
  </div>
  <!-- CARDS -->


  <br><br>


  <!-- HISTORIA -->
  <div class="w-50 mx-auto my-5">
    <h1 class="mb-4 ">Los orígenes de una de las aerolíneas más importantes.</h1>

    <img style="max-width: 400px;" class="rounded float-start me-4 mb-3" src="assets/img/history section/plane.png" alt="Card image cap">
    <p>Nuestra empresa fue fundada en 2010 por Roberto Souviron mientras realizaba su MBA en Estados Unidos.
    <p>El objetivo inicial fue evitar que los viajeros hicieran largas colas en las ventanillas de las aerolíneas para
      conseguir un vuelo. Como muchos proyectos de Internet buscó expandirse rápidamente y en 10 meses abrió 9 oficinas
      en
      las principales ciudades de Latinoamérica.</p>
    <p>Fue una de las primeras firmas en ofrecer la posibilidad los usuarios de comprar online un vuelo y reservar una
      habitación en un hotel en Internet. Hoy es la agencia con mayor presencia en la región y líder en ventas.</p>
    <p>Con el objetivo de consolidarse en Latinoamérica y asociar su marca al concepto de turismo, generó alianzas con
      otros sitios de Internet para que le proveyeran tráfico y negocios.</p>
    <p>También cerró alianzas para facilitar el acceso a viajeros a la compra anticipada de entradas, comidas y hoteles
      de
      los parques de Disney World Resorts y más recientemente con Universal Studios.</p>
    <p>Para el año 2010, según la Asociación de Transporte Aéreo Internacional (IATA, por sus siglas en inglés)
      Despegar.com era la agencia que más pasajes aéreos vendía en la Argentina. En Brasil, Decolar.com, logró el mismo
      resultado.</p>
  </div>
  <!-- HISTORIA -->



  <br><br>



  <?php
  require_once('backend/public/public_footer.php');
  ?>

</body>

</html>