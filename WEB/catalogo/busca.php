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
    <link rel="stylesheet" type="text/css" href="../../resources/css/productos.css">
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
                            <i class="uil uil-shop"></i> Catálogo <i class="uil uil-arrow-right"></i>
                            <ul class="nav__sublist nav__subcatalogue">

                                <li class="nav__subitem">
                                    <a href="nuestros-productos.php" class="nav__link">
                                        <i class="uil uil-rainbow"></i> Todos los Productos
                                    </a>
                                </li>

                                <li class="nav__subitem">
                                    <a href="#" class="nav__link">
                                        <i class="uil uil-search"></i> Buscador
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
                                    <a href="../entregas/nuestros-repartidores.php" class="nav__link">
                                        <i class="uil uil-truck"></i> Nuestros Repartidores
                                    </a>                                    
                                </li>
                            </ul>
                        </a>
                    </li>
                </ul>

                <i class="uil uil-times nav__close" id="nav-close"></i>
            </div>

            <?php
                if (isset($_SESSION['log'])) {
                    ?>
                    
                    <a id="login__button" class="nav__item button bounce-in-top" href="WEB/login/logout.php">
                    <i class="uil uil-signout"></i>Logout</a>
                    <div class="nav__login bounce-in-top">
                        <a href="WEB/perfil/miperfil.php" id="login__button profile_button" class="nav__item button">
                        <i class="uil uil-user-circle"></i> Mi Perfil
                        </a>
                    </div>
                <?php
                } else {?>
                    <div class="nav__login bounce-in-top">
                        <a href="WEB/login/login.php" id="login__button log_button" class="nav__item button">
                            <i class="uil uil-user nav__login"></i> Conectarse
                        </a>
                    </div>
                <?php
                }
            ?>
            
        </nav>
    </header>

    
    <main class="main">

        <section class="main__container">

            <div class="table__container">
            <?php


            include '../../resources/php/db.php';
            try{
                $nombre = $_POST['nombre'];
                $stock = $_POST['stock'];
                $precio = $_POST['precio'];
                $categoria = 'Verdura';

            
                if ($hasName AND $hasPrecio AND $hasCategoria AND $hasStock){

                    $tipoPrecio = (int)str_replace("< CLP", "", $precio);
                    $tipoStock = str_replace("< ", "", $stock);
                    $tipoStock = (int)str_replace(" Unidades", "", $tipoStock);

                    $bottVal = 0;
                    $bottVal2 = 0;

                    $consulta = "SELECT p.codigo, c.tipo, p.nombre, p.descripcion, p.precio, p.imagen, p.cantidad, pu.patente_puesto
                    FROM producto p, categoria c, puesto pu  WHERE p.nombre = ? AND p.precio BETWEEN (?) AND (?)
                    AND p.cantidad BETWEEN (?) AND (?) AND c.tipo = ?
                    AND p.codigo_tipo_categoria = c.codigo AND p.codigo_puesto = pu.codigo";
                    $resultado = mysqli_prepare($conexion,$consulta);

                    if (!$resultado) {
                        echo "Error con resultado";
                    }
                    $ok = mysqli_stmt_bind_param($resultado, "siiiis", $nombre, $bottVal, $tipoPrecio, $bottVal2, $tipoStock, $categoria);
                    $ok = mysqli_stmt_execute($resultado);

                    if (!$ok){
                        echo "Error con ok";
                    }
                    $ok = mysqli_stmt_bind_result($resultado, $p_cod, $p_categoria, $p_nombre, $p_descripcion, $p_precio, $p_imagen, $p_cantidad, $p_puesto);
                    echo "Antes while";
                    while (mysqli_stmt_fetch($resultado)){ ?>
                        <div class="item__container">

                            <div class="item_image-container">
                                <img class="item_image" alt="producto" src="<?php echo "".$p_imagen; ?>">
                            </div>

                            <div class="item_content">
                                <h3 class="item_name"><?php echo "".$p_nombre; ?></h3>
                                <p class="item_description"><?php echo "".$p_categoria ?></p>
                                <p class="item_description"><?php echo "".$p_descripcion ?></p>
                                <i class="uil uil-shopping-bag"></i> CLP <?php echo "".$p_precio; ?>
                            </div>
                        </div>
                    <?php 
                    }
                    echo "Fuera while";
                }
            } catch (Exception $e) {
                header("Location: buscador.php?error=TRUE");
            }
            ?>

            </div>
        
        </section>
    </main>

    <footer class="footer">
        <div class="footer_bg">
            <div class="footer__container">

                <div class="footer__information">
                    <h1 class="footer__title">Feria Virtual</h1>
                    <span class="footer__subtitle">¡Un lugar para ti!</span>
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
</body>
</html>