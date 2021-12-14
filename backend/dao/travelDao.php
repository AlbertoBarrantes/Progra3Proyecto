<?php

require_once("adodb5/adodb.inc.php");
require_once("../domain/travel.php");



class TravelDao
{


    //conexion con la base de datos    
    private $labAdodb;

    public function __construct()
    {
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        $this->labAdodb->Connect("localhost", "root", "root", "mydb");
        $this->labAdodb->debug = true;
    }





    public function add(Travel $x)
    {
        try {
            $sql = sprintf(
                "insert into mydb.travel (  username, 
                                            name, 
                                            last_name1, 
                                            last_name2, 
                                            email, 
                                            birth_date, 
                                            password, 
                                            address,
                                            work_phone,
                                            personal_phone,
                                            lastuser, 
                                            lastmodification) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,NOW())",
                $this->labAdodb->Param("username"),
                $this->labAdodb->Param("name"),
                $this->labAdodb->Param("last_name1"),
                $this->labAdodb->Param("last_name2"),
                $this->labAdodb->Param("email"),
                $this->labAdodb->Param("birth_date"),
                $this->labAdodb->Param("password"),
                $this->labAdodb->Param("password"),
                $this->labAdodb->Param("address"),
                $this->labAdodb->Param("work_phone"),
                $this->labAdodb->Param("personal_phone"),
            );
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["username"]         = $x->getusername();
            $valores["name"]             = $x->getname();
            $valores["last_name1"]       = $x->getlast_name1();
            $valores["last_name2"]       = $x->getlast_name2();
            $valores["email"]            = $x->getemail();
            $valores["birth_date"]       = $x->getbirth_date();
            $valores["password"]         = $x->getpassword();
            $valores["address"]          = $x->getaddress();
            $valores["work_phone"]       = $x->getwork_phone();
            $valores["personal_phone"]   = $x->getpersonal_phone();
            $valores["lastuser"]         = $x->getLastUser();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase PersonasDao), error:' . $e->getMessage());
        }
    }





    public function exist(Travel $x)
    {
        $exist = false;
        try {
            $sql = sprintf(
                "select * from mydb.travel where  username = %s ",
                $this->labAdodb->Param("username")
            );
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["username"] = $x->getusername();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase PersonasDao), error:' . $e->getMessage());
        }
    }





    public function update(Travel $x)
    {
        try {
            $sql = sprintf(
                "update user set name = %s, 
                                            last_name1 = %s, 
                                            last_name2 = %s, 
                                            email = %s, 
                                            birth_date = %s, 
                                            password = %s, 
                                            address = %s, 
                                            work_phone = %s,
                                            personal_phone = %s,
                                            lastuser = %s, 
                                            LASTMODIFICATION = CURDATE() 
                            where username = %s",
                $this->labAdodb->Param("username"),
                $this->labAdodb->Param("name"),
                $this->labAdodb->Param("last_name1"),
                $this->labAdodb->Param("last_name2"),
                $this->labAdodb->Param("email"),
                $this->labAdodb->Param("birth_date"),
                $this->labAdodb->Param("password"),
                $this->labAdodb->Param("address"),
                $this->labAdodb->Param("work_phone"),
                $this->labAdodb->Param("personal_phone"),
                $this->labAdodb->Param("lastuser"),
                $this->labAdodb->Param("LASTMODIFICATION")
            );
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["name"]             = $x->getname();
            $valores["last_name1"]       = $x->getlast_name1();
            $valores["last_name2"]       = $x->getlast_name2();
            $valores["email"]            = $x->getemail();
            $valores["birth_date"]       = $x->getbirth_date();
            $valores["password"]         = $x->getpassword();
            $valores["address"]          = $x->getaddress();
            $valores["work_phone"]       = $x->getwork_phone();
            $valores["personal_phone"]   = $x->getpersonal_phone();
            $valores["lastuser"]         = $x->getlastuser();
            $valores["username"]         = $x->getusername();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase PersonasDao), error:' . $e->getMessage());
        }
    }





    public function delete(Travel $x)
    {


        try {
            $sql = sprintf(
                "delete from user where  username = %s",
                $this->labAdodb->Param("username")
            );
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["username"] = $x->getusername();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase PersonasDao), error:' . $e->getMessage());
        }
    }





    public function searchById(Travel $x)
    {
        $returnUsers = null;
        try {
            $sql = sprintf(
                "select * from user where  username = %s",
                $this->labAdodb->Param("username")
            );
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["username"] = $x->getusername();
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $returnUsers = Travel::createNullUsers();
                $returnUsers->setusername($resultSql->Fields("username"));
                $returnUsers->setname($resultSql->Fields("name"));
                $returnUsers->setlast_name1($resultSql->Fields("last_name1"));
                $returnUsers->setlast_name2($resultSql->Fields("last_name2"));
                $returnUsers->setemail($resultSql->Fields("email"));
                $returnUsers->setbirth_date($resultSql->Fields("birth_date"));
                $returnUsers->setpassword($resultSql->Fields("password"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase PersonasDao), error:' . $e->getMessage());
        }
        return $returnUsers;
    }





    public function getAll()
    {
        try {
            $sql = sprintf("select * from mydb.travel");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase PersonasDao), error:' . $e->getMessage());
        }
    }
}
