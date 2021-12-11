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
          <h2>Featured Projects</h2>
          <p>View selected projects below. More information can be found at <a href="http://christinatruong.com">christinatruong.com</a>.</p>

          <!-- Project 1 -->
          <section class="project-item">
            <img src="assets/img/historyproject-courses.jpg" alt="Lynda & LinkedIn Learning course list">
            <h3>Lynda / LinkedIn Learning Courses</h3>
            <p>Developed content and instruction for various CSS and front-end focused web development courses including CSS Essential Training, Getting Your Website Online, Design Systems & Architectures and more.</p>
            <a class="btn" href="https://www.linkedin.com/learning/instructors/christina-truong?u=2125562" target="_blank">LinkedIn Learning</a>
            <a class="btn" href="https://www.lynda.com/Christina-Truong/7842227-1.html">Lynda.com</a>
          </section>

          <!-- Project 2 -->
          <section class="project-item">
            <img src="assets/img/history/project-women-tech.jpg" alt="Women and Tech website">
            <h3>Women&&Tech</h3>
            <p>Women&&Tech was launched in 2012 to feature interviews with different women working in the tech industry. I became familiar with them when I was invited to be one of the interviewees! A few years later, I joined the team and helped with the relaunch of the site as the front-end architect.</p>
            <a class="btn" href="http://christinatruong.com/projects/women-and-tech-redesign.html" target="_blank">View the case study</a>
          </section>

          <!-- Project 3 -->
          <section class="project-item">
            <img src="/assets/img/viajes1.jpg" alt="The Wire Ipsum website">
            <h3>The Wire Ipsum</h3>
            <p>After coming back from teaching a JavaScript workshop, I felt inspired to create something just for fun. I realized that of all the content/lorem ipsum generators available, there was nothing for HBO’s The Wire fans. I searched for <a href="http://thewireipsum.com" target="_blank">thewireipsum.com</a> domain and it was available! Generate some content for your projects today.</p>
            <a class="btn" href="http://thewireipsum.com" target="_blank">View live site</a>
          </section>
        </div>
      </section>

      <!-- ****************  WORK EXPERIENCE  ******************** -->
      <section class="work-experience">
        <div class="content-wrap item-details divider">
          <h2>Work Experience</h2>
          <p>See my complete work history on <a href="https://www.linkedin.com/in/christinatruong/">LinkedIn</a>.</p>

          <!-- Job 1 -->
          <section class="job-item">
            <div class="job-details">
              <h3>Front-end Developer & Educator</h3>
              <p>Freelance</p>
              <p>July 2006-Present</p>
            </div>
            <div class="job-summary">
              <p>Provides various front-end related services ranging from development work, speaking engagements, instructor training, workshops, and curriculum development. See more at  <a href="http://christinatruong.com">christinatruong.com</a>.</p>
            </div>
          </section>

          <!-- Job 2 -->
          <section class="job-item">
            <div class="job-details">
              <h3>Director of Curriculum</h3>
              <p>Ladies Learning Code</p>
              <p>July 2014 - February 2016</p>
            </div>
            <div class="job-summary">
              <p>Managed all curriculum for the adult programs. Created teaching materials and implemented instructor training across 20+ Canadian chapters.</p>
              <p>Key contributions:</p>
              <ul>
                <li>Overhauled the curriculum and standardized the content and delivery.
                  <ul>
                    <li>Created 9 new workshops focusing on HTML, CSS, JavaScript, jQuery, Wordpress and Responsive Web Design.</li>
                    <li>Created all Hackapalooza content (2 day conference style event) consisting of 2-4 hour workshop sessions.</li>
                    <li>Created interactive slide deck template for consistent national workshop branding.</li>
                    <li>Developed the Digital Skills part-time program curriculum.</li>
                  </ul>
                </li>
                <li>Provided training for all instructors focusing on creating an inclusive and engaging learning environment.</li>
                <li>Maintained the ladieslearningcode.com website.</li>
                <li>Volunteer lead instructor from 2011-2014 for Toronto workshops and several chapter launches.</li>
              </ul>
            </div>
          </section>

          <!-- Job 3 -->
          <section class="job-item">
            <div class="job-details">
              <h3>Lead Front-End Developer</h3>
              <p>Field iD</p>
              <p>March 2013 - February 2014</p>
            </div>
            <div class="job-summary">
              <p>Lead the front-end development for the in-house safety inspection software.</p>
              <p>Key contributions:</p>
              <ul>
                <li>Responsible for setting code standards for the front-end development.</li>
                <li>Created a fully customized front-end framework, including the UI/UX design.</li>
                <li>Standardized the site architecture and design.</li>
              </ul>
            </div>
          </section>
        </div>
      </section>

      <!-- *************  EDUCATION & CERTIFICATIONS *********** -->
      <section class="education">
        <div class="content-wrap item-details">
          <h2>Education</h2>

          <section>
            <h3>Seneca College - Toronto, ON</h3>
            <p>Webmaster Content Site Design Certificate, 2006</p>
            <p>14 week full-time program covering HTML, CSS, Flash, Photoshop, PHP and JavaScript.</p>
          </section>

          <section>
            <h3>York University - Toronto, ON</h3>
            <p>Bachelor of Arts with Honours, 2001-2005</p>
            <p>Double Major in Communications & Psychology.</p>
          </section>

          <section>
            <h3>San Jose State University - San Jose, CA</h3>
            <p>General Studies, 2000</p>
          </section>
        </div>
      </section>







<?php
  require_once('backend/public/public_footer.php');
  ?>


</html>