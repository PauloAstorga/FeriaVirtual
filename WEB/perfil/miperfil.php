<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../../resources/css/estilos.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css" />
    <link rel="stylesheet" type="text/css" href="../../resources/css/animations.css" />
    <link rel="stylesheet" type="text/css" href="../../resources/css/hover.css" />
    <link rel="stylesheet" type="text/css" href="../../resources/css/profile.css"/>
    <link rel="stylesheet" type="text/css" href="../../resources/css/transaccion.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="../../resources/images/logo_icono.ico" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
    
    <title>Feria Virtual</title>
</head>

<body>
    <?php session_start();?>
    <header class="header" id="header">
        <nav class="nav container">
            
        <div class="nav__logo-container">
                <div class="nav__toggle" id="nav-toggle">
                    <i class="uil uil-list-ul"></i>
                </div>
                    
                <img alt="FeriaLogo" id="nav__image" class="nav__logo" src="../../resources/images/logo.png">
                <a href="#" class="nav__logo">Feria Virtual</a>
            </div>

            <div class="nav__menu" id="nav-menu">
                <h3 class="nav__title">
                    Feria Virtual
                </h3>
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="../../index.php" class="nav__link">
                            <i class="uil uil-home nav__icon"></i> Home
                        </a>
                    </li>

                    <li class="nav__item nav__opensubmenu">
                        <a href="#" class="nav__link">
                            <i class="uil uil-shop"></i> Cat??logo <i class="uil uil-arrow-right"></i>
                            <ul class="nav__sublist nav__subcatalogue">

                                <li class="nav__subitem">
                                    <a href="../catalogo/nuestros-productos.php" class="nav__link">
                                        <i class="uil uil-rainbow"></i> Todos los Productos
                                    </a>
                                </li>

                                <li class="nav__subitem">
                                    <a href="../catalogo/frutos-secos.php" class="nav__link">
                                        <i class="uil uil-rainbow"></i> Frutos Secos
                                    </a>
                                </li>
                                    
                                <li class="nav__subitem">
                                    <a href="../catalogo/frutas.php" class="nav__link">
                                        <i class="uil uil-wind-sun"></i> Frutas
                                    </a>
                                </li>

                                <li class="nav__subitem">
                                    <a href="../catalogo/verduras.php" class="nav__link">
                                        <i class="uil uil-cloud-showers-heavy"></i> Verduras
                                    </a>
                                </li>

                                <li class="nav__subitem">
                                    <a href="../catalogo/carnes.php" class="nav__link">
                                        <i class="uil uil-cloud-showers-heavy"></i> Carnes
                                    </a>
                                </li>

                                <li class="nav__subitem">
                                    <a href="../catalogo/varios.php" class="nav__link">
                                        <i class="uil uil-cloud-showers-heavy"></i> Varios
                                    </a>
                                </li>
                            </ul>
                        </a>
                    </li>

                    <li class="nav__item nav__deliver">
                        <a href="#" class="nav__link">
                            <i class="uil uil-truck"></i> Entregas <i class="uil uil-arrow-right"></i>
                            <ul class="nav__sublist nav__subdeliver">

                                <li class="nav__subitem">
                                    <a href="#" class="nav__link">
                                        <i class="uil uil-truck"></i> Nuestros Repartidores
                                    </a>                                    
                                </li>
                            </ul>
                        </a>
                    </li>
                </ul>

                <i class="uil uil-times nav__close" id="nav-close"></i>
            </div>

            <div class="back__button slide-in-right">
                <a href="../../index.php" id="back__button" class="nav__item back__link button">
                    <i class="uil uil-left-arrow-from-left"></i> Volver
                </a>
            </div>
        </nav>
    </header>

    <main class="main">
        <section class="main__container">
            <?php
                include '../../resources/php/db.php';

                $cod_usuario = $_SESSION['codigo'];


                $consulta = "SELECT * FROM usuario WHERE codigo = ?";
                $resultado = mysqli_prepare($conexion, $consulta);

                if (!$resultado) {
                    echo "Error con resultado: ".mysqli_error($conexion);
                }

                $ok = mysqli_stmt_bind_param($resultado, "i", $cod_usuario);
                $ok = mysqli_stmt_execute($resultado);

                if (!$ok) {
                    echo "Error con ok: ".mysqli_error($conexion);
                } else {
                    $ok = mysqli_stmt_bind_result($resultado, $cod, $rut, $nombre, $apellido, $correo, $telefono, $pwd, $direccion, $tipo);
                    while (mysqli_stmt_fetch($resultado)){
            ?>
                    <div class="profile_content">
                        <div class="profile_title">
                            <h1 id="title" class="title">Perfil de Usuario</h1>
                        </div>
                        <form id="form_profile" class="form" action="modificaperfil.php" method="POST">
                            <input type="text" id="code" name="code" disabled value="<?php echo "".$cod; ?>">
                            <input type="hidden" id="codigo" name="codigo" value="<?php echo "".$cod; ?>">
                            <input type="text" id="dni" name="dni" value="<?php echo "".$rut; ?>">
                            <input type="hidden" id="rut" name="rut" value="<?php echo "".$rut; ?>">

                            <input type="text" name="nombre" id="nombre" value="<?php echo "".$nombre; ?>">
                            <input type="text" name="apellido" id="apellido" value="<?php echo "".$apellido; ?>">
                            <input type="email" name="correo" id="correo" value="<?php echo "".$correo; ?>">
                            <input type="text" name="telefono" id="telefono" value="<?php echo "".$telefono; ?>">
                            <input type="password" name="contrasena" id="contrasena" placeholder="Contrase??a Antigua">
                            <input type="password" name="newcontrasena" id="newcontrasena" placeholder="Nueva Contrase??a">

                            <input type="submit" id="enviar" name="enviar" value="Modificar">

                            <?php
                                if (isset($_GET['pwd'])) {
                                    echo '<div id="error_msg" class="error_msg" style="color:red">Sus contrase??as no coinciden</div>';
                                } else if (isset($_GET['change'])) {
                                    echo '<div id="nice_msg" class="nice_msg" style="color:green">Sus datos fueron actualizados :)</div>';
                                }
                            ?>
                        </form>
                    </div>
            <?php
                    }
                }
            ?>

            <?php


            $numeroRegiones = NULL;
            $numeroCiudades = NULL;
            $numeroComunas = NULL;

            $consulta_numero = "SELECT COUNT(codigo) AS 'cont' FROM region";
            $resultado = mysqli_query($conexion, $consulta_numero);

            if (!$resultado) {
                echo "Error con resultado: ".mysqli_error($conexion);
            }

            while ($fila = mysqli_fetch_row($resultado)) {
                $numeroRegiones=$fila[0];
            }

            $resultado->free_result();

            $consulta_regiones = "SELECT nombre FROM region";
            $consulta_ciudades = "SELECT nombre FROM ciudad";
            $consulta_comunas = "SELECT nombre FROM comuna";
            $consulta_tipo = "SELECT tipo FROM tipo_usuario WHERE codigo=1 OR codigo=4 OR codigo=5";

            $resultado = mysqli_query($conexion, $consulta_regiones);

            if (!$resultado) {
                echo "Error con resultado: ".mysqli_error($conexion);
            }

            if ($_SESSION['cod_tipo_usuario']==4){
            ?>
                <div class="puesto_container">
                    <div class="puesto_title">
                        <h3 class="title">Agregar Puesto</h3>
                    </div>
                    <form action="agregar_puesto.php" method="POST" class="form">
                        <input type="text" id="patente" name="patente" placeholder="Patente">

                        <div class="input__container">
                                <i class="uil uil-sign-alt"></i>
                                <select id="region" name="region" required>
                                    <option id="vacio" name="vacio">Seleccione una Regi??n</option>
                                    <?php
                                        while ($fila = mysqli_fetch_row($resultado)) {
                                            ?>
                                            <option><?php echo "".$fila[0]; ?></option>
                                            <?php
                                        }
                                        $resultado->free_result();
                                    ?>
                                </select>
                        </div>

                        <div class="input__container">
                                <i class="uil uil-sign-alt"></i>
                                <select id="comuna" name="comuna" required>
                                    <option id="vacio" name="vacio">Seleccione una Comuna</option>
                                    <?php
                                    $resultado = mysqli_query($conexion, $consulta_comunas);
                                        while ($fila = mysqli_fetch_row($resultado)) {
                                            ?>
                                            <option><?php echo "".$fila[0]; ?></option>
                                            <?php
                                        }
                                        $resultado->free_result();
                                    ?>
                                </select>
                        </div>
                        <input type="text" id="direccion" name="direccion" placeholder="Direccion">

                        <input type="submit" id="enviar" name="enviar" value="Crear Puesto">
                    </form>
                </div>

                <?php


                $select_puesto = "SELECT * FROM puesto WHERE codigo_usuario = ?";
                $codigo_usuario = $_SESSION['codigo'];
                $resultado = mysqli_prepare($conexion, $select_puesto);

                if (!$resultado) {
                    echo "Error con resultado: ".mysqli_error($conexion);
                }

                $ok = mysqli_stmt_bind_param($resultado,"i",$codigo_usuario);
                $ok = mysqli_stmt_execute($resultado);

                if (!$ok) {
                    echo "Error con ok puesto: ".mysqli_error($conexion);
                }

                $ok = mysqli_stmt_bind_result($resultado, $p_cod, $p_date, $p_patente, $p_direccion, $p_usuario);
                while (mysqli_stmt_fetch($resultado)) {
                    ?>
                    <h3 class="title">Puestos que tienes</h3>
                        <div class="puesto_container">
                            <table id="table">
                                <tr id="table_row">
                                    <td id="table_data">Codigo</td>
                                    <td id="table_data">Fecha</td>
                                    <td id="table_data">Patente</td>
                                    <td id="table_data">Direccion</td>
                                    <td id="table_data">Usuario</td>
                                </tr>

                                <tr id="table_row">
                                    <td id="table_data"><?php echo "".$p_cod; ?></td>
                                    <td id="table_data"><?php echo "".$p_date; ?></td>
                                    <td id="table_data"><?php echo "".$p_patente; ?></td>
                                    <td id="table_data"><?php echo "".$p_direccion; ?></td>
                                    <td id="table_data"><?php echo "".$p_usuario; ?></td>                                    
                                </tr>
                            </table>                            
                        </div>

                        <div class="acciones">
                            <a href="eliminar_puesto.php?cod=<?php echo $p_cod; ?>">Eliminar</a>
                            <a href="modificar_puesto.php?cod=<?php echo $p_cod; ?>">Modificar</a>
                        </div>
                    <?php
                }
            }
            ?>

        </section>
    </main>

    <footer class="footer">
        <div class="footer_bg">
            <div class="footer__container">

                <div class="footer__information">
                    <h1 class="footer__title">Feria Virtual</h1>
                    <span class="footer__subtitle">??Un lugar para ti!</span>
                </div>

                <ul class="footer__links">
                    <li class="footer__item">
                        <a class="footer__link" href="#">
                            <i class="uil uil-keyhole-circle"></i> Politica de Privacidad
                        </a>
                    </li>

                    <li class="footer__item">
                        <a class="footer__link" href="#">
                            <i class="uil uil-comments"></i> Objetivo
                        </a>
                    </li>

                    <li class="footer__item">
                        <a class="footer__link" href="#">
                            <i class="uil uil-archway"></i> Socios
                        </a>
                    </li>

                </ul>

                <div class="footer__social">
                    <a href="#" class="footer__social-link" target="_blank">
                        <i class="uil uil-facebook social-ul-logo"></i>
                    </a>

                    <a href="#" class="footer__social-link" target="_blank">
                        <i class="uil uil-twitter social-ul-logo"></i>
                    </a>

                    <a href="#" class="footer__social-link" target="_blank">
                        <i class="uil uil-instagram-alt social-ul-logo"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <script src="../../resources/js/jquery-3.6.0.min.js"></script>
    <script src="../../resources/js/slide.js"></script>   
    <script src="../../resources/js/main.js"></script>
    <script src="../../resources/js/pago.js"></script>
</body>
</html>