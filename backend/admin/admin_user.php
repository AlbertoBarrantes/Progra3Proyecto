<?php


session_start();

error_reporting(0);
if (!($_SESSION['admin'] == null || $_SESSION['admin'] == "")) {
    //$arreglo = $_SESSION['admin'];
} else {
    header("Location:admin_signin.php");
}


$page_title = 'Mantenimiento de Usuarios';


?>



<html>

<head>
    <title>Mantenimiento de Usuarios</title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/icons/png/36x36.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="lib/jquery/dist/jquery.min.js" type="text/javascript"></script>

    <!-- common css. required for every page-->
    <link href="lib/bootstrap/dist/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />
    <link href="lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="lib/bootstrap/dist/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css" />

    <script src="lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>

    <link href="lib/animate.css/animate.min.css" rel="stylesheet" type="text/css" />


    <!-- JavaScript -->
    <script src="../../assets\js\jquery-3.6.0.min.js"></script>
    <script src="../../assets/js/bootstrap.js"></script>
    <script src="../../assets/js/custom.js"></script>


    <!-- Page scripts -->
    <!-- Datatables -->
    <script src="lib/dataTableFull/datatables/media/js/jquery.dataTables.js"></script>
    <script src="lib/dataTableFull/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="lib/dataTableFull/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="lib/dataTableFull/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="lib/dataTableFull/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="lib/dataTableFull/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="lib/dataTableFull/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="lib/dataTableFull/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="lib/dataTableFull/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="lib/dataTableFull/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="lib/dataTableFull/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>


    <link href="lib/dataTableFull/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="lib/dataTableFull/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="lib/dataTableFull/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="lib/dataTableFull/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="lib/dataTableFull/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="lib/dataTableFull/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Mensaje de alerta -->
    <script src="lib/sweetAlert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
    <link href="lib/sweetAlert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Script propios de la pagina -->
    <script src="js/utils.js" type="text/javascript"></script>
    <script src="js/userFunctions.js" type="text/javascript"></script>


    <!-- CSS -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/custom.css" rel="stylesheet" type="text/css" />

    <!-- Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />




    <!-- Mapa -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlJDp1mNCpUj8Yn2L-wfuNysxxZ_pmeKA&callback=initMap&v=weekly" async></script>
-->


</head>

<body>


    <?php

    include_once('admin_navbar.php');

    ?>




    <!-- ********************************************************** -->
    <!-- CONTENIDO DE LA PAGINA                                     -->
    <!-- ********************************************************** -->

    <div class="container my-5 signup-form2 mx-auto">
        <div class="row shadow p-3">
            <div class="col-md-12">
                <form role=" form" onsubmit="return false;" id="formPersonas" action="../backend/controller/usersController.php">

                    <div class="row">
                        <h2 class="my-3">Información del usuario</h2>


                        <div class="col-md-6 col-xs-12">


                            <!-- usuario -->
                            <div class="form-group">
                                <label for="user" class="form-label ms-4">Usuario</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                                    <input id="username" name="username" value="" type="text" class="form-control" required="required">
                                </div>
                            </div>


                            <!-- nombre -->
                            <div class="form-group">
                                <label for="name" class="form-label ms-4">Nombre</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="name" name="name" value="" type="text" class="form-control" required="required">
                                </div>
                            </div>


                            <!-- primer apellido -->
                            <div class="form-group">
                                <label for="pa" class="form-label ms-4">Primer Apellido</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="last_name1" name="last_name1" value="" type="text" class="form-control" required="required">
                                </div>
                            </div>


                            <!-- segundo apellido -->
                            <div class="form-group">
                                <label for="sa" class="form-label ms-4">Segundo Apellido</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="last_name2" name="last_name2" value="" type="text" class="form-control" required="required">
                                </div>
                            </div>


                            <!-- fecha de nacimiento -->
                            <div class="form-group">
                                <label for="date" class="form-label ms-4">Fecha de Nacimiento</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input id="birth_date" name="birth_date" value="" type="date" class="form-control" required="required" />
                                    <span id="startDateSelected"></span>
                                </div>
                            </div>


                            <!-- email -->
                            <div class="form-group">
                                <label for="email" class="form- ms-4">Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                                    <input id="email" name="email" value="" type="email" class="form-control" required="required">
                                </div>
                            </div>


                            <!-- teléfono de trabajo -->
                            <div class="form-group">
                                <label for="phoneWork" class="form- ms-4">Teléfono de trabajo</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone-square-alt"> </i></span>
                                    <input id="work_phone" name="work_phone" value="" type="text" class="form-control" required="required">
                                </div>
                            </div>


                            <!-- teléfono celular -->
                            <div class="form-group">
                                <label for="phonePersonal" class="form- ms-4">Teléfono personal</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-mobile-alt"> </i></span>
                                    <input id="personal_phone" name="personal_phone" value="" type="text" class="form-control" required="required">
                                </div>
                            </div>

                            <!-- contraseña -->
                            <div class="form-group">
                                <label for="password1" class="form-label ms-4">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input id="password" name="password" type=" text" class="form-control" required="required" >
                                </div>
                            </div>


                        </div>


                        <div class="col-md-6 col-xs-12">


                            <!-- dirección -->
                            <label for="address" class="form-label ms-4">Dirección</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marked-alt"> </i></span>
                                    <input id="address" name="address" value="" type="text" class="form-control" required="required">
                                </div>
                            </div>


                            <!-- mapa -->
                            <div id="" class="form-group">
                                <div class="input-group">
                                    <div id="map" class="shadow border"></div>
                                </div>
                            </div>


                        </div>


                        <div class="form-group">
                            <input type="hidden" id="typeAction" value="add_users" />
                            <button type="submit" class="btn btn-primary" id="enviar">Guardar</button>
                            <button type="reset" class="btn btn-danger" id="cancelar">Cancelar</button>
                        </div>


                    </div>
                </form>
            </div>
        </div>

        <br>


        <br>
        <div class="row shadow">
            <h2 class="my-3">Lista de usuarios</h2>
            <div class="col-md-12">
                <table id="dt_personas" class="table table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>PK</th>
                            <th>USUARIO</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO1</th>
                            <th>APELLIDO2</th>
                            <th>FEC. NACIMIENTO</th>
                            <th>EMAIL</th>
                            <th>TEL. TRABAJO</th>
                            <th>TEL. PERSONAL</th>
                            <th>CONTRASEÑA</th>
                            <th>DIRECCIÓN</th>
                            <th>ACCION</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!--<div class="row">
            <div class="col-md-12">
                <div id="divResult" style="text-align:center;">Resultado de la consulta</div>
            </div>
        </div>-->

        <br><br><br><br>
        <!-- ********************************************************** -->
        <!-- FIN CONTENIDO DE LA PAGINA                                 -->
        <!-- ********************************************************** -->
    </div>
</body>

</html>