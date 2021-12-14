<?php

require_once("adodb5/adodb.inc.php");
require_once("../domain/airplanes.php");



class AirplanesDao {

    
    private $labAdodb; 
    
    public function __construct() {


        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        $this->labAdodb->Connect("localhost", "root", "root", "mydb");   
        $this->labAdodb->debug=true;
    
    }

    
    


    public function add(Airplanes $airplanes) {
        try {
            $sql = sprintf("INSERT INTO mydb.airplane ( airplane_id, 
                                                        yearx, 
                                                        model, 
                                                        brand, 
                                                        passengers, 
                                                        rowsx, 
                                                        sits_row,
                                                        lastUser, 
                                                        lastModification) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,NOW())",
                    $this->labAdodb->Param("airplane_id"),
                    $this->labAdodb->Param("yearx"),
                    $this->labAdodb->Param("model"),
                    $this->labAdodb->Param("brand"),
                    $this->labAdodb->Param("passengers"),
                    $this->labAdodb->Param("rowsx"),
                    $this->labAdodb->Param("sits_row"),
                    $this->labAdodb->Param("lastUser"),
                    );
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["airplane_id"]       = $airplanes->getairplane_id();
            $valores["yearx"]             = $airplanes->getyearx();
            $valores["model"]             = $airplanes->getmodel();
            $valores["brand"]             = $airplanes->getbrand();
            $valores["passengers"]        = $airplanes->getpassengers();
            $valores["rowsx"]             = $airplanes->getrowsx();
            $valores["sits_row"]          = $airplanes->getsits_row();
            $valores["lastUser"]          = $airplanes->getLastUser();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    
    


    public function exist(Airplanes $airplanes) {


        $exist = false;
        try {
            $sql = sprintf("SELECT * FROM mydb.airplane WHERE  airplane_id = %s ",
                            $this->labAdodb->Param("airplane_id"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["airplane_id"] = $airplanes->getairplane_id();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase PersonasDao), error:'.$e->getMessage());
        }
        
    }

    
    


    public function update(Airplanes $airplanes) {
        try {
            $sql = sprintf("update mydb.airplane set yearx = %s, 
                                                    model = %s, 
                                                    brand = %s, 
                                                    passengers = %s, 
                                                    rowsx = %s, 
                                                    sits_row = %s, 
                                                    lastUser = %s,
                                                    lastModification = NOW() 
                            where airplane_id = %s",
                         
                    $this->labAdodb->Param("yearx"),
                    $this->labAdodb->Param("model"),
                    $this->labAdodb->Param("brand"),
                    $this->labAdodb->Param("passengers"),
                    $this->labAdodb->Param("rowsx"),
                    $this->labAdodb->Param("sits_row"),
                    $this->labAdodb->Param("lastUser"),
                    $this->labAdodb->Param("airplane_id"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            
            $valores["yearx"]             = $airplanes->getyearx();
            $valores["model"]             = $airplanes->getmodel();
            $valores["brand"]             = $airplanes->getbrand();
            $valores["passengers"]        = $airplanes->getpassengers();
            $valores["rowsx"]             = $airplanes->getrowsx();
            $valores["sits_row"]          = $airplanes->getsits_row();
            $valores["lastUser"]          = $airplanes->getlastuser();
            $valores["airplane_id"]       = $airplanes->getairplane_id();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase PersonasDao), error:'.$e->getMessage());
        }
    }





    public function delete(Airplanes $airplanes) {

        
        try {
            $sql = sprintf("DELETE FROM airplane WHERE  airplane_id = %s",
                            $this->labAdodb->Param("airplane_id"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["airplane_id"] = $airplanes->getairplane_id();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase PersonasDao), error:'.$e->getMessage());
        }

    }

    
    


    public function searchById(Airplanes $airplanes) {


        $returnairplanes = null;
        try {
            $sql = sprintf("
                            SELECT  X.airplane_id, X.model, X.yearx, X.brand, X.passengers, X.rowsx, X.sits_row
                            FROM mydb.airplane X
                            WHERE  airplane_id = %s
                            ",
                            $this->labAdodb->Param("airplane_id"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["airplane_id"] = $airplanes->getairplane_id();
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnairplanes = airplanes::createNullAirplanes();
                $returnairplanes->setairplane_id($resultSql->Fields("airplane_id"));
                $returnairplanes->setyearx($resultSql->Fields("yearx"));
                $returnairplanes->setmodel($resultSql->Fields("model"));
                $returnairplanes->setbrand($resultSql->Fields("brand"));
                $returnairplanes->setrowsx($resultSql->Fields("rowsx"));
                $returnairplanes->setpassengers($resultSql->Fields("passengers"));
                $returnairplanes->setsits_row($resultSql->Fields("sits_row"));
                
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase PersonasDao), error:'.$e->getMessage());
        }
        return $returnairplanes;

    }

    //***********************************************************
    //obtiene la información de las personas en la base de datos
    //***********************************************************
    
    // public function getAll() {
    //     try {
    //         $sql = sprintf("SELECT * FROM mydb.airplane");
    //         $resultSql = $this->labAdodb->Execute($sql);
    //         return $resultSql;
    //     } catch (Exception $e) {
    //         throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase PersonasDao), error:'.$e->getMessage());
    //     }
    // }





    public function getAll() {
        try {
            $sql = sprintf("
                            SELECT  X.airplane_id, X.model, X.yearx, X.brand, X.passengers, X.rowsx, X.sits_row
                            FROM mydb.airplane X;
                            ");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    

}
