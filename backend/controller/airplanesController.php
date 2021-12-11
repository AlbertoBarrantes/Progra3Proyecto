<?php


require_once("../bo/airplanesBo.php");
require_once("../domain/airplanes.php");




if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    //echo 'action no es nulo: ';
    //echo $action;

    try {


        $myairplanesBo = new airplanesBo();
        $myairplanes = airplanes::createNullairplanes();
        
        

        if ($action === "add" or $action === "update") {

            if (   (filter_input(INPUT_POST, 'airplane_id') != null)
                && (filter_input(INPUT_POST, 'model')       != null)
                && (filter_input(INPUT_POST, 'yearx')       != null)
                && (filter_input(INPUT_POST, 'brand')       != null)
                && (filter_input(INPUT_POST, 'passengers')  != null)
                && (filter_input(INPUT_POST, 'rowsx')       != null)
                && (filter_input(INPUT_POST, 'sits_row')    != null)
            ) {

                session_start();

                $myairplanes->setairplane_id(filter_input(INPUT_POST,    'airplane_id'));
                $myairplanes->setmodel(filter_input(INPUT_POST,          'model'));
                $myairplanes->setyearx(filter_input(INPUT_POST,          'yearx'));
                $myairplanes->setbrand(filter_input(INPUT_POST,          'brand'));
                $myairplanes->setpassengers(filter_input(INPUT_POST,     'passengers'));
                $myairplanes->setrowsx(filter_input(INPUT_POST,          'rowsx'));
                $myairplanes->setsits_row(filter_input(INPUT_POST,       'sits_row'));
                $myairplanes->setlastuser(filter_input(INPUT_POST, 'username'));
                //$myairplanes->setlastmodification($timestamp);

                if ($action == "add") {
                    $myairplanesBo->add($myairplanes);
                    echo ('M~Registro Incluido Correctamente');
                    //header("refresh: 2; url=../../signin.php");
                }
                if ($action == "update") {

                    $myairplanesBo->update($myairplanes);

                    // actualiza los datos de la sesión
                    // if (!($_SESSION['username'] == null || $_SESSION['username'] == "") || (!($_SESSION['admin'] == null || $_SESSION['admin'] == "")) ) {
                    //     $arreglo = $_SESSION['username'];
                    //     $arreglo['name'] = $myairplanes->getname();
                    //     $arreglo['yearx'] = $myairplanes->getyearx();
                    //     $arreglo['brand'] = $myairplanes->getbrand();
                    //     $arreglo['passengers'] = $myairplanes->getpassengers();
                    //     $arreglo['rowsx'] = $myairplanes->getrowsx();
                    //     $arreglo['address'] = $myairplanes->getaddress();
                    //     $arreglo['work_phone'] = $myairplanes->getwork_phone();
                    //     $arreglo['personal_phone'] = $myairplanes->getpersonal_phone();
                    //     $_SESSION['username'] = $arreglo;
                    // }

                    //echo "<hr><hr><hr><hr>";
                    //print_r($arreglo);
                    //echo "<hr><hr><hr><hr>";

                    echo ('M~Registro Modificado Correctamente');
                    //header("refresh: 2; url=../../profile.php");
                }
            } else {
                echo ("Error: Debe de llenar todos los datos");
            }

        }





        if ($action === "showAll") { //accion de consultar todos los registros
            $resultDB   = $myairplanesBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if ($resultDB->RecordCount() === 0) {
                $resultado = '{"data": []}';
            }
            echo $resultado;
            
        }





        if ($action === "show") { //accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'airplane_id') != null) {
                $myairplanes->setairplane_id(filter_input(INPUT_POST, 'airplane_id'));
                $myairplanes = $myairplanesBo->searchById($myairplanes);
                if ($myairplanes != null) {
                    echo json_encode(($myairplanes));
                } else {
                    echo ('E~NO Existe el ID especificado');
                }
            }
        }





        if ($action === "delete") { //accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'airplane_id') != null) {
                $myairplanes->setairplane_id(filter_input(INPUT_POST, 'airplane_id'));
                $myairplanesBo->delete($myairplanes);
                echo ('M~Registro Fue Eliminado Correctamente');
            }
        }





    } catch (Exception $e) { //exception generated in the business object..
        echo ("E~" . $e->getMessage());
    }
} else {
    echo ('M~Parámetros no enviados desde el formulario'); //se codifica un mensaje para enviar
}
