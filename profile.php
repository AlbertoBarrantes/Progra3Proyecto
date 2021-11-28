<?php 
$page_title = 'Perfil'; 
require_once('backend/public/public_header.php');

?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlJDp1mNCpUj8Yn2L-wfuNysxxZ_pmeKA&callback=initMap&v=weekly" async></script>

</head>

<body>





    <!-- NAVBAR -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 py-2">
            <div class="container-fluid">
                <a class="navbar-brand" href="#!"><img src="assets/img/icons/nav/nav.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <form class="d-flex px-5">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../Progra3Proyecto/login.php">Acceder a mi cuenta</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <!-- NAVBAR -->














    <!-- SIGN UP -->
    <div class="my-5 signup-form2 shadow container">
        <form>
            <div class="row">
                <h2>Mi cuenta</h2>

                <div class="col-md-6 col-xs-12">
                    <!-- usuario -->
                    <div class="form-group">
                        <label for="user" class="form-label ms-4">Usuario</label>
                        <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                            <input id="user" disabled type="text" class="form-control" name="username"
                                required="required">
                        </div>
                    </div>
                    <!-- nombre -->
                    <div class="form-group">
                        <label for="name" class="form-label ms-4">Nombre</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>

                            <input disabled id="name" type="text" class="form-control" name="name" required="required">
                        </div>
                    </div>
                    <!-- primer apellido -->
                    <div class="form-group">
                        <label for="pa" class="form-label ms-4">Primer Apellido</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>

                            <input id="pa" disabled type="text" class="form-control" name="plastname"
                                required="required">
                        </div>
                    </div>
                    <!-- segundo apellido -->
                    <div class="form-group">
                        <label for="sa" class="form-label ms-4">Segundo Apellido</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>

                            <input id="sa" disabled type="text" class="form-control" name="slastname"
                                required="required">
                        </div>
                    </div>

                    <!-- fecha de nacimiento -->
                    <div class="form-group">
                        <label for="date" class="form-label ms-4">Fecha de Nacimiento</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                            <input id="date" disabled type="date" class="form-control" id="startDate"
                                required="required" />
                            <span id="startDateSelected"></span>
                        </div>
                    </div>
                    <!-- email -->
                    <div class="form-group">
                        <label for="email" class="form- ms-4">Email</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                            <input id="email" disabled type="email" class="form-control" name="email"
                                required="required">
                        </div>
                    </div>
                    <!-- teléfono de trabajo -->
                    <div class="form-group">
                        <label for="phoneWork" class="form- ms-4">Teléfono de trabajo</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone-square-alt"> </i></span>
                            <input id="phoneWork" disabled type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <!-- teléfono celular -->
                    <div class="form-group">
                        <label for="phonePersonal" class="form- ms-4">Teléfono personal</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-mobile-alt"> </i></span>
                            <input id="phonePersonal" disabled type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <!-- contraseña -->
                    <div class="form-group">
                        <label for="password1" class="form-label ms-4">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input id="password1" disabled type="text" class="form-control"
                                required="required">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <!-- dirección -->
                    <label for="address" class="form-label ms-4">Dirección</label>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marked-alt"> </i></span>
                            <input id="address" disabled type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <!-- mapa -->
                    <div id="divX" class="form-group">
                        <div class="input-group">
                            <div id="map" class="shadow border"></div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Botones-->
            <div>
                <div class="row row-cols-auto justify-content-center">
                    <div id="divBtnMod" class="form-group col ">
                        <button id="btnMod" onClick="enableInput()" type="button"
                            class="btn btn-primary btn-lg">Modificar datos</button>
                    </div>
                    <div id="divBtnSave" class="form-group col collapse">
                        <button id="btnSave" onClick="disableInput()" type="button"
                            class="btn btn-primary btn-lg">Guardar cambios</button>
                    </div>
                    <div id="divBtnExit" class="form-group col collapse">
                        <button id="btnExit" onClick="discardModification()" type="button"
                            class="btn btn-primary btn-lg">Salir</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- SIGN UP -->





    <br><br>




<?php 

require_once('backend/public/public_footer.php');

?>

</body>

</html>