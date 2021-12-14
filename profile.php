<?php
$page_title = 'Perfil';

session_start();

require_once('backend/public/public_header.php');
require_once('backend/public/navbar.php');

//error_reporting(0); 


if (!($_SESSION['username'] == null || $_SESSION['username'] == "")) {
    $arreglo = $_SESSION['username'];
} else {
    header("Location:index.php");
}

?>



<html>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlJDp1mNCpUj8Yn2L-wfuNysxxZ_pmeKA&callback=initMap&v=weekly" async></script>

<body>






    <!-- SIGN UP -->
    <div class="my-5 signup-form2 shadow container">
        <form action="backend\controller\usersController.php" method="post">
            <div class="row">
                <h2>Mi cuenta</h2>

                <div class="col-md-6 col-xs-12">
                    <!-- usuario -->
                    <div class="form-group">
                        <label for="user" class="form-label ms-4">Usuario</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                            <input id="username" name="username" value="<?php echo $arreglo["username"] ?>" type="text" class="form-control" readonly required="required">
                        </div>
                    </div>
                    <!-- nombre -->
                    <div class="form-group">
                        <label for="name" class="form-label ms-4">Nombre</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input id="name" name="name" value="<?php echo $arreglo["name"] ?>" type="text" class="form-control" required="required" readonly>
                        </div>
                    </div>
                    <!-- primer apellido -->
                    <div class="form-group">
                        <label for="pa" class="form-label ms-4">Primer Apellido</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input id="last_name1" name="last_name1" value="<?php echo $arreglo["last_name1"] ?>" readonly type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <!-- segundo apellido -->
                    <div class="form-group">
                        <label for="sa" class="form-label ms-4">Segundo Apellido</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input id="last_name2" name="last_name2" value="<?php echo $arreglo["last_name2"] ?>" readonly type="text" class="form-control" required="required">
                        </div>
                    </div>

                    <!-- fecha de nacimiento -->
                    <div class="form-group">
                        <label for="date" class="form-label ms-4">Fecha de Nacimiento</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input id="birth_date" name="birth_date" value="<?php echo $arreglo["birth_date"] ?>" readonly type="date" class="form-control" required="required" />
                            <span id="startDateSelected"></span>
                        </div>
                    </div>
                    <!-- email -->
                    <div class="form-group">
                        <label for="email" class="form- ms-4">Email</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                            <input id="email" name="email" value="<?php echo $arreglo["email"] ?>" readonly type="email" class="form-control" required="required">
                        </div>
                    </div>
                    <!-- teléfono de trabajo -->
                    <div class="form-group">
                        <label for="phoneWork" class="form- ms-4">Teléfono de trabajo</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone-square-alt"> </i></span>
                            <input id="work_phone" name="work_phone" value="<?php echo $arreglo["work_phone"] ?>" readonly type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <!-- teléfono celular -->
                    <div class="form-group">
                        <label for="phonePersonal" class="form- ms-4">Teléfono personal</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-mobile-alt"> </i></span>
                            <input id="personal_phone" name="personal_phone" value="<?php echo $arreglo["personal_phone"] ?>" readonly type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <!-- contraseña -->
                    <div class="form-group">
                        <label for="password1" class="form-label ms-4">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input id="password" name="password"" readonly type=" text" class="form-control" required="required" placeholder="••••••••••••">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <!-- dirección -->
                    <label for="address" class="form-label ms-4">Dirección</label>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marked-alt"> </i></span>
                            <input id="address" name="address" value="<?php echo $arreglo["address"] ?>" readonly type="text" class="form-control" required="required">
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

            <!-- 'action' POST -->
            <input id="action" type="hidden" name="action" value="update_users" style="visibility: hidden;"></input>

            <!-- Botones-->
            <div>
                <div class="row row-cols-auto justify-content-center">
                    <div id="divBtnMod" class="form-group col ">
                        <button id="btnMod" onClick="enableInput()" type="button" class="btn btn-primary btn-lg">Modificar datos</button>
                    </div>
                    <div id="divBtnSave" class="form-group col collapse">
                        <button id="btnSave" type="submit" class="btn btn-primary btn-lg">Guardar cambios</button>
                    </div>
                    <div id="divBtnExit" class="form-group col collapse">
                        <button id="btnExit" onClick="discardModification()" type="button" class="btn btn-primary btn-lg">Salir</button>
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