<?php
session_start();







function getPaisesDestino() {


    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conexion = mysqli_connect("localhost", "root", "root", "mydb");

    // consulta la BD 
    $consulta = "   
                SELECT CO.city_name
                FROM mydb.route R
                JOIN mydb.city_o CO ON CO.city_id = R.city_o_id
                JOIN mydb.city_d CD ON CD.city_id = R.city_d_id;
                ";

    $resultado = mysqli_query($conexion, $consulta);

    $nrow = mysqli_num_rows($resultado);

    if ($nrow > 0) {

        $array2 = array();
    
        while ($row = mysqli_fetch_array($resultado)) {
            array_push($array2, $row['city_name']);
            //array_push($array2, "FFF");
        }

        $GLOBALS["arregloPaisesDestino"] = $array2;

        //print_r($GLOBALS["arregloPaisesOrigen"]);
  

        mysqli_free_result($resultado);
        mysqli_close($conexion);

    } else if ($nrow == 0) {

        echo "<br>Nombre de usuario o contraseña incorrectos";
        //header("refresh:2; url=../../signin.php"); // linea temporal
    }
    

}



function getPaisesOrigen() {


    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conexion = mysqli_connect("localhost", "root", "root", "mydb");

    // consulta la BD 
    $consulta = "   
                SELECT CO.city_name
                FROM mydb.route R
                JOIN mydb.city_o CO ON CO.city_id = R.city_o_id
                JOIN mydb.city_d CD ON CD.city_id = R.city_d_id;
                ";

    $resultado = mysqli_query($conexion, $consulta);

    $nrow = mysqli_num_rows($resultado);

    if ($nrow > 0) {

        $array2 = array();
    
        while ($row = mysqli_fetch_array($resultado)) {
            array_push($array2, $row['city_name']);
            //array_push($array2, "FFF");
        }

        $GLOBALS["arregloPaisesOrigen"] = $array2;

        //print_r($GLOBALS["arregloPaisesOrigen"]);
  

        mysqli_free_result($resultado);
        mysqli_close($conexion);

    } else if ($nrow == 0) {

        echo "<br>Nombre de usuario o contraseña incorrectos";
        //header("refresh:2; url=../../signin.php"); // linea temporal
    }
    

}
