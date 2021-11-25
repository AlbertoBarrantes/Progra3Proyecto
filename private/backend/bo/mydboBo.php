<?php


require_once("../domain/user.php");
require_once("../dao/userDao.php");


class UserBo {

    private $userDao;

    public function __construct() {
        $this->userDao = new UserDao();
    }

    public function getUserDao() {
        return $this->puserDao;
    }

    public function setUserDao(UserDao $userDao) {
        $this->userDao = $userDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(User $user) {
        try {
            if (!$this->userDao->exist($user)) {
                $this->userDao->add($user);
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

    public function update(User $user) {
        try {
            $this->userDao->update($user);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(User $user) {
        try {
            $this->userDao->delete($user);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(User $user) {
        try {
            return $this->userDao->searchById($user);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las personas de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->userDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class PersonasBo
?>