<?php


session_start();

error_reporting(0);
if (!($_SESSION['admin'] == null || $_SESSION['admin'] == "")) {
    //$arreglo = $_SESSION['admin'];
} else {
    header("Location:admin_signin.php");
}


$page_title = 'Mantenimiento de Aviones';


?>



<html>

<head>
    <title>Mantenimiento de Aviones</title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/icons/png/36x36.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <script src="lib/jquery/dist/jquery.min.js" type="text/javascript"></script> -->

    <!-- common css. required for every page-->
    <link href="lib/bootstrap/dist/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />
    <link href="lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="lib/bootstrap/dist/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css" />

    <script src="lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>

    <link href="lib/animate.css/animate.min.css" rel="stylesheet" type="text/css" />


    <!-- JavaScript -->
    <script src="../../assets/js/jquery-3.6.0.min.js"></script>
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
    <script src="js/airplanesFunctions.js" type="text/javascript"></script>


    <!-- CSS -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/custom.css" rel="stylesheet" type="text/css" />

    <!-- Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />



</head>

<body>


    <?php

    include_once('admin_navbar.php');

    ?>




    <div class="container my-5 signup-form2 mx-auto">
        <div class="row shadow p-3">
            <div class="col-md-12">
                <form role=" form" onsubmit="return false;" id="formX" action="../backend/controller/airplaneController.php">

                    <div class="row">
                        <h2 class="my-3">Información de los aviones</h2>


                        <div class="col-md-6 col-xs-12">



                            <!-- PK -->
                            <div class="form-group">
                                <label for="airplane_id" class="form-label ms-4">ID</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="airplane_id" name="airplane_id" value="" type="text" class="form-control" required="required">
                                </div>
                            </div>
                            
                            
                            <!-- modelo -->
                            <div class="form-group">
                                <label for="model" class="form-label ms-4">Modelo</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="model" name="model" value="" type="text" class="form-control" required="required">
                                </div>
                            </div>


                            <!-- año -->
                            <div class="form-group">
                                <label for="yearx" class="form-label ms-4">Año</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                                    <input id="yearx" name="yearx" value="" type="number" class="form-control" required="required">
                                </div>
                            </div>


                            <!-- marca -->
                            <div class="form-group">
                                <label for="brand" class="form-label ms-4">Marca</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="brand" name="brand" value="" type="text" class="form-control" required="required">
                                </div>
                            </div>


                            
                        </div>


                        <div class="col-md-6 col-xs-12">



                            <!-- pasajeros -->
                            <div class="form-group">
                                <label for="passengers" class="form-label ms-4">Pasajeros</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="passengers" name="passengers" value="" type="number" class="form-control" required="required">
                                </div>
                            </div>


                            <!-- filas -->
                            <div class="form-group">
                                <label for="rowsx" class="form-label ms-4">Filas</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input id="rowsx" name="rowsx" value="" type="number" class="form-control" required="required" />
                                </div>
                            </div>


                            <!-- asientos x filas -->
                            <div class="form-group">
                                <label for="sits_row" class="form-label ms-4">Asientos por fila</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input id="sits_row" name="sits_row" value="" type="number" class="form-control" required="required" />
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
            <h2 class="my-3">Lista de aviones</h2>
            <div class="col-md-12">
                <table id="dt" class="table table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>PK</th>
                            <th>MODELO</th>
                            <th>AÑO</th>
                            <th>MARCA</th>
                            <th>PASAJEROS</th>
                            <th>FILAS</th>
                            <th>ASIENTOS POR FILAS</th>
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