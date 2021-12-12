<?php


require_once("../domain/routes.php");
require_once("../dao/routesDao.php");


class routesBo {

    private $routesDao;

    public function __construct() {
        $this->routesDao = new routesDao();
    }

    public function getroutesDao() {
        return $this->routesDao;
    }

    public function setroutesDao(routesDao $routesDao) {
        $this->routesDao = $routesDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(routes $routes) {
        try {
            if (!$this->routesDao->exist($routes)) {
                $this->routesDao->add($routes);
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

    public function update(routes $routes) {
        try {
            $this->routesDao->update($routes);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(routes $routes) {
        try {
            $this->routesDao->delete($routes);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(routes $routes) {
        try {
            return $this->routesDao->searchById($routes);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las personas de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->routesDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class PersonasBo
?>