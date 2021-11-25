<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/userBo.php");
require_once ("../domain/user.php");

$obj_persona = new User();
$obj_persona->setid(121212);
$obj_persona->setuser_name("Cristhian mod");
$obj_persona->setlogin_name("Cristhian mod");
$obj_persona->setuser_last_name1("Cristhian mod");
$obj_persona->setuser_last_name2("Cristhian mod");
$obj_persona->setuser_email("Cristhian mod");
$obj_persona->setuser_password("Cristhian mod");
$obj_persona->setuser_address("Cristhian mod");
$obj_persona->setuser_home_phone("Cristhian mod");
$obj_persona->setuser_work_phone("Cristhian mod");



$bo_persona = new UserBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_persona->add($obj_persona);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_persona->update($obj_persona);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_persona->delete($obj_persona);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $personaConsultada = $bo_persona->searchById($obj_persona);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($personaConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_persona->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}
