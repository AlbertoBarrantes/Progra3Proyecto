<?php


require_once("../domain/users.php");
require_once("../dao/usersDao.php");


class UsersBo {

    private $usersDao;

    public function __construct() {
        $this->usersDao = new usersDao();
    }

    public function getusersDao() {
        return $this->usersDao;
    }

    public function setusersDao(usersDao $usersDao) {
        $this->usersDao = $usersDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Users $users) {
        try {
            if (!$this->usersDao->exist($users)) {
                $this->usersDao->add($users);
            } else {
                throw new Exception("El Personas ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una persona a la base de datos
    //***********************************************************

    public function update(Users $users) {
        try {
            $this->usersDao->update($users);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(Users $users) {
        try {
            $this->usersDao->delete($users);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(Users $users) {
        try {
            return $this->usersDao->searchById($users);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las personas de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->usersDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class PersonasBo
?>