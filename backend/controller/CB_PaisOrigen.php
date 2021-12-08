<?php

require_once('../dao/conexion.php');  

  $Conexion = new Conexion();
  $Consulta =	"
					SELECT DISTINCT CO.city_id, CO.city_name
					FROM mydb.route R
					JOIN mydb.city_o CO ON CO.city_id = R.city_o_id
					JOIN mydb.city_d CD ON CD.city_id = R.city_d_id;
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
