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
    <link rel="stylesheet" type="text/css" href="../../resources/css/transaccion.css" />
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

            <div class="nav__login bounce-in-top">
                <a href="../login/login.php" id="login__button log_button" class="nav__item button">
                    <i class="uil uil-user nav__login"></i> Conectarse
                </a>
            </div>
            
            <div class="nav__login bounce-in-top">
                <a href="../perfil/miperfil.php" id="login__button profile_button" class="nav__item button">
                <i class="uil uil-user-circle"></i> Mi Perfil
                </a>
            </div>

            <script>
                const btProfile = document.getElementById('login__button profile_button'),
                        btLogin = document.getElementById('login__button log_button')

                if (<?php echo isset($_SESSION['log']); ?>) {
                    btLogin.style.display = "none";
                    btProfile.style.display = "flex";
                } else {
                    btProfile.style.display = "none";
                    btLogin.style.display = "flex";
                }
            </script>
            
        </nav>
    </header>

    <main class="main">
        <section class="main__container">
            <!--Muestra todos los productos-->
            <?php

                include '../../resources/php/db.php';

                if (!isset($_SESSION['codigo'])) {
                    header('Location: ../../index.php');
                } else {

                    $codigo = $_SESSION['codigo'];

                    $consulta = "SELECT * FROM transaccion where codigo_usuario = ? ";
                    $resultado = mysqli_prepare($conexion, $consulta);

                    if (!$resultado) {
                        echo "Error".mysqli_error($conexion);
                    }

                    $tabien = mysqli_stmt_bind_param($resultado, "i", $codigo);

                    $tabien = mysqli_stmt_execute($resultado);

                    if (!$tabien) {
                        echo "Error";
                    } else {

                        $tabien = mysqli_stmt_bind_result($resultado, $c_cod,$c_codprod, $c_cantidad, $c_user, $c_date, $c_total);

                        while( mysqli_stmt_fetch($resultado) ){
            ?>
<!---->
<!--==========Codigo HTML==========-->
                        <div class="account__container">
                            <div class="account__title">
                                Transaccion
                            </div>

                            <div class="account__information">
                                <table id="table">

                                    <tr id="table_row">
                                        <td id="table_data">Codigo de Transaccion</td>
                                        <td id="table_data">Producto</td>
                                        <td id="table_data">Cantidad</td>
                                        <td id="table_data">Usuario</td>
                                        <td id="table_data">Fecha</td>
                                        <td id="table_data">Total</td>
                                    </tr>

                                    <tr id="table_row">
                                        <td id="table_data">
                                            <?php echo "".$c_cod; ?>
                                        </td>

                                        <td id="table_data">
                                            <?php echo "".$c_codprod; ?>
                                        </td>

                                        <td id="table_data">
                                            <?php echo "".$c_cantidad; ?>
                                        </td>

                                        <td id="table_data">
                                            <?php echo "".$c_user; ?>
                                        </td>

                                        <td id="table_data">
                                            <?php echo "".$c_date; ?>
                                        </td>

                                        <td id="table_data">
                                            <?php echo "".$c_total; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
<!--====================-->
                        <?php
                    }
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