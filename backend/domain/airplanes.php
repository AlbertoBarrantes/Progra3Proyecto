<?php

require_once("baseDomain.php");


class Airplanes extends BaseDomain implements \JsonSerializable {


    //attributes
    private $airplane_id;
    private $model;
    private $yearx;
    private $brand;
    private $passengers;
    private $rowsx;
    private $sits_row;
    




    public function __construct() {


        parent::__construct();

    }





    public static function createNullAirplanes() {


        $instance = new self();
        return $instance;

    }





    public static function createairplanes( $airplane_id, 
                                        $model, 
                                        $yearx, 
                                        $brand, 
                                        $passengers, 
                                        $rowsx, 
                                        $sits_row, 
                                        $last_user, 
                                        $last_modification) {
    
    
        $instance = new self();
        $instance->airplane_id        = $airplane_id;
        $instance->model              = $model;
        $instance->yearx               = $yearx;
        $instance->brand              = $brand;
        $instance->passengers         = $passengers;
        $instance->rowsx               = $rowsx;
        $instance->sits_row           = $sits_row;
        
        $instance->setLastUser($last_user);
        $instance->setLastModification($last_modification);
        return $instance;
    
    }

    



    public function getairplane_id() {
        return $this->airplane_id;
    }

    public function setairplane_id($airplane_id) {
        $this->airplane_id = $airplane_id;
    }

    /****************************************************************************/

    public function getmodel() {
        return $this->model;
    }

    public function setmodel($model) {
        $this->model = $model;
    }

    /****************************************************************************/

    public function getyearx() {
        return $this->yearx;
    }

    public function setyearx($yearx) {
        $this->yearx = $yearx;
    }

    /****************************************************************************/

    public function getbrand() {
        return $this->brand;
    }

    public function setbrand($brand) {
        $this->brand = $brand;
    }

    /****************************************************************************/

    public function getpassengers() {
        return $this->passengers;
    }

    public function setpassengers($passengers) {
        $this->passengers = $passengers;
    }

    /****************************************************************************/

    public function getrowsx() {
        return $this->rowsx;
    }

    public function setrowsx($rowsx) {
        $this->rowsx = $rowsx;
    }

    /****************************************************************************/

    public function getsits_row() {
        return $this->sits_row;
    }

    public function setsits_row($sits_row) {
        $this->sits_row = $sits_row;
    }

    /****************************************************************************/

    public function getUltUsuario() {
        return $this->ultUsuario;
    }

    public function setUltUsuario($ultUsuario) {
        $this->ultUsuario = $ultUsuario;
    }

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}