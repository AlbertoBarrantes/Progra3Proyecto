<?php

require_once("baseDomain.php");


class Travel extends BaseDomain implements \JsonSerializable{

    //attributes
    private $origen;
    private $destino;
    private $date_go;
    private $date_back;
    private $date_requested;
    private $last_modification;




/*
    id`,
    `origen`,
    `destino`,
    `date_go`,
    `date_back`,
    `date_requested`,
    `lastModification`)

*/


    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullUsers() {
        $instance = new self();
        return $instance;
    }

    public static function createUsers($origen, $destino, $date_go, $date_back, $date_requested, $last_modification) {
        $instance = new self();
        $instance->origen           = $origen;
        $instance->destino          = $destino;
        $instance->date_go          = $date_go;
        $instance->date_back        = $date_back;
        $instance->date_requested   = $date_requested;
        $instance->setLastUser('777');
        $instance->setLastModification($last_modification);
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getorigen() {
        return $this->origen;
    }

    public function setorigen($origen) {
        $this->origen = $origen;
    }

    /****************************************************************************/

    public function getdestino() {
        return $this->destino;
    }

    public function setdestino($destino) {
        $this->destino = $destino;
    }

    /****************************************************************************/

    public function getdate_go() {
        return $this->date_go;
    }

    public function setdate_go($date_go) {
        $this->date_go = $date_go;
    }

    /****************************************************************************/

    public function getdate_back() {
        return $this->date_back;
    }

    public function setdate_back($date_back) {
        $this->date_back = $date_back;
    }

    /****************************************************************************/

    public function getdate_requested() {
        return $this->date_requested;
    }

    public function setdate_requested($date_requested) {
        $this->date_requested = $date_requested;
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