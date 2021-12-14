<?php

require_once('../dao/conexion.php');  

$param1 = $_POST['id'];

$conn = new Conexion();

$query =	"
			SELECT DISTINCT mydb.city_o.id, mydb.city_o.name
			FROM mydb.route
			JOIN mydb.city_o     ON  mydb.city_o.id     =  mydb.route.city_o_id
			JOIN mydb.country_o  ON  mydb.country_o.id  =  mydb.city_o.country_o_id
			WHERE mydb.country_o.id = ?;
			";

// prepare and bind
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $param1);

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
