<?php


require_once("../domain/travel.php");
require_once("../dao/travelDao.php");


class TravelBo {

    private $travelDao;

    public function __construct() {
        $this->travelDao = new travelDao();
    }

    public function gettravelDao() {
        return $this->travelDao;
    }

    public function settravelDao(travelDao $travelDao) {
        $this->travelDao = $travelDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(travel $travel) {
        try {
            if (!$this->travelDao->exist($travel)) {
                $this->travelDao->add($travel);
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

    public function update(travel $travel) {
        try {
            $this->travelDao->update($travel);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(travel $travel) {
        try {
            $this->travelDao->delete($travel);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(travel $travel) {
        try {
            return $this->travelDao->searchById($travel);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las personas de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->travelDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class PersonasBo
?>