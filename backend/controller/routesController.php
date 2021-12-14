<?php


require_once("../bo/routesBo.php");
require_once("../domain/routes.php");





if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');



    try {


        $myroutesBo = new routesBo();
        $myroutes = routes::createNullroutes();
        

        if ($action === "add" or $action === "update") {


            if (   (filter_input(INPUT_POST, 'id')              != null)
                && (filter_input(INPUT_POST, 'city_o_id')       != null)
                && (filter_input(INPUT_POST, 'city_d_id')       != null)
                && (filter_input(INPUT_POST, 'route_name')      != null)
                && (filter_input(INPUT_POST, 'route_time')      != null)
                && (filter_input(INPUT_POST, 'airplane_id')     != null)
                && (filter_input(INPUT_POST, 'discount_id')     != null)
            ) {

                //session_start();

                $myroutes->setid(filter_input(INPUT_POST,               'id'));
                $myroutes->setcity_o_id(filter_input(INPUT_POST,        'city_o_id'));
                $myroutes->setcity_d_id(filter_input(INPUT_POST,        'city_d_id'));
                $myroutes->setroute_name(filter_input(INPUT_POST,       'route_name'));
                $myroutes->setroute_time(filter_input(INPUT_POST,       'route_time'));
                $myroutes->setairplane_id(filter_input(INPUT_POST,      'airplane_id'));
                $myroutes->setdiscount_id(filter_input(INPUT_POST,      'discount_id'));
                $myroutes->setlastuser(filter_input(INPUT_POST,         'username'));
                //$myroutes->setlastmodification($timestamp);

                if ($action == "add") {

                    $myroutesBo->add($myroutes);
                    echo ('M~Registro Incluido Correctamente');
                    //header("refresh: 2; url=../../signin.php");
                }
                if ($action == "update") {

                    $myroutesBo->update($myroutes);
                    echo ('M~Registro Modificado Correctamente');
                    //header("refresh: 2; url=../../profile.php");
                }
            } else {
                echo ("Error: Debe de llenar todos los datos");
            }

        }





        if ($action === "showAll") {


            $resultDB   = $myroutesBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if ($resultDB->RecordCount() === 0) {
                $resultado = '{"data": []}';
            }
            echo $resultado;
            
        }





        if ($action === "show") {


            if (filter_input(INPUT_POST, 'id') != null) {
                $myroutes->setid(filter_input(INPUT_POST, 'id'));
                $myroutes = $myroutesBo->searchById($myroutes);
                if ($myroutes != null) {
                    echo json_encode(($myroutes));
                } else {
                    echo ('E~NO Existe el ID especificado');
                }
            }

        }





        if ($action === "delete") { //accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'id') != null) {
                $myroutes->setid(filter_input(INPUT_POST, 'id'));
                $myroutesBo->delete($myroutes);
                echo ('M~Registro Fue Eliminado Correctamente');
            }
        }





    } catch (Exception $e) { //exception generated in the business object..
        echo ("E~" . $e->getMessage());
    }
} else {
    echo ('M~Parámetros no enviados desde el formulario'); //se codifica un mensaje para enviar
}
