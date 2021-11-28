<?php  
$page_title = 'Usuarios'; 
require_once('admin_header.php');

?>
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlJDp1mNCpUj8Yn2L-wfuNysxxZ_pmeKA&callback=initMap&v=weekly"
    async></script>
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
                <h1><h1><Nombre Sistema><small> Mantenimiento de Usuarios</small><img src="img/logo/logo.png" align="right"/></h1></h1>
            </div>  
            
            <!-- ********************************************************** -->
            <!-- CONTENIDO DE LA PAGINA                                     -->
            <!-- ********************************************************** -->
            
            <div class="row">
                <div class="col-md-12">
                    <form role="form" onsubmit="return false;" id="formUsers" action="../controller/usersController.php">
                        <div class="row">
                            <!-- ******************************************************** -->
                            <!-- Campos de formulario      -->
                            <!-- ******************************************************** -->
                            <div class="col-md-12">

                                <div class="form-group" id="groupusername">
                                    <label for="txtusername">Nombre de usuario</label>
                                    <input type="text" class="form-control" id="txtusername"  placeholder="Nombre de usuario">
                                </div>
                                <div class="form-group" id="groupname">
                                    <label for="txtname">Nombre</label>
                                    <input type="text" class="form-control" id="txtname"  placeholder="Nombre">
                                </div>
                                <div class="form-group" id="grouplast_name1">
                                    <label for="txtlast_name1">Primer Apellido</label>
                                    <input type="text" class="form-control" id="txtlast_name1"  placeholder="Primer Apellido">
                                </div>
                                <div class="form-group" id="grouplast_name2">
                                    <label for="txtlast_name2">Segundo Apellido</label>
                                    <input type="text" class="form-control" id="txtlast_name2"  placeholder="Segundo Apellido">
                                </div>
                                <div class="form-group" id="groupbirth_date">
                                    <label for="txtbirth_date">Fecha Nacimiento</label>
                                    <input type="text" class="form-control" id="txtbirth_date"  placeholder="Fec. Nacimiento">
                                </div>
                                <div class="form-group" id="groupemail">
                                    <label for="txtemail">Correo electronico</label>
                                    <input type="text" class="form-control" id="txtemail"  placeholder="Correo electronico">
                                </div>
                                <div class="form-group" id="groupaddress">
                                    <label for="txtaddress">Telefono de trabajo</label>
                                    <input type="text" class="form-control" id="txtaddress"  placeholder="Telefono de trabajo">
                                </div>
                                <div class="form-group" id="groupwork_phone">
                                    <label for="txtobservaciones">Telefono celular</label>
                                    <input type="text" class="form-control" id="txtobservaciones"  placeholder="Telefono celular">
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
                                <th>id</th>
                                <th>NOMBRE DE USUARIO</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO1</th>
                                <th>APELLIDO2</th>
                                <th>FEC. NACIMIENTO</th>
                                <th>EMAIL</th>
                                <th>TELEFNO TRABAJO</th>
                                <th>TELEFONO CELULAR</th>
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