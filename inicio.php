<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
if (!(time() - $_SESSION['time'] >= 3600)) {
    $_SESSION['time'] = time();
    if ($_SESSION['rol'] == 2 || $_SESSION['rol'] == 3 || $_SESSION['rol'] == 4) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="refresh" content="3600">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Inicio - Gestión de tareas Sistemas</title>
            <?php require('libreriaEstilos.php'); ?>

            <style>
                body {
                    /* fallback for old browsers */
                    background-color: #e6ece8;

                }

                section {
                    margin-left: 180px;
                    padding: 15px;
                }

                .cajas {
                    display: grid;
                    grid-template-columns: 1fr 1fr 1fr 1fr;
                    column-gap: 20px;
                }

                .cajas p {
                    grid-column: 1/5;
                }

                .cajas .principal {
                    grid-column: 1/5;
                    display: flex;
                    justify-content: center;
                }

                .cajas .caja1 {
                    display: flex;
                    justify-content: space-between;
                    padding: 0 !important;
                }

                .cajas .caja1 i {
                    font-size: 70px;
                    color: gray;
                }

                .cajas .caja1:hover i {
                    animation: pulse;
                    animation-duration: 1.5s;
                }

                .cajas .caja1>* {
                    margin: 10px 20px;
                }
            </style>

            <!--<script>
                function redireccionar() {
                    setTimeout("location.href='../vista/login.php'", 5000);
                }
            </script>-->
        </head>

        <body>
            <?php
            require('headerNav.php');

            error_reporting(0);
            $datosAct = $_SESSION['datosAct'];
            if ($datosAct == true) {
            ?>
                <script>
                    Swal.fire({
                        position: 'bottom-end',
                        icon: 'success',
                        title: 'Los datos han sido modificados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            <?php
                unset($_SESSION['datosAct']);
            }
            if ($_SESSION['datosActError'] == true) {
            ?>
                <script>
                    Swal.fire({
                        position: 'bottom-end',
                        icon: 'error',
                        title: 'No se han podido modificar los datos',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            <?php
                unset($_SESSION['datosActError']);
            }
            ?>

            <?php
            require_once('../modelo/m_estadisticas.php');
            require_once('../modelo/m_consultas.php');
            $co = new Consultas();
            $est = new ConsultasEstadisticas();
            if ($_SESSION['rol'] == 2 || $_SESSION['rol'] == 4) {

                $tareasTotalArea = $co->contarTotalTareasAreas($_SESSION['areaUsuario'], $_SESSION['areaUsuario2'], $_SESSION['areaUsuario3']);
                //
                $tareasPendientesArea = $co->contarTareasPendientesArea($_SESSION['areaUsuario'], $_SESSION['areaUsuario2'], $_SESSION['areaUsuario3']);
                $tareasCompletasArea = $co->contarTareasCompletasArea($_SESSION['areaUsuario'], $_SESSION['areaUsuario2'], $_SESSION['areaUsuario3']);
                $tareasEnProgresoArea = $co->contarTareasEnProgresoArea($_SESSION['areaUsuario'], $_SESSION['areaUsuario2'], $_SESSION['areaUsuario3']);
                $tareasCanceladasArea = $co->contarTareasCanceladasArea($_SESSION['areaUsuario'], $_SESSION['areaUsuario2'], $_SESSION['areaUsuario3']);
                //
                $nroCompletasUser = $co->contarTareasCompletasUser($_SESSION['username']);
            }
            $totalTareasSistemas = $est->contarTareasTotal();
            $tareasPendientes = $co->contarTareasPendientes();
            $tareasEnProgreso = $co->contarTareasEnProgreso();
            $tareasCompletas = $co->contarTareasCompletas();
            $tareasCanceladas = $co->contarTareasCanceladas();
            $totalTareasEliminadas = $co->contarTareasEliminadas();
            //Usuarios
            $totalUsuarios = $co->contarTotalUsuarios();
            $totalAdmin = $co->contarAdmin();
            $totalSuperv = $co->contarSupervisores();
            $totalAgentes = $co->contarAgentes();
            $totalEncargados = $co->contarEncargados();
            //Areas
            $totalDirecciones = $co->contarDirecciones();
            ?>

            <section id="container">

                <?php
                if ((time() - $_SESSION['time'] > 10)) {
                ?>
                    <p class="fs-5">SESSION POR ACABARSE</p>
                <?php
                }
                ?>

                <div class="cajas animate__bounceInDown">
                    <p class="fs-5">Bienvenido <?php echo $_SESSION['nombreApellido']; ?></p>
                    <p class="fs-5 text-center">Tareas</p>

                    <div class="principal">

                        <?php
                        if ($_SESSION['rol'] == 2 || $_SESSION['rol'] == 4) {
                        ?>

                            <div class="card border-dark mb-3" style="max-width: auto;">
                                <div class="card-body caja1 text-dark">
                                    <div id="txtInfo">
                                        <h1 class="card-title"><?php echo $tareasTotalArea; ?></h1>
                                        <p class="card-text">Total de tareas de <?php echo $_SESSION['areaUsuarioNombre']; ?></p>
                                    </div>
                                    <i class="bi bi-clipboard-data"></i>
                                </div>
                            </div>


                        <?php
                        } else {
                        ?>

                            <div class="card border-dark mb-3" style="max-width: auto;">
                                <div class="card-body caja1 text-dark">
                                    <div id="txtInfo">
                                        <h1 class="card-title"><?php echo $totalTareasSistemas; ?></h1>
                                        <p class="card-text">Total de tareas</p>
                                    </div>
                                    <i class="bi bi-clipboard-data"></i>
                                </div>
                            </div>

                            <div class="card border-dark mb-3" style="max-width: auto; margin-left: 10px;">
                                <div class="card-body caja1 text-dark">
                                    <div id="txtInfo">
                                        <h1 class="card-title"><?php echo $totalTareasEliminadas; ?></h1>
                                        <p class="card-text">Total de eliminadas</p>
                                    </div>
                                    <i class="bi bi-clipboard-data"></i>
                                </div>
                            </div>


                        <?php
                        }
                        ?>

                    </div>

                    <?php
                    if ($_SESSION['rol'] == 2 || $_SESSION['rol'] == 4) {
                    ?>

                        <div class="card border-secondary mb-3" style="max-width: auto;">
                            <div class="card-body caja1 text-secondary">
                                <div id="txtInfo">
                                    <h1 class="card-title"><?php echo $tareasPendientesArea; ?></h1>
                                    <p class="card-text">Total de tareas 'Pendientes'</p>
                                </div>
                                <i class="bi bi-list-task"></i>
                            </div>
                        </div>

                        <div class="card border-primary mb-3" style="max-width: auto;">
                            <div class="card-body caja1 text-primary">
                                <div id="txtInfo">
                                    <h1 class="card-title"><?php echo $tareasEnProgresoArea; ?></h1>
                                    <p class="card-text">Total de tareas 'En progreso'</p>
                                </div>
                                <i class="bi bi-list-ul"></i>
                            </div>
                        </div>

                        <div class="card border-success mb-3" style="max-width: auto;">
                            <div class="card-body caja1 text-success">
                                <div id="txtInfo">
                                    <h1 class="card-title"><?php echo $tareasCompletasArea; ?></h1>
                                    <p class="card-text">Total de tareas 'Completas'</p>
                                </div>
                                <i class="bi bi-list-check"></i>
                            </div>
                        </div>

                        <div class="card border-danger mb-3" style="max-width: auto;">
                            <div class="card-body caja1 text-danger">
                                <div id="txtInfo">
                                    <h1 class="card-title"><?php echo $tareasCanceladasArea; ?></h1>
                                    <p class="card-text">Total de tareas 'Canceladas'</p>
                                </div>
                                <i class="bi bi-clipboard-x"></i>
                            </div>
                        </div>


                        <div class="card border-success mb-3 principal" style="max-width: auto;">
                            <div class="card-body caja1 text-success">
                                <div id="txtInfo">
                                    <h1 class="card-title"><?php echo $nroCompletasUser; ?></h1>
                                    <p class="card-text">Total de tareas 'Completas' por <?php echo $_SESSION['nombreApellido']; ?></p>
                                </div>
                                <i class="bi bi-list-check"></i>
                            </div>
                        </div>

                    <?php
                    } else {
                    ?>

                        <div class="card border-secondary mb-3" style="max-width: auto;">
                            <div class="card-body caja1 text-secondary">
                                <div id="txtInfo">
                                    <h1 class="card-title"><?php echo $tareasPendientes; ?></h1>
                                    <p class="card-text">Total de tareas 'Pendientes'</p>
                                </div>
                                <i class="bi bi-list-task"></i>
                            </div>
                        </div>

                        <div class="card border-primary mb-3" style="max-width: auto;">
                            <div class="card-body caja1 text-primary">
                                <div id="txtInfo">
                                    <h1 class="card-title"><?php echo $tareasEnProgreso; ?></h1>
                                    <p class="card-text">Total de tareas 'En progreso'</p>
                                </div>
                                <i class="bi bi-list-ul"></i>
                            </div>
                        </div>

                        <div class="card border-success mb-3" style="max-width: auto;">
                            <div class="card-body caja1 text-success">
                                <div id="txtInfo">
                                    <h1 class="card-title"><?php echo $tareasCompletas; ?></h1>
                                    <p class="card-text">Total de tareas 'Completas'</p>
                                </div>
                                <i class="bi bi-list-check"></i>
                            </div>
                        </div>

                        <div class="card border-danger mb-3" style="max-width: auto;">
                            <div class="card-body caja1 text-danger">
                                <div id="txtInfo">
                                    <h1 class="card-title"><?php echo $tareasCanceladas; ?></h1>
                                    <p class="card-text">Total de tareas 'Canceladas'</p>
                                </div>
                                <i class="bi bi-clipboard-x"></i>
                            </div>
                        </div>

                    <?php
                    }
                    ?>

                    <?php
                    if ($_SESSION['rol'] == 3) {
                    ?>
                        <p class="fs-5 text-center">Usuarios</p>

                        <div class="card border-dark mb-3 principal" style="max-width: auto;">
                            <div class="card-body caja1 text-dark">
                                <div id="txtInfo">
                                    <h1 class="card-title"><?php echo $totalUsuarios; ?></h1>
                                    <p class="card-text">Total de Usuarios</p>
                                </div>

                                <div class="card border-info mb-3" style="max-width: auto;">
                                    <div class="card-body caja1 text-info">
                                        <div id="txtInfo">
                                            <h1 class="card-title"><?php echo $totalAdmin; ?></h1>
                                            <p class="card-text">Usuarios Administradores</p>
                                        </div>
                                        <i class="bi bi-person-lines-fill"></i>
                                    </div>
                                </div>

                                <div class="card border-info mb-3" style="max-width: auto;">
                                    <div class="card-body caja1 text-info">
                                        <div id="txtInfo">
                                            <h1 class="card-title"><?php echo $totalSuperv; ?></h1>
                                            <p class="card-text">Usuarios Supervisores</p>
                                        </div>
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                </div>

                                <div class="card border-info mb-3" style="max-width: auto;">
                                    <div class="card-body caja1 text-info">
                                        <div id="txtInfo">
                                            <h1 class="card-title"><?php echo $totalAgentes; ?></h1>
                                            <p class="card-text">Usuarios Agentes</p>
                                        </div>
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                </div>

                                <div class="card border-info mb-3" style="max-width: auto;">
                                    <div class="card-body caja1 text-info">
                                        <div id="txtInfo">
                                            <h1 class="card-title"><?php echo $totalEncargados; ?></h1>
                                            <p class="card-text">Usuarios encargados de los reclamos</p>
                                        </div>
                                        <i class="bi bi-person-video3"></i>
                                    </div>
                                </div>

                            </div>
                        </div>

                    <?php
                    }
                    ?>

                    <p class="fs-5 text-center">Direcciones</p>

                    <div class="card border-dark mb-3 principal" style="max-width: auto;">
                        <div class="card-body text-dark caja1">
                            <div id="txtInfo">
                                <h1 class="card-title"><?php echo $totalDirecciones; ?></h1>
                                <p class="card-text">Total de Direcciones</p>
                            </div>
                            <i class="bi bi-list"></i>
                        </div>
                    </div>

                </div>
            </section>
        </body>

        </html>
    <?php
    }
} else {
    session_destroy();
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            body {
                background-color: #5a3377 !important;
                color: white !important;
                padding: 10px;
            }
        </style>
        <?php require('libreriaEstilos.php'); ?>
    </head>

    <body>
        <p class="fs-5">Sesión caducada. Para acceder a esta sección debe iniciar sesión <a href="../vista/login.php" class="link-primary">Click aquí</a></p>
    </body>

    </html>

<?php
}
?>