<?php

require_once("adodb5/adodb.inc.php");
require_once("../domain/users.php");



class UsersDao {

    
    private $labAdodb;//objeto de conexion con la base de datos    
    
    public function __construct() {
        //se crea el objeto con la conexión de la base de datos
        //según los datos del servidor de mysql
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        //$this->labAdodb->setCharset('utf8');
        //$this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        //los cados de conexión   host,       user,   pass,   basedatos
        $this->labAdodb->Connect("localhost", "root", "root", "mydb");   
        
        //si se desea hacer debug del SQL que se genera en la base de datos
        //dependiendo del error es necesario ver si es un error directamente
        //en la base de datos
        $this->labAdodb->debug=true;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Users $users) {
        try {
            $sql = sprintf("insert into mydb.user (username, 
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

            $valores["username"]         = $users->getusername();
            $valores["name"]             = $users->getname();
            $valores["last_name1"]       = $users->getlast_name1();
            $valores["last_name2"]       = $users->getlast_name2();
            $valores["email"]            = $users->getemail();
            $valores["birth_date"]       = $users->getbirth_date();
            $valores["password"]         = $users->getpassword();
            $valores["address"]          = $users->getaddress();
            $valores["work_phone"]       = $users->getwork_phone();
            $valores["personal_phone"]   = $users->getpersonal_phone();
            $valores["lastuser"]         = $users->getLastUser();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Users $users) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.user where  username = %s ",
                            $this->labAdodb->Param("username"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["username"] = $users->getusername();

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

    public function update(Users $users) {
        try {
            $sql = sprintf("update user set name = %s, 
                                            last_name1 = %s, 
                                            last_name2 = %s, 
                                            email = %s, 
                                            birth_date = %s, 
                                            password = %s, 
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
                    $this->labAdodb->Param("lastuser"),
                    $this->labAdodb->Param("LASTMODIFICATION"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["name"]             = $users->getname();
            $valores["last_name1"]       = $users->getlast_name1();
            $valores["last_name2"]       = $users->getlast_name2();
            $valores["email"]            = $users->getemail();
            $valores["birth_date"]       = $users->getbirth_date();
            $valores["password"]         = $users->getpassword();
            $valores["lastuser"]         = $users->getlastuser();
            $valores["username"]         = $users->getusername();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Users $users) {

        
        try {
            $sql = sprintf("delete from user where  username = %s",
                            $this->labAdodb->Param("username"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["username"] = $users->getusername();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Users $users) {
        $returnUsers = null;
        try {
            $sql = sprintf("select * from user where  username = %s",
                            $this->labAdodb->Param("username"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["username"] = $users->getusername();
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnUsers = Users::createNullUsers();
                $returnUsers->setusername($resultSql->Fields("username"));
                $returnUsers->setname($resultSql->Fields("name"));
                $returnUsers->setlast_name1($resultSql->Fields("last_name1"));
                $returnUsers->setlast_name2($resultSql->Fields("last_name2"));
                $returnUsers->setemail($resultSql->Fields("email"));
                $returnUsers->setbirth_date($resultSql->Fields("birth_date"));
                $returnUsers->setpassword($resultSql->Fields("password"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase PersonasDao), error:'.$e->getMessage());
        }
        return $returnUsers;
    }

    //***********************************************************
    //obtiene la información de las personas en la base de datos
    //***********************************************************
    
    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.user");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

}
