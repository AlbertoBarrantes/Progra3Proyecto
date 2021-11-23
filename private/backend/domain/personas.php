<?php

require_once("baseDomain.php");


class Personas extends BaseDomain implements \JsonSerializable{

    //attributes
    private $id;
    private $user_name;
    private $login_name;
    private $user_last_name1;
    private $user_last_name2;
    private $user_email;
    private $user_birth_name;
    private $user_password;
    private $address;
    private $user_work_phone;
    private $user_home_phone;
    

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullPersonas() {
        $instance = new self();
        return $instance;
    }

    public static function createPersonas($id, $user_name, $login_name, $user_last_name1, $user_last_name2, $user_email, $user_birth_name, $user_password, $address, $user_work_phone, $user_home_phone, $ultUsuario, $ultModificacion, $lastUser, $lastModification) {
        $instance = new self();
        $instance->id                   = $id;
        $instance->user_name            = $user_name;
        $instance->login_name           = $login_name;
        $instance->user_last_name1      = $user_last_name1;
        $instance->user_last_name2      = $user_last_name2;
        $instance->user_email           = $user_email;
        $instance->user_birth_name      = $user_birth_name;
        $instance->user_password        = $user_password;
        $instance->address              = $address;
        $instance->user_work_phone      = $user_work_phone;
        $instance->user_home_phone      = $user_home_phone;
        $instance->setLastUser($ultUsuario);
        $instance->setLastModification($ultModificacion);
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getid() {
        return $this->id;
    }

    public function setid($id) {
        $this->id = $id;
    }

    /****************************************************************************/

    public function getuser_name() {
        return $this->user_name;
    }

    public function setuser_name($user_name) {
        $this->user_name = $user_name;
    }

    /****************************************************************************/

    public function getlogin_name() {
        return $this->login_name;
    }

    public function setlogin_name($login_name) {
        $this->login_name = $login_name;
    }

    /****************************************************************************/

    public function getuser_last_name1() {
        return $this->user_last_name1;
    }

    public function setuser_last_name1($user_last_name1) {
        $this->user_last_name1 = $user_last_name1;
    }

    /****************************************************************************/

    public function getuser_last_name2() {
        return $this->user_last_name2;
    }

    public function setuser_last_name2($user_last_name2) {
        $this->user_last_name2 = $user_last_name2;
    }

    /****************************************************************************/

    public function getuser_email() {
        return $this->user_email;
    }

    public function setuser_email($user_email) {
        $this->user_email = $user_email;
    }

    /****************************************************************************/

    public function getuser_birth_name() {
        return $this->user_birth_name;
    }

    public function setuser_birth_name($user_birth_name) {
        $this->user_birth_name = $user_birth_name;
    }

    /****************************************************************************/

    public function getuser_password() {
        return $this->user_password;
    }

    public function setuser_password($user_password) {
        $this->user_password = $user_password;
    }

    /****************************************************************************/
    public function getuser_work_phone() {
        return $this->user_work_phone;
    }

    public function setuser_work_phone($user_work_phone) {
        $this->user_work_phone = $user_work_phone;
    }

    /****************************************************************************/
    public function getuser_home_phone() {
        return $this->user_home_phone;
    }

    public function setuser_home_phone($user_home_phone) {
        $this->user_home_phone = $user_home_phone;
    }

    /****************************************************************************/
    public function getUltUsuario() {
        return $this->user_password;
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