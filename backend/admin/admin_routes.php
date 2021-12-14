<?php


session_start();

error_reporting(0);
if (!($_SESSION['admin'] == null || $_SESSION['admin'] == "")) {
    //$arreglo = $_SESSION['admin'];
} else {
    header("Location:admin_signin.php");
}


$page_title = 'Mantenimiento de Rutas';


?>



<html>

<head>
    <title>Mantenimiento de Rutas</title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/icons/png/36x36.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- ESTILOS -->

        <!-- BOOTSTRAP -->
        <script src="../../assets/js/bootstrap.js"></script>
        <link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
    
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    
        <!-- SWEET ALERT -->
        <script src="lib/sweetAlert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
        <link href="lib/sweetAlert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css" />   

        <!-- CUSTOM -->
        <link href="../../assets/css/custom.css" rel="stylesheet" type="text/css" />

    <!-- SCRIPTS -->

        <!-- JQuery -->
        <script src="../../assets/js/jquery-3.6.0.min.js"></script>

        <!-- CUSTOM -->
        <script src="../../assets/js/custom.js"></script>

        <!-- DATA TABLES -->
        <script src="js/utils.js" type="text/javascript"></script>
        <script src="js/routesFunctions.js" type="text/javascript"></script>

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



</head>

<body>


    <?php

    include_once('admin_navbar.php');

    ?>





    <div class="container my-5 signup-form2 mx-auto">
        <div class="row shadow p-3">
            <div class="col-md-12">
                <form role=" form" onsubmit="return false;" id="formX" action="../backend/controller/routesController.php">

                    <div class="row">
                        <h2 class="my-3">Información de las rutas</h2>


                        <div class="col-md-6 col-xs-12">



                            <!-- PK -->
                            <div class="form-group">
                                <label for="id" class="form-label ms-4">ID de ruta</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-id-card-alt fa-fw"></i></span>
                                    <input id="id" name="id" value="" type="text" class="form-control" required="required">
                                </div>
                            </div>
                            
                            
                            <!-- Ciudad de Origen -->
                            <div class="form-group">
                                <label for="city_o_id" class="form-label ms-4">Ciudad de origen</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-city fa-fw"></i></span>
                                    <input id="city_o_id" name="city_o_id" value="" type="text" class="form-control" required="required">
                                </div>
                            </div>


                            <!-- Ciudad de Destino -->
                            <div class="form-group">
                                <label for="city_d_id" class="form-label ms-4">Ciudad de Destino</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-city fa-fw"> </i></span>
                                    <input id="city_d_id" name="city_d_id" value="" type="text" class="form-control" required="required">
                                </div>
                            </div>


                            <!-- Nombre -->
                            <div class="form-group">
                                <label for="route_name" class="form-label ms-4">Nombre de la ruta</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-signature fa-fw"></i></span>
                                    <input id="route_name" name="route_name" value="" type="text" class="form-control" required="required">
                                </div>
                            </div>


                            
                        </div>


                        <div class="col-md-6 col-xs-12">



                            <!-- Horario -->
                            <div class="form-group">
                                <label for="route_time" class="form-label ms-4">Horario</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock fa-fw"></i></span>
                                    <input id="route_time" name="route_time" value="" type="date" class="form-control" required="required" placeholder="">
                                </div>
                            </div>


                            <!-- ID Avión -->
                            <div class="form-group">
                                <label for="airplane_id" class="form-label ms-4">ID Avión</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-plane fa-fw"></i></span>
                                    <input id="airplane_id" name="airplane_id" value="" type="number" class="form-control" required="required" />
                                </div>
                            </div>


                            <!-- ID Descuento -->
                            <div class="form-group">
                                <label for="discount_id" class="form-label ms-4">ID Descuento</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-percent fa-fw"></i></span>
                                    <input id="discount_id" name="discount_id" value="" type="number" class="form-control" required="required" />
                                </div>
                            </div>



                        </div>


                        <div class="form-group">
                            <input type="hidden" id="typeAction" value="add" />
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
            <h2 class="my-3">Rutas registradas</h2>
            <div class="col-md-12">
                <table id="dt" class="table table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>PK</th>
                            <th>ORIGEN</th>
                            <th>DESTINO</th>
                            <th>NOMBRE</th>
                            <th>HORARIO</th>
                            <th>ID AVIÓN</th>
                            <th>ID DESCUENTO</th>
                            <th>ACCION</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <br><br>

    </div>
</body>

</html>