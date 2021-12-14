<?php
$page_title = 'Historia';

session_start();

require_once('backend/public/public_header.php');
require_once('backend/public/navbar.php');

//error_reporting(0); 

?>

   
  <link rel="stylesheet" href="assets/css/history.css">
  </head>
  <body>
    <main>
      <!-- ***************  ABOUT / PROFILE  **************** -->
      <header>
        <div class="content-wrap">
          <h1>Easy Travel</h1>
          <h2>Agencia de viajes</h2>
          <BR><BR>
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
      </header>

      <!-- ************ PROJECTS / PORTFOLIO  ************** -->
      <section class="projects">
        <div class="content-wrap divider">
          <h2>Un poco de nosotros</h2>
          <p>Mejor centro de atencion<a href="contactus.php"> Contactenos</a>.</p>

          <!-- Project 1 -->
          <section class="project-item">
            <img src="assets/img/history/viajes5.jpg" alt="">
            <h3>Por años</h3>
            <p>Hemos estado pensando en nuestros clientes y nos preparamos para ofrecer la mayor calidad en nuestra atención</p>
            <a class="btn" href="#" target="_blank"> Inicio</a>
            <a class="btn" href="3">Ayuda</a>
          </section>

        </div>
      </section>

      <!-- ****************  WORK EXPERIENCE  ******************** -->
      <section class="work-experience">
        <div class="content-wrap item-details divider">
          <h2>Experiencia</h2>
          <p>Fuimos clientes y ahora tenemos la experiencia de lo que se necesita para dar un buen servicio<a href="#"> Más información</a>.</p>

          <!-- Job 1 -->
          <section class="job-item">
            <div class="job-details">
              <h3>Mayor variedad de opciones</h3>
              <p>Instalaciones al más alto nivel tecnologico</p>
              <p>Presentes desde 2010</p>
            </div>
            <div class="job-summary">
              <p>  <a href="#">Más información</a>.</p>
            </div>
          </section>


        </div>
      </section>

      <!-- *************  EDUCATION & CERTIFICATIONS *********** -->
      <section class="education">
        <div class="content-wrap item-details">
          <h2>Futuro</h2>

          <section>
            <h3>Creemos en le crecimiento</h3>
            <p>Tratmos a nuestros colaboradores como familia</p>
            <p>Becas dadas en los ultimos 5 años: 158</p>
          </section>

        </div>
      </section>







<?php
  require_once('backend/public/public_footer.php');
  ?>


</html>