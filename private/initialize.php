<?php
  ob_start(); // el búfer de salida está activado

  session_start(); // encender sesiones

// Asignar rutas de archivo a constantes PHP
   // __FILE__ devuelve la ruta actual a este archivo
   // dirname () devuelve la ruta al directorio principal
  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("PUBLIC_PATH", PROJECT_PATH . '/public');
  define("SHARED_PATH", PRIVATE_PATH . '/shared');

// Asignar la URL raíz a una constante PHP
   // * No es necesario incluir el dominio
   // * Usar la misma raíz del documento que el servidor web
   // * Puede establecer un valor codificado:
   // define ("WWW_ROOT", '/ ~ kevinskoglund / globe_bank / public');
  // define ("WWW_ROOT", '');
  // * Puede encontrar dinámicamente todo en URL hasta "/ public"
  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);

  require_once('functions.php');
  require_once('database.php');
  require_once('query_functions.php');
  require_once('validation_functions.php');
  require_once('auth_functions.php');

  $db = require_once('db_connect.php');
  $errors = [];

?>
