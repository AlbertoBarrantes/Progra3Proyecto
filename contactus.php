<?php
$page_title = 'Contactanos';

session_start();

require_once('backend/public/public_header.php');
require_once('backend/public/navbar.php');

//error_reporting(0); 

?>
    <link rel="stylesheet" href="bootstrap.css">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.css">

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-title">
                        <h2 class="text-center py-2"> Contactanos </h2>
                        <hr>
                        <?php 
                            $Msg = "";
                            if(isset($_GET['error']))
                            {
                                $Msg = " Por favor llena los campos en blanco ";
                                echo '<div class="alert alert-danger">'.$Msg.'</div>';
                            }

                            if(isset($_GET['success']))
                            {
                                $Msg = " Tu mensaje se ha enviado ";
                                echo '<div class="alert alert-success">'.$Msg.'</div>';
                            }
                        
                        ?>
                    </div>
                    <div class="my-5 signup-form2 shadow text-center" style="max-width:350px !important;">
                        <form action="process.php" method="post">
                            <input type="text" name="UName" placeholder="Nombre de usuario" class="form-control">
                            <input type="email" name="Email" placeholder="Correo electronico" class="form-control">
                            <input type="text" name="Subject" placeholder="Titulo" class="form-control">
                            <textarea name="msg" class="form-control" placeholder="Escribe tu consulta"></textarea>
                            <button class="btn btn-success" name="btn-send"> Enviar </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>




<?php
  require_once('backend/public/public_footer.php');
  ?>

  </html>