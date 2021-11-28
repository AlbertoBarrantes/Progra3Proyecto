<?php

require_once("baseDomain.php");


class Users extends BaseDomain implements \JsonSerializable{

    //attributes
    private $username;
    private $name;
    private $last_name1;
    private $last_name2;
    private $email;
    private $birth_date;
    private $password;
    private $address;
    private $work_phone;
    private $personal_phone;
    private $last_user;
    private $last_modification;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullUsers() {
        $instance = new self();
        return $instance;
    }

    public static function createUsers($username, $name, $last_name1, $last_name2, $email, $birth_date, $password, $address, $work_phone, $personal_phone, $last_user, $lastUser, $last_modification) {
        $instance = new self();
        $instance->username          = $username;
        $instance->name              = $name;
        $instance->last_name1        = $last_name1;
        $instance->last_name2        = $last_name2;
        $instance->email             = $email;
        $instance->birth_date        = $birth_date;
        $instance->password          = $password;
        $instance->address           = $address;
        $instance->work_phone        = $work_phone;
        $instance->personal_phone    = $personal_phone;
        $instance->setLastUser($last_user);
        $instance->setLastModification($last_modification);
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getusername() {
        return $this->username;
    }

    public function setusername($username) {
        $this->username = $username;
    }

    /****************************************************************************/

    public function getname() {
        return $this->name;
    }

    public function setname($name) {
        $this->name = $name;
    }

    /****************************************************************************/

    public function getlast_name1() {
        return $this->last_name1;
    }

    public function setlast_name1($last_name1) {
        $this->last_name1 = $last_name1;
    }

    /****************************************************************************/

    public function getlast_name2() {
        return $this->last_name2;
    }

    public function setlast_name2($last_name2) {
        $this->last_name2 = $last_name2;
    }

    /****************************************************************************/

    public function getemail() {
        return $this->email;
    }

    public function setemail($email) {
        $this->email = $email;
    }

    /****************************************************************************/

    public function getbirth_date() {
        return $this->birth_date;
    }

    public function setbirth_date($birth_date) {
        $this->birth_date = $birth_date;
    }

    /****************************************************************************/

    public function getpassword() {
        return $this->password;
    }

    public function setpassword($password) {
        $this->password = $password;
    }

    /****************************************************************************/

    public function getaddress() {
        return $this->address;
    }

    public function setaddress($address) {
        $this->address = $address;
    }

    /****************************************************************************/

    public function getwork_phone() {
        return $this->work_phone;
    }

    public function setwork_phone($work_phone) {
        $this->work_phone = $work_phone;
    }

    /****************************************************************************/

    public function getpersonal_phone() {
        return $this->personal_phone;
    }

    public function setpersonal_phone($personal_phone) {
        $this->personal_phone = $personal_phone;
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