<?php

require_once('../dao/conexion.php');  

$idPaisOrigen   = $_POST['idPaisOrigen'];
$idCiudadOrigen = $_POST['idCiudadOrigen'];
$idPaisDestino  = $_POST['idPaisDestino'];

$conn = new Conexion();

$query =	"
			SELECT DISTINCT R.id, CiD.name
			FROM mydb.route R
			JOIN mydb.city_o CiO    ON CiO.id = R.city_o_id
			JOIN mydb.country_o CoO ON CoO.id = CiO.country_o_id
			JOIN mydb.city_d CiD    ON CiD.id = R.city_d_id
			JOIN mydb.country_d CoD ON CoD.id = CiD.country_d_id
			WHERE CoO.id = ? AND CiO.id = ? AND CoD.id = ?;
			";

// prepare and bind
$stmt = $conn->prepare($query);
$stmt->bind_param("iii", $idPaisOrigen, $idCiudadOrigen, $idPaisDestino);

// set parameters and execute
$stmt->execute();

$result = $stmt->get_result();

$outp = $result->fetch_all(MYSQLI_ASSOC);

header('Content-Type: application/json');
echo json_encode($outp, JSON_PRETTY_PRINT);

$stmt->close();
$conn->close();

?>
