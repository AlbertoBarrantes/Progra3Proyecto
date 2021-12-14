<?php

require_once("adodb5/adodb.inc.php");
require_once("../domain/routes.php");



class routesDao {

    
    private $labAdodb; 
    
    public function __construct() {


        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        $this->labAdodb->Connect("localhost", "root", "root", "mydb");   
        $this->labAdodb->debug=true;
    
    }

    
    


    public function add(routes $routes) {
        try {
            $sql = sprintf("INSERT INTO mydb.route ( id, 
                                                        city_o_id, 
                                                        city_d_id, 
                                                        route_name, 
                                                        route_time, 
                                                        airplane_id, 
                                                        discount_id,
                                                        lastUser, 
                                                        lastModification) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,NOW())",
                    $this->labAdodb->Param("id"),
                    $this->labAdodb->Param("city_o_id"),
                    $this->labAdodb->Param("city_d_id"),
                    $this->labAdodb->Param("route_name"),
                    $this->labAdodb->Param("route_time"),
                    $this->labAdodb->Param("airplane_id"),
                    $this->labAdodb->Param("discount_id"),
                    $this->labAdodb->Param("lastUser"),
                    );
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["id"]                    = $routes->getid();
            $valores["city_o_id"]             = $routes->getcity_o_id();
            $valores["city_d_id"]             = $routes->getcity_d_id();
            $valores["route_name"]            = $routes->getroute_name();
            $valores["route_time"]            = $routes->getroute_time();
            $valores["airplane_id"]           = $routes->getairplane_id();
            $valores["discount_id"]           = $routes->getdiscount_id();
            $valores["lastUser"]              = $routes->getLastUser();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    
    


    public function exist(routes $routes) {


        $exist = false;
        try {
            $sql = sprintf("SELECT * FROM mydb.route WHERE  id = %s ",
                            $this->labAdodb->Param("id"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["id"] = $routes->getid();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase PersonasDao), error:'.$e->getMessage());
        }
        
    }

    
    


    public function update(routes $routes) {
        try {
            $sql = sprintf("update mydb.route set   city_o_id = %s, 
                                                    city_d_id = %s, 
                                                    route_name = %s, 
                                                    route_time = %s, 
                                                    airplane_id = %s, 
                                                    discount_id = %s, 
                                                    lastUser = %s,
                                                    lastModification = NOW() 
                            where id = %s",
                         
                    $this->labAdodb->Param("city_o_id"),
                    $this->labAdodb->Param("city_d_id"),
                    $this->labAdodb->Param("route_name"),
                    $this->labAdodb->Param("route_time"),
                    $this->labAdodb->Param("airplane_id"),
                    $this->labAdodb->Param("discount_id"),
                    $this->labAdodb->Param("lastUser"),
                    $this->labAdodb->Param("id"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            
            $valores["city_o_id"]             = $routes->getcity_o_id();
            $valores["city_d_id"]             = $routes->getcity_d_id();
            $valores["route_name"]            = $routes->getroute_name();
            $valores["route_time"]            = $routes->getroute_time();
            $valores["airplane_id"]           = $routes->getairplane_id();
            $valores["discount_id"]           = $routes->getdiscount_id();
            $valores["lastUser"]              = $routes->getlastuser();
            $valores["id"]                    = $routes->getid();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase PersonasDao), error:'.$e->getMessage());
        }
    }





    public function delete(routes $routes) {

        
        try {
            $sql = sprintf("DELETE FROM routes WHERE  id = %s",
                            $this->labAdodb->Param("id"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["id"] = $routes->getid();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase PersonasDao), error:'.$e->getMessage());
        }

    }

    
    


    public function searchById(routes $routes) {


        $returnroutes = null;
        try {
            $sql = sprintf("
                            SELECT  X.id, X.city_o_id, X.city_d_id, X.route_name, X.route_time, X.airplane_id, X.discount_id
                            FROM mydb.route X
                            WHERE  id = %s
                            ",
                            $this->labAdodb->Param("id"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["id"] = $routes->getid();
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnroutes = routes::createNullroutes();
                $returnroutes->setid($resultSql->Fields("id"));
                $returnroutes->setcity_o_id($resultSql->Fields("city_o_id"));
                $returnroutes->setcity_d_id($resultSql->Fields("city_d_id"));
                $returnroutes->setroute_name($resultSql->Fields("route_name"));
                $returnroutes->setairplane_id($resultSql->Fields("airplane_id"));
                $returnroutes->setroute_time($resultSql->Fields("route_time"));
                $returnroutes->setdiscount_id($resultSql->Fields("discount_id"));
                
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase PersonasDao), error:'.$e->getMessage());
        }
        return $returnroutes;

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
                            SELECT X.id, X.city_o_id, X.city_o_id, X.route_name, X.route_time, X.airplane_id, X.discount_id
                            FROM mydb.route X;
                            ");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    

}
