<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
echo "<hr>";
echo "Datos enviados por POST: "; 
echo "<br>Username: ".$username;
echo "<br>Pasword: ".$password;
echo "<hr>";


// habilita el reporte de errores de mysql
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "root", "mydb");

// consulta la BD 
//$consulta = "SELECT * FROM mydb.user WHERE username = '" . mysqli_real_escape_string($conexion, $username) . "' AND password = $password";
$consulta = "SELECT * FROM mydb.user WHERE username = '" . mysqli_real_escape_string($conexion, $username) . "' AND password = '" . mysqli_real_escape_string($conexion, $password) . "' ";

$resultado = mysqli_query($conexion, $consulta);

$row = mysqli_fetch_array($resultado);
$nrow = mysqli_num_rows($resultado);



// si el usUario y contraseña son correctos inicia sesión
if ($nrow > 0) {

    session_name($username);

    // parámetros de la sesión
    $arreglo = array();
    $_SESSION['username'] = $arreglo;

    $arreglo["username"] = $row["username"];
    $arreglo["name"] = $row["name"];
    $arreglo["last_name1"] = $row["last_name1"];
    $arreglo["last_name2"] = $row["last_name2"];
    $arreglo["birth_date"] = $row["birth_date"];
    $arreglo["email"] = $row["email"];
    $arreglo["work_phone"] = $row["work_phone"];
    $arreglo["personal_phone"] = $row["personal_phone"];
    $arreglo["address"] = $row["address"];

    $_SESSION['username'] = $arreglo;

    $arreglo2 = $_SESSION['username'];

    // imprime valores del arreglo individualmente
      /*echo "<hr>";
      echo "Parámetros de la sesión ";
      echo "<br>Username: ".$_SESSION['username']['username'];
      echo "<br>Nombre: ".$arreglo2["name"];
      echo "<br>Apellido1: ".$arreglo2['last_name1'];
      echo "<br>Apellido2: ".$arreglo2['last_name2'];
      echo "<br>Fecha de nacimiento: ".$arreglo2['birth_date'];
      echo "<br>Email: ".$arreglo2['email'];
      echo "<br>Teléfono de trabajo: ".$arreglo2['work_phone'];
      echo "<br>Teléfono personal: ".$arreglo2['personal_phone'];
      echo "<br>Dirección: ".$arreglo2['address'];
      echo '<hr>';*/

    // imprime todo el array
        /*echo '<hr>';
        echo '<hr>';
        foreach ($arreglo as $key => $value) {
            echo "$key = $value\n";
            echo '<br>';

        }
        echo '<hr>';
        echo '<hr>';*/

    //$_SESSION['username'] = $username;
    echo "<hr>";
    echo "Estado de la sesión: ".session_status();
    echo "<br>ID de la sesión: ".session_id();
    echo "<hr>";

    echo "<hr>";
    echo "Datos de la sesión: ";
    print_r( $_SESSION['username'] );
    echo "<hr>";

    header("refresh:0; url=../../index.php");

} else if ($nrow == 0) {

    //echo '<script type="text/javascript"> 
    //    swal("Hello world!");

    //  </script>';

    echo "<br>Nombre de usuario o contraseña incorrectos";
    header("refresh:0; url=../../signin.php"); // linea temporal
    //header("Location:../../signin.php");   // linea permanente
}

// liberación y cierre de la conexión
mysqli_free_result($resultado);
mysqli_close($conexion);

?>








