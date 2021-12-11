<?php


require_once("../domain/airplanes.php");
require_once("../dao/airplanesDao.php");


class AirplanesBo {

    private $airplanesDao;

    public function __construct() {
        $this->airplanesDao = new airplanesDao();
    }

    public function getairplanesDao() {
        return $this->airplanesDao;
    }

    public function setairplanesDao(airplanesDao $airplanesDao) {
        $this->airplanesDao = $airplanesDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(airplanes $airplanes) {
        try {
            if (!$this->airplanesDao->exist($airplanes)) {
                $this->airplanesDao->add($airplanes);
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

    public function update(airplanes $airplanes) {
        try {
            $this->airplanesDao->update($airplanes);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(airplanes $airplanes) {
        try {
            $this->airplanesDao->delete($airplanes);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(airplanes $airplanes) {
        try {
            return $this->airplanesDao->searchById($airplanes);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las personas de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->airplanesDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class PersonasBo
?>