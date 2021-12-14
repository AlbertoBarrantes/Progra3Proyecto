<?php

require_once('../dao/conexion.php');  

  $Conexion = new Conexion();
  $Consulta =	"
				SELECT DISTINCT mydb.country_o.id, mydb.country_o.name
				FROM mydb.route
				JOIN mydb.city_o     ON  mydb.city_o.id     =  mydb.route.city_o_id
				JOIN mydb.country_o  ON  mydb.country_o.id  =  mydb.city_o.country_o_id;
				";

  $Resultado = $Conexion->query($Consulta);

   	    if($Resultado->num_rows > 0){
   	    	while($Fila = $Resultado->fetch_assoc()){
   	    		$data[] = $Fila;
   	    	}

   	    	// Imprime en Json
			header('Content-Type: application/json');
			echo json_encode($data, JSON_PRETTY_PRINT);
   	    }
?>
