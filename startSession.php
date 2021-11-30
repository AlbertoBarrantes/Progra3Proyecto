
<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php

$username = $_POST['username'];
$password = $_POST['password'];
//echo("Datos enviados por POST: <br> Username: $username");
//echo("<br>Pasword: $password");

//conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "root", "mydb");  


// consulta la BD 
$consulta = "SELECT * FROM mydb.user WHERE username = '" . mysqli_real_escape_string($conexion, $username) . "' AND password = $password";

$resultado = mysqli_query($conexion, $consulta);

$row = mysqli_fetch_array($resultado);
$nrow = mysqli_num_rows($resultado);



if($nrow >= 1){

    session_start();
    $_SESSION['username'] = $username;

    header("Location:index.php"); //refresh:5,  
    
} else if($nrow == 0 ) {

    echo '<script type="text/javascript"> 
        swal("Hello world!");

      </script>';

      echo "<br>Nombre de usuario o contraseña incorrectos";
      header("refresh:3, url=signin.html");

    
}


// liberación y cierre de la conexión
mysqli_free_result($resultado);
mysqli_close($conexion);
