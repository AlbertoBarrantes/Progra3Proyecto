<?php

require_once("baseDomain.php");


class routes extends BaseDomain implements \JsonSerializable {


    //attributes
    private $id;
    private $city_o_id;
    private $city_d_id;
    private $route_name;
    private $route_time;
    private $airplane_id;
    private $discount_id;
    




    public function __construct() {


        parent::__construct();

    }





    public static function createNullroutes() {


        $instance = new self();
        return $instance;

    }





    public static function createroutes( $id, 
                                        $city_o_id, 
                                        $city_d_id, 
                                        $route_name, 
                                        $route_time, 
                                        $airplane_id, 
                                        $discount_id, 
                                        $last_user, 
                                        $last_modification) {
    
    
        $instance = new self();
        $instance->id        = $id;
        $instance->city_o_id              = $city_o_id;
        $instance->city_d_id               = $city_d_id;
        $instance->route_name              = $route_name;
        $instance->route_time         = $route_time;
        $instance->airplane_id               = $airplane_id;
        $instance->discount_id           = $discount_id;
        
        $instance->setLastUser($last_user);
        $instance->setLastModification($last_modification);
        return $instance;
    
    }

    



    public function getid() {
        return $this->id;
    }

    public function setid($id) {
        $this->id = $id;
    }

    /****************************************************************************/

    public function getcity_o_id() {
        return $this->city_o_id;
    }

    public function setcity_o_id($city_o_id) {
        $this->city_o_id = $city_o_id;
    }

    /****************************************************************************/

    public function getcity_d_id() {
        return $this->city_d_id;
    }

    public function setcity_d_id($city_d_id) {
        $this->city_d_id = $city_d_id;
    }

    /****************************************************************************/

    public function getroute_name() {
        return $this->route_name;
    }

    public function setroute_name($route_name) {
        $this->route_name = $route_name;
    }

    /****************************************************************************/

    public function getroute_time() {
        return $this->route_time;
    }

    public function setroute_time($route_time) {
        $this->route_time = $route_time;
    }

    /****************************************************************************/

    public function getairplane_id() {
        return $this->airplane_id;
    }

    public function setairplane_id($airplane_id) {
        $this->airplane_id = $airplane_id;
    }

    /****************************************************************************/

    public function getdiscount_id() {
        return $this->discount_id;
    }

    public function setdiscount_id($discount_id) {
        $this->discount_id = $discount_id;
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