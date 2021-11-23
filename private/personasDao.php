<?php

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/personas.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

//this attribute enable to see the SQL's executed in the data base
//$this->labAdodb->debug=true;

class PersonasDao {

    private $labAdodb;
    
    public function __construct() {
        //echo "prueba";
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        //$this->labAdodb->setCharset('utf8');
        //$this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        $this->labAdodb->Connect("localhost", "root", "root", "mydb");
        $this->labAdodb->debug=true;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Personas $personas) {

        
        try {
            $sql = sprintf("insert into Personas (login_name, user_name, user_last_name1, user_last_name2, user_birth_date, user_email, user_work_phone, user_home_phone, user_password, address ) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
                    $this->easytravel->Param("login_name"),
                    $this->easytravel->Param("user_name"),
                    $this->easytravel->Param("user_last_name1"),
                    $this->easytravel->Param("user_last_name2"),
                    $this->easytravel->Param("user_birth_date"),
                    $this->easytravel->Param("user_email"),
                    $this->easytravel->Param("user_work_phone"),
                    $this->easytravel->Param("user_home_phone"),
                    $this->easytravel->Param("user_password"),
                    $this->easytravel->Param("address"));
                  
            $sqlParam = $this->easytravel->Prepare($sql);

            $valores = array();

            $valores["login_name"]        = $personas->getlogin_name();
            $valores["user_name"]         = $personas->getuser_name();
            $valores["user_last_name1"]   = $personas->getuser_last_name1();
            $valores["user_last_name2"]   = $personas->getuser_last_name2();
            $valores["user_birth_date"]   = $personas->getuser_birth_date();
            $valores["user_work_phone"]   = $personas->getuser_work_phone();
            $valores["user_home_phone"]   = $personas->getuser_home_phone();
            $valores["user_password"]     = $personas->getuser_password();
            $valores["address"]           = $personas->getaddress();

            $this->easytravel->Execute($sqlParam, $valores) or die($this->easytravel->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Personas $personas) {

        
        $exist = false;
        try {
            $sql = sprintf("select * from Personas where  PK_cedula = %s ",
                            $this->labAdodb->Param("PK_cedula"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["PK_cedula"] = $personas->getPK_cedula();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Personas $personas) {

        
        try {
            $sql = sprintf("update Personas set nombre = %s, 
                                                apellido1 = %s, 
                                                apellido2 = %s, 
                                                fecNacimiento = %s, 
                                                sexo = %s, 
                                                observaciones = %s, 
                                                LASTUSER = %s, 
                                                LASTMODIFICATION = CURDATE() 
                            where PK_cedula = %s",
                    $this->labAdodb->Param("nombre"),
                    $this->labAdodb->Param("apellido1"),
                    $this->labAdodb->Param("apellido2"),
                    $this->labAdodb->Param("fecNacimiento"),
                    $this->labAdodb->Param("sexo"),
                    $this->labAdodb->Param("observaciones"),
                    $this->labAdodb->Param("LASTUSER"),
                    $this->labAdodb->Param("PK_cedula"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["nombre"]          = $personas->getnombre();
            $valores["apellido1"]       = $personas->getapellido1();
            $valores["apellido2"]       = $personas->getapellido2();
            $valores["fecNacimiento"]   = $personas->getfecNacimiento();
            $valores["sexo"]            = $personas->getsexo();
            $valores["observaciones"]   = $personas->getobservaciones();
            $valores["LASTUSER"]        = $personas->getLastUser();
            $valores["PK_cedula"]       = $personas->getPK_cedula();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Personas $personas) {

        
        try {
            $sql = sprintf("delete from Personas where  PK_cedula = %s",
                            $this->labAdodb->Param("PK_cedula"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["PK_cedula"] = $personas->getPK_cedula();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Personas $personas) {

        
        $returnPersonas = null;
        try {
            $sql = sprintf("select * from Personas where  PK_cedula = %s",
                            $this->labAdodb->Param("PK_cedula"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["PK_cedula"] = $personas->getPK_cedula();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnPersonas = Personas::createNullPersonas();
                $returnPersonas->setPK_cedula($resultSql->Fields("PK_cedula"));
                $returnPersonas->setnombre($resultSql->Fields("nombre"));
                $returnPersonas->setapellido1($resultSql->Fields("apellido1"));
                $returnPersonas->setapellido2($resultSql->Fields("apellido2"));
                $returnPersonas->setfecNacimiento($resultSql->Fields("fecNacimiento"));
                $returnPersonas->setsexo($resultSql->Fields("sexo"));
                $returnPersonas->setobservaciones($resultSql->Fields("observaciones"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase PersonasDao), error:'.$e->getMessage());
        }
        return $returnPersonas;
    }

    //***********************************************************
    //obtiene la información de las personas en la base de datos
    //***********************************************************
    
    public function getAll() {

        
        try {
            $sql = sprintf("select * from Personas");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

}
