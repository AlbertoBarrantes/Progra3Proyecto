<?php

require_once("../bo/usersBo.php");
require_once("../domain/users.php");


//************************************************************
// Personas Controller 
//************************************************************

//echo("<hr>Datos Recibidos: <br>");
//print_r($_POST);
//echo("<br><hr><br>");



if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');
    try {

        //$timestamp = date("Y-m-d H:i:s");
        //print_r($timestamp);

        $myUsersBo = new UsersBo();
        $myUsers = Users::createNullUsers();
        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_users" or $action === "update_users") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST,    'username'       )!= null) 
                && (filter_input(INPUT_POST, 'name'           )!= null) 
                && (filter_input(INPUT_POST, 'last_name1'     )!= null) 
                && (filter_input(INPUT_POST, 'last_name2'     )!= null) 
                && (filter_input(INPUT_POST, 'email'          )!= null) 
                && (filter_input(INPUT_POST, 'birth_date'     )!= null) 
                && (filter_input(INPUT_POST, 'password'       )!= null)
                && (filter_input(INPUT_POST, 'address'        )!= null)
                && (filter_input(INPUT_POST, 'work_phone'     )!= null)
                && (filter_input(INPUT_POST, 'personal_phone' )!= null)
                ) {
                    
                    

                $myUsers->setusername(filter_input(INPUT_POST,       'username'      ));
                $myUsers->setname(filter_input(INPUT_POST,           'name'          ));
                $myUsers->setlast_name1(filter_input(INPUT_POST,     'last_name1'    ));
                $myUsers->setlast_name2(filter_input(INPUT_POST,     'last_name2'    ));
                $myUsers->setemail(filter_input(INPUT_POST,          'email'         ));
                $myUsers->setbirth_date(filter_input(INPUT_POST,     'birth_date'    ));
                $myUsers->setpassword(filter_input(INPUT_POST,       'password'      ));
                $myUsers->setaddress(filter_input(INPUT_POST,        'address'       ));
                $myUsers->setwork_phone(filter_input(INPUT_POST,     'work_phone'    ));
                $myUsers->setpersonal_phone(filter_input(INPUT_POST, 'personal_phone'));
                $myUsers->setlastuser('112540148');
                //$myUsers->setlastmodification($timestamp);
                
                if ($action == "add_users") {
                    $myUsersBo->add($myUsers);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_users") {
                    $myUsersBo->update($myUsers);
                    echo('M~Registro Modificado Correctamente');
                }
            } else {
                echo("Error: Debe de llenar todos los datos");
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_users") {//accion de consultar todos los registros
            $resultDB   = $myUsersBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_users") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'username') != null) {
                $myUsers->setusername(filter_input(INPUT_POST, 'username'));
                $myUsers = $myUsersBo->searchById($myUsers);
                if ($myUsers != null) {
                    echo json_encode(($myUsers));
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_users") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'username') != null) {
                $myUsers->setusername(filter_input(INPUT_POST, 'username'));
                $myUsersBo->delete($myUsers);
                echo('M~Registro Fue Eliminado Correctamente');
            }
        }

        //***********************************************************
        //se captura cualquier error generado
        //***********************************************************
    } catch (Exception $e) { //exception generated in the business object..
        echo("E~" . $e->getMessage());
    }
} else {
    echo('M~Parámetros no enviados desde el formulario'); //se codifica un mensaje para enviar
}
?>
