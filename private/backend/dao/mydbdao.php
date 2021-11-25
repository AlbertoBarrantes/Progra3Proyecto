<?php
require_once ("../../db_connect.php");
require_once("adodb5/adodb.inc.php");
require_once("../domain/user.php");



//this attribute enable to see the SQL's executed in the data base


class UserDao {

    
    private $easytravel;//objeto de conexion con la base de datos    
    
    public function __construct() {
        //se crea el objeto con la conexión de la base de datos
        //según los datos del servidor de mysql
        $driver = 'mysqli';
        $this->easytravel = newAdoConnection($driver);
        $this->easytravel->setCharset('utf8');
        $this->easytravel->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        //los cados de conexión   host,       user,   pass,   basedatos
        $this->easytravel->Connect("localhost", "admin", "admin1234", "easytravel");   
        
        //si se desea hacer debug del SQL que se genera en la base de datos
        //dependiendo del error es necesario ver si es un error directamente
        //en la base de datos
        $this->easytravel->debug=false;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(User $user) {
        try {
            $sql = sprintf("insert into easytravel.user (id, user_name, 
            login_name, user_last_name1, user_last_name2, 
            user_email, user_birth_date, user_password, address, 
            user_home_phone, user_work_phone  ) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
                    $this->easytravel->Param("id"),
                    $this->easytravel->Param("user_name"),
                    $this->easytravel->Param("login_name"),
                    $this->easytravel->Param("user_last_name1"),
                    $this->easytravel->Param("user_last_name2"),
                    $this->easytravel->Param("user_email"),

                    $this->easytravel->Param("user_password"),
                    $this->easytravel->Param("address"),
                    $this->easytravel->Param("user_home_phone"),
                    $this->easytravel->Param("user_work_phone"));
            $sqlParam = $this->easytravel->Prepare($sql);

            $valores = array();

            $valores["id"]                   = $user->getid();
            $valores["user_name"]            = $user->getuser_name();
            $valores["login_name"]           = $user->getlogin_name();
            $valores["user_last_name1"]      = $user->getuser_last_name1();
            $valores["user_last_name2"]      = $user->getuser_last_name2();
            $valores["user_email"]           = $user->getuser_email();
            $valores["user_birth_date"]      = $user->getuser_birth_date();
            $valores["user_password"]        = $user->getuser_password();
            $valores["address"]              = $user->getaddress();
            $valores["user_home_phone"]      = $user->getuser_home_phone();
            $valores["user_work_phone"]      = $user->getuser_work_phone();

            $this->easytravel->Execute($sqlParam, $valores) or die($this->easytravel->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase UserDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(User $user) {
        $exist = false;
        try {
            $sql = sprintf("select * from easytravel.user where  id = %s ",
                            $this->easytravel->Param("id"));
            $sqlParam = $this->easytravel->Prepare($sql);

            $valores = array();
            $valores["id"] = $user->getid();

            $resultSql = $this->easytravel->Execute($sqlParam, $valores) or die($this->easytravel->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase UserDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(User $User) {
        try {
            $sql = sprintf("update User set user_name = %s, 
            login_name = %s, 
            user_last_name1 = %s, 
            user_last_name2 = %s, 
            user_email = %s, 
            user_birth_date = %s, 
            address = %s, 
            user_homer_phone = %s, 
            user_work_phone = %s 
                            where id = %s",
                    $this->easytravel->Param("user_name"),
                    $this->easytravel->Param("login_name"),
                    $this->easytravel->Param("user_last_name1"),
                    $this->easytravel->Param("user_last_name2"),
                    $this->easytravel->Param("user_email"),
                    $this->easytravel->Param("user_birth_date"),
                    $this->easytravel->Param("address"),
                    $this->easytravel->Param("user_home_phone"),
                    $this->easytravel->Param("user_work_phone"),
                    $this->easytravel->Param("id"));
            $sqlParam = $this->easytravel->Prepare($sql);

            $valores = array();

            $valores["user_name"]             = $user->getuser_name();
            $valores["login_name"]            = $user->getlogin_name();
            $valores["user_last_name1"]       = $user->getuser_last_name1();
            $valores["user_last_name2"]       = $user->getuser_last_name2();
            $valores["user_email"]            = $user->getuser_email();
            $valores["user_birth_date"]       = $user->getuser_birth_date();
            $valores["address"]               = $user->getaddress();
            $valores["user_home_phone"]       = $user->getuser_home_phone();
            $valores["user_work_phone"]       = $user->getuser_work_phone();
            $valores["id"]                    = $user->getid();
            $this->easytravel->Execute($sqlParam, $valores) or die($this->easytravel->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase UserDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una la foto de la base de datos
    //***********************************************************

    public function updatefoto(User $User) {
        try {
            $sql = sprintf("update User set user_profile_picture = %s, 
                            where id = %s",
                    $this->easytravel->Param("user_profile_picture"),
                    $this->easytravel->Param("id"));
            $sqlParam = $this->easytravel->Prepare($sql);

            $valores = array();

            $valores["user_profile_picture"]       = $user->getuser_profile_picture();
            $valores["id"]                    = $user->getid();
            $this->easytravel->Execute($sqlParam, $valores) or die($this->easytravel->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase UserDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(User $user) {

        
        try {
            $sql = sprintf("delete from user where  id = %s",
                            $this->easytravel->Param("id"));
            $sqlParam = $this->easytravel->Prepare($sql);
            $valores = array();
            $valores["id"] = $user->getid();

            $this->easytravel->Execute($sqlParam, $valores) or die($this->easytravel->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase UserDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************
    public function searchById(User $user) {
        $returnUser = null;
        try {
            $sql = sprintf("select * from user where  id = %s",
                            $this->easytravel->Param("id"));
            $sqlParam = $this->easytravel->Prepare($sql);

            $valores = array();
            $valores["id"] = $user->getid();
            $resultSql = $this->easytravel->Execute($sqlParam, $valores) or die($this->easytravel->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $returnUser = User::createNullUser();
                $returnUser->setid($resultSql->Fields("id"));
                $returnUser->setuser_name($resultSql->Fields("user_name"));
                $returnUser->setlogin_name($resultSql->Fields("login_name"));
                $returnUser->setuser_last_name1($resultSql->Fields("user_last_name1"));
                $returnUser->setuser_last_name2($resultSql->Fields("user_last_name2"));
                $returnUser->setuser_email($resultSql->Fields("user_email"));
                $returnUser->setuser_birth_date($resultSql->Fields("user_birth_date"));
                $returnUser->setuser_password($resultSql->Fields("user_password"));
                $returnUser->setuser_profile_picture($resultSql->Fields("user_profile_picture"));
                $returnUser->setuser_address($resultSql->Fields("address"));
            }       
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase UserDao), error:'.$e->getMessage());
        }
        return $returnUser;
    }

    //**
    //obtiene la información de las user en la base de datos
    //**

    //***********************************************************
    //obtiene la información de las user en la base de datos
    //***********************************************************
    
    public function getAll() {
        try {
            $sql = sprintf("select * from easytravel.user");
            $resultSql = $this->easytravel->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase UserDao), error:'.$e->getMessage());
        }
    }

}
