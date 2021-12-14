<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// habilita el reporte de errores de mysql
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "root", "mydb");

// consulta la BD 
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

    header("Location:../../index.php");

} else if ($nrow == 0) {


    echo "<br>Nombre de usuario o contraseña incorrectos";
    header("Location:../../signin.php");
}

// liberación y cierre de la conexión
mysqli_free_result($resultado);
mysqli_close($conexion);

?>
