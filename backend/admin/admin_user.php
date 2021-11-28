<?php  
$page_title = 'Usuarios'; 
require_once('admin_header.php');

?>

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
                <h1><h1><Nombre Sistema><small> Mantenimiento de Usuarios</small><img src="img/logo/logo.png" align="right"/></h1></h1>
            </div>  
            
            <!-- ********************************************************** -->
            <!-- CONTENIDO DE LA PAGINA                                     -->
            <!-- ********************************************************** -->
            
            <div class="row">
                <div class="col-md-12">
                    <form role="form" onsubmit="return false;" id="formPersonas" action="../backend/controller/personasController.php">
                        <div class="row">
                            <!-- ******************************************************** -->
                            <!-- Campos de formulario      -->
                            <!-- ******************************************************** -->
                            <div class="col-md-12">

                                <div class="form-group" id="groupPK_cedula">
                                    <label for="txtPK_cedula">Cédula</label>
                                    <input type="text" class="form-control" id="txtPK_cedula"  placeholder="Cédula">
                                </div>
                                <div class="form-group" id="groupnombre">
                                    <label for="txtnombre">Nombre</label>
                                    <input type="text" class="form-control" id="txtnombre"  placeholder="Nombre">
                                </div>
                                <div class="form-group" id="groupapellido1">
                                    <label for="txtapellido1">Primer Apellido</label>
                                    <input type="text" class="form-control" id="txtapellido1"  placeholder="Primer Apellido">
                                </div>
                                <div class="form-group" id="groupapellido2">
                                    <label for="txtapellido2">Segundo Apellido</label>
                                    <input type="text" class="form-control" id="txtapellido2"  placeholder="Segundo Apellido">
                                </div>
                                <div class="form-group" id="groupfecNacimiento">
                                    <label for="txtfecNacimiento">Fecha Nacimiento</label>
                                    <input type="text" class="form-control" id="txtfecNacimiento"  placeholder="Fec. Nacimiento">
                                </div>
                                <div class="form-group" id="groupsexo">
                                    <label for="txtsexo">Sexo</label>
                                    <input type="text" class="form-control" id="txtsexo"  placeholder="Sexo">
                                </div>
                                <div class="form-group" id="groupobservaciones">
                                    <label for="txtobservaciones">Observaciones</label>
                                    <input type="text" class="form-control" id="txtobservaciones"  placeholder="Observaciones">
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
                    <table id="dt_personas"  class="table  table-hover dt-responsive nowrap" cellspacing="0" width="100%">
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