<?php
/**
* Conexión Base de Datos
*/
class Conexion extends mysqli{

        private $Servidor = 'localhost';
        private $Usuario  = 'root';
        private $Password = 'root';
        private $DB       = 'mydb';

        public function __construct(){
        parent:: __construct($this->Servidor, $this->Usuario, $this->Password, $this->DB);

        // Codificación de carácteres
        $this->set_charset('utf8');

        // Comprobar conexión
        $this->connect_errno ? die('Error de Conexión'. mysqli_connect_errno()) : 
        $EstadoConexion = 'Conectado a la Base de Datos';

        //echo $EstadoConexion;


    }
}

?>