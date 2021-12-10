<!DOCTYPE html>
<html>

<head>
    <title>Mantenimiento de Personas</title>
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
    <script type="text/javascript" src="js/personasFunctions.js"></script>


</head>

<body>

    <!-- ********************************************************** -->
    <!-- ********************************************************** -->
    <!-- Modal del BootsTrap para mostrar mensajes                  -->
    <!-- ********************************************************** -->
    <!-- ********************************************************** -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalTitle">Modal Header</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="myModalMessage">
                    <p>This is a small modal.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="page-header">
            <h1>
                <h1>
                    <Nombre Sistema><small> Mantenimiento de Personas</small><img src="img/logo/logo.png" align="right" />
                </h1>
            </h1>
        </div>

        <!-- ********************************************************** -->
        <!-- CONTENIDO DE LA PAGINA                                     -->
        <!-- ********************************************************** -->

        <div class="row">
            <div class="col-md-12">
                <form role="form" onsubmit="return true;" id="formPersonas" action="../backend/controller/personasController.php">
                    <div class="row">
                        <!-- ******************************************************** -->
                        <!-- Campos de formulario      -->
                        <!-- ******************************************************** -->
                        <div class="col-md-12">

                            <div class="form-group" id="groupPK_cedula">
                                <label for="txtPK_cedula">Cédula</label>
                                <input type="text" class="form-control" id="txtPK_cedula" placeholder="Cédula">
                            </div>
                            <div class="form-group" id="groupnombre">
                                <label for="txtnombre">Nombre</label>
                                <input type="text" class="form-control" id="txtnombre" placeholder="Nombre">
                            </div>
                            <div class="form-group" id="groupapellido1">
                                <label for="txtapellido1">Primer Apellido</label>
                                <input type="text" class="form-control" id="txtapellido1" placeholder="Primer Apellido">
                            </div>
                            <div class="form-group" id="groupapellido2">
                                <label for="txtapellido2">Segundo Apellido</label>
                                <input type="text" class="form-control" id="txtapellido2" placeholder="Segundo Apellido">
                            </div>
                            <div class="form-group" id="groupfecNacimiento">
                                <label for="txtfecNacimiento">Fecha Nacimiento</label>
                                <input type="text" class="form-control" id="txtfecNacimiento" placeholder="Fec. Nacimiento">
                            </div>
                            <div class="form-group" id="groupsexo">
                                <label for="txtsexo">Sexo</label>
                                <input type="text" class="form-control" id="txtsexo" placeholder="Sexo">
                            </div>
                            <div class="form-group" id="groupobservaciones">
                                <label for="txtobservaciones">Observaciones</label>
                                <input type="text" class="form-control" id="txtobservaciones" placeholder="Observaciones">
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="typeAction" value="add_personas" />
                                <button type="submit" class="btn btn-primary" id="enviar">Guardar</button>
                                <button type="reset" class="btn btn-danger" id="cancelar">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <br>
        <h3>Tabla con informacion de personas</h3>

        <br><br>
        <div class="row">
            <div class="col-md-12">
                <table id="dt_personas" class="table  table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>CEDULA</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO1</th>
                            <th>APELLIDO2</th>
                            <th>FEC. NACIMIENTO</th>
                            <th>SEXO</th>
                            <th>ACCION</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <br><br><br><br>
        <!-- ********************************************************** -->
        <!-- FIN CONTENIDO DE LA PAGINA                                 -->
        <!-- ********************************************************** -->
    </div>
</body>

</html>