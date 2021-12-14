<?php

require_once('../dao/conexion.php');  

$idPaisOrigen = $_POST['idPaisOrigen'];
$idCiudadOrigen = $_POST['idCiudadOrigen'];

$conn = new Conexion();

$query =	"
			SELECT DISTINCT mydb.country_d.id, mydb.country_d.name
			FROM mydb.route
			JOIN mydb.city_o     ON  mydb.city_o.id     =  mydb.route.city_o_id
			JOIN mydb.country_o  ON  mydb.country_o.id  =  mydb.city_o.country_o_id
			JOIN mydb.city_d     ON  mydb.city_d.id     =  mydb.route.city_d_id
			JOIN mydb.country_d  ON  mydb.country_d.id  =  mydb.city_d.country_d_id
			WHERE mydb.country_o.id = ? AND mydb.city_o.id = ?;
			";

// prepare and bind
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $idPaisOrigen, $idCiudadOrigen);

// set parameters and execute
$stmt->execute();

$result = $stmt->get_result();

$outp = $result->fetch_all(MYSQLI_ASSOC);

//echo json_encode($outp);

header('Content-Type: application/json');
echo json_encode($outp, JSON_PRETTY_PRINT);

$stmt->close();
$conn->close();


?>



