<?php

require_once('../dao/conexion.php');  

$id = $_POST['id'];

$conn = new Conexion();

$query =	"
			SELECT DISTINCT mydb.country_d.id, mydb.country_d.name
			FROM mydb.route
			JOIN mydb.city_o     ON  mydb.city_o.id     =  mydb.route.city_o_id
			JOIN mydb.country_o  ON  mydb.country_o.id  =  mydb.city_o.country_o_id
			JOIN mydb.city_d     ON  mydb.city_d.id     =  mydb.route.city_d_id
			JOIN mydb.country_d  ON  mydb.country_d.id  =  mydb.city_d.country_d_id
			WHERE mydb.city_o.id = ?;
			";

// prepare and bind
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);

// set parameters and execute
$stmt->execute();

$result = $stmt->get_result();

$outp = $result->fetch_all(MYSQLI_ASSOC);

//echo json_encode($outp);

header('Content-Type: application/json');
echo json_encode($outp, JSON_PRETTY_PRINT);

$stmt->close();
$conn->close();


// require_once('../dao/conexion.php');  

//   $Conexion = new Conexion();
//   $Consulta = 	"
// 					SELECT R.city_o_id, R.city_d_id, CD.city_name
// 					FROM mydb.route R
// 					JOIN mydb.city_o CO ON CO.city_id = R.city_o_id
// 					JOIN mydb.city_d CD ON CD.city_id = R.city_d_id;
// 				";

//   $Resultado = $Conexion->query($Consulta);

//    	    if($Resultado->num_rows > 0){
//    	    	while($Fila = $Resultado->fetch_assoc()){
//    	    		$data[] = $Fila;
//    	    	}

//    	    	// Imprime en Json
// 			header('Content-Type: application/json');
// 			echo json_encode($data, JSON_PRETTY_PRINT);
//    	    }
?>



