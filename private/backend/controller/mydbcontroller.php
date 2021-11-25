<?php

require_once("../bo/user.php");
require_once("../domain/user.php");



//************************************************************
// user Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myUserBo = new UserBo();
        $myUser = User::createNullUser();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_user" or $action === "update_user") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'id') != null) && (filter_input(INPUT_POST, 'user_name') != null) && (filter_input(INPUT_POST, 'login_name') != null) && (filter_input(INPUT_POST, 'user_last_name1') != null) && (filter_input(INPUT_POST, 'user_last_name2') != null) && (filter_input(INPUT_POST, 'user_email') != null) &&  (filter_input(INPUT_POST, 'user_password') != null) && (filter_input(INPUT_POST, 'address') != null)) {
                $myUser->setid(filter_input(INPUT_POST, 'id'));
                $myUser->setuser_name(filter_input(INPUT_POST, 'user_name'));
                $myUser->setlogin_name(filter_input(INPUT_POST, 'login_name'));
                $myUser->setuser_last_name1(filter_input(INPUT_POST, 'user_last_name1'));
                $myUser->setuser_last_name2(filter_input(INPUT_POST, 'user_last_name2'));
                $myUser->setuser_email(filter_input(INPUT_POST, 'user_email'));
                $myUser->setuser_password('user_password');
                $myUser->setuser_address('address');
                if ($action == "add_user") {
                    $myUserBo->add($myUser);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_user") {
                    $myUserBo->update($myUser);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_user") {//accion de consultar todos los registros
            $resultDB   = $myUserBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_user") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'id') != null) {
                $myUser->setPK_cedula(filter_input(INPUT_POST, 'id'));
                $myUser = $myUserBo->searchById($myUser);
                if ($myUser != null) {
                    echo json_encode(($myUser));
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_user") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'id') != null) {
                $myUser->setPK_cedula(filter_input(INPUT_POST, 'id'));
                $myUserBo->delete($myUser);
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
    echo('M~Parametros no enviados desde el formulario'); //se codifica un mensaje para enviar
}
?>
