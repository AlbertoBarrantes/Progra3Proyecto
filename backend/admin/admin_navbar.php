<!-- NAVBAR -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark px-4 py-2 text-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="../../index.php"><img src="../../assets/img/icons/nav/nav.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div style="min-height:50px; min-width:25px;">
            </div>
            <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php

                error_reporting(0);
                if ( ($_SESSION['admin'] == null || $_SESSION['admin'] == "") ) {         // No hay sesión    // {

                    echo '
                        <script>console.log("NO hay sesión de administrador");</script>
                        ';
                    
                    //header("refresh: 2; url=admin_signin.php");

                } else {          // Si hay sesión

                    $arreglo = $_SESSION['admin'];
                    echo '
                        <script>console.log("SI hay sesión de administrador");</script>
                        

                        <li class="nav-item dropdown">
                            <div id="" class="dropdown my-3">
                                <input id="btn_Mantenimientos" value="Mantenimientos ▾" name="btn_Mantenimientos" class="btn btn-secondary dropdown-toggle bg-dark shadow-none border-0 " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <ul class="dropdown-menu dropdown-menu-dark pb-3 px-2" aria-labelledby="btn_Mantenimientos>
                                    <li><a class="nav-link active" aria-current="page" href=""                 ></a></li>
                                    <li><a class="nav-link active" aria-current="page" href="admin_user.php"   >Mantenimiento usuarios</a></li>
                                    <li><a class="nav-link active" aria-current="page" href="#"                >Mantenimiento X</a></li>
                                    <li><a class="nav-link active" aria-current="page" href="#"                >Mantenimiento Y</a></li>
                                </ul>
                            </div>
                        </li>


                        <li class="nav-item dropdown">
                            <div id="accountDIV" class="dropdown my-3">
                                <input id="btn_MiCuenta" value="Hola ' . $arreglo['name'] . ' ▾" name="btn_MiCuenta" class="btn btn-secondary dropdown-toggle bg-dark shadow-none border-0 " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="btn_MiCuenta">
                                    <li><a class="dropdown-item" href="../controller/destroySession.php">Salir</a></li>
                                </ul>
                            </div>
                        </li>
                    ';
                }
                ?>

            </div>
        </div>
    </div>
</nav>
<!-- NAVBAR -->
